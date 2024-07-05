<?php 
require_once("/wamp64/www/my_projetcs/librairie/back_end/var/variables.inc.php");
include(URL_MODEL."User.php");
include(URL_FONCTION."fonction.php");

class GestionUsers {
    private $db;

    public function __construct() {
        
    }

    public static function getAllUsers() {
    }

    public static function isUserExists($user) {
        $query = "SELECT * FROM users WHERE email = ? AND pwd = ? ";

        $result = executeRequest($query,[$user->getEmail(),$user->getPwd()]);
        return $result ? $result['id'] : null;
    }

    
    public static function getLastId(){
        $sql = "SELECT MAX(codeLivre) as last FROM ".DB_TABLE_USERS;
        return executeRequest($sql)['last'];
    }
    public static function isUserEmailExists($email) {
        $query = "SELECT * FROM users WHERE email = ?  ";

        $result = executeRequest($query,[$email]);
        return $result ? true : null;
    }

    public static function getUserById($id) {
        $query = "SELECT * FROM users WHERE id = ?";
        $user = executeRequest($query,[$id]);
    
        if ($user) {
            return new User($user);
        } else {
            return null;
        }
    }

    public static function insertUser(User $user) {
        $sql = "INSERT INTO ".DB_TABLE_USERS."( `email`, `nom`, `pwd`) VALUES ('".$user->getEmail()."','".$user->getnom()."','".$user->getPwd()."')" ;
        executeRequest($sql);
    }

    public static function updateUser(User $user) {
    }

    public static function deleteUser($id) {
    }
}
