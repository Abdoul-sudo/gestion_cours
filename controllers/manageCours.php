<?php
    class ManageCours
    {
        // permet de lister les cours avec sa catégorie et le professeur qui l'enseigne
        //appelée dans listeCours.php
        public function listerCours() 
        {
            require_once("models/cours.php"); 
            $cours = new Cours;
            $listeCours = $cours -> getCours();

            if (!empty($_GET["pgAdmin"])) {
                if ($_GET["pgAdmin"] == "pgCours") 
                {
                    // affichage cours avec modification et suppression pour ADMIN
                    foreach ($listeCours as $value) 
                    {
                        echo "<tr>";
                            echo "<td>".$value['nom_cours']."</td>";
                            echo "<td>".$value['nom_professeur'].' '.$value['prenom_professeur']."</td>";
                            echo "<td>".$value['designation_cat']."</td>";
                            echo '<td> 
                            <div><a href="admin.php?pgAdmin=pgCours&pg=listeCours&modif='.$value['id_cours'].'">MODIFIER</a></div><br>
                            <div><a href="admin.php?pgAdmin=pgCours&pg=listeCours&act='.$value['id_cours'].'">EFFACER</a></div>
                          </td>';
                        echo"</tr>";
                    }
                }
            }
            else 
            {
                // affichage cours normal pour PUBLIC
                foreach ($listeCours as $value) 
                    {
                    echo "<tr>";
                        echo "<td>".$value['nom_cours']."</td>";
                        echo "<td>".$value['nom_professeur']."</td>";
                        echo "<td>".$value['designation_cat']."</td>";
                    echo"</tr>";
                    }
            }   
        }

        // permet d'afficher les choix du <select> dans formulaireCours.php
        public function formCours() 
        {
            require_once("models/user.php");
            $np = new User;
            $takeid = $np -> listUser('professeur');
            require_once("views/admin/formulaireCours.php");
        }

        // insertion cours   // appelée en bas de ce fichier
        public function insCoursC()  
        {
            require_once("../models/user.php");
            if (isset($_POST['cours']) && isset($_POST['prof']) && isset($_POST['categorie'])) {
                $cours = $_POST['cours'];
                $idP = $_POST['prof'];
                $idCat = $_POST['categorie'];

                $user = new User;
                $j = $user -> insCours($cours, $idCat, $idP);
                header("Location:../admin.php?pgAdmin=pgCours&pg=listeCours");

            }
        }

        // sert à SELECT la ligne qu'on veut modifier  
        // appelée dans admin.php
        public function takeCours($id) 
        {
            require_once("models/cours.php");
            require_once("models/user.php");
            $np = new User;
            $takeid = $np -> listUser('professeur');

            $et = new Cours;
            $modif = $et -> takeCours('cours', $id);
            foreach ($modif as $value) 
            {
                $id = $value['id_cours'];
                $nom = $value['nom_cours'];
            }
            require_once("views/admin/modifCours.php");// appelle le formulaire update pour y placer les placeholder
        }

        // sert à modifier un cours dans la liste des cours
        // applée en bas de ce fichier
        public function updateCoursC()
        {
            require_once("../models/cours.php");
            
            if (isset($_POST['cours']) && isset($_POST['prof']) && isset($_POST['categorie']) ) {
                $id = $_POST['id'];
                $cours = $_POST['cours'];
                $idProf = $_POST['prof'];
                $idCat = $_POST['categorie'];

                $professeur = new Cours;
                $modEt = $professeur -> updateCours("cours", $id, $idCat, $idProf, $cours);
                header("location:../admin.php?pgAdmin=pgCours&pg=listeCours");
            }
            else {
                header("location:../admin.php?pgAdmin=pgCours&erreur=err2");
            }
        }
    }


    if (!empty($_GET["action"])) { 
        $action= $_GET["action"];
        if ($action == "insCours")  //$_GET["action"] provient de formulaireCours.php
        { 
            $a= new ManageCours;
            $i=$a->insCoursC();
        }
    }

    if (!empty($_GET["update"])) 
    {
        $upd=$_GET["update"];
        if ($upd=="update")   //$_GET["update"] provient de modifCours.php
        {
            $smth= new ManageCours;
            $mod= $smth -> updateCoursC();
        }
    }


?>