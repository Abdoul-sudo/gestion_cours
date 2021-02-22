<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form>
        <div>
        <h4>NOM</h4>
        <input type="text" name="nomProf">
        </div>

        <div>
        <h4>PRENOM</h4>
        <input type="text" name="prenomProf">
        </div>

        <div>
        <h4>NUMERO DE TELEPHONE</h4>
        <input type="text" name="numeroProf">
        </div>

        <div>
        <h4>ADRESSE EMAIL</h4>
        <input type="email" name="emailProf">
        </div>

        <div>
        <h4>SPECIALITES</h4>
        

        <h6>INFORMATIQUE</h6>
        <input type="checkbox" name="informatique[]" value="Programmation">Programmation
        <input type="checkbox" name="informatique[]" value="Maintenance">Maintenance
        <input type="checkbox" name="informatique[]" value="Architecture">Architecture


        <h6>GESTION</h6>
        <input type="checkbox" name="gestion[]" value="Compatabilité">Compatabilité
        <input type="checkbox" name="gestion[]" value="Economie">Economie
    
        <h6>COMMUNICATION</h6>
        <input type="checkbox" name="communication[]" value="Leadership">Leadership
        <input type="checkbox" name="communication[]" value="Français">Français
        </div>

        <div>
                <h4 for="mdp">MOT DE PASSE</h4>
                <input type="password" name="mdpProf" id="mdpProf">
            </div>

            <div>
                <h4 for="img">INSERER IMAGE</h4>
                <input type="file" accept="image/png, image/jpeg" name="imgProf" id="imgProf">
            </div>

            <div>
                <input type="submit" value="OK">
            </div>

            <a href="listeProf.php"> LISTE DES ETUDIANTS </a>
    </form>
</body>
</html>