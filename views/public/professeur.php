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
        <a href="listeCours.php">Liste des cours</a><br>
        <?php 
            if($_SESSION['admin']){
                echo '<a href="../../admin.php?session=admin">Page d\'insertion</a>';
                echo '<a href="../../admin.php?pgAdmin=pgCours&pg=listeCours">Liste des cours</a><br>'; //liste cours pour l'admin
            }
            else {
                echo '<a href="../../admin.php">Liste des cours</a>';
            }
        ?>
    </nav>

    <?php 
        
        echo 'Bienvenue professeur '.$_SESSION['nom'].' '.$_SESSION['prenom'].'!!!  <br>';
        
    ?>
</body>
</html>
