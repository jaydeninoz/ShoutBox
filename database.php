<?php
// Connect to MysqlndUhConnection
$con = mysqli_connect('localhost', 'root', '', 'shoutit');


// Test Connection
// if (!$con) {
if (mysqli_connect_errno()) {
  echo 'Failed to connect to MySQL: '.mysqli_connect_error();
}
?>
