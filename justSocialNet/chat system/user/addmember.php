<?php
	include('session.php');
	if (isset($_POST['user_id'])){
		$id=$_POST['user_id'];
		
		$query=mysqli_query($link,"select * from chat_member where chatroom='$id' and userid='".$_SESSION['id']."'");
		if (mysqli_num_rows($query)<1){
			mysqli_query($link,"insert into chat_member (chatroomid, userid) values ('$id', '".$_SESSION['id']."')");
		}
	}
?>