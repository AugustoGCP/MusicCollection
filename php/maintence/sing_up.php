<?php

    include "../connection.php";
    include "../create_profile.php";

    $full_name = $_POST['full_name'];
    $user = $_POST['user'];  
    $password = $_POST['password']; 
    $birth = $_POST['birth'];

    $sql = "insert into tb_users (usr, full_name, password, birth) values ('$usr', '$full_name', 'password', '$birth')";
    
    if (mysqli_query($conn, $sql)){

        mkdir("../../usr/$user",0777, true);

        $dir_created = fopen("../../usr/$user/profile.php", "w");

        fwrite($dir_created, $data_html_profile);

        fclose($dir_created);   
        
        $_SESSION['alert'] = "<script>alert('Password created sucessfully')</script>";

        header("Location: ../../usr/$user/profile.php");

    }else{

        $_SESSION['alert'] = "<script>alert('Something happend wrong. Please try later.')</script>";
        header("Location: ../../include/sing_up.php");
    }

?>