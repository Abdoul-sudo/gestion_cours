<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Formulaire</title>
    </head>

    <body>
        <nav>  
            <span><a href="admin.php?session=admin"> Accueil</a></span>  
            <span><a href="admin.php?pgAdmin=pgProf&pg=insertCours"> Insertion cours</a></span>
            <span><a href="admin.php?pgAdmin=pgProf">Insertion professeur</a></span>
            <span><a href="admin.php?pgAdmin=pgCours">Liste des cours</a></span><br>
            <span><a href="admin.php?pgAdmin=pgEt&pg=listeEt"> Liste des étudiants </a></span>
            <span><a href="controllers/logout.php">Deconnexion</a></span>
        </nav>
        
        <h1> INSERTION ETUDIANT </h1>
        <form method="post" action="controllers/manageEtudiant?action=insert">
            <div>
                <h4 for="nom">NOM</h4>
                <input type="text" name="nom" id="nom">
            </div>

            <div>
                <h4 for="prenom">PRENOM</h4>
                <input type="text" name="prenom" id="prenom">
            </div>

            <div>
                <h4 for="tel">NUMERO DE TELEPHONE</h4>
                <input type="text" name="tel" id="tel">
            </div>

            <div>
                <h4 for="email">EMAIL</h4>
                <input type="email" name="email" id=email>
            </div>

            <div>
                <h4 for="mdp">MOT DE PASSE</h4>
                <input type="password" name="mdp" id="mdp">
            </div>

            <div>
                <h4 for="img">INSERER IMAGE</h4>
                <input type="file" accept="image/png, image/jpeg" name="img" id="img">
            </div>

            <div>
                <input type="submit" value="OK">
            </div>
        </form>

        
    </body>
</html>