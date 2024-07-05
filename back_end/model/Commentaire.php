<?php 

class Commentaire{
    public $id;
    public $email;
    public $commentaire;
    public $date_create;

    public function __construct($commentaire){
        $this->id = $commentaire['id'];
        $this->email = $commentaire['email'];
        $this->commentaire = htmlentities(addslashes(trim($commentaire['commentaire'])));
        $this->date_create = $commentaire['date_create'];
    }
  
}




















?>