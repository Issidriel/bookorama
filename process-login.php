<?php 
    $title = "Login";
    ?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Insert</title>

<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css" integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r" crossorigin="anonymous">

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.2/jquery.min.js"></script>

<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
</head>
<?php
    require( 'include-header.php' );
    
	//create short variable names
	if(isset($_POST['username'])) {
		$username = trim($_POST['username']);
	}
	if(isset($_POST['pass'])) {
		$pass = sha1(trim($_POST['pass']));
	}
	
	//Connection Open
	@$db = mysqli_connect('localhost', 'user_br', '1234', 'bookorama');
?>
	<body>
		<div class="container">
			<div class="col-md-6">
				<br>
				<?php
								
				if (mysqli_connect_errno())
				{
				echo "<div class=\"alert alert-warning\" role=\"alert\">Error: Could not connect to database. Please try again later.";
				exit;		
				}
				
				$querySearch = "select * from users where name = '".$username."'";
				$resultSearch = $db->query($querySearch);
				$numOfRows = $resultSearch->num_rows;
				
				if($numOfRows==1) {
					
					for($i=0;$i<$numOfRows;$i++)
					{
						$row = $resultSearch->fetch_assoc();
						if( $pass == $row['password'] ) {
							
							//First Time validation user
							$_SESSION['valid_user']= $row['name'];
							
							echo "<h3>Hi ".$row['name']."!</h3>";
						} else {
							echo "<div class=\"alert alert-danger\" role=\"alert\">Wrong password!</div>";
						}
					}
					

				} else {
					echo "<div class=\"alert alert-danger\" role=\"alert\"> Wrong username!</div>";
				}
				//Connection Close
				mysqli_free_result($resultSearch);
				$db->close();
				?>
			</div>
		</div>
		<?php require ('footer.php'); ?>
	</body>
</html>
			