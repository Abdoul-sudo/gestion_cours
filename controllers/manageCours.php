<?php
    class ManageCours
    {
        public function listerCours() 
        {
            require_once("models/cours.php"); 
            $cours = new Cours;
            $listeCours = $cours -> getCours();

            if (!empty($_GET["pgAdmin"])) {
                if ($_GET["pgAdmin"] == "pgCours") 
                {
            ######################## ETO NO APIANAO MODIFIER SY SUPPRIMER ###############################################
            ######################## ATAOVY <td> solon'ireo aaaa sy bbbb ireo  ###############################################

                    // affichage cours avec modification et suppression
                    foreach ($listeCours as $value) 
                    {
                        echo "<tr>";
                            echo "<td>".$value['nom_cours']."</td>";
                            echo "<td>".$value['nom_professeur']."</td>";
                            echo "<td>".$value['designation_cat']."</td>";
                            echo "<td> aaaaaaaaaaaaaaaaaa </td>";
                            echo "<td> bbbbbbbbbbbbbbbbbbbb </td>";
                        echo"</tr>";
                    }
                }
            }
            else 
            {
                // affichage cours normal
                foreach ($listeCours as $value) 
                    {
                    echo "<tr>";
                        echo "<td>".$value['nom_cours']."</td>";
                        echo "<td>".$value['nom_professeur']."</td>";
                        echo "<td>".$value['designation_cat']."</td>";
                    echo"</tr>";
                    }
            }
            
            
        }
    }
?>