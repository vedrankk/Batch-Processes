<?php
/*
This is just a simple example of how this script should work.
*/

//You include the builder to set up everything you need.
include 'BatchBuilder.php';

//There is an optional para in the construct, the directory path to this folder
$builder = new BatchBuilder();

//You create the batch array, all elements are required, in the future I will create it to be more versatile, so you can use it without classes
$batch = [
		//Params that will be processed in the function
		'params' => [
			['id' => 1, 'name' => 'Vedran'],
			['id' => 2, 'name' => 'Marko'],
		],
		//Name of the function that will be called for all the params. Params for the function are supplied as an array
		'function' => 'test_function',
		//Name of the file where the functions is stored
		'filename' => 'Test.php',
		//Name of class containing the function
		'class' => 'TestClass',
];

//Sets all the variables and starts the batch
$builder->batch_set($batch);
$builder->batch_process();

