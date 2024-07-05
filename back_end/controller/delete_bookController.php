<?php 
session_start();
require_once("/wamp64/www/my_projetcs/librairie/back_end/var/variables.inc.php");
require_once(URL_MODEL."GestionLivres.php");

require(URL_TMP."verification_connection.php");

$id = $_GET['id'];
$from = $_GET['from'];
GestionLivres::supprimerLivre($id);
header("location: ".URL_CONTROLLER2."$from");









require URL_PAGE."edit_book.php";
?>