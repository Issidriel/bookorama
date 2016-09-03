<?php
    
if ($title == "Change Password"){
    
    if (!isset($_SESSION['valid_user'])){
        header("Location: error.php");
        die();
    }
}

?>