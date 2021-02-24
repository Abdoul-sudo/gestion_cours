<?php
    class ManageCours
    {
        public function listerCours() 
        {
            require_once("models/cours.php"); 
            $cours = new Cours;
            $listeCours = $cours -> getCours();
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
?>