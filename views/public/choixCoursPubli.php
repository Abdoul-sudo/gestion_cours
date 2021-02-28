<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ChoixCours</title>
</head>
<body>
    <h3> Choisissez le cours auquel vous voulez voir les publications</h3>

    <!-- <form method="post" action="controllers/publication.php?action=getidCours"> 
        <select name="type">
            <option value="message">Message</option>
            <option value="leçon">Leçon</option>
            <option value="exercice">Exercice</option>
        </select>
        
        <select name="cours">
            //////////////////////////////////////////////////////////////
        </select>

        <input type="submit" value="OK">
    </form> -->
    <?php require ('views/public/sidebarMenuView.php'); ?>
</body>
</html>