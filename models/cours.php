<?php
    require_once("connect.php");
    class Cours extends Database
    {
        public function getCours()
        {
            $bdd = $this -> dbConnect();
            $sql = $bdd->prepare('SELECT id_cours, nom_cours, categorie.designation_cat, professeur.nom_professeur FROM cours JOIN categorie ON cours.id_cat=categorie.id_cat JOIN professeur ON cours.id_professeur=professeur.id_professeur');

            $sql -> execute();
            $tab = $sql -> fetchall();
            return $tab;
        }

        public function takeCours($status, $id)
        {
            $bdd = $this -> dbConnect();
            $sql = $bdd -> prepare ('SELECT id_'.$status.', nom_'.$status.' FROM '.$status.' WHERE id_'.$status.'= ?');
            $sql -> execute(array($id)); 
            $tab = $sql -> fetchall();
            return $tab;
        }

        public function updateCours($status, $id, $idCat, $idProf, $nom)
        {
            $bdd= $this -> dbConnect();
            $sql = $bdd -> prepare ('UPDATE '.$status.' SET nom_'.$status.'= ?, id_cat=?, id_professeur= ? WHERE id_'.$status.'= ?');
            $sql -> execute(array($nom, $idCat, $idProf, $id));
        }
    }
?>