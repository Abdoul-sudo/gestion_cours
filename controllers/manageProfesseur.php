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

            if (!empty($_GET["pgAdmin"])) 
            {
                if ($_GET["pgAdmin"] == "pgProf") 
                {
                    foreach ($listeEt as $val) 
                    {
                        echo "<tr>";
                            echo "<td>".$val['id_professeur']."</td>";
                            echo "<td>".strtoupper($val['nom_professeur'])."</td>";
                            echo "<td>".ucwords($val['prenom_professeur'])."</td>";
                            echo "<td>".$val['email_professeur']."</td>";
                            echo "<td>".$val['tel_professeur']."</td>";
                            echo "<td>".'<img src="assets/images/professeur/'. $val['image_professeur'] .'" height=100 width=100 >'."</td>";
                            echo '<td> 
                                    <div><a class="btn" href="admin.php?pgAdmin=pgProf&pg=listeProf&modif='.$val['id_professeur'].'">MODIFIER</a></div><br>
                                    <div><a class="btn" href="admin.php?pgAdmin=pgProf&pg=listeProf&act='.$val['id_professeur'].'">EFFACER</a></div>
                                </td>';
                        echo"</tr>";
                    }
                }
            } 
            else {
                foreach ($listeEt as $val) 
                    {
                        echo "<tr>";
                            echo "<td>".$val['id_professeur']."</td>";
                            echo "<td>".strtoupper($val['nom_professeur'])."</td>";
                            echo "<td>".ucwords($val['prenom_professeur'])."</td>";
                            echo "<td>".$val['email_professeur']."</td>";
                            echo "<td>".$val['tel_professeur']."</td>";
                            echo "<td>".'<img src="assets/images/professeur/'. $val['image_professeur'] .'" height=100 width=100 >'."</td>";
                        echo"</tr>";
                    }
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
        
        
    }


    if (!empty($_GET["action"])) {
        $action= $_GET["action"];
        if ($action == "insert") {
            $a= new ManageProfesseur;
            $i=$a->insertProfesseur();
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