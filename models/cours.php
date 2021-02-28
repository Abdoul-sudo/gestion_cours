<?php
    require_once("connect.php");
    class Cours extends Database
    {
        public function getCours()
        {
            $bdd = $this -> dbConnect();
            $sql = $bdd->prepare('
                SELECT cours.id_cours, cours.nom_cours, categorie.designation_cat,
                professeur.nom_professeur, professeur.prenom_professeur
                FROM cours JOIN categorie ON cours.id_cat=categorie.id_cat
                JOIN professeur 
                ON cours.id_professeur=professeur.id_professeur
            ');

            $sql -> execute();
            $tab = $sql -> fetchall();
            return $tab;
        }
        public function getCoursesList($status, $id)
        {
            $db = dbConnect();
            $q = $db->prepare('
                    SELECT cat.id_cat, cat.designation_cat categorie, c.id_cours, c.nom_cours cours
                    FROM categorie cat
                    JOIN cours c
                    JOIN apprendre a
                    JOIN etudiant e
                    ON c.id_cours = cat.id_cat 
                    AND a.id_cours = c.id_cours
                    AND e.id_etudiant = a.id_etudiant
                    WHERE e.id_etudiant = ?
                ');
            $q->execute(array($id));
            $tab = $q->fetchall();
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

        public function getCoursid($idProf)
        {
            $bdd = $this -> dbConnect();
            $sql = $bdd->prepare('SELECT cours.id_cours, cours.nom_cours, categorie.designation_cat, professeur.nom_professeur, professeur.prenom_professeur FROM cours JOIN categorie ON cours.id_cat=categorie.id_cat JOIN professeur ON cours.id_professeur=professeur.id_professeur WHERE professeur.id_professeur= ?');

            $sql -> execute(array($idProf));
            $tab = $sql -> fetchall();
            return $tab;
        }

    }
?>