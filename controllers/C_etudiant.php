<?php 
    require('../models/M_etudiant.php');

    function C_insertion()
    {
        if (isset($_POST['nom']) && isset($_POST['prenom']) && isset($_POST['email']) && isset($_POST['mdp']) && isset($_POST['tel']) && isset($_POST['img'])) {
            $nomEt = $_POST['nom'];
            $prenomEt = $_POST['prenom'];
            $emailEt = $_POST['email'];
            $mdpEt = $_POST['mdp'];
            $telEt = $_POST['tel'];
            $imgEt = $_POST['img'];

            $etudiant = new ETUDIANT;
            $ajoutEt = $etudiant -> M_insertion($nomEt, $prenomEt, $telEt, $emailEt, $mdpEt, $imgEt);
            header("location:../views/admin/listeEtudiant.php");
        }
        else {
            header("location:../views/admin/echec.php");
        }
    }
    C_insertion();
?>