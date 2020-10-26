
<?php require_once 'Theme/blocks/header.php'; ?>



<!-- Container -->
    <div class="container pt-3 mb-5">
            <div class="row">
        <div class="col">
            <h1 class="mb-3 text-center text-md-left">Каталог мастеров и строительных компаний</h1>
            <?php  require_once 'conn.php';
               $query ="SELECT * FROM `users` where type = '2'"; 
               $result = mysqli_query($link, $query) or die("Ошибка " . mysqli_error($link)); 
               $num_rows = mysqli_num_rows($result);
              // $row = mysqli_fetch_row($result);
               $rows = mysqli_fetch_all($result, MYSQLI_ASSOC);
               ?>
            <!-- INFO BANNER -->
            <div class="card shadow-sm mb-3">
                <div class="card-body text-center">
                    <div class="text-nowrap mb-2">Всего <b><?php echo $num_rows; ?></b> строителей:</div>
                    <span class="text-nowrap"><b><?php echo $num_rows; ?></b> мастеров,</span>
                    <span class="text-nowrap"><b>0</b> бригад,</span>
                    <span class="text-nowrap"><b>0</b> компаний</span>
                </div>
            </div>
    
            <!-- Search -->
            <div class="card mb-4 shadow-sm bg-light">
                <div class="card-body">
                    
                        
                      
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="basic-addon1"><svg class="i is-search"><use xlink:href="#s-search"></use></svg></span>                                    
                    
                        
                            <input type="text" class="form-control" placeholder="Поиск по имени мастера или названии компании"  aria-describedby="basic-addon1">
                        </div>
                              
                </div>
            </div>






            <!-- Services -->
            <div class="my-4">

            <?php  require_once 'conn.php';
               $query ="SELECT * FROM `speciality`"; 
               $result = mysqli_query($link, $query) or die("Ошибка " . mysqli_error($link)); 
              // $num_rows = mysqli_num_rows($result);
              // $row = mysqli_fetch_row($result);
               $rows = mysqli_fetch_all($result, MYSQLI_ASSOC);
             //  print_r($rows);
                             
                foreach ($rows as $row) {                             
                       $v = $row['ID'];

               ?>
                        <div class="row align-items-center mb-2 p-1 text-center text-sm-left">
                            <div class="col-12 col-sm-auto pr-sm-0 mb-3 mb-sm-0">
                                <img src="Theme/images/1.png" class="mt-sm-n2 ml-sm-n2 mr-sm-n1" width="55" height="44">
                            </div>
                            <div class="col">
                                <h4><span class="text-uppercase"><?php echo $row['NAME_SPEC']; ?></span></h4>
                            </div>
                        </div>

                            <ul id="w1" class="row nav">
                                                            
                                <?php 
              $query2 = "SELECT * FROM `services` WHERE SPECID = $v";
             // echo $query2;
              $result2 = mysqli_query($link, $query2) or die("Ошибка " . mysqli_error($link)); 
              $rows2 = mysqli_fetch_all($result2, MYSQLI_ASSOC);
              foreach($rows2 as $roww) {
                $vr = $roww['ID'];                
                $query3 =" SELECT count(*) FROM users u, users_speciality us where u.id = us.user_id and us.user_speciality = $vr";
              //  echo  $query; 
                $result3 = mysqli_query($link, $query3) or die("Ошибка " . mysqli_error($link)); 
               // $num_rows = mysqli_num_rows($result);
               // $row = mysqli_fetch_row($result);
                $rowss = mysqli_fetch_all($result3, MYSQLI_ASSOC);
              ?>
                                <!-- delete this -->
                                <li class="col-md-6 mb-1 text-truncate">
                                    <a class="text-body" href="employeeByCategory.php?sid=<?php echo $roww['ID']; ?>">
                                        <svg class="text-primary mr-2 i id-angle-double-right">
                                            <use xlink:href="#d-angle-double-right"></use>
                                        </svg><?php echo $roww['NAME_SERV']; ?>
                                        <small class="text-muted small"><small>(<svg class="i is-user"><use xlink:href="#s-user"></use></svg> <?php echo $rowss[0]['count(*)'];  ?>)</small></small></a>
                                </li>
                                
                                <!-- end delete -->
      <?php }   ?>
                            </ul>        
                            <?php
      } ?>          
            </div>

            <hr>                                
                                
            </div>





        <!-- HITS -->
        <div class="col-lg-4">
            <div class="h3 text-center mb-3 mt-2">Лидеры каталога</div>             

            <div class="card mb-3 shadow-sm card-hover">
                <img class="ribbon-pro ribbon-right middle" src="Theme/images/ribbon-pro-right.png" alt="">            
                <div class="card-body pr-2 p-3">
                    <div class="row overflow-hidden">
                        <div class="col-auto pr-0">
                            <img class="rounded-circle" src="Theme/images/employees/143190.jpg" width="42" height="42" alt="Мастер Иван Иванов">                    
                        </div>
                        <!-- Info -->
                        <div class="col position-static">
                            <a class="stretched-link font-weight-bold" href="employeeProfile.html" target="_blank">Мастер Иван Иванов</a>                       
                            <div class="text-muted small">
                                Нур-Султан                        
                            </div>
                        </div>
                    </div>
                    <!-- Comment -->
                    <div class="small clearfix pt-2">
                        ​ Строительство и ремонт. Мы предоставляем услуги: составление смет, разработка проектов, консультация, строительство частных домов и не жил...               
                    </div>
                </div>
            </div>



            <!-- delete this -->
            <div class="card mb-3 shadow-sm card-hover">
                <img class="ribbon-pro ribbon-right middle" src="Theme/images/ribbon-pro-right.png" alt="">            
                <div class="card-body pr-2 p-3">
                    <div class="row overflow-hidden">
                        <div class="col-auto pr-0">
                            <img class="rounded-circle" src="Theme/images/employees/453155.jpg" width="42" height="42" alt="Бригада Пан-Буд">                    
                        </div>
                        
                        <div class="col position-static">
                            <a class="stretched-link font-weight-bold" href="employeeProfile.html" target="_blank">Мастер Петр Петров</a>                       
                            <div class="text-muted small">
                                Нур-Султан                        
                            </div>
                        </div>
                    </div>
                    
                    <div class="small clearfix pt-2">
                        ​ Работаю качественно, на совесть, все по лазерах. В наличие весь инструмет професионального класса, а также немeцкий апарат для безвоздушной...               
                    </div>
                </div>
            </div>            
            <!-- end delete -->

        </div>
    </div>
    




    <div class="page-text mt-5"></div>

    <!-- Partners -->
    <div id="w12" class="mb-4 pt-3 text-center">
        <div class="row justify-content-center">
            <div class="col-auto h5 mb-0 pt-2">Наши партнеры</div>
            <div class="col-auto">
                <div class="row">     
                    <div class="col mt-2 mt-sm-0"><img src="Theme/images/stroimdom.png" height="32" alt="Строим Дом"></div>
                </div>
            </div>
        </div>
    </div>
    </div>
<!--  Container end  -->  













    <a class="btn btn-primary position-fixed d-none d-lg-inline-block" href="# style="bottom: 0; right: 0; z-index: 1040;"><svg class="mr-2 i is-question-circle"><use xlink:href="#s-question-circle"></use></svg>Служба поддержки</a>
   
   <?php require_once 'Theme/blocks/footer.php'; ?>