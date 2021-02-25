<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ListeEtudiants</title>
</head>
<body>
    <nav>  
        <span><a href="admin.php?session=admin"> Accueil</a></span>  
        <span><a href="admin.php?pgAdmin=pgProf">Insertion professeur</a></span>
        <span><a href="admin.php?pgAdmin=pgEt">Insertion Etudiant</a></span>
        <span><a href="controllers/logout.php">Deconnexion</a></span>
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
            require("controllers/manageEtudiant.php");
            $et = new ManageEtudiant;
            $list = $et -> listEtudiant();  
        ?>
        
    </table>
</body>
</html>