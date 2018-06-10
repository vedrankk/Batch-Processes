<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

/*
* Check if all the variables are set and not empty
*/
class BatchProcess{
	protected $request;
	public function __construct(){
		session_start();
		$this->request = $_POST;
	}

	public function checkIsset() : bool{
		return isset($this->request['batch_function']) && isset($this->request['batch_file']) && isset($this->request['batch_class']) && isset($this->request['value']) ? true : false;
	}

	public function checkEmpty() : bool {
		return empty($this->request['batch_function']) && empty($this->request['batch_file']) && empty($this->request['batch_class']) && empty($this->request['value']) ? false : true;
	}
}

//Does the actual function call and returns the result
if(!empty($_POST)){
	$process = new BatchProcess();
	if($process->checkIsset() && $process->checkEmpty()){
		include __DIR__.'/'.$_POST['batch_file'];
		$class = new $_POST['batch_class']();
		try{
			echo $class->{$_POST['batch_function']}($_POST['value']);
		}
		catch(Exception $e){
			echo false;
		}
	}
}