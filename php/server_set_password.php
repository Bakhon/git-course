<?php 

require_once '../conn.php';

if(isset($_POST['pass'])){   
    $pass = $_POST['pass'];
    $pass_check = $_POST['pass_check'];
    $ph = trim($_POST['ph']);
    $pass = md5($pass);
    
    $query = "UPDATE `users` SET `PASSWORD`= '$pass' WHERE PHONE = '+$ph'";
   // echo $query;
  //  $query = "Select * from users where phone  like '%$number%' and type  like '%$who%'";    
    $result = mysqli_query($link, $query) or die("Ошибка " . mysqli_error($link));   
    if($result)
    {
      echo 1; 
    }else{
      echo 0;
    }
    
}

?>