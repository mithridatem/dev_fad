<?php
    /* -------------------------------------------------------
    ---------------------- Logique ----------------------- */
    
    /* Variable pour stocker les messages */
    $message = "";
    /* tester si le bouton est cliqué */
    if(isset($_POST['submit'])){
        /* stockage des valeurs du formulaire */
        $nom = $_POST['nom_utilisateur'];
        $prenom = $_POST['prenom_utilisateur'];
        $mail = $_POST['mail_utilisateur'];
        $password = $_POST['password_utilisateur'];
        /* Test si les champs sont remplis */
        if(!empty($nom) AND !empty($prenom) AND !empty($mail) AND !empty($password)){
            /* Test si l'utilisateur existe */
            if(getUserByMail($bdd, $mail)){
                /* Afficher le message */
                $message = "Le compte : ".$mail." existe déja en BDD";
            }
            /* Test si l'utilisateur n'existe pas */
            else{
                /* Ajouter l'utilisateur en BDD */
                AddUser($bdd, $nom, $prenom, $mail, $password);
                /* Afficher le message */
                $message = "Le compte : ".$mail." a été ajouté en BDD";
            }
        }
        /* si les champs ne sont pas remplis */
        else{
            /* Afficher le message */
            $message = "Veuillez remplir tous les champs du formulaire";
        }
    }
    /* Affichage des erreurs */
    echo $message;

    /* -------------------------------------------------------
    ---------------------- Fonctions ----------------------- */

    /* Fonction récupération en BDD de l'utilisateur par son mail */
    function getUserByMail($bdd, $mail){
        try{
            /* Préparer la requête */
            $req = $bdd->prepare("SELECT nom_utilisateur, prenom_utilisateur,
            mail_utilisateur, password_utilisateur FROM utilisateur WHERE
            mail_utilisateur = :mail");
            $req->execute(
                ['mail'=>$mail]
            );
            //récupération dans un tableau du résultat de la requête SELECT
            $data = $req->fetchAll(PDO::FETCH_ASSOC);
            //retourne le tableau 
            return $data;
        }
        //gestion des erreurs (lever une exception)
        catch(Exception $e){
            //affichage du message Erreur SQL
            die('Erreur : '. $e->getMessage());
        }
    }

    /* Fonction pour ajouter un utilisateur en BDD */
    function AddUser($bdd, $nom, $prenom, $mail, $password){
        /* Hasher le mot de passe */
        $password = password_hash($password, PASSWORD_DEFAULT);
        try{
            /* Préparer la requête */
            $req = $bdd->prepare("INSERT INTO utilisateur(nom_utilisateur,
            prenom_utilisateur, mail_utilisateur, password_utilisateur) VALUES
            (:nom, :prenom, :mail, :_password)");
            /* Exécuter la requête */
            $req->execute(
                ['nom'=>$nom,
                'prenom'=>$prenom,
                'mail'=>$mail,
                '_password'=>$password]
            );
        }
        //gestion des erreurs (lever une exception)
        catch(Exception $e){
            //affichage du message Erreur SQL
            die('Erreur : '.$e->getMessage());
        }
    }
?>