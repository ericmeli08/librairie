<?php 
session_start();
require_once("/wamp64/www/my_projetcs/librairie/back_end/var/variables.inc.php");
require_once(URL_MODEL."GestionLivres.php");
require_once(URL_MODEL."GestionCommentaires.php");

if (isset($_SESSION['userAdmin'] )) {
    $admin = true;
}else{
    $admin=null;
}

$id = !isset($_REQUEST['id']) ? 1 : $_REQUEST['id'];
$livres = GestionLivres::getLivresAvailable();
if(isset($livres['codeLivre'])){
    $livres = [$livres];
}
$book = GestionLivres::getLivreById($id);

$commentaires = GestionCommentaires::getCommentaires();
if(isset($commentaires['email'])){
    $commentaires = [$commentaires];
}

require(URL_PAGE."boutique.php");















