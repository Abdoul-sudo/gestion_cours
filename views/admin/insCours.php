<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
        <form action="controllers/manageProfesseur?action=insCours" method="post">

            <label for="cours"> COURS</label>
            <input type="text" name="cours" id="cours">

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