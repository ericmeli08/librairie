<?php
session_start();
require_once("/wamp64/www/my_projetcs/librairie/back_end/var/variables.inc.php");
require_once URL_MODEL."GestionUsers.php";

if (isset($_POST["submit"])){
	$id = GestionUsers::isUserExists(new User($_POST));
	if($id){
		$user = GestionUsers::getUserById($id);

		$_SESSION['idUser'] = $user->getId();
		$_SESSION['emailUser'] = $user->getEmail();
		$_SESSION['nameUser'] = $user->getnom();
		if (preg_match("/admin/i",$user->getEmail()))
		$_SESSION['userAdmin'] = 'connect';
	
	$_SESSION['user'] = 'connect';
	header("location: ".URL_CONTROLLER2."boutiqueController.php ");
	exit;
	}else{
		$error = "<p class='error'></p>";
	}
}

require(URL_PAGE."sign_in.php");
?>