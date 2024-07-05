<?php 

require_once("/wamp64/www/my_projetcs/librairie/back_end/var/variables.inc.php");
require_once (URL_FONCTION."fonction.php");
require_once (URL_MODEL."Commentaire.php");
class GestionCommentaires{


    public static function getCommentaires(){
        $sql = "SELECT * FROM " . DB_TABLE_COMMENTAIRES . "";
        return executeRequest($sql);
    }

    public static function insertCommentaires( Commentaire $cmt){
        $commentaire = htmlentities(addslashes($cmt->commentaire));
        $sql = "INSERT INTO `" . DB_TABLE_COMMENTAIRES . "`(`email`, `commentaire`) VALUES ('$cmt->email','$commentaire')";
        return executeRequest($sql);
    }

    public static function getCommentById($id){
        $sql = "SELECT * FROM " . DB_TABLE_COMMENTAIRES . " WHERE id = '$id' ";
        $commentaire = executeRequest($sql);
        return new commentaire($commentaire);
    }


}


































?>