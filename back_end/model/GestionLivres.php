<?php

use LDAP\Result;

require_once("/wamp64/www/my_projetcs/librairie/back_end/var/variables.inc.php");
require_once (URL_FONCTION."fonction.php");
require_once (URL_MODEL."Livre.php");

class GestionLivres {

    public function __construct() {
        
    }

    public static function getLivres() {
       return executeRequest("SELECT * FROM ".DB_TABLE_LIVRES);
    }

    public static function rechercheLivres($typeRech,$termeRech) {
        $sql = "SELECT * FROM ".DB_TABLE_LIVRES." WHERE ".$typeRech." like '%". $termeRech. "%'";
       return executeRequest($sql);
    }

    public static function getLivresAvailable() {
       return executeRequest("SELECT * FROM ".DB_TABLE_LIVRES." WHERE stock != 0");
    }

    public static function getLivresNotAvailable() {
       return executeRequest("SELECT * FROM ".DB_TABLE_LIVRES." WHERE stock = 0");
    }

    public static function getLastId(){
        $sql = "SELECT MAX(codeLivre) as last FROM ".DB_TABLE_LIVRES;
        return executeRequest($sql)['last'];
    }
    
    public static function getLivresMissing() {
       return executeRequest("SELECT * FROM ".DB_TABLE_LIVRES." WHERE stock = 0 ");
    }

    public static function setREF($id) {
        $ref = "REF". str_pad("$id",3,'0',STR_PAD_LEFT);
        $sql = "UPDATE ".DB_TABLE_LIVRES." SET REF = '$ref'  WHERE codeLivre = $id";
        executeRequest($sql);
    }

    public static function setStock($id,$stock) {
        $sql = "UPDATE ".DB_TABLE_LIVRES." SET stock = $stock  WHERE codeLivre = $id";
        executeRequest($sql);
    }

    public static function supprimerLivre($id) {
        $sql = "DELETE FROM ".DB_TABLE_LIVRES." WHERE  codeLivre = $id";
        executeRequest($sql);
    }

    /**
     * @param Livre $livre
     */
    public static function insertLivre(Livre $livre) {
        $titre = addslashes($livre->titre);
        $auteur = addslashes($livre->auteur);
        $sql = "INSERT INTO ".DB_TABLE_LIVRES."(`REF`, `ISBN`, `titre`, `auteur`, `stock`, `pu`, `resumer`) VALUES ('NAN','$livre->ISBN','$titre','$auteur','$livre->stock',$livre->pu,'resumer')";
        executeRequest($sql);
        
        $codeLivre = GestionLivres::getLastId();
        GestionLivres::setREF($codeLivre);
    }
    /**
     * @param Livre $livre
     */
    public static function updateLivre(Livre $livre) {
        $titre = addslashes($livre->titre);
        $auteur = addslashes($livre->auteur);
        $sql = "UPDATE ".DB_TABLE_LIVRES." SET `ISBN`='$livre->ISBN',`titre`='$titre',`auteur`='$auteur',`stock`=$livre->stock,`pu`= $livre->pu WHERE `codeLivre` = $livre->codeLivre";
        executeRequest($sql);
    }
   
    public static function getLivreById($id) {
        $sql = "SELECT * FROM " . DB_TABLE_LIVRES . " WHERE codeLivre='$id'";
        $livre = executeRequest($sql);
        return new Livre($livre);
    }

}