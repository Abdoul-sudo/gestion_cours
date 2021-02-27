<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
        <?php require("views/admin/menuAdmin.php");?>

        <h1> PUBLICATION </h1>
        <form method="post" action="controllers/publication.php?action=inserer"> 
            <select name="cours">
                <?php foreach ($cours as $key): ?>
                    <option value=<?= $key['id_cours']?>>
                        <?= $key['nom_cours']; ?>
                    </option>
                <?php endforeach; ?>
            </select>

            <div>
                <input type="hidden" name="id_prof" id="id_prof" value="<?php echo $_SESSION['id'];?>">
            </div>

            <div>
                <input type="text" name="titre" id="titre" placeholder="objet">
            </div>

            <div>
                <textarea  name="contenu" placeholder="Publication"></textarea>
            </div>

            <input type="submit" value="ok"> 
        </form>

        
    </body>
</html>