<?php
    class DB_CONNECT{
        private $DB_HOST = 'localhost';
        private $DB_USER = 'root';
        private $DB_PASS = '';
        private $DB_NAME = 'bdd';

        protected function dbConnect(){
            // Les configurations de la base de donnée
            $DB_HOST = $this -> DB_HOST;
            $DB_NAME = $this -> DB_NAME;
            $DB_USER = $this -> DB_USER;
            $DB_PASS = $this -> DB_PASS;

            if (!isset($DB_HOST)) {
                
            } 
            try{
                $db = new PDO("mysql:host=" . $DB_HOST . ";dbname=" . $DB_NAME, $DB_USER, $DB_PASS);
                // Si connection non établie
                return $db ;
            } catch(PDOException $error){
                print "[ERREUR] Connexion échouée :" . $error->getMessage();
                die();
            }
?>
