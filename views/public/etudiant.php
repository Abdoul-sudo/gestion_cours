<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link rel="stylesheet" href="../../assets/css/sidebar.css">
</head>
<body>
    <?php require("menuPublic.php"); ?>
    <?php require("sidebarMenuView.php")?>

    <h1 id="h1">
    <?php
        echo 'Bienvenue étudiant '.$_SESSION['nom'].' '.$_SESSION['prenom'].'!!!  <br>';    

    ?>
    </h1>
</body>
</html>
