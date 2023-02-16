<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../asset/css/main.css">
    <title>connexion</title>
</head>
<body>
    <?php include './menu2.php';?>
    <h3>Connexion</h3>
    <form action="" method="post">
        <label for="mail_utilisateur">Saisir votre mail :
        </label>
        <input type="email" name="mail_utilisateur" id="email">
        <label for="password_utilisateur">Saisir votre password :
        </label>
        <input type="password" name="password_utilisateur" id="password">
        <input type="submit" value="connexion" name="submit">
    </form>
</body>
</html>
<?php
    include '../utils/connectBdd.php';
    include '../connexion.php';
?>
