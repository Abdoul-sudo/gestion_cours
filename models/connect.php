<?php
    class Database{
        private $_dbHost = 'localhost';
        private $_dbUser = 'fabien';
        private $_dbPassword = 'Fabien512';
        private $_dbName = 'gestion_cours';

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
        // public function dbHost(){
        //     return $this->_dbHost;
        // }
        // public function dbUser(){
        //     return $this->_dbUser;
        // }
        // public function dbPassword()
        // {
        //     return $this->_dbPassword;
        // }
        // public function dbName(){
        //     return $this->_dbName;
        // }

    }
