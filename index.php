<?php 
    require_once('views/admin/formulaireEtudiant.php');
    require_once('controllers/C_etudiant.php');

    // si l'action dans le formulaire est=="insert" , on insère dans la base de données
    
    if (!empty($_GET["action"])) {
        $action= $_GET["action"];
        if ($action=="insert") {
        $a= new C_ETUDIANT;
        $i=$a->C_insertionEt();
        }
    }
    
    if (!empty($_GET['pg'])) {
        $act = $_GET['pg'];
        if ($act == "insertion") {
         require_once('views/admin/formulaireEtudiant.php');
        }
        elseif ($act == "echec") {
        require_once('views/admin/echec.php');
        }
    }
    

?>