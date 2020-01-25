<?php
    
    session_start();
    include "../connection.php";

    $cod_usr = $_SESSION['cod_usr'];

    
    $sql = "select * from tb_users WHERE cod_usr = '$cod_usr'";
    $result = mysqli_query($conn, $sql);
    $data = $result->fetch_array();

    if ( (isset($_POST['artist_name'])) && (isset($_POST['artist_name'])) && (isset($_POST['about_artist'])) ){
        
        $artist = $_POST['artist_name'];
        $twitter = $_POST['artist_name'];
        $about = $_POST['about_artist'];


        $cod_usr = $data['cod_usr'];
        $sql = "insert into tb_artists (artist, twitter, about, usr) values ('$artist', '$twitter', '$about', '$cod_usr')";

        if (mysqli_query($conn, $sql)){
            $_SESSION['alert'] = "<script>alert('Artist created sucessfully.')</script>";
            header("Location: ../../include/edit.php");
        }
        else {
            $_SESSION['alert'] = "<script>alert('Something wrong happend. Please try later.')</script>";
            header("Location: ../../include/edit.php");
        }

    } elseif ( (isset($_POST['disable_artist'])) && (isset($_POST['deactivate'])) ){

        $disable_artist = $_POST['disable_artist'];
        $deactive = $_POST['deactivate'];

        $sql = "update tb_artist set deleted = $deactivate where artist = '$disable_artist'";

        if (mysqli_query($conn, $sql)){
            $_SESSION['alert'] = "<script>alert('Artist deactivate sucessfully.')</script>";
            header("Location: ../../include/edit.php");

        }else {
            $_SESSION['alert'] = "<script>alert('Something wrong happend. Please try later.')</script>";
            header("Location: ../../include/edit.php");
        }


    } else{
        $_SESSION['alert'] = "<script>alert('Some field was not filled correctly.')</script>";
        header("Location: ../../include/edit.php");
    }

    // var_dump($result);

    


?>