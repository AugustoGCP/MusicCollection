<?php

    class Connection {

        private $user;
        private $password;
        private $server;
        private $base;
        private static $pdo;

        public function __construct(){

            $this->__set('user',"root");
            $this->__set('password',"");
            $this->__set('server',"localhost");
            $this->__set('base',"db_collection_music");
            
        }
        
        public function Connect(){

            //Verify if attibute static PDO is set. Case it isn't, it will be setting with the construct PDO and return the instance.

            try {

                if (is_null(self::$pdo)){

                    self::$pdo = new PDO("mysql:host={$this->__get('server')};dbname={$this->__get('base')}", $this->__get('user'), $this->__get('password'));

                }

                return self::$pdo;

                //return "Conectado a {$this->__get('base')} em {$this->__get('server')} com sucesso.";

            } catch (PDOException $pe) {

                die("Não foi possível se conectar ao banco de dados {$this->__get('base')} :" . $pe->getMessage());
            }

        }
        
        public function __set($obj, $user){
            $this->$obj = $user;
        }

        public function __get($obj){
            return $this->$obj;
        }

    }
?>