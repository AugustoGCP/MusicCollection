<?php


    session_cache_expire(30);
    session_start();

    include "../connection.php";

    $usr = $_SESSION['usr'];

    
    $sql = "select * from tb_users WHERE usr = '$usr'";
    $result = mysqli_query($conn, $sql);
    $data = $result->fetch_array();

    // $disable_artist = $_POST['disable_artist'];
    // $deactive = $_POST['deactivate'];

    if ( (!empty($_POST['artist_name'])) && (!empty($_POST['twitter_name'])) && (!empty($_POST['about_artist'])) ){
        
        $artist = $_POST['artist_name'];
        $twitter = $_POST['twitter_name'];
        $about = $_POST['about_artist'];
        $cod_usr = $data['cod_usr'];

        $sql = "insert into tb_artists (artist, twitter, about, deactivate, usr) values ('$artist', '$twitter', '$about', 1, $cod_usr)";

        if (mysqli_query($conn, $sql)){
            $_SESSION['alert'] = "<script>alert('Artist created sucessfully.')</script>";
            header("Location: ../../include/edit.php");
        }
        else {
            $_SESSION['alert'] = "<script>alert('Something wrong happend. Please try later.')</script>";
            header("Location: ../../include/edit.php");
        }

        return;

    } elseif ( (isset($_POST['disable_artist'])) && (isset($_POST['deactive'])) ){

        $disable_artist = $_POST['disable_artist'];
        $deactive = $_POST['deactivate'];

        $sql = "update tb_artists set deactivate = 0 where artist = '$disable_artist'";

        if (mysqli_query($conn, $sql)){
            $_SESSION['alert'] = "<script>alert('Artist deactivate sucessfully.')</script>";
            header("Location: ../../include/edit.php");

        }else {
            $_SESSION['alert'] = "<script>alert('Something wrong happend. Please try later. ')</script>";
            header("Location: ../../include/edit.php");
        }

        return;

    } else{
        $_SESSION['alert'] = "<script>alert('Some field was not filled correctly.')</script>";
        header("Location: ../../include/edit.php");
    }

    var_dump($_POST['artist_name'], $_POST['twitter_name'], $_POST['about_artist']);

    


?>