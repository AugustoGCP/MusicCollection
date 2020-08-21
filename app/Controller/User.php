<?php

    require_once 'Connection.php';

    class User {
 
        private $user;
        private $password;

        public function __construct($user, $password){

            $this->setUser($user);
            $this->setPassword($password);

        }

        public function Login(){

            $user = $this->user;
            $password = $this->password;

            if ( (isset($user)) && (isset($password)) ){
                $conn = new Connection();
                $pdo = $conn->Connect();
                //$conn->getPdo()->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                $stmt = $pdo->prepare('SELECT usr FROM tb_users WHERE usr = :usr');
                $stmt->execute(array('usr' => $user));

                return $stmt->rowCount();

            }
        }

        public function Logout(){
            
            session_start();
            session_unset();
            session_destroy();            
            header("Location: ../../index.php");

        }


        /*-----------  GETTER AND SETTER  -----------*/

        private function setUser($user){

            $this->user = $user;
        }

        private function getUser(){

            return $this->user;
        }

        private function setPassword($password){

            $this->password = $password;
        }

        private function getPassword(){

            return $this->password;
        }

    }

    