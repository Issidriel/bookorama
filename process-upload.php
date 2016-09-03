<?php 
    $title = "Upload";
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
    
    $username = $_SESSION['valid_user'];
    $isbn = $_POST['isbn'];
    //Connection Open
	@$db = mysqli_connect('localhost', 'user_br', '1234', 'bookorama'); 
    //Check connection
    if ($db->connect_error){
        die("Connection failed: ".$db->connect_error);
    }
    ?>

       <?php
    
    if (!isset($isbn) || is_null($isbn) || empty($isbn)){
         echo "<div class='alert alert-danger' role='alert'>";
        echo 'You have to determine a valid isbn number';
        echo "</div>"; 
    }
    
    //Check to see if an error code was generated on the upload attempt
if ($_FILES['userfile']['error'] > 0)
{
echo "<div class='alert alert-danger' role='alert'>";
echo 'Problem: ';
echo '</div>';
switch ($_FILES['userfile']['error'])
{
case 1: echo 'File exceeded upload_max_filesize';
break;
case 2: echo 'File exceeded max_file_size';
break;
case 3: echo 'File only partially uploaded';
break;
case 4: echo 'No file uploaded';
break;
case 6: echo 'Cannot upload file: No temp directory specified.';
break;
case 7: echo 'Upload failed: Cannot write to disk.';
break;
}
exit;
}
    
// Does the file have the right MIME type?
if (($_FILES['userfile']['type'] != 'image/jpeg') && ($_FILES['userfile']['type'] != 'image/png'))
{
echo "<div class='alert alert-danger' role='alert'>";
echo 'Problem: file is not jpeg/png';
echo '</div>';
exit;
}
  
// put the file where we'd like it
$upfile = $_SERVER['DOCUMENT_ROOT'].'/bookorama/uploads/'.$_FILES['userfile']['name'];
// $file1 = basename($path);

//Check if there was old file and delete it
$queryCheck = "select image from books where isbn='".$isbn."'";
$resultCheck = $db->query($queryCheck);
$num_results=$resultCheck->num_rows;
    
  
for($i=0;$i<$num_results;$i++) {
			 
	$row=$resultCheck->fetch_assoc();
    if ($row['image']!=null){
        $fileold = $_SERVER['DOCUMENT_ROOT'].'/bookorama/uploads/'
        if (!unlink($upfile)){
            echo "Error deleting $upfile";
        }else {
            echo "Deleted ";
        }
    }

   } 
    
if (is_uploaded_file($_FILES['userfile']['tmp_name']))
{
if (!move_uploaded_file($_FILES['userfile']['tmp_name'], $upfile))
{
echo "<div class='alert alert-danger' role='alert'>";
echo 'Problem: Could not move file to destination directory';
echo "</div>";
exit;
}
}
else
{
echo "<div class='alert alert-danger' role='alert'>";
echo 'Problem: Possible file upload attack. Filename: ';
echo $_FILES['userfile']['name'];
echo "</div>";
exit;
}
    
    
    $query = "UPDATE books set image='".$_FILES['userfile']['name']."' where $isbn='".$isbn."'";
    $result = $db->query($query);

    if($result==1) {
        
    echo "<div class='alert alert-success' role='alert'>";
    echo "You Uploaded image file, successfully";
    echo "</div>";
     } else {
       echo "<div class='alert alert-danger' role='alert'>";
        echo 'Problem: An error occured during update please try again.';
        echo "</div>"; 
    }
    //Connection Close
    mysqli_free_result($result);
    $db->close();
    

?>
<?php require ('footer.php'); ?>

