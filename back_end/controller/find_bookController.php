<?php 
session_start();
require_once("/wamp64/www/my_projetcs/librairie/back_end/var/variables.inc.php");
require_once(URL_MODEL."GestionLivres.php");
require_once(URL_MODEL."GestionCommentaires.php");

require(URL_TMP."verification_connection.php");

$livres = [];

if (isset($_SESSION['userAdmin'] )) {
    $admin = true;
}else{
    $admin=null;
}

$commentaires = GestionCommentaires::getCommentaires();
if(isset($commentaires['email'])){
    $commentaires = [$commentaires];
}

if(isset($_POST['submit'])){
    extract($_POST);
    
    $typeRech = addslashes($typeRech);
    $termeRech = htmlentities(addslashes(trim($termeRech))) ;

    $livres = GestionLivres::rechercheLivres($typeRech,$termeRech);
}

if(isset($livres['codeLivre'])){
    $livres = [$livres];
}


require URL_PAGE."find_book.php";
?>