<?php
//assign the server name, username, password and database name to different variables.
$dbServername ="localhost";
$dbUsername ="root";
$dbPassword ="";
$dbName ="assignment1";
//Connect to mysqli with these variables, and assign that to a variable.
$conn = mysqli_connect($dbServername, $dbUsername, $dbPassword, $dbName);

?>