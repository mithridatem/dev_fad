<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../asset/css/main.css">
    <title>Ajouter un utilisateur</title>
</head>
<body>
    <?php include './menu2.php';?>
    <h3>Ajouter un utilisateur :</h3>
    <form action="" method="post">
        <label for="nom_utilisateur">Saisir le nom :</label>
        <input type="text" name="nom_utilisateur">
        <label for="prenom_utilisateur">Saisir le prenom :</label>
        <input type="text" name="prenom_utilisateur">
        <label for="mail_utilisateur">Saisir le mail :</label>
        <input type="email" name="mail_utilisateur">
        <label for="password_utilisateur">Saisir le mot de passe :</label>
        <input type="password" name="password_utilisateur">
        <input type="submit" value="Ajouter" name="submit">
    </form>
</body>
</html>
<?php
    include '../utils/connectBdd.php';
    include '../utilisateur.php';
?>