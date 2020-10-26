<?php 

require_once 'Theme/blocks/header.php';
?>

<div class="container pt-3 mb-5">
        <h2 class="mb-3 text-center">Установка пароля</h2>
    
    <div class="row justify-content-center">
      <div class="col-sm-8 col-md-6 col-lg-5 col-xl-4">
        <div class="card border-2 border-primary">
            <div class="card-body px-4 px-sm-5 py-4">
    
                <form id="password-set" action="/password-set" method="post">
                        <input type="hidden" name="ph" id="ph" value="<?php echo $_GET['login']; ?>" />
                        <div class="form-group field-passwordresetform-phone required">
                            <label for="password">Пароль</label>
                            <input type="password" id="password" class="form-control form-control-lg w-250px "  aria-required="true" >                                                       
                        </div>

                        <div class="form-group field-passwordresetform-phone required">
                            <label for="password_cheked">Подтвердите пароль</label>
                            <input type="password" id="password_cheked" class="form-control form-control-lg w-250px "  aria-required="true" >                                                       
                        </div>
                            
                        <input type="hidden" id="passwordresetform-captcha" name="PasswordResetForm[captcha]">
                        <div class="form-group">
                            <input id="set_password" type="button" class="btn btn-primary btn-lg btn-block" value="Сохранить">                    
                        </div>
                        
                          <div id="msg_send_reset_pass">
                          
                          </div>
                        
                    
                </form>
            </div>
        </div>
      </div>
 </div>
    </div>

<?php
require_once 'Theme/blocks/footer.php';

?>