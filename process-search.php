<?php 
    $title = "Home";
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
</head>
<?php
	
	//create short variable names
	if(isset($_POST['search'])) {
		$search = addslashes(trim($_POST['search']));
	} else {
		$search = '';
	}
	@$db = mysqli_connect('localhost', 'user_br', '1234', 'bookorama');
?>
	<body style="background:#f0f0f0">
		
		<?php require( 'include-header.php' ); ?>
	
		<div class="container">
				
			<div class="col-md-6">
				<h3 class >Βιβλιοπανόραμα</h3>
				<?php
				if (mysqli_connect_errno())
				{
				echo "<div class=\"alert alert-warning\" role=\"alert\">Error: Could not connect to database. Please try again later.</div>";
				exit;		
				}else
		{
				$query ="select *from books where title like'%".$search."%'";
			
				$result =$db->query($query);
				$num_results=$result->num_rows;
				
			
				echo"<ul class=''list-unstyled>";
				for($i=0;$i<$num_results;$i++)
				{
					$row=$result->fetch_assoc();
						echo"<li>";
                        echo"<img src='".'/uploads/'.$row['image']."' class='img-thumbnail'/>";
						echo "<h4>Book Title: ".$row['title']."<br></h3>";
						echo "<h4>Book Author: ".$row['author']."</h3><br>";
						echo "<h5>Book Price: ".$row['price']."</h5>";
						echo "<a href='upload.php?bookid=".$row['isbn']."' class='btn btn-info'><i class='glyphicon glyphicon-picture'></i></a>";
						echo"<li/>";
				}
					echo"</ul>";
					mysqli_free_result($result);
					
		}
		
		{
				$query ="select *from book_reviews where review like'%".$search."%'";
			
				$result =$db->query($query);
				$num_results=$result->num_rows;
				
			
				echo"<ul>";
				for($i=0;$i<$num_results;$i++)
				{
					$row=$result->fetch_assoc();
						echo"<li>";
						echo "<h2>REVIEWS</h2>";
						echo "<h3>Book review".$row['review']."<br></h3>";
						//echo "<h3>Book Author".$row['author']."</h3><br>";
						//echo "<h5>Book Price".$row['price']."</h5>";
						
						echo"<li/>";
				}
					echo"</ul>";
					mysqli_free_result($result);
					
		}
			$query ="select * from customers where  customerid like'%".$search."%' or  name like'%".$search."%'or  address like'%".$search."%' or city like'%".$search."%' ";
			
				$result =$db->query($query);
				$num_results=$result->num_rows;
				
			
				echo"<ul>";
				for($i=0;$i<$num_results;$i++)
				{
					$row=$result->fetch_assoc();
						echo"<li>";
						echo"<h2>Customer:</h2>";
						echo "<h3>Customer Name:".$row['name']."</h3><br>";
						echo "<h3>Customer Address:".$row['address']."</h3><br>";
						echo "<h3>Customer city:".$row['city']."</h3><br>";
						
						echo"<li/>";
				}
					echo"</ul>";
					mysqli_free_result($result);
					$db->close();
		
		
?>
			</div>
		</div>
<?php require ('footer.php'); ?>
	</body>
</html>