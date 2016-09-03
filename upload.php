<?php
	$title = "Upload";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
		<!-- Latest compiled and minified CSS -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">

		<!-- Optional theme -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css" integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r" crossorigin="anonymous">

		<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.2/jquery.min.js"></script>

		<!-- Latest compiled and minified JavaScript -->
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>

		<link rel="stylesheet" href="parsley.css" />
		<script src="parsley.min.js"></script>
		<link rel="stylesheet" href="style.css"/>
</head>


<body>
<?php 	require ('include-header.php'); 
		require( 'check-user.php' ); 
        $isbn = $_GET['bookid'];


?>

<div class="container bootstrap snippet" style="padding-top:100px; padding-left:150px">
    <div class="row">
        <div class="col-md-6">
            <div class="panel panel-info">
                <div class="panel-heading">
                    <h3 class="panel-title">
                        <span class="glyphicon glyphicon-th"></span>
                        Upload  
                    </h3>
                </div>
				 <div class="panel-body">				
				<form action="process-upload.php" method="post" enctype="multipart/form-data">
					<div>
						<input type="hidden" name="MAX_FILE_SIZE" value="1000000" />
						<?php 
                        echo "
						<input type='hidden' name='isbn' value=\"'.$isbn.'\" />";
                        ?>
						<label for="userfile">Upload a file:</label>
				        <input type="file" name="userfile" id="userfile"/>
							<br>
						<input type="submit" value="Send File" class="btn btn-sm btn-default"/>
					</div>
				</form>
                </div>
			</div>
        </div>
    </div>
</div>
	
<?php include('footer.php'); ?>
</body>
</html>