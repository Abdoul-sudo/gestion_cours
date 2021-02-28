<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AffichagePublication</title>
</head>
<body>

    <?php require("views/admin/menuAdmin.php");?>
    <h1> PUBLICATIONS </h1>
    <table>
        <tr>
            <th >COURS</th>
            
        </tr>

        <?php 
            require("controllers/publication.php");
            $et = new managePub;
            $list = $et -> afficherMessage($cours,$typePub);  
        ?>  
    </table>
</body>
</html>