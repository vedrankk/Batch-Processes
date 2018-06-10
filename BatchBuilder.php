<?php

/*
* Simple class for setting all the session variables for the batch process
*/
class BatchBuilder{
	protected $batch_folder_dir;

	/*
	* @param $dir - Options, the path to this folder so everything is included correctly.
	*/
	public function __construct($dir = ''){
		session_start();
		$this->batch_folder_dir = strip_tags($dir);
	}

	/*
	* Sets the session variables
	*/
	public function batch_set(array $batch){
		$_SESSION['batch_json'] = json_encode($batch);
		$_SESSION['batch_dir'] = $this->batch_folder_dir;
	}

	/*
	* Redirects the page to process the batch
	*/
	public function batch_process(){
		header('Location: '.$this->batch_folder_dir.'batch.php');
	}
}