<?php
    class ManageCours
    {
        public function listerCours() 
        {
            require_once("models/cours.php"); 
            $cours = new Cours;
            $listeCours = $cours -> getCours();

            if (!empty($_GET["pgAdmin"])) {
                if ($_GET["pgAdmin"] == "pgCours") 
                {
            ######################## ETO NO APIANAO MODIFIER SY SUPPRIMER ###############################################
            ######################## ATAOVY <td> solon'ireo aaaa sy bbbb ireo  ###############################################

                    // affichage cours avec modification et suppression
                    foreach ($listeCours as $value) 
                    {
                        echo "<tr>";
                            echo "<td>".$value['nom_cours']."</td>";
                            echo "<td>".$value['nom_professeur']."</td>";
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
                // affichage cours normal
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

        public function takeCours($id) // sert à SELECT la ligne qu'on veut modifier  // appelée dans admin.php
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
            // appelle le formulaire update pour placer les placeholder
            require_once("views/admin/modifCours.php");
        }

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

    if (!empty($_GET["update"])) 
    {
        $upd=$_GET["update"];
        if ($upd=="update") 
        {
            $smth= new ManageCours;
            $mod= $smth -> updateCoursC();
        }
    }
?>