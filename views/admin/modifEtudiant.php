<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Formulaire</title>
    </head>

    <body>
        <h1> FORMULAIRE UPDATE</h1>
        <form method="post" action="controllers/C_etudiant.php?update=update">
            <div>
                <input type="hidden" name="id" id="id" value="<?php echo $id;?>">
            </div>

            <div>
                <h4 for="nom">NOM</h4>
                <input type="text" name="nom" id="nom" value="<?php echo $nom;?>">
            </div>

            <div>
                <h4 for="prenom">PRENOM</h4>
                <input type="text" name="prenom" id="prenom" value="<?php echo $prenom;?>">
            </div>

            <div>
                <h4 for="tel">NUMERO DE TELEPHONE</h4>
                <input type="text" name="tel" id="tel" value="<?php echo $tel;?>">
            </div>

            <div>
                <h4 for="email">EMAIL</h4>
                <input type="email" name="email" id=email value="<?php echo $email;?>">
            </div>

            <div>
                <h4 for="mdp">MOT DE PASSE</h4>
                <input type="password" name="mdp" id="mdp" >
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