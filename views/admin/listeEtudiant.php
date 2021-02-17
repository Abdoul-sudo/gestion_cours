<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ListeEtudiants</title>
</head>
<body>
    <h1>LISTE DES ETUDIANTS</h1>
    <table>
        <tr>
            <th>ID</th>
            <th>NOM</th>
            <th>PRENOM</th>
            <th>EMAIL</th>
            <th>TELEPHONE</th>
        </tr>

        <tr>
            <?php 
                require_once("../../models/M_etudiant.php");
                require("../../controllers/C_etudiant.php");
                $et = new C_ETUDIANT;
                $list = $et -> C_listeEt();  
            ?>
        </tr>
    </table>
</body>
</html>