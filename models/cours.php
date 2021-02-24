<?php
    require_once("connect.php");
    class Cours extends Database
    {
        public function getCours($cours, $professeur, $categorie)
        {
            $bdd = $this -> dbConnect();
            $sql = $bdd->prepare('SELECT nom_cours, categorie.designation_cat, professeur.nom_professeur FROM cours JOIN categorie ON cours.id_categorie=categorie.id_categorie JOIN professeur ON cours.id_professeur=professeur.id_professeur');

            $sql -> execute();
            $tab = $sql -> fetchall();
            return $tab;
        }
    }
?>