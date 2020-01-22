<?php
    date_default_timezone_get('America/Sao_Paulo');

    $server = "localhost";
    $user = "root";
    $password = "";
    $base = "db_collection_music";

    $conn = mysqli_connect($server, $user, $password, $base);

    if (!$conn){
        die ("Connection error".mysqli_connection_error());
    }else{
        // echo "Connection succssesfully done!";
    }
?>
