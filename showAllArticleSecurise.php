<?php
    //import du fichier de connexion BDD
    include './utils/connectBdd.php';
    //variable paramètre date
    $date = '2023-01-00';
    //requête préparée 
    $req = $bdd->prepare('SELECT * FROM article WHERE date_article < :date_article');
    //éxécution de la requête
    $req->execute(
       ['date_article'=>$date]
    );
    //
    $data = $req->fetchAll(PDO::FETCH_ASSOC);
    var_dump($data);
    //exemple affichage du nom_article du 1 enregistrement du tableau $data
    echo $data[0]['nom_article'];
?>