<?php
$ini = parse_ini_file('app.ini');

$servername = $ini['db_name'];
$username = $ini['db_user'];
$password = $ini['db_password'];

// Create connection
$conn = new mysqli($servername, $username, $password);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
echo 'ok';
?>