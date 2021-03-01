<?php
    class Database{
        private $_dbHost = 'localhost';
        private $_dbUser = 'root';
        private $_dbPassword = '';
        private $_dbName = 'gestion_cours';

        protected function dbConnect(){
            try{
                $db = new PDO("mysql:host=" . $this->dbHost() . ";dbname=".$this->dbName(), $this->dbUser(), $this->dbPassword(), array(PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION));
                return $db ;
                
            } catch(PDOException $error){
                print "[ERREUR] Connexion échouée :" . $error->getMessage();
                die();
            }
        }
        //les accesseurs
        public function dbHost(){ return $this->_dbHost; }
        public function dbUser(){ return $this->_dbUser; }
        public function dbPassword(){ return $this->_dbPassword; }
        public function dbName(){ return $this->_dbName; }
    }
