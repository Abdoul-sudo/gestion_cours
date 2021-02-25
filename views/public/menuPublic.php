<?php session_start();?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php if ($_SESSION["admin"]): ?>
        <header>
            <nav>
                <ul>
                    <li>
                        <a href="../../admin.php?session=admin"> Insertion</a>
                        <ul>
                            <li><a href="../../admin.php?pgAdmin=pgEt">Insertion Etudiant</a></li>
                            <li><a href="../../admin.php?pgAdmin=pgProf">Insertion professeur</a></li>
                            <li><a href="../../admin.php?pgAdmin=pgProf&pg=insertCours"> Insertion cours</a></li>
                        </ul>
                    </li>

                    <li>
                        <p>Liste</p>
                        <ul>
                            <li><a href="../../admin.php?pgAdmin=pgEt&pg=listeEt"> Liste des étudiants </a></li>
                            <li><a href="../../admin.php?pgAdmin=pgProf&pg=listeProf"> Liste des professeurs </a></li>
                            <li><a href="../../admin.php?pgAdmin=pgCours&pg=listeCours">Liste des cours</a></li>
                        </ul>
                    </li>

                    <li><a href="../../controllers/logout.php">Deconnexion</a></li>
                </ul>
            </nav>
        </header>
    <?php else:?>
        <header>
            <nav>
                <ul>
                    <li>
                        <p>Liste</p>
                        <ul>
                            <li><a href="../../admin.php?pgAdmin=pgEt&pg=listeEt"> Liste des étudiants </a></li>
                            <li><a href="../../admin.php?pgAdmin=pgProf&pg=listeProf"> Liste des professeurs </a></li>
                            <li><a href="../../admin.php?pgAdmin=pgCours&pg=listeCours">Liste des cours</a></li>
                        </ul>
                    </li>

                    <li><a href="../../controllers/logout.php">Deconnexion</a></li>
                </ul>
            </nav>
        </header>
    <?php endif;?>
</body>
</html>