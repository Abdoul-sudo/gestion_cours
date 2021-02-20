<?php 
    require_once("connect.php");


    class  M_ETUDIANT extends Database
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
            $sql = $bdd -> prepare ("SELECT id_etudiant, nom_etudiant, prenom_etudiant, email_etudiant, tel_etudiant, image_etudiant FROM etudiant");

            $sql -> execute(); 
            $tab = $sql -> fetchall();
            return $tab;
        }

        public function M_modifEt($id, $nom, $prenom, $tel, $email, $mdp, $img)
        {
            $bdd= $this -> dbConnect();
            $sql = $bdd -> prepare ("UPDATE etudiant SET nom_etudiant= ?, prenom_etudiant= ?, email_etudiant= ?, mdp_etudiant= ?, tel_etudiant= ?, image_etudiant=? WHERE id_etudiant= ?");
            $mdp_hash = password_hash ($mdp, PASSWORD_DEFAULT);
            $sql -> execute(array($nom, $prenom, $email, $mdp_hash, $tel, $img, $id));
        }

        public function takeEt($id)
        {
            $bdd = $this -> dbConnect();
            $sql = $bdd -> prepare ("SELECT id_etudiant, nom_etudiant, prenom_etudiant, email_etudiant, tel_etudiant FROM etudiant WHERE id_etudiant= ?");
            $sql -> execute(array($id)); 
            $tab = $sql -> fetchall();
            return $tab;
        }
    }
<<<<<<< HEAD
?>
=======
    
>>>>>>> 094b2dbd4849f4f5dd66d0ff7a107e6ba23a4b19
