<?php
    require_once("connect.php");
    class publicationCours extends Database
    {
        public function insertPublication($titre, $id_cours, $id_professeur, $contenu, $date/*, $typePub*/)
        {
            $bdd = $this -> dbConnect();
            $sql = $bdd -> prepare ("INSERT INTO publicationcours(titre_pub, id_cours, id_professeur, contenu_pub, date_pub/*, type_pub*/) 
            VALUES (?, ?, ?, ?, ?/*?*/)");
            $sql -> execute(array($titre,  $id_cours, $id_professeur, $contenu, $date/*, $typePub*/));
        }

        public function selectPublication($id_cours/*, $typePub*/)
        {
            $bdd = $this -> dbConnect();
            $sql = $bdd ->prepare('SELECT titre_pub, cours.nom_cours, professeur.nom_professeur, contenu_pub, date_pub/*, type_pub*/
            FROM publicationcours 
            JOIN cours ON publicationcours.id_cours=cours.id_cours
            JOIN professeur ON publicationcours.id_professeur=professeur.id_professeur
            WHERE cours.id_cours = ? /*AND publicationcours.type_pub= ?*/
            ORDER BY date_pub DESC');

        $sql -> execute (array(intval($id_cours)/*, $typePub*/));
            $tab = $sql -> fetchall();
            return $tab;
        }

    }
?>