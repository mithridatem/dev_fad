<?php
    session_start();
    //test de la connexion
    if(isset($_SESSION['connected'])){
        //test role
        if($_SESSION['role']== 0){?>
        <html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="../asset/css/main.css">
        <title>add categorie</title>
    </head>
    <body>
        <?php include './menu2.php'; ?>
        <h3>Ajouter une categorie :</h3>
        <form action="" method="post">
            <label for="nom_categorie">Saisir le nom de la categorie :</label>
            <input type="text" name="nom_categorie" id="nom_categorie">
            <input type="submit" value="Ajouter" name="submit">
        </form>
    </body>
    </html>
    <?php
        /* Imports des fichiers */
        include '../utils/connectBdd.php';
        include '../category.php';
    ?>
<?php
        } 
    }
    else{
        echo 'interdit !!!';
    }

?>

