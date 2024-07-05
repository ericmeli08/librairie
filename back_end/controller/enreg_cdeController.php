<?php
session_start();
require_once("/wamp64/www/my_projetcs/librairie/back_end/var/variables.inc.php");
require_once (URL_FONCTION."fonction.php");
require_once(URL_MODEL."GestionLivres.php");

require(URL_TMP."verification_connection.php");

if (empty($_REQUEST['nom']) || empty($_REQUEST['adresse']))
    die("erreur : il y a des champs vides !");

$_COOKIE['monpanier'][0] = ' ';
$tab_livre = explode(",", $_COOKIE['monpanier']);
$i = 0;
while ($id = $tab_livre[$i]) {
    $livre = GestionLivres::getLivreById($id);
   
    $newStock = $livre->stock-1;
    GestionLivres::setStock($id,$newStock);

    $montant += $livre->pu;
    $listeproduits .= ',' . $livre->REF;
    $i++;
}
$listeproduits[0] = ' ';
$montant += 1000;
$date = date("Y-m-d H:i:s");
$sql = "INSERT  INTO ".DB_TABLE_CDES." (produits, montantcde, nomPrenomCli, adressecli, dateCde) VALUES
('$listeproduits','$montant','" . $_REQUEST['nom'] . "','" . $_REQUEST['adresse'] . "','$date')";

executeRequest($sql);

setcookie("monprofil", "nom=" . $_REQUEST['nom'] . ";;adresse=" . $_REQUEST['adresse'] . "", time() + 604800);

setcookie("monpanier", "", time() - 3600);
header("Location: ". URL_CONTROLLER2 . "boutiqueController.php");
