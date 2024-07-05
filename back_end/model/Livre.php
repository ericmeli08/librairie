<?php

class Livre {
    public $codeLivre; 
    public $REF; 
    public $ISBN; 
    public $titre; 
    public $auteur; 
    public $stock; 
    public $pu;

    public function __construct($livre) {
        $this->codeLivre = $livre['codeLivre'];
        $this->REF = $livre['REF'];
        $this->ISBN = $livre['ISBN'];
        $this->titre = $livre['titre'];
        $this->auteur = $livre['auteur'];
        $this->stock = $livre['stock'];
        $this->pu = $livre['pu'];
    }

    // public function ajouterLivre($REF, $ISBN, $titre, $auteur, $stock, $pu) {
    //     $stmt = $this->pdo->prepare("INSERT INTO livres (REF, ISBN, titre, auteur, stock, pu) VALUES (:REF, :ISBN, :titre, :auteur, :stock, :pu)");
    //     $stmt->execute(array(':REF' => $REF, ':ISBN' => $ISBN, ':titre' => $titre, ':auteur' => $auteur, ':stock' => $stock, ':pu' => $pu));
    //     return $this->pdo->lastInsertId();
    // }

    public function setStock($stock) {
        $this->stock = $stock;
    }

    public function setPu($pu) {
        $this->pu = $pu;
    }


    // public function supprimerLivre($codeLivre) {
    //     $stmt = $this->pdo->prepare("DELETE FROM livres WHERE codeLivre = :codeLivre");
    //     $stmt->execute(array(':codeLivre' => $codeLivre));
    // }
}