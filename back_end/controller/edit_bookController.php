<?php 
session_start();
require_once("/wamp64/www/my_projetcs/librairie/back_end/var/variables.inc.php");
require_once(URL_MODEL."GestionLivres.php");

require(URL_TMP."verification_connection.php");

$id = $_GET['id'];
$livre = GestionLivres::getLivreById($id);

if(isset($_POST['submit'])){
    $from = $_GET['from'];
    $livre = new Livre($_POST);
    GestionLivres::updateLivre($livre);
    header("location: ".URL_CONTROLLER2."$from");
}

if (isset($_SESSION['userAdmin'] )) {
    $admin = true;
}else{
    $admin=null;
}





require URL_PAGE."edit_book.php";
?>