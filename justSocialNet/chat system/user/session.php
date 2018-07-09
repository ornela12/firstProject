//<?php
	//session_start();
	//include('../conn.php');
	
//	if (!isset($_SESSION['id']) ||(trim ($_SESSION['id']) == '')) {
//	header('location:../');
  //  exit();
	//}
	
//	$sq=mysqli_query($conn,"select * from `users` where chatrow='".$_SESSION['id']."'");
//	$srow=mysqli_fetch_array($sq);
		
//	if ($srow['access']!=2){
	//	header('location:../');
	//	exit();
	//}
	
	//$user=$srow['username'];
//?>
<?php
	 if(!isset($_SESSION)) 
	 { 
	 session_start(); 
	 }  

	$link = mysqli_connect("127.0.0.1", "root", "", "changingDB");

if (!$link) {
    echo "Error: Unable to connect to MySQL." . PHP_EOL;
    echo "Debugging error: " . mysqli_connect_error() . PHP_EOL;
    echo "Debugging errno: " . mysqli_connect_errno() . PHP_EOL;
    exit;
}
print_r($_SESSION['user_id']) ;
	
	$sq=mysqli_query($link,"select * from `user` where userid='".$_SESSION['user_id']."'");
	$srow=mysqli_fetch_array($sq);
	
	
	$user=$srow['username'];
	 echo $user;
	
?>