<?php

    require_once 'Connection.php';

    class User {
 
        private $user;
        private $password;
        private $full_name;
        private $birth;

        public function __construct(){

            $resp = $numParams = func_num_args();

            if($resp == 2){

                $getParams = func_get_args(0);

                if (is_array($getParams)){

                    $this->__set('user',$getParams[0]);
                    $this->__set('password',$getParams[1]);

                }
                
            }

            if($resp == 4){

                $getParams = func_get_args(0);

                if(is_array($getParams)){

                    
                }

            }

            //return $params;

        //    echo $resp;

        }

        public function createUser(){


        }

        public function Login(){

            if ( (isset($this->user)) && (isset($this->password)) ){
                $conn = new Connection();
                $pdo = $conn->Connect();
                //$conn->getPdo()->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                $sql = $pdo->prepare('SELECT * FROM tb_users WHERE usr = :usr and passqord = :password');
                $sql->execute(array('usr' => $this->__get('user'), 'password' => $this->__get('password')));

                return $sql->rowCount();

            }
        }

        public function Logout(){
            
            session_start();
            session_unset();
            session_destroy();            
            return header("Location: ../../index.php");

        } 
        
        public function musicList(){

            $conn = new Connection();
            $pdo = $conn->Connect();

            $sql = $pdo->prepare('');

            $sql = $pdo->prepare('select * from tb_users inner join tb_musics on tb_musics.usr_msc = tb_users.cod_usr inner join tb_artists on tb_musics.artist_msc = tb_artists.cod_artist where tb_users.usr = :id_usr and tb_musics.deactive = 1 and tb_artists.usr = $cod_usr order BY tb_artists.artist ASC');

        }

        public function __set($obj, $valor){
            $this->$obj = $valor;
        }

        public function __get($obj){
            return $this->$obj;

        }

    }

    