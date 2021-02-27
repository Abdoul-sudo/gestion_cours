<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ListeCours</title>

    <link rel="stylesheet" href="assets/css/list.css">

</head>
<body>
        <?php require("views/admin/menuAdmin.php"); ?>

    <h1>LISTE DES COURS</h1>
    <table>
        <tr>
            <th>COURS</th>
            <th>ENSEIGNANT DU COURS</th>
            <th>CATEGORIE</th>
        </tr>


        <?php 
            require("controllers/manageCours.php");
            $cours = new ManageCours;
            $liste = $cours -> listerCours();  
        ?>
        
    </table>
</body>
</html>