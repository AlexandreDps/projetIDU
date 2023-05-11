<?php
session_start();

$selectedOption = $_POST['dropdown'];
$u = $_SESSION['username'];
$p = $_SESSION['password'];
$output=shell_exec("py planning.py $u $p $selectedOption");

require 'vendor/autoload.php';

use MongoDB\Client;

// Instantiate the MongoDB client
$client = new Client('mongodb://localhost:27017');

// Select a database and collection
$database = $client->StudentApp;
$collection = $database->planning;

// Perform operations on the collection
$result = $collection->find();
$elements = $result->toArray();
$marks=(array)$elements[0];
echo $marks['planning'];
?>