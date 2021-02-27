<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link rel="stylesheet" href="assets/css/insert.css">
</head>
<body>
        <?php require("views/admin/menuAdmin.php");?>

        <form class="box" id="boxCours" action="controllers/manageCours?action=insCours" method="post">

            <h4 for="cours"> COURS</h4>
            <input type="text" name="cours" id="cours" placeholder="Nom du cours" autocomplete="off" require>
            
            <h4>PROFESSEUR</h4>
            <select name="prof">
                <?php foreach ($takeid as $key): ?>
                    <option value="<?= $key['id_professeur']; ?>">
                        <?= $key['nom_professeur'] .' '. $key['prenom_professeur']; ?>
                    </option>
                <?php endforeach; ?>
            </select>

            <br><br>
            <h4>CATEGORIE</h4>
            <select name="categorie">
                <option value="1">Informatique</option>
                <option value="2">Gestion</option>
                <option value="3">Communication</option>
            </select>

            <input id="submitCours" type="submit" value="INSERER">
        </form>
        
</body>
</html>