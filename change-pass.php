<?php 
    $title = "Change Password";
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
require( 'check-user.php' );
    if(isset($_POST['currentpass'])){
        $currentpass = sha1(trim($_POST['currentpass']));
    }
     if(isset($_POST['newpass'])){
        $newpass = sha1(trim($_POST['newpass']));
    }
     if(isset($_POST['retypepass'])){
        $retypepass = sha1(trim($_POST['retypepass']));
    }
    $username = $_SESSION['valid_user'];
    
    //Connection Open
	@$db = mysqli_connect('localhost', 'user_br', '1234', 'bookorama'); 
    //Check connection
    if ($db->connect_error){
        die("Connection failed: ".$db->connect_error);
    }
    ?>

       <?php
        if (isset($_POST['save'])){
    $querySearch = "select * from users where password = '".$currentpass."'and name = '".$username."'";
    $resultSearch = $db->query($querySearch);
    $numOfRows = $resultSearch->num_rows;
    
    if ($numOfRows==1){
        $row = $resultSearch->fetch_assoc();
        
        if($currentpass==$row['password'] && $newpass==$retypepass) {
            $_SESSION['valid_user']= $row['name'];
            
            $querychange =" UPDATE users SET password='".$newpass."' WHERE name='".$row['name']."'
";   
            $db->query($querychange);
            echo "<div class='alert alert-success' role='alert'>You have successfully changed your password!</div>";
        }
        else {
            echo "<div class='alert alert-warning' role='alert'>Sorry, confirmation password is not identical!</div>";
        }
        
    } else {
        echo "<div class='alert alert-warning' role='alert'>Sorry, your current password is incorrect</div>";
    }
    
    mysqli_free_result($resultSearch);
    $db->close();
    
}
?>

<html>
    
    <body>
    <br><br>
<div class="container">
    <div class="col-md-6">
        <form role="form" name="form" method="post" action="">
  <div class="form-group">
    <label for="currentpass">Παλιός Κωδικός Πρόσβασης:</label>
    <input type="password" class="form-control" id="currentpass" name="currentpass">
  </div>
  <div class="form-group">
    <label for="newpass">Νέος Κωδικός Πρόσβασης:</label>
    <input type="password" class="form-control" id="newpass" name="newpass">
  </div>
  <div class="form-group">
    <label for="retypepass">Επαλήθευση Νέου Κωδικού:</label>
    <input type="password" class="form-control" id="retypepass" name="retypepass">
  </div>
  <input type="submit" class="btn btn-sm btn-info" name="save" value="Αποθήκευση"/>
      </form>
    </div>
</div>
   <?php require ('footer.php'); ?>
    </body>
    
</html>

