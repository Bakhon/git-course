<?php 

session_start();

error_reporting(0);
?>

<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">

<title>Каталог мастеров и строительных компаний</title>

<meta property="og:title" content="Каталог мастеров и строительных компаний">
<meta property="og:description" content="Мастера и строители для качественного и недорого ремонта квартиры под ключ. Выбирайте лучших в нашем каталоге мастеров.">
<meta property="og:image" content="Theme/images/og-image.jpg">
<meta property="og:image:width" content="188">
<meta property="og:image:height" content="90">
<meta property="og:url" content="#">
<meta property="og:type" content="website">
<meta property="og:site_name" content="SiteName.kz">


<link rel="apple-touch-icon" sizes="180x180" href="Theme/favicon/apple-touch-icon.png">
<link rel="icon" type="image/png" sizes="32x32" href="Theme/favicon/favicon-32x32.png">
<link rel="icon" type="image/png" sizes="16x16" href="Theme/favicon/favicon-16x16.png">
<link rel="manifest" href="Theme/favicon/site.webmanifest">
<link rel="mask-icon" href="Theme/favicon/safari-pinned-tab.svg" color="#5bbad5">
<meta name="msapplication-TileColor" content="#da532c">
<meta name="theme-color" content="#ffffff">


<link href=Theme/images/192.png">
<link rel="stylesheet" href="Theme/css/site.css">
<script type="text/javascript" async="" src="Theme/js/analytics.js"></script>

</head>


<body id="body">

<div id="load" class="lds-ring d-lg-none" style="display: none;">
    <div></div>
    <div></div>
    <div></div>
    <div></div>
</div>

<!-- HEADER -->
    <header>
        <div class="container">
            <div class="row align-items-center d-none d-lg-flex">

                <!-- logo -->
                <div class="col-auto py-2 pr-0">
                    <a href="index.php"><img src="Theme/images/rabotniki.png" height="60" alt="SiteName.KZ"></a>            
                </div>
              
                    <div class="col-1 text-center p-0"> </div>

                <!-- Search -->
                <div class="col">
                    <form action="#tender" method="post">                
                        <div class="input-group">
                            <input id="need" name="need" type="text" class="form-control" placeholder="Что нужно сделать?">
                            <div class="input-group-append">
                                <button class="btn btn-secondary" type="submit">Найти мастера</button>
                            </div>
                        </div>
                    </form>                
                    
                    <small class="text-muted">
                        Например: <a href="#" onclick="$('#need').val($(this).text()).focus(); return false;">Сделать ремонт в 1-к квартире</a>
                    </small>
                </div>

                <!-- Registration/LogIn -->
                <div class="col-auto">
                        <ul class="my-2 flex-column nav" style="width: 280px; margin-left: 1.2rem;">
                            <li class="nav-item text-center">
                                <a class="nav-link" href="register.php">
                                    <svg class="mr-2 i is-user-plus"><use xlink:href="#s-user-plus"></use></svg>Зарегистрироваться</a>
                            </li>
                            <li class="nav-item text-center">
                            <?php if($_SESSION) { ?>
                                <a class="nav-link" href="myprofile.php">                                   
                                    <svg class="mr-2 i is-user"><use xlink:href="#s-sign-in-alt"></use></svg>Личный кабинет</a>
                                    <?php }else{ ?>
                                        <a class="nav-link" href="login.php">                                   
                                    <svg class="mr-2 i is-sign-in-alt"><use xlink:href="#s-sign-in-alt"></use></svg>Войти</a>
                                    <?php } ?>
                                </li>
                        </ul>                           
                </div>

            </div>
        </div>
    </header>
    
<!--  MENU -->
    <nav id="menu" class="navbar-main navbar-expand-lg navbar">
        <div class="container">
            <a class="navbar-brand" href="first.html">SiteName.KZ</a>
            <button type="button" class="navbar-toggler" data-toggle="offcanvas" aria-label="Toggle navigation">
                <svg class="i ir-bars"><use xlink:href="#r-bars"></use></svg>
            </button>
            
            <div class="navbar-content">
                <a class="btn btn-lg text-white px-3" href="login.html">
                    <svg class="i is-sign-in-alt"><use xlink:href="#s-sign-in-alt"></use></svg>
                </a>
            </div>

            <div id="menu-collapse" class="offcanvas-collapse  navbar-collapse">
                <div class="d-lg-none">
                    <div class="header-menu px-3 pt-3 pb-2 mb-2">
                        <div class="mt-1 mb-2">
                            <a class="h3 font-weight-bold" href="first.html">SiteName.KZ</a>
                        </div>
                        <a href="register.php">Регистрация</a> | 
                        <a href="login.php">Войти</a>
                    </div>
                    
                    <ul class="nav">
                        <li class="nav-item">
                        <a class="text-secondary nav-link" href="tenderAdd.html">
                            <svg class="mr-3 mr-lg-2 i il-plus"><use xlink:href="#l-plus"></use></svg>Создать тендер</a>
                        </li>
                    </ul>
                </div>
                
                <ul class="nav">
                    <li class="nav-item">
                        <a class="nav-link" href="catalog.php">
                            <svg class="mr-3 mr-lg-2 i is-user-hard-hat"><use xlink:href="#s-user-hard-hat"></use></svg>
                            Работники
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="tender.html">
                            <svg class="mr-3 mr-lg-2 i is-gavel"><use xlink:href="#s-gavel"></use></svg>
                            Тендеры
                        </a>
                    </li>                   
                    
                </ul>
                
                <hr class="my-2">

                    <!-- <div class="d-lg-none middle">
                        <ul class="nav">
                            <li class="nav-item">
                                <a class="nav-link py-1 text-muted" href="https://#/faq">
                                    Служба поддержки
                                </a>
                            </li>
                        </ul>
                    </div> -->
                    
                    <hr class="my-2">
                    
                    <div class="d-lg-none text-center pt-3 pb-4">
                        <a href="#">
                            <img src="Theme/images/rabotniki.png" alt="" style="height: 50px;">
                        </a>
                    </div>

            </div>
        </div>
    </nav>
