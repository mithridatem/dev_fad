<?php
include './utils/connectBdd.php';
    //test si existe
    if(isset($_POST['submit'])){
        //test si le champ est rempli
        if(!empty($_POST['cat'])){
            $cat = $_POST['cat'];
            //faire la requête pour récupérer la categorie
            $req = $bdd->query("SELECT * FROM categorie WHERE nom_categorie ='$cat'");
            //récupére dans un tableau
            $data= $req->fetchAll(PDO::FETCH_ASSOC);
            var_dump($data);
        }
        else{
            echo '<p id="rep">le champ est vide</p>';
        }
    }
?>
