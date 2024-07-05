<?php 
session_start();
require_once("/wamp64/www/my_projetcs/librairie/back_end/var/variables.inc.php");
require_once(URL_MODEL."GestionCommentaires.php");

require(URL_TMP."verification_connection.php");

GestionCommentaires::insertCommentaires(new Commentaire($_POST));

header("location:".URL_CONTROLLER2."boutiqueController.php");









?>