<?php
    //import du fichier de connexion BDD
    include '../utils/connectBdd.php';
    //requête non sécurisée
    $req = $bdd->query('SELECT * FROM article');
    //boucle pour ajouter les enregistrements à $data
    while($data = $req->fetch()){
        //affichage des enregistrements
        echo $data['id_article']." ".$data['nom_article'].'<br>';
    }
?>