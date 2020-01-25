<?php

    include "connection.php";
    session_start();
    globals_start()

    $usr = $_SESSION['usr'];

    $send_file = $_POST['send_file'];
    $pasta = "files/";
    $file_array = explode("-", $_FILES['file']['name']);
    // var_dump($file_name);

    $date = Date("Y-m-d");

    $sql = "select * from tb_users where usr = '$usr'";
    $result = mysqli_query($conn, $sql);
    $data = $result->fetch_array();

    $cod_usr = $data['cod_usr'];

    $directory = "files/";
    $target_file = $directory . basename($_FILES['file']['name']);
    

    if (isset($send_file)){
        $extension = strtolower(pathinfo($_FILES['file']['name'], PATHINFO_EXTENSION));

        if ($extension === "mp3"){

            $directory = "files/";
            $target_file = $directory . basename($_FILES['file']['name']);
            $tmp = $_FILES['file']['tmp_name'];
            
            $artist_name = $file_array[0];
            $music_name = $file_array[1];
            $file_path = "php/$target_file";

            $sql = "insert into tb_musics (usr, music, artist, path, date_insert, deleted) values ($cod_usr, '$music_name', '$artist_name', '$file_path', '$date', 0)";
            
            if ( (move_uploaded_file($tmp, $target_file)) && (mysqli_query($conn, $sql)) ){

                $_SESSION['alert'] = "<script>alert('Succssesfully done!')</script>";
                header("Location: ../dashboard.php");
                
                
            }else{
                $_SESSION['alert'] = "<script>alert('Something wrong are happing. Please try late.')</script>";
                header("Location: ../dashboard.php");
            }
        }else{
            $_SESSION['alert'] = "<script>alert('You're trying upload a wrong extension. Please use only .mp3')</script>";
            header("Location: ../dashboard.php");
        }
    }else{
        $_SESSION['alert'] = "<script>alert('It was not possible verify a file.')</script>";
        header("Location: ../dashboard.php");
    }

?>