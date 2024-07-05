<?php 

if(!isset($_SESSION['user'])){
    header("location:".URL_CONTROLLER2."sign_inController.php ");
    exit;
}


?>