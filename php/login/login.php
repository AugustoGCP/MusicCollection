<?php

    session_start();
    include "../connection.php";

    $user = $_POST['usr'];
    $password = $_POST['password'];

    if ( (empty($user)) || (empty($password)) ){

        $_SESSION['alert'] = "<script>alert('Some camp was filled incorrect.')</script>";
        header("Location: ../../index.php");

        // echo "bloco 3";

    }else{

        if ( (isset($user)) && (isset($password)) ){

            $sql = "SELECT * FROM `tb_users` WHERE usr = '$user' and PASSWORD = $password";    
            $result = mysqli_query($conn, $sql) or die ($conn);
            $dates = mysqli_num_rows($result);

            if ( $dates === 1){
                $_SESSION['usr'] = $user;
                header('Location: ../../dashboard.php');
                

                // echo "bloco 2";
                
            }else{
                $_SESSION['alert'] = "<script>alert('Sorry, we couldn't find an account with this username. Please check you're using the right username and try again.')</script>";
                header("Location: ../../index.php");

                // echo "bloco 3";
            }

        }else{
            $_SESSION['alert'] = "<script>alert('Somthing wrong happend. Please try another time.')</script>";
            header('Location: ../../index.php');

            // echo "bloco 4";
        }

    }

?>