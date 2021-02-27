<?php session_start();?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menu2</title>

    <link rel="stylesheet" href="assets/css/navbar3.css">


</head>
<body>
    <?php if ($_SESSION["admin"]): ?>
        
            <nav>
                <ul>
                <?php if ($_SESSION['status'] == 'professeur'): ?> 
                    <li id="logo"><?php echo '<img src="assets/images/professeur/'. $_SESSION['image'].'"  height=58 width=58  >';?></li>
                <?php elseif($_SESSION['status'] == 'etudiant'): ?>
                    <li id="logo"><?php echo '<img src="assets/images/etudiant/'. $_SESSION['image'].'"  height=58 width=58  >';?></li>
                <?php endif; ?> 

                <?php if ($_SESSION['status'] == 'etudiant'): ?>
                    <li class="menuAc"><a href="views/public/etudiant.php">Accueil</a></li>
                <?php elseif ($_SESSION['status'] == 'professeur'): ?> 
                    <li class="menuAc"><a href="views/public/professeur.php">Accueil</a></li>
                <?php endif; ?>
                   
                    <li class="menuIns">
                        <span> Insertion</span>
                        <ul class="submenu"> 
                            <li><a  href="admin.php?pgAdmin=pgEt">Insertion Etudiant</a></li>
                            <li><a href="admin.php?pgAdmin=pgProf">Insertion professeur</a></li>
                            <li><a href="admin.php?pgAdmin=pgProf&pg=insertCours"> Insertion cours</a></li>
                        </ul>
                    </li>
                    
                    <li class="menuLi">
                        <span>Liste</span>
                        <ul class="submenu">
                            <li><a href="admin.php?pgAdmin=pgEt&pg=listeEt"> Liste des étudiants </a></li>
                            <li><a href="admin.php?pgAdmin=pgProf&pg=listeProf"> Liste des professeurs </a></li>
                            <li><a href="admin.php?pgAdmin=pgCours&pg=listeCours">Liste des cours</a></li>
                        </ul>
                    </li>

                    <?php if ($_SESSION['status'] == 'professeur'): ?> 
                        <span>Publication</span>
                        <li class="menuPub">
                            <ul class="submenu">
                                <li><a href="admin.php?pgPublic=messProf&pg=insMprof&id=<?php echo $_SESSION['id']; ?>">Publier message</a></li>
                                <li><a href="admin.php?pgPublic=messProf&pg=showMprof&pg1=choixCours">Publications</a></li>
                            </ul>
                        </li>
                    <?php elseif ($_SESSION['status'] == 'etudiant'): ?>
                        <span>Publication</span>
                        <li class="menuPub">
                            <ul class="submenu">
                                <li><a href="admin.php?pgPublic=messProf&pg=showMprof&pg1=choixCours">Publications professeurs</a></li>
                            </ul>
                        </li>
                    <?php endif; ?> 

                    <li class="menuDec"><a href="controllers/logout.php">Deconnexion</a></li>

                </ul>
            </nav>

    <?php else:?>
            <nav>
                <ul>
                    <?php if ($_SESSION['status'] == 'professeur'): ?> 
                        <li id="logo"><?php echo '<img src="assets/images/professeur/'. $_SESSION['image'].'"  height=58 width=58  >';?></li>
                    <?php elseif($_SESSION['status'] == 'etudiant'): ?>
                        <li id="logo"><?php echo '<img src="assets/images/etudiant/'. $_SESSION['image'].'"  height=58 width=58  >';?></li>
                    <?php endif; ?> 

                    <li class="menuLi">
                        <span>Liste</span>
                        <ul class="submenu">
                            <li><a href="admin.php?pgPublic=pgEtudiant"> Liste des étudiants </a></li>
                            <li><a href="admin.php?pgPublic=pgProfesseur"> Liste des professeurs </a></li>
                            <li><a href="admin.php?pgPublic=pgCours">Liste des cours</a></li>
                            <li><a href="">Liste publication</a></li>
                        </ul>
                    </li>

                    <?php if ($_SESSION['status'] == 'professeur'): ?> 
                        <span>Publication</span>
                        <li class="menuPub">
                            <ul class="submenu">
                                <li><a href="admin.php?pgPublic=messProf&pg=insMprof&id=<?php echo $_SESSION['id']; ?>">Publier message</a></li>
                                <li><a href="admin.php?pgPublic=messProf&pg=showMprof&pg1=choixCours">Publications</a></li>
                            </ul>
                        </li>
                    <?php elseif ($_SESSION['status'] == 'etudiant'): ?>
                        <span>Publication</span>
                        <li class="menuPub"> 
                            <ul class="submenu">
                                <li><a href="admin.php?pgPublic=messProf&pg=showMprof&pg1=choixCours">Publications professeurs</a></li>
                            </ul>
                        </li>
                    <?php endif; ?> 

                    <li class="menuDec"><a href="controllers/logout.php">Deconnexion</a></li>

                </ul>
            </nav>
    <?php endif;?>
</body>
</html>