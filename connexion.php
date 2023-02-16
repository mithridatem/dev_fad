<?php

use FFI\Exception;

    if(isset($_POST['submit'])){
        $mail = $_POST['mail_utilisateur'];
        $password = $_POST['password_utilisateur'];
        if(!empty($mail) AND !empty($password)){
            if(getUserByMail($bdd,$mail)){
                
            }
        }
    }
    function getUserByMail($bdd, $mail):array{
        try{
            $req = $bdd->prepare("SELECT nom_utilisateur, prenom_utilisateur, 
            mail_utilisateur, password_utilisateur FROM utilisateur WHERE
            mail_utilisateur = :mail");
            $req->execute(
                ['mail'=>$mail]
            );
            $data = $req->fetchAll(PDO::FETCH_ASSOC);
            return $data;
        }
        catch(Exception $e){
            die('Erreur '.$e->getCode());
        }
    }
?>