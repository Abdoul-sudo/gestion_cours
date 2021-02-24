<?php

    class ManageProfesseur
    {
        public function insertProfesseur()
        {
            require_once("../models/user.php");

            if (isset($_POST['nom']) && isset($_POST['prenom']) && isset($_POST['email']) && isset($_POST['mdp']) && isset($_POST['tel']) && isset($_POST['img'])) {
                $nomProf = $_POST['nom'];
                $prenomProf = $_POST['prenom'];
                $emailProf = $_POST['email'];
                $mdpProf = $_POST['mdp'];
                $telProf = $_POST['tel'];
                $imgProf = $_POST['img'];

                $professeur = new User;
                $ajoutProf = $professeur -> insertUser('professeur', $nomProf, $prenomProf, $telProf, $emailProf, $mdpProf, $imgProf);
                //header("location:../admin.php?session=admin");
                header("Location:../admin.php?pgAdmin=pgProf&pg=listeProf");
            }
            else {
                header("location:../admin.php?pgAdmin=pgProf&erreur=err");
            }
        }

        public function listProfesseur() //appelée dans listeEtudiant.php
        {
            require_once("models/user.php"); //considéré comme dans admin.php car listeEtudiant.php est appelée dans admin.php

            $professeur = new User;
            $listeEt = $professeur -> listUser('professeur');
            foreach ($listeEt as $val) 
            {
                echo "<tr>";
                    echo "<td>".$val['id_professeur']."</td>";
                    echo "<td>".$val['nom_professeur']."</td>";
                    echo "<td>".$val['prenom_professeur']."</td>";
                    echo "<td>".$val['email_professeur']."</td>";
                    echo "<td>".$val['tel_professeur']."</td>";
                    echo "<td>".'<img src="assets/images/professeur/'. $val['image_professeur'] .'" height=100 width=100 >'."</td>";
                    //echo '<img src="image/' . $data["image"] . '">';
                    echo '<td> 
                            <div><a href="admin.php?pgAdmin=pgProf&pg=listeProf&modif='.$val['id_professeur'].'">MODIFIER</a></div><br>
                            <div><a href="admin.php?pgAdmin=pgProf&pg=listeProf&act='.$val['id_professeur'].'">EFFACER</a></div>
                          </td>';
                echo"</tr>";
            }
        }

        public function takeProfesseur($id) // sert à SELECT la ligne qu'on veut modifier  // appelée dans admin.php
        {
            require_once("models/user.php");
            $et = new User;
            $modif = $et -> takeUser('professeur', $id);
            foreach ($modif as $val) 
            {
                $id = $val['id_professeur'];
                $nom = $val['nom_professeur'];
                $prenom = $val['prenom_professeur'];
                $email = $val['email_professeur'];
                $tel = $val['tel_professeur'];
            }
            // appelle le formulaire update pour placer les placeholder
            require_once("views/admin/modifProfesseur.php");
        }

        public function updateProfesseur()
        {
            require_once("../models/user.php");
            
            if (isset($_POST['id']) && isset($_POST['nom']) && isset($_POST['prenom']) && isset($_POST['email']) && isset($_POST['mdp']) && isset($_POST['tel']) && isset($_POST['img'])) {
                $id = $_POST['id'];
                $nomEt = $_POST['nom'];
                $prenomEt = $_POST['prenom'];
                $emailEt = $_POST['email'];
                $mdpEt = $_POST['mdp'];
                $telEt = $_POST['tel'];
                $imgEt = $_POST['img'];

                $professeur = new User;
                $modEt = $professeur -> updateUser('professeur', $id, $nomEt, $prenomEt, $telEt, $emailEt, $mdpEt, $imgEt);
                header("location:../admin.php?pgAdmin=pgProf&pg=listeProf");
            }
            else {
                header("location:../admin.php?pgAdmin=pgProf&erreur=err2");
            }
        }
        
        public function formCours()
        {
            require_once("models/user.php");
            $np = new User;
            $takeid = $np -> listUser('professeur');
            require_once("views/admin/insCours.php");
            //insCours($idCat, $idP)
        }

        public function insCoursC()
        {
            require_once("../models/user.php");
            if (isset($_POST['cours']) && isset($_POST['prof']) && isset($_POST['categorie'])) {
                $cours = $_POST['cours'];
                $idP = $_POST['prof'];
                $idCat = $_POST['categorie'];

                $user = new User;
                $j = $user -> insCours($cours, $idCat, $idP);

            }
        }
    }


    if (!empty($_GET["action"])) {
        $action= $_GET["action"];

        if ($action == "insert") {
            $a= new ManageProfesseur;
            $i=$a->insertProfesseur();
        }
        elseif ($action == "insCours") {
            $a= new ManageProfesseur;
            $i=$a->insCoursC();
        }
    }

    if (!empty($_GET["update"])) 
    {
        $upd=$_GET["update"];
        if ($upd=="update") 
        {
            $smth= new ManageProfesseur;
            $mod= $smth -> updateProfesseur();
        }
    }
    

    
?>