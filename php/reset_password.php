<?php 

require_once '../smsc_api_solvingit.php';
require_once '../conn.php';

if(isset($_POST['phone'])){
    $phone = $_POST['phone'];

    $number = trim(substr($phone, 8, 13));
    $query = "Select * from users where phone  like '%$number%'";    
    $result = mysqli_query($link, $query) or die("Ошибка " . mysqli_error($link));
    $rows = mysqli_num_rows($result);
    if($rows > 0){
         $r = send_sms($_POST['phone'], "Vash kod podtverzhdeniya: ".ok_code($_POST['phone']));
        echo '1';  
    }
    else {
        echo '0';  
    }
   

}


if (isset($_POST['ok'])) {
    $oc = ok_code($_POST['phone_sms']);
    $code = $_POST['ok'];   
 
   $code = (int)$code;

    if ($oc == $code)
       {
           echo '1'; 
       }else{
           echo '0';
       }
        exit;
}

function ok_code($s) {
    return hexdec(substr(md5($s."<секретная строка>"), 7, 5));
}




?>