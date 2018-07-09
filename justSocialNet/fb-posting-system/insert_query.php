<?php
$db_server = "localhost";
$db_username = "root";
$db_password = "";
$db_database = "posting-system";

$first_name=$_POST['first_name'];
$last_name=$_POST['last_name'];
$username=$_POST['username'];
$password1=md5($_POST['password']);

$conn = new PDO("mysql:host=$db_server;dbname=$db_database", $db_username, $db_password);

$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$sql = "INSERT INTO users (first_name, last_name, username, password)
VALUES ('$first_name', '$last_name', '$username', '$password1')";

$conn->exec($sql);
echo "<script>alert('Account successfully added!'); window.location='index.php'</script>";
?>