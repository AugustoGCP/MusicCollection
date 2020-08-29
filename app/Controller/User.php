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
                //return $params;
                
            }
            
            
            if($resp == 4){

                $getParams = func_get_args(0);

                if(is_array($getParams)){

                    $this->__set('full_name', $getParams[0]);
                    $this->__set('user', $getParams[1]);
                    $this->__set('password', $getParams[2]);
                    $this->__set('birth', $getParams[3]);
                }

            }

            

        //return $resp;

        }

        public function createUser(){

            $conn = new Connection();
            $pdo = $conn->Connect();

            $sql = $pdo->prepare('select usr, email from tb_users where usr = :usr or email = :email'); 
            $existUsr = $sql->execute(array('usr'=>$this->__get('user'), 'email'=>$this->__get('password')));

            if ($existUsr){

                $conn = new Connection();
                $pdo = $conn->Connect();

                $sql = $pdo->prepare('insert into tb_users (usr, full_name, password, birth) values (:user, :full_name, :password, :birth)');
                $result = $sql->execute(array('user'=>$this->__get('user'), 'full_name'=>$this->__get('full_name'), 'password'=>$this->__get('password'), 'birth'=>$this->__get('birth')));

                if ($result){

                    //CRIA OS DIRETORIO DE CADA USUARIO
        
                    //CRIA O DIRETORIO DO USUARIO
                    mkdir("../View/usr/{$this->__get('user')}",0777, true);
                    //CRIA O DIREOTORIO QUE ARMAZENA AS IMAGENS DO USUARIO
                    mkdir("../View/usr/{$this->__get('user')}/img",0777, true);
                    //CRIA O DIRETORIO QUE ARMAZENAS OS ARQUIVOS DE AUDIO DO USUARIO
                    mkdir("../View/usr/{$this->__get('user')}/audio",0777, true);  
        
                    // COPIA OS ARQUIVOS INICIAIS DE CADA USUAIO PARA A PASTA DO USUARIO
        
                    //COPIA PARA A PASTA DO USUARIO O ARQUIVO PROFILE.PHP
                    //copy("../View/profile.php", "../View/usr/{$this->__get('user')}/profile.php");
                    //COPIA A IMAGEM INICIAL DO 
                    copy("../View/img/img_profile.jpg","../View/usr/{$this->__get('user')}/img/img_profile.jpg");
        
                    $_SESSION['usr'] = $this->__get('user');
                    $_SESSION['alert'] = "<script>alert('Password created sucessfully')</script>";
        
                    header("Location: ../View/profile.php");
        
                }else{
        
                    $_SESSION['alert'] = "<script>alert('Something happend wrong. Please try later.')</script>";
                    header("Location: ../View/sing_up.php");
                }


            }else{

                $_SESSION['alert'] = "<script>alert('This user alredy exist. Please choice another user.')</script>";
                header("Location: ../View/sing_up.php");

            }


        }

        public function Login(){

            if ( (!is_null($this->__get('user'))) && (!is_null($this->__get('password'))) ) {
                $conn = new Connection();
                $pdo = $conn->Connect();
                //$conn->getPdo()->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                $sql = $pdo->prepare('SELECT * FROM tb_users WHERE usr = :usr and password = :password');
                $sql->execute(array('usr' => $this->__get('user'), 'password'=> $this->__get('password'))); 

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

    