<?php

// connection string
include 'connecttoaws.php';

// create a unique backet name
$bucket = uniqid('youbucketname', 1);

// create bucket using unique bucket name
$result = $client->createBucket([
	'Bucket' => $bucket
]);

// create a file inside our bucket
echo '<a href="createfile.php?bucket='.$bucket.'">createfile.php</a>';

?>
