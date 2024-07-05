<?php
session_start();
require_once("/wamp64/www/my_projetcs/librairie/back_end/var/variables.inc.php");

require(URL_TMP."verification_connection.php");

setcookie("monpanier",$_COOKIE['monpanier'].",".$_REQUEST['id']);
header("Location: ".URL_CONTROLLER2."boutiqueController.php?id=".$_REQUEST['id']);
// header("Location: ".URL."/boutique.php?id=".$_REQUEST['id']);
?>
