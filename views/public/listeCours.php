<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ListeCours</title>
</head>
<body>
    <nav>  
        <span><a href="admin.php?session=admin"> Accueil</a></span>  
        <span><a href="admin.php?pgAdmin=pgProf&pg=insertCours"> Insertion cours</a></span>
        <span><a href="admin.php?pgAdmin=pgProf">Insertion professeur</a></span>
        <span><a href="admin.php?pgAdmin=pgEt">Insertion Etudiant</a></span>
        <span><a href="controllers/logout.php">Deconnexion</a></span>
    </nav>

    <h1>LISTE DES COURS</h1>
    <table>
        <tr>
            <th>COURS</th>
            <th>PROFESSEUR</th>
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