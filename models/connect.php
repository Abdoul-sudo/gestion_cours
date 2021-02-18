<?php
    function dbConnect(){
            $DB_HOST = 'localhost';
            $DB_USER = 'fabien';
            $DB_PASS = 'Fabien512';
            $DB_NAME = 'gestion_cours';
        try{
            $db = new PDO("mysql:host=" . $DB_HOST . ";dbname=" . $DB_NAME, $DB_USER, $DB_PASS);
            return $db ;
        } catch(PDOException $error){
            print "[ERREUR] Connexion échouée :" . $error->getMessage();
            die();
        }
    }
    // class DB_CONNECT{
    //     public function dbConnect(){
    //         // Les configurations de la base de donnée

    //         if (!isset($DB_HOST)) {
    //             $DB_HOST = 'localhost';
    //             $DB_USER = 'fabien';
    //             $DB_PASS = 'Fabien512';
    //             $DB_NAME = 'gestion_cours';
    //         }
    //         try{
    //             $db = new PDO("mysql:host=" . $DB_HOST . ";dbname=" . $DB_NAME, $DB_USER, $DB_PASS);
    //             // Si connection non établie
    //             return $db ;
    //         } catch(PDOException $error){
    //             print "[ERREUR] Connexion échouée :" . $error->getMessage();
    //             die();
    //         }
    //     }
    // }
