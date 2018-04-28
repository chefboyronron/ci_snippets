<?php

// connect to aws using connection string
include 'connecttoaws.php';

// get the bucket name and key
$bucket = $_GET['bucket'];
$key = $_GET['key'];

// Code to read file on aws s3
$retult = $client->getObject([
	'Bucket' => $bucket,
	'Key' => $key
]);
$data = $result['Body'];
echo $data;

echo '<a href="cleanup.php?bucket=$bucket&key=$key">Cleanup</a>';

?>
