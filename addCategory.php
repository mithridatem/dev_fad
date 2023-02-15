<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add categorie</title>
</head>
<body>
    <h3>Ajouter une catégorie :</h3>
    <form action="" method="post">
        <label for="nom_categorie">Saisir le nom de la categorie :</label>
        <input type="text" name="nom_categorie">
        <input type="submit" value="Ajouter" name="submit">
    </form>    
</body>
</html>
<?php
    /* import du fichier de connexion à la BDD */
    include './utils/connectBdd.php';
    include './category.php';
?>