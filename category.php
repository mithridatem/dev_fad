<?php
    //variable pour stocker
    $message = "";
    //tester si le bouton est cliqué
    if(isset($_POST['submit'])){
        /* Si le champ est rempli */
        if(!empty($_POST['nom_categorie'])){
            //test si la catégorie existe 
            if(getCategoryByName($bdd, $_POST['nom_categorie'])){
                //affiche l'erreur
                $message = "La catégorie : ".$_POST['nom_categorie']." existe déja";
            }
            //si elle n'existe pas
            else{
                //ajout de la catégorie en BDD
                addCategory($bdd, $_POST['nom_categorie']);
                //affiche l'ajout
                $message = "La catégorie : ".$_POST['nom_categorie']." à été ajouté en BDD";
            }
        }
        //si le champ est vide
        else{
            //affichage de l'erreur
            $message = "Veuillez remplir le champ de formulaire";
        }
    }
    //affiche les messages
    echo $message;
    //fonction qui insére en BDD une catégorie par son nom
    function addCategory($bdd, $value){
        try{
            //préparer la requête
            $req = $bdd->prepare("INSERT INTO categorie(nom_categorie)VALUES
            (:nom_categorie)");
            $req->execute(
                ['nom_categorie'=> $value]
            );
        }
        catch(Exception $e){
            die('Erreur : ' .$e->getMessage());
        }
    }
    //fonction qui récupére une catégorie par son nom
    function getCategoryByName($bdd, $value){
        try{
            //préparer la requête
            $req = $bdd->prepare("SELECT id_categorie, nom_categorie FROM categorie
            WHERE nom_categorie = :nom_categorie");
            $req->execute(
                ['nom_categorie'=> $value]
            );
            //construction du tableau d'enregistrement
            $data = $req->fetchAll(PDO::FETCH_ASSOC);
            //on renvoi le tableau d'enregistrement
            return $data;
        }
        //gestion des erreurs (lever une exception)
        catch(Exception $e){
            die('Erreur : ' .$e->getMessage());
        }
    }
?>