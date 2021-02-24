<?php session_start();?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <nav>
        <a href="../../controllers/logout.php">Deconnexion</a><br> 
        <span></span><br>
        <?php 
            if($_SESSION['admin']){
                echo '<a href="../../admin.php?session=admin">Accueil insertion</a><br>';
                echo '<a href="../../admin.php?pgAdmin=pgCours">Liste des cours</a><br>'; //liste cours pour l'admin
            }
            else {
                echo '<a href="../../admin.php">Liste des cours</a>'; //liste cours pour le public
            }
        ?>
    </nav>

    <?php 
        
        echo 'Bienvenue étudiant '.$_SESSION['nom'].' '.$_SESSION['prenom'].'!!!  <br>';
        
    ?>
</body>
</html>
