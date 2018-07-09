<?php 
	include('session.php');
	
	if (isset($_POST['chatname'])){
	$cid="";
	$chat_name=$_POST['chatname'];
	$chat_password=$_POST['chatpass'];
	
	mysqli_query($link,"insert into chatroom (chat_name, chat_password, date_created, userid) values ('$chat_name', '$chat_password', NOW(), '".$_SESSION['user_id']."')");
	$cid=mysqli_insert_id($link);
	
	mysqli_query($link,"insert into chat_member (chatroomid, userid) values ('$cid', '".$_SESSION['user_id']."')");
	
	echo $cid;
	}
	
	
?>