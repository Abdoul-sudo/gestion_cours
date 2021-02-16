<?php 
    require('./models/etudiant.php');

    function C_insertion()
    {
        if (isset($_POST['nom_etudiant']) && isset($_POST['prenom_etudiant']) && isset($_POST['email_etudiant']) && isset($_POST['mdp_etudiant']) && isset($_POST['tel_etudiant']) && isset($_POST['image_etudiant'])) {
            $nomEt = $_POST['nom_etudiant'];
            $prenomEt = $_POST['prenom_etudiant'];
            $emailEt = $_POST['email_etudiant'];
            $mdpEt = $_POST['mdp_etudiant'];
            $telEt = $_POST['tel_etudiant'];
            $imgEt = $_POST['image_etudiant'];

            $etudiant = new ETUDIANT;
            $ajoutEt = $etudiant -> insertion($nomEt, $prenomEt, $telEt, $emailEt, $mdpEt, $imgEt);
            header("location:../views/admin/listeEtudiant.php");
        }
        else {
            header("location:../views/admin/echec.php");
        }
    }
    C_insertion();
?>