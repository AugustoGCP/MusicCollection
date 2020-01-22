<?php

    include "connection.php";
    session_start();

    $send_file = $_POST['send_file'];
    $pasta = "files/";
    $file_name = explode("-", $_FILES['file']['name']);
    // var_dump($file_name);

    $date = Date("d-m-Y");

    $sql = "select * from tb_users";
    $result = mysqli_query($conn, $sql);
    $data = mysqli_fecht($result);
    

    if (isset($send_file)){
        $extension = strtolower(pathinfo($_FILES['file']['name'], PATHINFO_EXTENSION));

        if ($extension === "mp3"){
            $directory = "files/";
            $target_file = $directory . basename($_FILES['file']['name']);
            $tmp = $_FILES['file']['tmp_name'];
            
            $file_name = explode("-", $_FILES['file']['name']);
            
            if (move_uploaded_file($tmp, $target_file)){
                $sql = "insert into tb_musics (usr, music, artist, path, data_insert) values ($data[''], '$file_name[1]', '$file_name[0]', '$_FILES['file']['tmp_name']', '$date')"
                mysqli_query($conn, $sql) or die ($conn);

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