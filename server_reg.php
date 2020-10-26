<?php

require 'smsc_api_solvingit.php';
require 'conn.php';

if(isset($_POST['name'])){
    $name = $_POST['name'];
    $who = $_POST['who'];
    $phone = $_POST['phone'];
    $password = $_POST['password'];
    $post_date = date('d.m.Y');  
           
    $number = trim(substr($phone, 8, 13));
    $query = "Select * from users where phone  like '%$number%' and type  like '%$who%'";    
    $result = mysqli_query($link, $query) or die("Ошибка " . mysqli_error($link));
    $rows = mysqli_num_rows($result);
     if($rows <= 0){            
       $r = send_sms($_POST['phone'], "Vash kod podtverzhdeniya: ".ok_code($_POST['phone']));
      echo '1';   
     }
     else {
        echo '0';
     }
     exit;
}

if (isset($_POST['ok'])) {
    $oc = ok_code($_POST['phone']);
    $code = $_POST['ok'];
    $name = $_POST['name_reg'];
    $who = $_POST['who'];
    $phone = $_POST['phone'];
    $password = $_POST['password'];
    $post_date = date('d.m.Y');
    $password = md5($password);
 
   $code = (int)$code;

    if ($oc == $code && $who == 2)
       { 
        $query_ins = "INSERT INTO `users`(`NAME`, `PHONE`, `TYPE`, `PASSWORD`, `STATUS`, `DATE`) values('$name', '$phone', '$who', '$password', '1', '$post_date')";     
        $result_ins = mysqli_query($link, $query_ins) or die("Ошибка " . mysqli_error($link));   
        echo '1';}
        elseif($oc == $code && $who == 1){
            $query_ins = "INSERT INTO `users`(`NAME`, `PHONE`, `TYPE`, `PASSWORD`, `STATUS`, `DATE`) values('$name', '$phone', '$who', '$password', '1', '$post_date')";     
            $result_ins = mysqli_query($link, $query_ins) or die("Ошибка " . mysqli_error($link));   
            echo '2';
        }
    else {
        echo '0';
        }
        exit;
}


function ok_code($s) {
    return hexdec(substr(md5($s."<секретная строка>"), 7, 5));
}


if(isset($_POST['data']))
{
    $data = $_POST['data'];
    $length = count($data);
    $phone_s = $_POST['phone_s'];
    $number = trim(substr($phone_s, 8, 13));
    $query = "Select * from users where phone  like '%$number%'";    
    $result = mysqli_query($link, $query) or die("Ошибка " . mysqli_error($link));
    
    $rows = mysqli_fetch_all($result, MYSQLI_ASSOC);
   // print_r($rows);
    foreach($rows as $row){
        $id = $row['ID'];
    }
    for($i=0;$i<$length;$i++) {
    $query = "INSERT INTO `USERS_SPECIALITY`(`USER_ID`, `USER_SPECIALITY`) values('$id', '$data[$i]')";    
    $result = mysqli_query($link, $query) or die("Ошибка " . mysqli_error($link));  
    }
    echo '1';
    exit; 
}


//echo '1';

?>