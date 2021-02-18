<?php 
    
    /// On prend pg venant de : formulaireEtudiant.php
    /// si pg==VIDE, on affiche le formaulaire d'insertion des étudiants

    if (!empty($_GET["pg"])) {
        $action= $_GET["pg"];
        if ($action=="listeEt") {
            require_once("views/admin/listeEtudiant.php");
        }
    }
    else{
        require_once('views/admin/formulaireEtudiant.php');

    }
?>