<?php
    /* création d'une session */
    session_start();
    /* -------------------------------------------------------
    ---------------------- Logique ----------------------- */
    $message = "";
    /* test si le bouton est cliqué */
    if(isset($_POST['submit'])){
        /* stocke les valeur POST dans des variables */
        $mail = $_POST['mail_utilisateur'];
        $password = $_POST['password_utilisateur'];
        /* Test si les champs sont remplis */
        if(!empty($mail) AND !empty($password)){
            //récupération de l'utilisateur
            $user = getUserByMail($bdd,$mail);
            /* test si l'utilisateur existe */
            if($user){
                /* test si le password est valide */
                if(password_verify($password, $user[0]['password_utilisateur'])){
                    /* Créer les super Globales SESSION */
                    $_SESSION['role'] = $user[0]['role_utilisateur'];
                    $_SESSION['connected'] = true;
                    $message = "Connecté";
                }
                /* Test si le password est invalide */
                else{
                    $message = "Les informations de connexion sont incorrectes";
                }
            }
            /* test si l'utilisateur n'existe pas */
            else{
                $message = "Les informations de connexion sont incorrectes";
            }
        }
    }
    echo $message;
    /* -------------------------------------------------------
    ---------------------- Fonctions ----------------------- */

    function getUserByMail($bdd, $mail):array{
        try{
            $req = $bdd->prepare("SELECT nom_utilisateur, prenom_utilisateur, 
            mail_utilisateur, password_utilisateur, role_utilisateur FROM utilisateur WHERE
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