<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>add categorie</title>
</head>
<body>
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
    include './utils/connectBdd.php';
    include './category.php';
?>