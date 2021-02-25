<?php 
    
    

    if (!empty($_GET["session"])) 
    {
        echo '<a href="?pgAdmin=pgEt">Insertion étudiant</a><br>';
        echo '<a href="?pgAdmin=pgProf">Insertion prof</a><br>';
        echo '<a href="?pgAdmin=pgProf&pg=insertCours">Insertion cours</a>';
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
                                //appelle la méthode takeEtudiant.php permettant d'afficher modifEtudiant.php
                                // qui est le formulaire de modification
                                $upd = $smth -> takeEtudiant($id);  
                                
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
                        elseif ($erreur=="err2")
                        {
                             // regarder s'il y a erreur= err venant de manageEtudiant ( modification echec)
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
            elseif ($page == "pgProf") 
            {
                /// On prend pg venant de : formulaireProfesseur.php
                /// si pg==VIDE, on affiche le formulaire d'insertion des professeurs
                if (!empty($_GET["pg"])) 
                {
                    // si on appuie sur le lien menant vers la liste dans formulaireProfesseur.php : pg=listeProf
                    $action= $_GET["pg"];
                    if ($action=="listeProf") 
                    {
                        // si on appuie sur effacer dans listeProfesseur.php
                        if (!empty($_GET["act"])) 
                        {
                            $act = $_GET["act"];
                            require_once("models/user.php");
                            $stat = new User;
                            $del = $stat -> delUser('professeur', $act);
                            header("location:admin.php?pgAdmin=pgProf&pg=listeProf");
                        }
                        else 
                        {   // si on appuie sur modifier dans listeProfesseur.php
                            if (!empty($_GET["modif"])) 
                            {
                                $id = $_GET["modif"];
                                require_once("controllers/manageProfesseur.php");
                                $smth = new ManageProfesseur;
                                //appelle la méthode takeProfeseur.php permettant d'afficher modifProfesseur.php
                                // qui est le formulaire de modification
                                $upd = $smth -> takeProfesseur($id);  
                                
                            }
                            else 
                            {
                                //appelle la liste de Professeurs
                                require_once("views/admin/listeProfesseur.php"); 
                            }
                        }
                    }
                    elseif ($action=="insertCours") {
                        require_once("controllers/manageCours.php");
                        $smth = new ManageCours;
                        // appelle la méthode formCours pou afficher formulaireCours.php
                        $inst = $smth -> formCours(); 
                    }
                }
                else
                {   
                    if (!empty($_GET["erreur"])) 
                    {
                        $erreur= $_GET["erreur"];
                        if ($erreur=="err") 
                        {
                            // regarder s'il y a erreur= err venant de manageProfesseur ( insertion echec)
                            require_once("views/admin/listeProfesseur.php");
                            echo "<p style='color:red'>Erreur d'insertion</p>";
                        }
                        
                        elseif ($erreur=="err2")  
                        {
                            // regarder s'il y a erreur= err venant de manageProfesseur ( modification echec)
                            require_once("views/admin/listeProfesseur.php");
                            echo "<p style='color:red'>Erreur de modification</p>";
                        }
                    }
                    else 
                    {
                        // on insère un professeur
                        require_once('views/admin/formulaireProfesseur.php');
                    }
                }
            }
            elseif ($page == "pgCours") {
                if (!empty($_GET["pg"])) 
                {
                    // si on appuie sur le lien menant vers la liste dans formulaireEtudiant.php : pg=listeEt
                    $action= $_GET["pg"];
                    if ($action=="listeCours") 
                    {
                        // si on appuie sur effacer dans listeCours.php
                        if (!empty($_GET["act"])) 
                        {
                            $act = $_GET["act"];
                            require_once("models/user.php");
                            $stat = new User;
                            $del = $stat -> delUser('cours', $act);
                            header("location:admin.php?pgAdmin=pgCours&pg=listeCours");
                        }
                        else 
                        {   // si on appuie sur modifier dans listeCours.php
                            if (!empty($_GET["modif"])) 
                            {
                                $id = $_GET["modif"];
                                require_once("controllers/manageCours.php");
                                $smth = new ManageCours;
                                //appelle la méthode takeCours.php pour afficher modifCours.php
                                // qui est le formulaire de modification
                                $upd = $smth -> takeCours($id);  
                                
                            }
                            else 
                            {
                                //liste cours pour ADMIN permettant de modifier et supprimer
                                require_once('views/public/listeCours.php'); 
                            }
                        }
                    }
                }
            }
            
            
        }
        else 
        {
            if (!empty($_GET["pgPublic"])) 
            {
                if ($_GET["pgPublic"]=="pgCours") 
                {
                    // liste cours public (visionnage seulement)
                    require_once('views/public/listeCours.php'); 
                }
                elseif ($_GET["pgPublic"]=="pgEtudiant") 
                {
                    // liste etudiant public (visionnage seulement)

                    require_once("views/admin/listeEtudiant.php");
                }
                elseif ($_GET["pgPublic"]=="pgProfesseur") 
                {
                    // liste professeur public (visionnage seulement)
                    require_once("views/admin/listeProfesseur.php");
                }
            }
        }
    }
    
    
    
    

    

    
    
    
?>