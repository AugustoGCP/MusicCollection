<?php

  session_start();

  if (isset($_SESSION['alert'])){
    echo $_SESSION['alert'];
    unset($_SESSION['alert']);
  }

  if (empty($_SESSION['usr'])){
    header("Location: ../../index.php");
  }

  $usr = $_SESSION['usr'];

?>