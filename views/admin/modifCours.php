<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>modifCours</title>
</head>
<body>
        <h1>MODIFICATION DU COURS <?php echo $nom; ?></h1>
        <form action="controllers/manageCours?update=update" method="post">

            <div>
                <input type="hidden" name="id" id="id" value="<?php echo $id;?>">
            </div>

            <label for="cours"> COURS </label>
            <input type="text" name="cours" id="cours" value="<?php echo $nom; ?>">

            <label>PROFESSEUR</label>
            <select name="prof">
                <?php foreach ($takeid as $key): ?>
                    <option value="<?= $key['id_professeur']; ?>">
                        <?= $key['nom_professeur'] .' '. $key['prenom_professeur']; ?>
                    </option>
                <?php endforeach; ?>
            </select>

            <br><br>
            <label>CATEGORIE</label>
            <select name="categorie">
                <option value="1">Informatique</option>
                <option value="2">Gestion</option>
                <option value="3">Communication</option>
            </select>

            <input type="submit" value="OK">
        </form>
        
</body>
</html>