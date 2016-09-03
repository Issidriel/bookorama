<?php 
    $title = "Logout";
    ?>
<?php
require ('include-header.php');

// store to test if they *were* logged in


if(isset($_SESSION['valid_user'])) {
	unset($_SESSION['valid_user']);
	$old_user = $_SESSION['valid_user'];
}else {
	$old_user = '';
}
session_destroy();
?>
<html>
<body>
	<h1>Log out</h1>
	<?php
	if (!empty($old_user))
	{
		echo 'Logged out.<br />';
	}
	else
	{
		// if they weren't logged in but came to this page somehow
		echo 'You were not logged in, and so have not been logged out.<br />';
	}
	?>
	<a href="index.php">Back to main page</a>
	<?php require ('footer.php'); ?>
</body>
</html>