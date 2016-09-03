<?php 
    $title = "Insert";
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
	//create short variable names
	$isbn = addslashes(trim($_POST['isbn']));
	$author = addslashes(trim($_POST['author']));
	$title = addslashes(trim($_POST['title']));
	$price = addslashes(trim($_POST['price']));
	
	//Connection Open
	@$db = mysqli_connect('localhost', 'user_br', '1234', 'bookorama');
?>
	<body>
		<div class="container">
			<div class="col-md-6">
				<h3>Βιβλιοπανόραμα</h3>
				<?php
				if (mysqli_connect_errno())
				{
				echo "<div class=\"alert alert-warning\" role=\"alert\">Error: Could not connect to database. Please try again later.";
				exit;		
				}
				
				$querySearch = "select isbn from books where isbn = '".$isbn."'";
				$resultSearch = $db->query($querySearch);
				$resultSearch = $resultSearch->num_rows;
				
				if($resultSearch==0) {
					$query = "insert into books values ('".$isbn."', '".$author."', '".$title."', '".$price."')";
					
					//Result variable contains affected rows
					$result = $db->query($query);
					
					if ($result) {
						echo "<div class=\"alert alert-success\" role=\"alert\">".$db->affected_rows." book inserted into database.</div>";
						} else {
						echo "<div class=\"alert alert-danger\" role=\"alert\"> An error has occurred. The item was not added.</div>";
						}
				} else {
					echo "<div class=\"alert alert-warning\" role=\"alert\"> Isbn number you are trying to insert already exist.</div>";
				}
				//Connection Close
				mysqli_free_result($resultSearch);
				mysqli_free_result($result);
				$db->close();
				?>
			</div>
		</div>
		<?php require ('footer.php'); ?>
	</body>
</html>
			