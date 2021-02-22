<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ListeEtudiants</title>
</head>
<body>
    <nav>    
        <a href="controllers/logout.php">Deconnexion</a>
        <a href="admin.php?pgAdmin=pgEt">Insertion étudiant</a>
        <a href="#"></a>
    </nav>

    <h1>LISTE DES ETUDIANTS</h1>
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
            require("controllers/C_etudiant.php");
            $et = new C_ETUDIANT;
            $list = $et -> C_listeEt();  
        ?>
        
    </table>
</body>
</html>