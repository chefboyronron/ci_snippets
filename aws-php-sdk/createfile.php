<?php

// connect to aws using connection string
include 'connecttoaws.php';

// get the bucket name
$bucket = $_GET['bucket'];

// create the file name
$key = 'awsbucketcontent.txt';

// put the file and data in the bucket
$result = $client->putObject([
	'Bucket' => $bucket,
	'Key' => $key,
	'Body' => "Hello from the other side!"
]);

echo '<a href="readfile.php?bucket=$bucket&key=$key">Read the file</a>';

?>
