<?php 
session_start();
require_once("/wamp64/www/my_projetcs/librairie/back_end/var/variables.inc.php");
require_once(URL_MODEL."GestionLivres.php");
require_once(URL_MODEL."GestionCommandes.php");
require_once(URL_FONCTION."fonction.php");

require(URL_TMP."verification_connection.php");

if (isset($_SESSION['userAdmin'] )) {
    $admin = true;
}else{
    $admin=null;
}

$montant = 0;
$listeproduits = " ";
$_COOKIE['monpanier'][0] = ' ';
$cookie = $_COOKIE['monpanier'];
$cookie[0] = ' ';

$cookie= str_replace(' ','',$cookie);
$tab = array_count_values(explode(",", $cookie));

$sql = "SELECT * FROM ".DB_TABLE_LIVRES." WHERE codeLivre IN (" . $cookie . ")";
$livres = executeRequest($sql);
if(isset($livres['codeLivre'])){
    $livres = [$livres]; 
}

   
if (isset($_COOKIE['monprofil'])) {
    $tab_tmp = explode(";;", $_COOKIE['monprofil']);
    foreach ($tab_tmp as $tmp) {
        list($nom, $val) = explode("=", $tmp);
        $tab_profil[$nom] = $val;
    }
}


require (URL_PAGE."voir_caddie.php");


?>