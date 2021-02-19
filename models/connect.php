<?php
    class DB_CONNECT{
        private $DB_HOST = 'localhost';
        private $DB_USER = '';
        private $DB_PASS = '';
        private $DB_NAME = '';

        protected function dbConnect(){
            try{
                $db = new PDO("mysql:host=" . this->$DB_HOST . ";dbname=".this->$DB_NAME, this->$DB_USER, this->$DB_PASS, array(PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION));
                // Si connection non établie
                return $db ;
                
            } catch(PDOException $error){
                print "[ERREUR] Connexion échouée :" . $error->getMessage();
                die();
            }
        }
    }
