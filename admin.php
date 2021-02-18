<?php 
    
    /// On prend pg venant de : formulaireEtudiant.php
    /// si pg==VIDE, on affiche le formaulaire d'insertion des étudiants

    if (!empty($_GET["session"])) 
    {
        echo '<a href="?pgAdmin=pgEt">Insertion étudiant</a><br>';
        echo '<a href="?pgAdmin=pgProf">Insertion prof</a>';
    }
    else 
    {
        if (!empty($_GET["pgAdmin"])) 
        {
            $page = $_GET["pgAdmin"];
    
            if ($page == "pgEt") 
            {
                if (!empty($_GET["pg"])) 
                {
                    $action= $_GET["pg"];
                    if ($action=="listeEt") 
                    {
                        require_once("views/admin/listeEtudiant.php");
                    }
                }
                else
                {
                    if (!empty($_GET["erreur"])) 
                    {
                        $erreur= $_GET["erreur"];
                        if ($erreur=="err") 
                        {
                            require_once("views/admin/listeEtudiant.php");
                            echo "<p style='color:red'>Erreur d'insertion</p>";
                        }
                    }
                    else {
                        require_once('views/admin/formulaireEtudiant.php');
                    }
                }
            }
            // elseif ($page == "pgProf") {
                
            // }
            
        }
    }
    

    
    
    
?>