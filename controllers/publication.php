<?php
    class managePub
    {
        public function takeCoursPub($idProf) 
        {
            require_once ("models/publication.php");
            require_once ("models/cours.php");

            $np = new Cours;
            $cours = $np -> getCoursid($idProf);

            require_once("views/public/publication.php");// appelle le formulaire update pour y placer les placeholder
        }

        public function insererPub()
        {
            require_once ("../models/publication.php");

            if(isset($_POST['titre']) && isset($_POST['contenu']) && isset($_POST['id_prof']) && isset($_POST['cours']))
            {
                $titre = $_POST['titre'];
                $contenu = htmlspecialchars ($_POST['contenu']);
                $id_prof = $_POST['id_prof'];
                $cours = $_POST['cours'];
                //$typePub = $_POST['type_pub'];
                $date = date ('y-m-d h:i:s', time());

                $pub= new publicationCours;
            $tab = $pub -> insertPublication($titre, intval($cours), intval($id_prof), $contenu, $date/*, $typePub*/);
                header('location: ../admin.php?pgPublic=messProf&pg=showMprof&pg2='.$cours);
            }
        }

        

        public function takeCoursChoix() 
        {
            require_once ("models/publication.php");

            require_once ("models/cours.php");
            $np = new Cours;
            $cours = $np -> getCours();
            require_once("views/public/choixCoursPubli.php");// appelle le formulaire update pour y placer les placeholder
        }

        public function postCoursChoix()
        {
            if (isset($_POST["cours"])) {
                $idCours = $_POST["cours"];
                $type = $_POST["type"];
                header('Location:../admin.php?pgPublic=messProf&pg=showMprof&pg2='.$idCours.'&type='.$type);
            }
        }

        public function afficherMessage($cours/*, $typePub*/)
        {
            require_once ("models/publication.php");
            $pub = new publicationCours;
        $toutPub = $pub->selectPublication($cours/*, $typePub*/);

            foreach ($toutPub as $value) 
            {
                echo "<div>";
                    echo "<tr>";
                        echo '<th collspan="3">'.$value['nom_cours']."<th>";
                    echo "</tr>";
                    echo "<tr>";
                        echo '<td collspan="3">PROFESSEUR: '.$value['nom_professeur']."<td>";
                    echo "</tr>";
                    echo "<tr>";
                        /*echo "<td>".$value['type_pub']."<td>";*/
                        echo '<td collspan="2">'.$value['titre_pub']."<td>";
                        echo "<td>".$value['date_pub']."<td>";
                    echo "</tr>";
                    echo "<tr>";
                        echo '<td collspan="3">'.$value['contenu_pub']."<td>";
                    echo "</tr>";
                echo "</div><br><br>";

                // echo "<tr>";
                //     echo "<td>".$value['nom_cours']."</td>";
                //     echo "<td>".$value['nom_professeur']."</td>";
                //     echo "<td>".$value['titre_pub']."</td>";
                //     echo "<td>".$value['contenu_pub']."</td>";
                //     echo "<td>".$value['date_pub']."</td>";
                //     //echo "<td>".$value['type_pub']."</td>";
                // echo "</tr>";
            }
        }
    }

    if (!empty($_GET["action"])) {
        $action= $_GET["action"];
        if ($action == "inserer") {
            $tab= new managePub;
            $tabs=$tab->insererPub();
        }
        elseif ($action == "getidCours") {
            $tab= new managePub;
            $tabs=$tab->postCoursChoix();
        }
    }
?>