<?php
$databaseHost = 'localhost';
$databaseName = 'foodo';
$databaseUsername = 'root';
$databasePassword = '';
$mysqli = mysqli_connect($databaseHost, $databaseUsername, $databasePassword, $databaseName);

if ($mysqli === false) {
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
?>
