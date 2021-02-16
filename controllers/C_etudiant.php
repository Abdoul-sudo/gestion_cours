<?php 
    require_once('../models/M_etudiant.php');
    class C_ETUDIANT
    {

        public function C_insertionEt()
        {
            
            if (isset($_POST['nom']) && isset($_POST['prenom']) && isset($_POST['email']) && isset($_POST['mdp']) && isset($_POST['tel']) && isset($_POST['img'])) {
                $nomEt = $_POST['nom'];
                $prenomEt = $_POST['prenom'];
                $emailEt = $_POST['email'];
                $mdpEt = $_POST['mdp'];
                $telEt = $_POST['tel'];
                $imgEt = $_POST['img'];

                $etudiant = new M_ETUDIANT;
                $ajoutEt = $etudiant -> M_insertionEt($nomEt, $prenomEt, $telEt, $emailEt, $mdpEt, $imgEt);
                header("location:../views/admin/formulaireEtudiant.php");
            }
            else {
                header("location:../views/admin/echec.php");
            }
        }

        public function C_listeEt()
        {

            $etudiant = new M_ETUDIANT;
            $listeEt = $etudiant -> M_listeEt();

            for ($i=0; $i < $tab ; $i++) { 
                echo "<td>".$idEt[$i]."</td>";
                echo "<td>".$nomEt[$i]."</td>";
                echo "<td>".$prenomEt[$i]."</td>";
                echo "<td>".$emailEt[$i]."</td>";
                echo "<td>".$telEt[$i]."</td>";
            }
        }

    }
    
?>