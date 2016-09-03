<?php 
    $title = "Insert";
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
		<div class="container">
			<div class="col-md-6">
				<h3>Insert a Book into Bookorama</h3>
				<form id="form" name="form" method="post" action="process-insert.php" class="form-group" data-parsley-validate>
						<label for="isbn">ISBN:</label>
						<input name="isbn" type="text" id="isbn" class="form-control" data-parsley-maxlength="13" data-parsley-required="true"/>
						<br>
						<label for="author">Author:</label>
						<input name="author" type="text" id="author" data-parsley-maxlength="50" class="form-control" />
						<br>
						<label for="title">Title:</label>
						<textarea name="title" type="text" id="title" data-parsley-maxlength="100" class="form-control"></textarea>
						<br>
						<label for="price">Price:</label>
						<input name="price" type="text" id="price" data-parsley-maxlength="7" class="form-control" />
						<br>
					<input type="submit" class="btn btn-sm btn-info" value="Εισαγωγή"/>
				</form>
			</div>
		</div>
		<?php require ('footer.php'); ?>
	</body>

</html>