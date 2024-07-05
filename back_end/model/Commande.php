<?php 

class Commande{
    public $idCde;
    public $produits;
    public $montantCde;
    public $nomPrenomCli;
    public $email;
    public $adressecli;
    public $dateCde;

    public function __construct($commande){
        $this->idCde = $commande['idCde'];
        $this->produits = $commande['produits'];
        $this->montantCde = $commande['montantCde'];
        $this->nomPrenomCli = $commande['nomPrenomCli'];
        $this->email = $commande['email'];
        $this->adressecli = $commande['adressecli'];
        $this->dateCde = $commande['dateCde'];
    }

}




















?>