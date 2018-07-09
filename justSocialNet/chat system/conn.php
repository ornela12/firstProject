<?php
 
//MySQLi Procedural
$conn = mysqli_connect("localhost","root","","posting_system");
if (!$conn) {
	die("Connection failed: " . mysqli_connect_error());
}
 
?>