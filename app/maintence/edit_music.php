<?php

    include "../connection.php";
    session_start();

    $usr = $_SESSION['usr'];

    $send_file = $_POST['send_file'];
    $cod_artist = $_POST['cod_artist'];
    $cod_album = $_POST['cod_album'];
    $file_name = $_FILES['file']['name'];
    // var_dump($file_name);

    $date = Date("Y-m-d");

    $sql = "select * from tb_users where usr = '$usr'";
    $result = mysqli_query($conn, $sql);
    $data = $result->fetch_array();

    $cod_usr = $data['cod_usr'];

    

    if (isset($send_file)){
        $extension = strtolower(pathinfo($_FILES['file']['name'], PATHINFO_EXTENSION));

        if ($extension === "mp3"){

            $directory = "../../usr/$usr/audio/";
            $target_file = $directory . basename($_FILES['file']['name']);
            $tmp = $_FILES['file']['tmp_name'];
            
            $file_path = "../usr/$usr/audio/$file_name";

            $sql = "insert into tb_musics (music, artist_msc, album, usr_msc, path, deactive, date_create) values ('$file_name', $cod_artist, $cod_album, $cod_usr, '$file_path', 1, '$date')";
            
            if ( (move_uploaded_file($tmp, $target_file)) && (mysqli_query($conn, $sql)) ){

                $_SESSION['alert'] = "<script>alert('Succssesfully done!')</script>";
                header("Location: ../../include/edit.php");
                
                
            }else{
                $_SESSION['alert'] = "<script>alert('Something wrong are happing. Please try late.')</script>";
                header("Location: ../../include/edit.php");
            }
        }else{
            $_SESSION['alert'] = "<script>alert('You're trying upload a wrong extension. Please use only .mp3')</script>";
            header("Location: ../../include/edit.php");
        }
    }else{
        $_SESSION['alert'] = "<script>alert('It was not possible verify a file.')</script>";
        header("Location: ../../include/edit.php");
    }

?>