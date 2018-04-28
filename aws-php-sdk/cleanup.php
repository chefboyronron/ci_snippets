<?php

// connect to aws using connection string
include 'connecttoaws.php';

// get the bucket name and key
$bucket = $_GET['bucket'];
$key = $_GET['key'];

// Bucket cannot deleted unless they are empty
// Code to delete our object
$delete_file = $client->deleteObject([
	'Bucket' => $bucket,
	'Key' => $key
]);

if($delete_file) {
	echo 'object ' . $key . ' is successfully deleted!';
}

// code to delete the bucket
$delete_bucket = $client->deleteBucket([
	'Bucket' => $bucket
]);

echo 'Bucket' . $bucket . ' is successfully deleted!'

?>
