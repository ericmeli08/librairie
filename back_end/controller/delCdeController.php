<?php 
session_start();
require_once("/wamp64/www/my_projetcs/librairie/back_end/var/variables.inc.php");

require(URL_TMP."verification_connection.php");

setcookie("monpanier","");
header("location:".URL_CONTROLLER2."boutiqueController.php ");
?>