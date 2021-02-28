<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ListeEtudiants</title>

    <link rel="stylesheet" href="assets/css/list.css">
</head>
<body>
    <?php require("views/admin/menuAdmin.php");?>


    <h1>LISTE DES ETUDIANTS</h1>
    <table>
        <tr>
            <th>ID</th>
            <th>NOM</th>
            <th>PRENOM</th>
            <th>EMAIL</th>
            <th>TELEPHONE</th>
            <th colspan="2">IMAGE</th>
        </tr>


        <?php 
            require("controllers/manageEtudiant.php");
            $et = new ManageEtudiant;
            $list = $et -> listEtudiant();  
        ?>
        
    </table>
</body>
</html>