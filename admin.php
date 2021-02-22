<?php 
    
    

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
                /// On prend pg venant de : formulaireEtudiant.php
                /// si pg==VIDE, on affiche le formaulaire d'insertion des étudiants
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
                            require_once("models/user.php");
                            $stat = new User;
                            $del = $stat -> delUser('etudiant', $act);
                            header("location:admin.php?pgAdmin=pgEt&pg=listeEt");
                        }
                        else 
                        {   // si on appuie sur modifier dans la liste
                            if (!empty($_GET["modif"])) 
                            {
                                $id = $_GET["modif"];
                                require_once("controllers/manageEtudiant.php");
                                $smth = new ManageEtudiant;
                                $upd = $smth -> takeEtudiant($id);  // appelle le formulaire update contenant les placeholder
                                
                            }
                            else 
                            {
                                require_once("views/admin/listeEtudiant.php"); //appelle la liste d'étudiants
                            }
                        }
                    }
                }
                else
                {   
                    if (!empty($_GET["erreur"])) 
                    {
                        $erreur= $_GET["erreur"];
                        if ($erreur=="err")  // regarder s'il y a erreur= err venant de manageEtudiant ( insertion echec)
                        {
                            require_once("views/admin/listeEtudiant.php");
                            echo "<p style='color:red'>Erreur d'insertion</p>";
                        }
                        elseif ($erreur=="err2") // regarder s'il y a erreur= err venant de manageEtudiant ( modification echec)
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
            if ($page == "pgProf") 
            {
                /// On prend pg venant de : formulaireProfesseur.php
                /// si pg==VIDE, on affiche le formulaire d'insertion des professeurs
                if (!empty($_GET["pg"])) 
                {
                    // si on appuie sur le lien menant vers la liste dans formulaireProfesseur.php : pg=listeProf
                    $action= $_GET["pg"];
                    if ($action=="listeProf") 
                    {
                        // si on appuie sur effacer dans la liste
                        if (!empty($_GET["act"])) 
                        {
                            $act = $_GET["act"];
                            require_once("models/user.php");
                            $stat = new User;
                            $del = $stat -> delUser('professeur', $act);
                            header("location:admin.php?pgAdmin=pgProf&pg=listeProf");
                        }
                        else 
                        {   // si on appuie sur modifier dans la liste
                            if (!empty($_GET["modif"])) 
                            {
                                $id = $_GET["modif"];
                                require_once("controllers/manageProfesseur.php");
                                $smth = new ManageProfesseur;
                                $upd = $smth -> takeProfesseur($id);  // appelle le formulaire update contenant les placeholder
                                
                            }
                            else 
                            {
                                require_once("views/admin/listeProfesseur.php"); //appelle la liste de Professeurs
                            }
                        }
                    }
                }
                else
                {   
                    if (!empty($_GET["erreur"])) 
                    {
                        $erreur= $_GET["erreur"];
                        if ($erreur=="err") // regarder s'il y a erreur= err venant de manageProfesseur ( insertion echec)
                        {
                            require_once("views/admin/listeProfesseur.php");
                            echo "<p style='color:red'>Erreur d'insertion</p>";
                        }
                        
                        elseif ($erreur=="err2")  // regarder s'il y a erreur= err venant de manageProfesseur ( modification echec)
                        {
                            require_once("views/admin/listeProfesseur.php");
                            echo "<p style='color:red'>Erreur de modification</p>";
                        }
                    }
                    else 
                    {
                        require_once('views/admin/formulaireProfesseur.php');
                    }
                }
            }
            
        }
    }
    
    
    
    

    

    
    
    
?>