<?php

    include "../connection.php";

    session_start();

    // CAPTURA OS DADOS PASSADO PELO USUARIO DO ARQUIVO HTML PELO METODO POST E INSERI EM VARIAVEIS

    $full_name = $_POST['full_name'];
    $user = $_POST['user'];  
    $password = $_POST['password']; 
    $birth = $_POST['birth'];

    $sql = "select * from tb_users where usr ='$user'";
    $result = mysqli_query($conn, $sql);
    $data = mysqli_fetch_array($result);

    // var_dump($data['usr']);


    // VERIFICA A EXISTENCIA DO NOME DO USUARIO NO BANCO DE DADOS
    if ($data['usr'] === "$user"){
        $_SESSION['alert'] = "<script>alert('This user name already exist. Please try other.')</script>";
        header("Location: ../../include/sing_up.php");

    }else{

        // CRIA A VARIAVEL COM A STRING SQL PARA INSERÇÃO DOS DADOS NO BANCO
        $sql = "insert into tb_users (usr, full_name, password, birth) values ('$user', '$full_name', '$password', '$birth')";
    
            // VERIFICA SE A CONEXÃO COM BANCO FOI FEITA COM SUCESSO
            if (mysqli_query($conn, $sql)){

            //CRIA OS DIRETORIO DE CADA USUARIO

            //CRIA O DIRETORIO DO USUARIO
            mkdir("../../usr/$user",0777, true);
            //CRIA O DIREOTORIO QUE ARMAZENA AS IMAGENS DO USUARIO
            mkdir("../../usr/$user/img",0777, true);
            //CRIA O DIRETORIO QUE ARMAZENAS OS ARQUIVOS DE AUDIO DO USUARIO
            mkdir("../../usr/$user/audio",0777, true);  

            // COPIA OS ARQUIVOS INICIAIS DE CADA USUAIO PARA A PASTA DO USUARIO

            //COPIA PARA A PASTA DO USUARIO O ARQUIVO PHP DO PROFILE DO USUARIO
            copy("../profile.php", "../../usr/$user/profile.php");
            //COPIA A IMAGEM INICIAL DO 
            copy("../../img/img_profile.jpg","../../usr/$user/img/img_profile.jpg");

            $_SESSION['usr'] = $user;
            $_SESSION['alert'] = "<script>alert('Password created sucessfully')</script>";

            header("Location: ../../usr/$user/profile.php");

        }else{

            $_SESSION['alert'] = "<script>alert('Something happend wrong. Please try later.')</script>";
            header("Location: ../../include/sing_up.php");
        }
    }

?>