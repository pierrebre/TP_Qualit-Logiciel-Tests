<?php
$ini = parse_ini_file('app.ini');

$serverhost = $ini['db_host'];
$dbname = $ini['db_name'];
$username = $ini['db_user'];
$password = $ini['db_password'];

// Create connection
$conn = new mysqli($serverhost, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
echo 'db connected';
?>