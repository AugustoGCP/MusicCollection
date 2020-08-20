<?php

    class Connection {

        private $user;
        private $password;
        private $server;
        private $base;
        private static $pdo;

        public function __construct(){

            $this->setUser("root");
            $this->setPassword("");
            $this->setServer("localhost");
            $this->setBase("db_collection_music");
            
        }
        
        public function Connect(){

            $this->pdo = new PDO("");

        }


        private function setUser($user){
            $this->user = $user;
        }

        public function getUser(){
            return $this->user;
        }

        private function setPassword($password){
            $this->password = $password;
        }

        public function getPassword(){
            return $this->password;
        }

        private function setServer($server){
            $this->server = $server;
        }

        public function getServer(){
            return $this->server;
        }

        private function setBase($base){
            $this->base = $base;
        }

        public function getBase(){
            return $this->base;
        }

        


        // Public function __set($obj,$value){
        //     $this->$obj = $value;

        // }

        // Public function __get($obj){
        //     return $this->$obj;

        // }
        
    }
?>