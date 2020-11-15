<?php

class Utilisateur
{
//attributs 
 private $_bdd;
 private $_mail;
 private $_login;
 private $_mdp;

//function

 public function __construct($bdd, $mail, $login, $mdp)
 {
  $this->_bdd = $bdd;
  $this->_mail = $mail;
  $this->_login = $login;
  $this->_mdp = $mdp;
 }

 public function EmailExist()
 {
    $reqMail = $this->_bdd->prepare("SELECT mail FROM Utilisateur WHERE mail = ?");
    $reqMail->execute(array($this->_mail));
    return $reqMail->rowCount() != 0;
 }

 public function LoginExist()
 { 
    $reqLogin = $this->_bdd->prepare("SELECT login FROM Utilisateur WHERE login = ?");
    $reqLogin->execute(array($this->_login));
    return $reqLogin->rowCount() != 0;
 }
 
 public function EnregistrerInfoBase()
 {
   $reqco = $this->_bdd->prepare("INSERT INTO Utilisateur (login, mail, mdp) VALUES (:login, :mail, :mdp)");
   $reqco->bindParam(':login', $this->_login);
   $reqco->bindParam(':mail', $this->_mail);
   $reqco->bindParam(':mdp', $this->_mdp);
   $reqco->execute();
 } 
}
