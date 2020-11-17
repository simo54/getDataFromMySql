<?php

// MySQLi
$dbServerName = "INSERT HERE YOUR HOST";
$dbUserName = "INSERT HERE YOUR USERNAME";
$dbPassword = "INSERT HERE YOUR PASSWORD";
$dbName = "INSERT HERE YOUR DB NAME";

// Getting the rows from dropdown
$limit = $_SESSION['newsession'];

// Input Rows Q from index.php
$rowsQ = isset($_POST['moreRows']) ? $_POST['moreRows'] : "";

// Connect to db
$conn = mysqli_connect($dbServerName, $dbUserName, $dbPassword, $dbName);

// If there is an error...
if (!$conn) {
  echo 'Connection error: ' . mysqli_connect_error();
}

// Query that will get all entries
$sql = 'SELECT id, first_name, last_name, email, gender, ip_address FROM maindb LIMIT '.$limit;


// Query and get result
$result = mysqli_query($conn, $sql);

// Fetch the results
$rawData = mysqli_fetch_all($result, MYSQLI_ASSOC);

// Freeing the result from memory
mysqli_free_result($result);

// Close connection
mysqli_close($conn);
