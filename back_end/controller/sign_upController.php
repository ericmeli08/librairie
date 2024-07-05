<?php 
session_start();
require_once("/wamp64/www/my_projetcs/librairie/back_end/var/variables.inc.php");
require_once URL_MODEL."GestionUsers.php";

if(isset($_POST['submit'])){
    $email = $_POST['email'];
    $nom = $_POST['nom'];
    if (!GestionUsers::isUserEmailExists($email)) {
        $user = new User($_POST);
        GestionUsers::insertUser($user);
        $lastId = GestionUsers::getLastId();

        $_SESSION['idUser'] = $lastId;
		$_SESSION['emailUser'] = $email;
        $_SESSION['nameUser'] = $nom;
		if (preg_match("/admin/i",$user->getEmail())) 
			$_SESSION['userAdmin'] = 'connect';
	
		$_SESSION['user'] = 'connect';
        header("location:".URL_CONTROLLER2."boutiqueController.php");
    }else{
        $error = 'This email already exists !!!';
    }

}









require_once(URL_PAGE."sign_up.php");
?>