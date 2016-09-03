<?php 
    $title = "Register";
    ?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Forms</title>

<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css" integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r" crossorigin="anonymous">

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.2/jquery.min.js"></script>

<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>

<link rel="stylesheet" href="parsley.css" />
<script src="parsley.min.js"></script>
</head>

	<body>
	<?php require( 'include-header.php' ); ?>
		<div class="container">
			<div class="col-md-5">
				<h3>Do you want to register?</h3>
				<form id="form" name="form" method="post" action="proccess-register.php" class="form-group" data-parsley-validate>
						<label for="username">Username:</label>
						<input name="username" type="text" id="username" class="form-control" data-parsley-maxlength="20" data-parsley-required="true"/>
						<br>
						<label for="pass">Password:</label>
						<input name="pass" type="text" id="pass" data-parsley-maxlength="40" data-parsley-required="true" class="form-control" />
						<br>
					<input type="submit" class="btn btn-sm btn-info" value="Submit"/>
				</form>
			</div>
		</div>
		<?php require ('footer.php'); ?>
	</body>

</html>