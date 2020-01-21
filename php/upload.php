<?php

    session_start();

    $send_file = $_POST['send_file'];
    $pasta = "files/";
    //var_dump($_FILES['file']);


    if (isset($send_file)){
        $extension = strtolower(pathinfo($_FILES['file']['name'], PATHINFO_EXTENSION));

        if ($extension === "mp3"){
            $directory = "files/";
            $target_file = $directory . basename($_FILES['file']['name']);
            $tmp = $_FILES['file']['tmp_name'];
            
            if (move_uploaded_file($tmp, $target_file)){
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