<?php 
session_start();
require_once("/wamp64/www/my_projetcs/librairie/back_end/var/variables.inc.php");
require_once(URL_MODEL."GestionLivres.php");

require(URL_TMP."verification_connection.php");

if (isset($_SESSION['userAdmin'] )) {
    $admin = true;
}else{
    $admin=null;
    // header("Location:".URL_CONTROLLER2."sign_inController.php ");
}

$livres = GestionLivres::getLivresMissing();
if(isset($livres['codeLivre'])){
    $livres = [$livres];
}

if(isset($_POST['submit'])){
    GestionLivres::insertLivre(new Livre($_POST));
}

require URL_PAGE."book_register.php";
?>