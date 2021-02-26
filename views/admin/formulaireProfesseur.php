<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Formulaire</title>

        <link rel="stylesheet" href="assets/css/insert.css">

    </head>

    <body>
        <?php require("views/admin/menuAdmin.php");?>

        
        <form class="box" method="post" action="controllers/manageProfesseur.php?action=insert"> 
            <h1> INSERTION PROFESSEUR </h1>

                <!-- Nom -->
                <input type="text" name="nom" id="nom" placeholder="Nom du professeur" autocomplete="off" require>

                <!-- Prénom -->
                <input type="text" name="prenom" id="prenom" placeholder="Prénom du professeur" autocomplete="off" require>
            
                <!-- Numero de telephone -->
                <input type="text" name="tel" id="tel" placeholder="Numero de téléphone" autocomplete="off" require>

                <!-- Email -->
                <input type="text" name="email" id=email placeholder="Email du professeur" autocomplete="off" require>

                <!-- Password -->
                <input type="password" name="mdp" id="mdp" placeholder="Mot de passe" require>

                <h4 for="img">INSERER IMAGE</h4>
                <input type="file" accept="image/png, image/jpeg" name="img" id="img" require>
            
                <input type="submit" value="INSERER">
            
        </form>
        


        
    </body>
</html>