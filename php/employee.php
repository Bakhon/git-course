<?php 


require_once '../conn.php';
/*
if(isset($_POST['city'])){
    echo 123;
    exit;
}
*/
if(isset($_POST['title'])){
    if($_POST['title']) {
    $title = $_POST['title'];
    $sid = $_POST['sid'];
    $query = "SELECT u.*, us.* FROM users u, users_speciality us WHERE u.id = us.USER_ID and us.user_speciality = $sid and u.NAME LIKE '%$title%'";
   // $query ="SELECT * FROM `users` where NAME LIKE '%$title%'"; 
    $result = mysqli_query($link, $query) or die("Ошибка " . mysqli_error($link)); 
    $rows = mysqli_fetch_all($result, MYSQLI_ASSOC);
    $num_rows = mysqli_num_rows($result);
    if($num_rows > 0){
        foreach($rows as $row)
        echo '<div class="card card-hover mb-4 shadow-sm emp" data="'.$row['ID'].'">
        <div class="card-body pb-1">
            <div class="row">
                 <div class="text-center col-md-auto mb-1 mb-md-0">
                    <img class="rounded" src="Theme/images/employees/143190.jpg" width="110" height="110" alt="Мастер Иван Иванов">             
                         <div class="text-warning mt-2 mb-n1">
                           <svg class="i is-star"><use xlink:href="#s-star" /></use></svg>
                           <svg class="i is-star"><use xlink:href="#s-star" /></use></svg>
                           <svg class="i is-star"><use xlink:href="#s-star" /></use></svg>
                           <svg class="i ir-star"><use xlink:href="#r-star" /></use></svg>
                           <svg class="i ir-star"><use xlink:href="#r-star" /></use></svg>
                         </div>                
                        
                         <div class="my-1 small">
                           <a class="text-body unlink" href="#" data-modal="/modal/rank-info">Рейтинг: 75 из 80</a>                
                         </div>

                         <div class="mb-2">
                            <a class="small text-muted unlink" href="#" rel="nofollow">0 отзывов</a>                
                        </div>
                 </div>


                 <div class="col text-center text-md-left position-static">
                    <div>
                         <span  class="icon-pro">PRO</span>
                         <span class="h4 align-middle d-block d-md-inline mt-2 ml-1">
                            <a class="stretched-link" href="employeeProfile.html">Мастер '.$row['NAME'].' </a>  
                         </span>
                    </div>

                    <div class="my-3">
                        <div class="pr-3 mb-3 mb-md-0 d-md-inline">
                            <svg class="i is-map-marker-alt"><use xlink:href="#s-map-marker-alt" /></use></svg> 
                            '.$row['LOCATION'].'                   
                        </div>                      
                    </div>

                    <div class="text-muted small my-3">
                        <span class="text-nowrap d-block d-md-inline">Зарегистрирован 1 месяц назад</span>
                        <span class="px-2 d-none d-md-inline">•</span>
                        <span class="text-nowrap text-success">Сейчас на сайте</span>               
                    </div>

                    <div class="text-left mb-3">
                        Работу выполняю качественно!                                    
                    </div>
                </div>


            </div>
        </div>
    </div>';
  }  }else {
    
    if(isset($_GET['page'])){
        $page = $_GET['page'];
    }else{
        $page = 1;
    }                              
    $count_news = 2;
    $from = ($page-1)*$count_news;  
  //  $from = 0;            
   // $rnum = $rownum-9;
    $id = $_POST['sid'];
  // $query ="SELECT u.*, d.id city_id, d.name city_name from users u,  users_speciality us, speciality sp, services s, dic_country d where u.LOCATION = d.ID and u.id = us.USER_ID and us.USER_SPECIALITY = s.ID and s.ID = $id and u.id > 0 LIMIT $from,$count_news";  
   $query = "SELECT u.*, d.id city_id, d.name city_name from users u, users_speciality, speciality, dic_country d where u.ID = users_speciality.USER_ID and users_speciality.USER_SPECIALITY = speciality.id and speciality.id = 4 and u.LOCATION = d.ID and u.id > 0 LIMIT $from,$count_news";  
 //  echo $query;            
   $result = mysqli_query($link, $query) or die("Ошибка " . mysqli_error($link)); 
   $query2 = "SELECT u.* from users u, users_speciality us, speciality sp, services s where u.id = us.USER_ID and us.USER_SPECIALITY = s.ID and s.ID = $id";
   $result2 = mysqli_query($link, $query2) or die("Ошибка " . mysqli_error($link)); 
   $num_rows = mysqli_num_rows($result2);
  // $row = mysqli_fetch_row($result);
   $rows = mysqli_fetch_all($result, MYSQLI_ASSOC); 
 //  print_r($rows);
   foreach($rows as $row) {
    echo '<div class="card card-hover mb-4 shadow-sm emp" data="'.$row['ID'].'">
        <div class="card-body pb-1">
            <div class="row">
                 <div class="text-center col-md-auto mb-1 mb-md-0">
                    <img class="rounded" src="Theme/images/employees/143190.jpg" width="110" height="110" alt="Мастер Иван Иванов">             
                         <div class="text-warning mt-2 mb-n1">
                           <svg class="i is-star"><use xlink:href="#s-star" /></use></svg>
                           <svg class="i is-star"><use xlink:href="#s-star" /></use></svg>
                           <svg class="i is-star"><use xlink:href="#s-star" /></use></svg>
                           <svg class="i ir-star"><use xlink:href="#r-star" /></use></svg>
                           <svg class="i ir-star"><use xlink:href="#r-star" /></use></svg>
                         </div>                
                        
                         <div class="my-1 small">
                           <a class="text-body unlink" href="#" data-modal="/modal/rank-info">Рейтинг: 75 из 80</a>                
                         </div>

                         <div class="mb-2">
                            <a class="small text-muted unlink" href="#" rel="nofollow">0 отзывов</a>                
                        </div>
                 </div>


                 <div class="col text-center text-md-left position-static">
                    <div>
                         <span  class="icon-pro">PRO</span>
                         <span class="h4 align-middle d-block d-md-inline mt-2 ml-1">
                            <a class="stretched-link" href="employeeProfile.html">Мастер '.$row['NAME'].' </a>  
                         </span>
                    </div>

                    <div class="my-3">
                        <div class="pr-3 mb-3 mb-md-0 d-md-inline">
                            <svg class="i is-map-marker-alt"><use xlink:href="#s-map-marker-alt" /></use></svg> 
                            '.$row['LOCATION'].'                   
                        </div>                      
                    </div>

                    <div class="text-muted small my-3">
                        <span class="text-nowrap d-block d-md-inline">Зарегистрирован 1 месяц назад</span>
                        <span class="px-2 d-none d-md-inline">•</span>
                        <span class="text-nowrap text-success">Сейчас на сайте</span>               
                    </div>

                    <div class="text-left mb-3">
                        Работу выполняю качественно!                                    
                    </div>
                </div>


            </div>
        </div>
    </div>';

    } }
  //  print_r($rows);        
    exit;
    
}


?>