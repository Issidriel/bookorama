<?php 
	session_start();
?>

<nav class="navbar navbar-inverse navbar-fixed-top">
  <div class="container">
	<div class="navbar-header">
	  <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
		<span class="sr-only">Toggle navigation</span>
		<span class="icon-bar"></span>
		<span class="icon-bar"></span>
		<span class="icon-bar"></span>
	  </button>
	  <a class="navbar-brand" href="#">BookOrama</a>
	</div>
	<div id="navbar" class="navbar-collapse collapse">
		
			<ul class="nav navbar-nav">
				<li class="active">	<a href="index.php">Home</a></li>
				<li>				<a href="#about">About</a></li>
				<li>				<a href="#contact">Contact</a></li>
			</ul>
		
			<?php 
			if(isset($_SESSION['valid_user'])) {
				echo "<div class=\"navbar-form navbar-right\">
					<span class='text-info'>Hi there </span>
					";
				
				echo "<div class=\"btn-group\">
					  <button type=\"button\" class=\"btn btn-info dropdown-toggle\" data-toggle=\"dropdown\" aria-haspopup=\"true\" aria-expanded=\"false\">
						".$_SESSION['valid_user']." <span class=\"caret\"></span>
					  </button>
					  <ul class=\"dropdown-menu\">
						<li><a href=\"change-pass.php\">Change password</a></li>
						<li><a href=\"logout.php\">Logout</a></li>
					  </ul>
					</div>
				</div>
				";
					
				
				} else {
				?>
		
			<form id="form" name="form" method="post" action="process-login.php" class="navbar-form navbar-right" data-parsley-validate>
						<div class="form-group">
						<input name="username" type="text" id="username" placeholder="Username" class="form-control input-sm" data-parsley-maxlength="20" data-parsley-required="true"/>
						</div>
						<div class="form-group">
						<input name="pass" type="password" id="pass" placeholder="Password"  data-parsley-maxlength="40" data-parsley-required="true" class="input-sm form-control" />
						</div>
					<input type="submit" class="btn btn-sm btn-info" value="Submit"/>
			</form>
		<?php } ?>
	</div><!--/.navbar-collapse -->
  </div>
</nav>
<br>
<br>