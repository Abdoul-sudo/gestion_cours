<?php
    class managePub
    {
        require once ("../models/publication.php");
        
        public function insererPub()
        {

            if(isset($_POST['$titre']) && isset($_POST['$contenu']) && isset($_POST['$id_prof']) && isset($_POST['$cours']))
            {
                $titre = $_POST['titre'];
                $contenu = htmlspecialchars ($_POST['contenu'];
                $id_prof = $_POST['$id_prof'];
                $cours = $_POST['$cours'];
                $date = date ('y-m-d h:i:s', time());


                $pub= new publicationCours;
                $tab = $pub -> insertPublications($titre, $cours, $id_prof, $contenu, $date);
                header("location: views/public/affichagePub.php");
            }
        }

        public function afficherMessage($id_cours)
        {
            

            $pub = new publicationCours;
            $toutPub = $pub -> selectPublication($id_cours);

            foreach ($toutPub as $value) 
            {
                echo $value['titre_pub'];
                echo $value['cours.nom_cours'];
                echo $value['professeur.nom_professeur'];
                echo $value['contenu_pub'];
                echo $value['date_pub'];
            }
        }
    }

    if (!empty($_GET["action"])) {
        $action= $_GET["action"];
        if ($action == "inserer") {
            $tab= new managePub;
            $tabs=$tab->insererPub();
        }
    }
?>