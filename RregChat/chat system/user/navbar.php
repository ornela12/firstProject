<nav class="navbar navbar-default">
    <div class="container-fluid">
		<div class="navbar-header">
			
		</div>

		<ul class="nav navbar-nav">
			<li><a href="index.php"> Home</a></li>
		</ul>

		<ul class="nav navbar-nav navbar-right">
			<li><a href="#account" data-toggle="modal">  <?php echo $user; ?></a></li>
			<li class="dropdown">
				<a class="dropdown-toggle" data-toggle="dropdown" href="#"><span class="caret"></span></a>
                    <ul class="dropdown-menu">
						
						<li class="divider"></li>
                        <li><a href="#logout" data-toggle="modal">Logout</a></li>
                    </ul>
			</li>
		</ul>
    </div>
</nav>
