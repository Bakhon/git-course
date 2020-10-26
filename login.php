<?php require_once 'Theme/blocks/header.php'; 

?>
    

    <div class="container pt-3 mb-5">
        
        <h2 class="mb-3 text-center">Вход на сайт</h2>
        
        <div class="row justify-content-center">
            <div class="col-sm-8 col-md-6 col-lg-5 col-xl-4">
                <div class="card border-2 border-primary">
                    <div class="card-body px-4 px-sm-5 py-4">
        
                      
                        <div class="form-group field-loginform-phone required">
                            <label for="phone1">Телефон</label>
                            <input type="text" id="phone1" class="form-control form-control-lg"   aria-required="true">
                            
                            <div id="invalid_phone"></div>
                        </div>
    
                        <div class="form-group field-loginform-password required">
                            <label for="loginform-password">Пароль</label>
                            <input type="password" id="loginform-password" class="form-control form-control-lg" name="LoginForm[password]" value="" aria-required="true">
                            
                            <div id="invalid_password"></div>
                        </div>
    
                        <div class="form-group field-loginform-rememberme">
                            <div class="custom-control custom-checkbox">
                                <input type="hidden" name="LoginForm[rememberMe]" value="0">
                                <input type="checkbox" id="loginform-rememberme" class="custom-control-input" name="LoginForm[rememberMe]" value="1" >
                                <label class="custom-control-label" for="loginform-rememberme">Запомнить меня</label>
                                <div id="invalid_error_login_password"></div>                        
                            </div>
                        </div>
    
                        <div class="form-group">
                            <input id="send_login" type="button" class="btn btn-primary btn-lg btn-block" value="Войти" />                
                        </div>                              
                        Если Вы забыли свой пароль, Вы можете его <a href="password-reset.php">восстановить</a>.
                    </div>
                </div>
            </div>
        </div>
    </div>







    <a class="btn btn-primary position-fixed d-none d-lg-inline-block" href="#" style="bottom: 0; right: 0; z-index: 1040;"><svg class="mr-2 i is-question-circle"><use xlink:href="#s-question-circle"></use></svg>Служба поддержки</a>
   

  
  
    <?php require_once 'Theme/blocks/footer.php'; ?>
  
     
  
  
  
   