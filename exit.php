<?php
        session_start();
        unset($_SESSION['NUM']);
        unset($_SESSION);
       header("Location:login.php");
  

?>