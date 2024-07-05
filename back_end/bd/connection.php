<?php 
    require_once("/wamp64/www/my_projetcs/librairie/back_end/var/variables.inc.php");

    function bdConnection(){
        try {
            $connection = new PDO("mysql:host=".DB_HOST.";dbname=".DB_NAME."",DB_USER,DB_PWD);
            $connection->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
            $connection->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE,PDO::FETCH_ASSOC);
            return $connection;
        } catch (PDOException $e) {
            echo " Erreur lors de le connection a la base de donne : ".$e->getMessage();
        }
    }
?>