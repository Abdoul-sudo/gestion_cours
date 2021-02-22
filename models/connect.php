<?php
    class Database{
        private $_dbHost = 'localhost';
        private $_dbUser = 'root';
        private $_dbPassword = '';
        private $_dbName = 'bdd';

        protected function dbConnect(){
            try{
                $db = new PDO("mysql:host=" . $this->_dbHost . ";dbname=".$this->_dbName, $this->_dbUser, $this->_dbPassword, array(PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION));
                // Si connection non établie
                return $db ;
                
            } catch(PDOException $error){
                print "[ERREUR] Connexion échouée :" . $error->getMessage();
                die();
            }
        }
    }
