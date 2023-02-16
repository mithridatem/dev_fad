<?php
    //import du fichier de connexion BDD
    include '../utils/connectBdd.php';
    //variable paramètre date
    $date = '2023-01-00';
    //requête préparée 
    $req = $bdd->prepare('SELECT id_article, nom_article FROM article');
    //éxécution de la requête
    $req->execute();
    //ajout des enregistrements version tableau objet
    //$data = $req->fetchAll(PDO::FETCH_OBJ);
    //ajout des enregistrements version tableau associatif
    $data = $req->fetchAll(PDO::FETCH_ASSOC);
    //inspecter le tableau
    var_dump($data);
    //exemple affichage du nom_article du 1 enregistrement du tableau associatif $data
    echo $data[0]['nom_article'].'<br>';
    //exemple affichage du nom_article du 1 enregistrement du tableau objet $data
    //echo $data[0]->nom_article.'<br>';
?>