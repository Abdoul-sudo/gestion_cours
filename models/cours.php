<?php
    require_once("connect.php");
    class Cours extends Database
    {
        public function getCours()
        {
            $bdd = $this -> dbConnect();
            $sql = $bdd->prepare('SELECT nom_cours, categorie.designation_cat, professeur.nom_professeur FROM cours JOIN categorie ON cours.id_cat=categorie.id_cat JOIN professeur ON cours.id_professeur=professeur.id_professeur');

            $sql -> execute();
            $tab = $sql -> fetchall();
            return $tab;
        }
    }
?>