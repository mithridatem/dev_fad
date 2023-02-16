<?php
    /* importer le fichier de connexion à la BDD */
    include '../utils/connectBdd.php';
    function getAllCategory($bdd){
        try{
            /* préparer la requête */
            $req = $bdd->prepare('SELECT id_categorie, nom_categorie FROM categorie');
            /* Exécuter la requête */
            $req->execute();
            /* stocker les enregistrements dans un tableau */
            $data = $req->fetchAll(PDO::FETCH_ASSOC);
            //on renvoi le tableau de catégorie
            return $data;
        }
        //lever une exception 
        catch(Exception $e){
            //affichage de l'erreur SQL
            die('Erreur : '.$e->getMessage());
        }
    }
    /* Affichage avec une boucle foreach */
    foreach(getAllCategory($bdd) as $value){
        //affichage de l'id et du nom de chaque enregistrement
        echo '<p class="categorie">'.$value['id_categorie']." : ".$value['nom_categorie'].'</p>';
    }
?>