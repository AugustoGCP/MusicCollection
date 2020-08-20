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

            try {

                self::$pdo = new PDO("mysql:host={$this->getServer()};dbname={$this->getBase()}", $this->user, $this->getPassword());

                echo "Conectado a {$this->getBase()} em {$this->getServer()} com sucesso.";

            } catch (PDOException $pe) {

                die("Não foi possível se conectar ao banco de dados {$this->getBase()} :" . $pe->getMessage());
            }

        }


        public function getPdo(){
            return self::$pdo;

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