<?php
    require_once("connect.php");
    class publicationCours extends Database
    {
        public function insertPublication($titre, $id_cours, $id_professeur, $contenu, $date)
        {
            $bdd = $this -> dbConnect();
            $sql = $bdd -> prepare ("INSERT INTO publicationcours (titre_pub, id_professeur, id_cours, contenu_pub, date_pub) 
            VALUES (?, ?, ?, ?, ?, ?)");
            $sql -> execute(array($titre, $id_cours, $id_professeur, $contenu, $date));
        }

        public function selectPublication($id_cours)
        {
            $bdd = $this -> dbConnect();
            $sql = $bdd ->prepare('SELECT titre_pub, cours.nom_cours, professeur.nom_professeur, contenu_pub, date_pub 
            FROM publicationcours 
            JOIN cours ON publicationcours.id_cours=cours.id_cours
            JOIN professeur ON publicationcours.id_professeur=professeur.id_professeur
            WHERE id_cours = ?
            ORDER BY date_pub DESC');

            $sql -> execute (array($id_cours));
            $tab = $sql -> fetchall();
            return $tab;
        }

    }
?>