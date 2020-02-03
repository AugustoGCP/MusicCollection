<?php

    include "../connection.php";
    session_start();

    $send_file = $_POST['send_file'];

    $usr = $_SESSION['usr'];

    $sql = "select * from tb_users where usr = '$usr'";
    $result = mysqli_query($conn, $sql);
    $data = $result->fetch_array();

    $cod_usr = $data['cod_usr'];

    $album = $_POST['album_name'];
    $cod_artist = $_POST['cod_artist'];
    $year = $_POST['year'];


    //   var_dump($target_file);

   if (isset($send_file)){
        $permission_extension = array ("jpeg","png","jpg");
        $extension = strtolower(pathinfo($_FILES['file']['name'], PATHINFO_EXTENSION));

        if (in_array($extension, $permission_extension )){

            $directory = "../../usr/$usr/img/";
            $target_file = $directory . basename($_FILES['file']['name']);
            $tmp = $_FILES['file']['tmp_name'];
            $file_path = "../usr/$usr/img/". basename($_FILES['file']['name']);

            //var_dump($file_path);


            if ( !empty($_FILES['file'])) {

                $sql = "insert into tb_albums (album, artist, usr_album, img_cover, year_album) values ('$album', $cod_artist, $cod_usr, '$file_path', '$year')";

                if ( (move_uploaded_file($tmp, $target_file)) && (mysqli_query($conn, $sql)) ){

                    $_SESSION['alert'] = "<script>alert('The album was uploaded sucessfully.')</script>";
                    header("Location: ../../include/edit.php");

                }else {

                    $_SESSION['alert'] = "<script>alert('Something wrong happend. Please try later.')</script>";
                    header("Location: ../../include/edit.php"); 
                }

            }else{

                $sql = "insert into tb_album (album, artist, year_album) values ('$album', '$cod_artist', '$year')";

                if ( (move_uploaded_file($tmp, $target_file)) && (mysqli_query($conn, $sql)) ){

                    $_SESSION['alert'] = "<script>alert('The music was uploaded sucessfully.')</script>";
                    header("Location: ../../include/edit.php");

                }else {

                    $_SESSION['alert'] = "<script>alert('Something wrong happend. Please try later. 2')</script>";
                    header("Location: ../../include/edit.php"); 
                }

            } 
        
        } else {

            $_SESSION['alert'] = "<script>alert('The file is not the right extension.')</script>";
            header("Location: ../../include/edit.php");
        }
    }

    

?>