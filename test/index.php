<?php

include '../BatchBuilder.php';

$builder = new BatchBuilder('../');

$batch = [
		'params' => [
			['id' => 1, 'name' => 'Vedran'],
			['id' => 2, 'name' => 'Marko'],
		],
		'function' => 'test_function',
		'filename' => 'test/Test.php',
		'class' => 'TestClass',
];

$builder->batch_set($batch);
$builder->batch_process();