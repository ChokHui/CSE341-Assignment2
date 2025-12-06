<?php
require 'vendor/autoload.php'; // Make sure Composer's autoload is included

use MongoDB\Client;

$client = new Client("mongodb://localhost:27017");

// Select the database and collection
$collection = $client->test->users;

// Insert a document
$insert = $collection->insertOne(['name' => 'Amber']);

echo "Inserted ID: " . $insert->getInsertedId();
?>
