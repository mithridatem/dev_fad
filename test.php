<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>test injection</title>
</head>
<body>
    <form action="" method="post">
        <input type="text" name="cat">
        <input type="submit" value="envoyer" name="getCat">
    </form>
    <form action="" method="post">
    <input type="text" name="article">
        <input type="submit" value="envoyer" name="getArticle">
    </form>
</body>
</html>
<?php
    include './utils/connectBdd.php';
    include './inject.php';
?>