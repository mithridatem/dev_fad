<?php
    $mess = "";
    /* test si le bouton est cliqué */
    if(isset($_POST['submit'])){
        /* vérifier si l'input nom_categorie est bien remplit */
        if(!empty($_POST['nom_categorie'])){
            $nom = $_POST['nom_categorie'];
            $data = "";
            //Exécution de la requête select vérifier si la catégorie n'existe pas déja
            try{
                //préparation de la requête
                $req = $bdd->prepare("SELECT id_categorie FROM categorie WHERE nom_categorie =:nom");
                //envoi de la requête
                $req->execute(
                    ['nom'=>$nom]
                );
                $data = $req->fetch(PDO::FETCH_ASSOC);
            }
            catch(Exception $e){
                die('Erreur :'.$e->getMessage());
            }
            //test si la catégorie existe déja
            if($data){
                //remplacement du message d'erreur
                $mess = "La catégorie : ".$_POST['nom_categorie']." existe déja en BDD";
            }
            //sinon ajouter en BDD
            else{
                //Exécution de la requête insert
                try{
                    //préparation de la requête
                    $req = $bdd->prepare('INSERT INTO categorie(nom_categorie) VALUES (:nom)');
                    //envoi de la requête
                    $req->execute(
                        ['nom'=>$_POST['nom_categorie']]
                    );
                    //remplacement du message d'erreur
                    $mess = "La catégorie : ".$_POST['nom_categorie']." à été ajouté en BDD";
                }
                //lever l'execption
                catch(Exception $e){
                    die('Erreur :'.$e->getMessage());
                }
            }
        }
        //test si le champ est vide
        else{
            $mess = "Veuillez remplir le champ de formulaire";
        }
        //afficher le message
        echo $mess;
    }
?>