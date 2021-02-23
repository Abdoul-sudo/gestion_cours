<?php

    class ManageEtudiant
    {
        public function insertEtudiant()
        {
            require_once("../models/user.php");

            if (isset($_POST['nom']) && isset($_POST['prenom']) && isset($_POST['email']) && isset($_POST['mdp']) && isset($_POST['tel']) && isset($_POST['img'])) {
                $nomEt = $_POST['nom'];
                $prenomEt = $_POST['prenom'];
                $emailEt = $_POST['email'];
                $mdpEt = $_POST['mdp'];
                $telEt = $_POST['tel'];
                $imgEt = $_POST['img'];

                $etudiant = new User;
                $ajoutEt = $etudiant -> insertUser('etudiant', $nomEt, $prenomEt, $telEt, $emailEt, $mdpEt, $imgEt);
                //header("location:../admin.php?session=admin");
                header("Location:../admin.php?pgAdmin=pgEt&pg=listeEt");
            }
            else {
                header("location:../admin.php?pgAdmin=pgEt&erreur=err");
            }
        }

        public function listEtudiant() //appelée dans listeEtudiant.php
        {
            require_once("models/user.php"); //considéré comme dans admin.php car listeEtudiant.php est appelée dans admin.php

            $etudiant = new User;
            $listeEt = $etudiant -> listUser('etudiant');
            foreach ($listeEt as $val) 
            {
                echo "<tr>";
                    echo "<td>".$val['id_etudiant']."</td>";
                    echo "<td>".$val['nom_etudiant']."</td>";
                    echo "<td>".$val['prenom_etudiant']."</td>";
                    echo "<td>".$val['email_etudiant']."</td>";
                    echo "<td>".$val['tel_etudiant']."</td>";
                    echo "<td>".'<img src="assets/images/etudiant/'. $val['image_etudiant'] .'" height=100 width=100 >'."</td>";
                    echo '<td> 
                            <div><a href="admin.php?pgAdmin=pgEt&pg=listeEt&modif='.$val['id_etudiant'].'">MODIFIER</a></div><br>
                            <div><a href="admin.php?pgAdmin=pgEt&pg=listeEt&act='.$val['id_etudiant'].'">EFFACER</a></div>
                          </td>';
                    echo"</tr>";
            }
        }

        public function takeEtudiant($id) // sert à SELECT la ligne qu'on veut modifier  // appelée dans admin.php
        {
            require_once("models/user.php");
            $et = new User;
            $modif = $et -> takeUser('etudiant', $id);
            foreach ($modif as $val) 
            {
                $id = $val['id_etudiant'];
                $nom = $val['nom_etudiant'];
                $prenom = $val['prenom_etudiant'];
                $email = $val['email_etudiant'];
                $tel = $val['tel_etudiant'];
            }
            // appelle le formulaire update pour placer les placeholder
            require_once("views/admin/modifEtudiant.php");
        }

        public function updateEtudiant()
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

                $etudiant = new User;
                $modEt = $etudiant -> updateUser('etudiant', $id, $nomEt, $prenomEt, $telEt, $emailEt, $mdpEt, $imgEt);
                header("location:../admin.php?pgAdmin=pgEt&pg=listeEt");
            }
            else {
                header("location:../admin.php?pgAdmin=pgEt&erreur=err2");
            }
        }
    }


    if (!empty($_GET["action"])) {
        $action= $_GET["action"];

        if ($action == "insert") {
            $a= new ManageEtudiant;
            $i=$a->insertEtudiant();
        }
    }

    if (!empty($_GET["update"])) 
    {
        $upd=$_GET["update"];
        if ($upd=="update") 
        {
            $smth= new ManageEtudiant;
            $mod= $smth -> updateEtudiant();
        }
    }
    

    
?>