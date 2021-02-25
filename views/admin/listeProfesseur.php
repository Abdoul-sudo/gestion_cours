<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ListeProfesseurs</title>
</head>
<body>
    <?php require("views/admin/menuAdmin.php");?>


    <h1>LISTE DES PROFESSEURS</h1>
    <table>
        <tr>
            <th>ID</th>
            <th>NOM</th>
            <th>PRENOM</th>
            <th>EMAIL</th>
            <th>TELEPHONE</th>
            <th>IMAGE</th>
        </tr>


        <?php 
            require("controllers/ManageProfesseur.php");
            $et = new ManageProfesseur;
            $list = $et -> listProfesseur();  
        ?>
        
    </table>
</body>
</html>