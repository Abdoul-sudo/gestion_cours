<?php 
    require_once("connect.php");


    class ETUDIANT extends DB_CONNECT
    {
        public function insertion($nom, $prenom, $tel, $email, $mdp, $img)
        {
            $bdd= $this -> dbConnect();
            $sql = $bdd -> prepare ("INSERT INTO etudiant (nom_etudiant, prenom_etudiant, email_etudiant, mdp_etudiant, tel_etudiant, image_etudiant) VALUES (?, ?, ?, SHA1(?), ?, ?)")
            $sql -> execute(array($nom, $prenom, $email, $mdp, $tel, $img))
        }
    }
    
?>