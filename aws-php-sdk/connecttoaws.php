<?php

// Include awsPHPsdk using composer autoloader
require '/var/www/html/vendor/autoload.php';
$client = new Aws\S3\S3Client([
	'version' => 'latest',
	'region' => 'us-east-1'
]);

?>
