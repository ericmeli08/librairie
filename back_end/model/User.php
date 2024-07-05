
<?php

class User {
    private $id;
    private $nom;
    private $email;
    private $pwd;

    public function __construct($user) {
        $this->id = $user['id'];
        $this->nom = htmlentities(addslashes(trim($user['nom'])));
        $this->email = htmlentities(addslashes(trim($user['email'])));
        $this->pwd = htmlentities(addslashes(trim($user['pwd'])));
    }

    // Getters and setters
    public function getId() {
        return $this->id;
    }

    public function getnom() {
        return $this->nom;
    }

    public function getEmail() {
        return htmlentities($this->email);
    }

    public function getPwd() {
        return sha1(md5($this->pwd));
    }
}
