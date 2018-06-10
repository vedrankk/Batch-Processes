<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

session_start();

//Check if there is a batch to be done
if(!isset($_SESSION['batch_json']) || empty($_SESSION['batch_json'])){
	echo 'No batch set.'; exit;
}
$batch = json_decode($_SESSION['batch_json']);
$total = sizeof($batch->params);
?>
<!DOCTYPE html>
<html>
<head>
	<title>Process Batch</title>
</head>
<body>
<div style="display: none;" id="batch_json"><?php echo $_SESSION['batch_json']; ?></div>
<div style="display: none;" id="batch_dir"><?php echo $_SESSION['batch_dir']; ?></div>

<div id="progress">
	<p>Processed <span id="processsed">0</span> of total <span id="total"><?php echo $total ?></span></p>
</div>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="js/batch.js"></script>
</body>
</html>