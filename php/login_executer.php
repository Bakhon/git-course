 <?php

require_once '../conn.php';

if(isset($_POST['phone']))
{
     $phone = $_POST['phone'];
     $password = trim($_POST['password']);
     $number = trim(substr($phone, 8, 13));
     $pass = md5($password);
     
     $query = "Select * from users where phone  like '%$number%' and password = '$pass'";    
     $result = mysqli_query($link, $query) or die("Ошибка " . mysqli_error($link));
     $rows = mysqli_num_rows($result);
     if($rows > 0)
     {
         session_start();
         $_SESSION['NUM'] = $phone;
         echo '1';
     }
     else {
         echo '0';
     }
}


?>