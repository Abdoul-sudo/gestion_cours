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
            // si pgAdmin==pgEt pour les liens en haut
            if ($page == "pgEt") 
            {
                if (!empty($_GET["pg"])) 
                {
                    // si on appuie sur le lien menant vers la liste dans formulaireEtudiant.php : pg=listeEt
                    $action= $_GET["pg"];
                    if ($action=="listeEt") 
                    {
                        // si on appuie sur effacer dans la liste
                        if (!empty($_GET["act"])) 
                        {
                            $act = $_GET["act"];
                            require_once("models/getUser.php");
                            $stat = new M_USER;
                            $del = $stat -> delUser('etudiant', $act);
                            header("location:admin.php?pgAdmin=pgEt&pg=listeEt");
                        }
                        else 
                        {   // si on appuie sur modifier dans la liste
                            if (!empty($_GET["modif"])) 
                            {
                                $id = $_GET["modif"];
                                require_once("controllers/C_etudiant.php");
                                $smth = new C_ETUDIANT;
                                $upd = $smth -> C_takeEt($id);  // appelle le formulaire update contenant les placeholder
                                
                            }
                            else 
                            {
                                require_once("views/admin/listeEtudiant.php"); //appelle la liste d'étudiants
                            }
                        }
                    }
                }
                else
                {   // regarder s'il y a erreur= err venant de C_etudiant ( insertion echec)
                    if (!empty($_GET["erreur"])) 
                    {
                        $erreur= $_GET["erreur"];
                        if ($erreur=="err") 
                        {
                            require_once("views/admin/listeEtudiant.php");
                            echo "<p style='color:red'>Erreur d'insertion</p>";
                        }
                        elseif ($erreur=="err2") 
                        {
                            require_once("views/admin/listeEtudiant.php");
                            echo "<p style='color:red'>Erreur de modification</p>";
                        }
                    }
                     
                    else 
                    {
                        require_once('views/admin/formulaireEtudiant.php');
                    }
                }
            }
            // elseif ($page == "pgProf") {
                
            // }
            
        }
    }
    
    
    
    

    

    
    
    
?>