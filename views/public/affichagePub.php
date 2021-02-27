<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

        <tr>
            <th>TITRE</th>
            <th>COURS</th>
            <th>PROFESSEUR</th>
            <th>CONTENU</th>
            <th>DATE</th>
        </tr>

        <?php 
            require("controllers/publication.php");
            $et = new insererPub;
            $list = $et -> afficherMessage($id_cours);  
        ?>
</body>
</html>