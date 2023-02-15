<?php
    //import du fichier de connexion BDD
    include './utils/connectBdd.php';
    //variable paramètre date
    $date = '2023-01-00';
    //requête préparée 
    $req = $bdd->prepare('SELECT id_article FROM article WHERE date_article < ?');
    //affecter une valeur au ?
    //paramétre : position du ?, variable (données), typage
    $req->bindParam(1, $date, PDO::PARAM_STR);
    //éxécution de la requête
    $req->execute();
    //ajout de tous les enregistrement dans $data
    $data = $req->fetchAll(PDO::FETCH_ASSOC);
    //vérification du tableau
    var_dump($data);
    //exemple affichage du nom_article du 1 enregistrement du tableau $data
    echo $data[0]['nom_article'];
?>