<?php
    class DB_CONNECTION{
        public function dbConnect(){
            // Les configurations de la base de donnée

            if (!isset($DB_HOST)) {
                $DB_HOST = 'localhost';
                $DB_USER = 'root';
                $DB_PASS = '';
                $DB_NAME = 'examPhp';
            } 
            try{
                $db = new PDO("mysql:host=" . $DB_HOST . ";dbname=" . $DB_NAME, $DB_USER, $DB_PASS);
                // Si connection non établie
                return $db ;
            } catch(PDOException $error){
                print "[ERREUR] Connexion échouée :" . $error->getMessage();
                die();
            }
        }
    }
?>

