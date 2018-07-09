<?php 
	
	include 'core/main.php';
	$check  = new Main;
	$get    = new Main;
	$send   = new Main;
   @$user_id = $_SESSION['user_id'];
   	
	$data  = $get->user_data($user_id);
	
	$post  = $get->posts();
	
	if(isset($_POST['submit'])){
		$status  = $_POST['status'];
		$send->add_post($user_id,$status,$file_parh);
		
		if (isset($_FILES['post_image'])===true) {
			
			 if (empty($_FILES['post_image']['name']) ===true) {
				if(!empty($status)===true){
					$send->add_post($user_id_p,$status,$file_parh);
				}
			 	 }else {
			 	                                                                                                      
				 $allowed = array('jpg','jpeg','gif','png'); 
				 $file_name = $_FILES['post_image']['name']; 
				 $file_extn = strtolower(end(explode('.', $file_name)));
				 $file_temp = $_FILES['post_image']['tmp_name'];
				 
				 if (in_array($file_extn, $allowed)===true) {
				 	$file_parh = 'images/posts/' . substr(md5(time()), 0, 10).'.'.$file_extn;
				   move_uploaded_file($file_temp, $file_parh);
				   $send->add_post($user_id,$status,$file_parh);

				 }else{
				  echo 'incorrect File only Allowed with less then 1mb ';
				  echo implode(', ', $allowed);
				 }
			 }
			
		}

	}
?>
<html>
	<head>
		<title>First Social Network</title>
		<link rel="stylesheet" href="css/style.css"/>
		<script type="text/javascript" src="js/jquery.js"></script>

	</head>
<body>
	
<div class="head">
	<div class="head-in">
		<div class="head-logo">
			
		</div>
		<div id="login">
		<?php 
			if($check->logged_in() === false){
				include 'login.php';
			}else{
				echo '<div id="logout">
					  <li><a href="logout.php">Logout</a>
					 </div>';
			} 
		?>
		</div>
	</div>
</div>

<?php if($check->logged_in() === true){?>

	<div class="wrapper">		
		
		<div class="content">
			
			<div class="center">
				<div class="posts">
					<div class="create-posts">
 					<form action="" method="post" enctype="multipart/form-data">
						<div class="c-header">
							<div class="c-h-inner">
								<ul>	
									
									<li><input type="file"  onchange="readURL(this);" style="display:none;" name="post_image" id="uploadFile"></li>
									<li><a href="#" id="uploadTrigger" name="post_image">Add an image as a post!</a></li>
									<li><a href="http:..//chat system/user/index.php" id="uploadTrigger" name="post_image">Go to your messages!!</a></li>
									<li><a href="logout.php" id="uploadTrigger" >Logout</a></li>
									
								</ul>
							</div>
						</div>
						<div class="c-body">
							<div class="body-left">
								
							</div>
							<div class="body-right">
								<textarea class="text-type" name="status" placeholder=" "></textarea>
							</div>
							<div id="body-bottom">
							<img src="#"  id="preview"/>
							</div>
						</div>
						<div class="c-footer">
							<div class="right-box">
								<ul>
									
									<li><input type="submit" name="submit" value="Post" class="btn2"/></li>
								</ul>
							</div>
								
							</div>
						</div>
						</div>
						<script type="text/javascript">
						 
								$("#uploadTrigger").click(function(){
								   $("#uploadFile").click();
								});
						        function readURL(input) {
						            if (input.files && input.files[0]) {
						                var reader = new FileReader();

						                reader.onload = function (e) {
						                	$('#body-bottom').show();
						                    $('#preview').attr('src', e.target.result);
						                }

						                reader.readAsDataURL(input.files[0]);
						            }
						        }

						</script>
						<?php foreach($post as $row){
							
							$time_ago = $row['status_time'];
						echo '
						<div class="post-show">
									<div class="post-show-inner">
										<div class="post-header">
											<div class="post-left-box">											
												<div class="id-name">
													<ul>
														<li><a href="#">'.$row['username'].'</a></li>
														<li><small>'.$get->timeAgo($time_ago).'</small></li>
													</ul>
												</div>
											</div>
											<div class="post-right-box"></div>
										</div>
									
											<div class="post-body">
											<div class="post-header-text">
												'.$row['status'].'
											</div>'.( ($row['status_image'] != 'NULL') ? '<div class="post-img">
												<img src="'.$row['status_image'].'"></img></div>' : '').'
											<div class="post-footer">
												<div class="post-footer-inner">
													<ul>
														
													</ul>	
												</div>
											</div>
										</div>
									</div>
								</div><br> ';	
					}	
				?>
					</div>
					</form>	
													
			</div>

 

</div>
<?php }?>
</body>
</html>