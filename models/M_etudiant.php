<?php 
    require_once("connect.php");


    class  M_ETUDIANT extends DB_CONNECT
    {
        public function M_insertionEt($nom, $prenom, $tel, $email, $mdp, $img)
        {
            $bdd= $this->dbConnect();
            $sql = $bdd->prepare("INSERT INTO etudiant (nom_etudiant, prenom_etudiant, email_etudiant, mdp_etudiant, tel_etudiant, image_etudiant) VALUES (?, ?, ?, ?, ?, ?)");
            $mdp_hash = password_hash($mdp, PASSWORD_DEFAULT);
            $sql->execute(array($nom, $prenom, $email, $mdp_hash, $tel, $img));
        }

        public function M_listeEt()
        {
            $bdd = $this -> dbConnect();
            $sql = $bdd->prepare("SELECT id_etudiant, nom_etudiant, prenom_etudiant, email_etudiant, tel_etudiant, image_etudiant FROM etudiant");
            
            $sql -> execute(); 
            $tab = $sql -> fetchall();
            return $tab;
        }
    }
    