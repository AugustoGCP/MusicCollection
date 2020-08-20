<?php

    require 'Connection.php';

    class User {

        private $user;
        private $password;


        public function __construct(){


        }

        public function Login($user, $password){

            if ( (empty($user)) || (empty($password)) ){

                $_SESSION['alert'] = 'Some field was filled incorrect.';
                header("Location: ../../index.php");
           
            }else{

                if ( (isset($user)) && (isset($password)) ){

                    $conn = new Connection();
                    $conn->getPdo()->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                    $stmt = $conn->prepare('SELECT usr FROM tb_users WHERE usr = :usr');
                    $stmt->execute(array('usr' => $user));

                    return $stmt->rowCount();

                }

            }

        }

        public function Logout(){


        }

    }