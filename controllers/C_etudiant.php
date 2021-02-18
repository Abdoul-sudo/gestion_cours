<?php

    class C_ETUDIANT
    {
        public function C_insertionEt()
        {
            require_once("../models/M_etudiant.php");

            if (isset($_POST['nom']) && isset($_POST['prenom']) && isset($_POST['email']) && isset($_POST['mdp']) && isset($_POST['tel']) && isset($_POST['img'])) {
                $nomEt = $_POST['nom'];
                $prenomEt = $_POST['prenom'];
                $emailEt = $_POST['email'];
                $mdpEt = $_POST['mdp'];
                $telEt = $_POST['tel'];
                $imgEt = $_POST['img'];

                $etudiant = new M_ETUDIANT;
                $ajoutEt = $etudiant -> M_insertionEt($nomEt, $prenomEt, $telEt, $emailEt, $mdpEt, $imgEt);
                header("location:../admin.php");
            }
            else {
                header("location:../views/admin/listeEtudiant.php");
            }
        }

        public function C_listeEt()
        {
            require_once("models/M_etudiant.php");

            $etudiant = new M_ETUDIANT;
            $listeEt = $etudiant -> M_listeEt();

            foreach ($listeEt as $val) {
                echo "<tr>";
                echo "<td>".$val['id_etudiant']."</td>";
                echo "<td>".$val['nom_etudiant']."</td>";
                echo "<td>".$val['prenom_etudiant']."</td>";
                echo "<td>".$val['email_etudiant']."</td>";
                echo "<td>".$val['tel_etudiant']."</td>";
                echo "<td>".'<img src="assets/images/etudiant/'. $val['image_etudiant'] .'" height=100 width=100 >'."</td>";
                //echo '<img src="image/' . $data["image"] . '">';

                echo"</tr>";
                
            }
        }
    }


    if (!empty($_GET["action"])) {
        $action= $_GET["action"];

        if ($action=="insert") {
        $a= new C_ETUDIANT;
        $i=$a->C_insertionEt();
        }
    }
?>