$('#signup-agreement').click(function(){

    if ($('#signup-agreement').is(' :checked')){
        $('#register').prop('disabled', false);        
    } else {
        $('#register').prop('disabled', true);        
    }
})

$('#register').click(function(){
    $name = $('#signup-username').val();
    $who = $('#tender-expired').val();
    $phone = $('#phone1').val();
    $password = $('#signup-password').val();   
    
    if($name == '')
    {
        $('#invalid_name').html('<p>'+'Не заполнено поле Имя'+'</p>');
    }

    if($name != '' && $who != '' && $phone != '' && $password != '')
    {
        $.post('server_reg.php', {"name": $name, "who": $who, "phone": $phone, "password": $password}, function(d){
            if(d == 1)
            {
                $('#sms_confirm').show();
                $('#timer_msg').text('Мы отправили смс на номер' +$phone+'');
                $('#signup-username').prop('disabled', 'true');
                $('#tender-expired').prop('disabled', 'true');
                $('#phone1').prop('disabled', 'true');
                $('#signup-password').prop('disabled', 'true');
                $('#signup-agreement').prop('disabled', 'true');
                $('#confirm').css('display', 'block');
                $('#register').css('display', 'none');            
            }
            else {
                alert('Пользователь с номером'+$phone+' существует');
            }
        })
    } 
})

$('#confirm').click(function(){
   $code = $('#signup-code').val();
   $phone_client = $('#phone1').val();
   console.log($code);
   $.post('server_reg.php', {"ok": $code, "phone": $phone_client, "name_reg": $name, "who": $who, "phone": $phone, "password": $password}, function(d){
       if(d == 1)
       {
           window.location.href = 'register2.php?phone='+$phone_client+'&&type='+$who;
       }
       else if(d == 2) {
        setTimeout(function(){ window.location.href = 'index.php'; }, 3000);
        alert('Регистрация прошла успешна, вас перенаправят на страницу авторизации');
       }
       else{
        alert('Вы указали неверный код');
       }
   })
})

$('#send_login').click(function(){
    $phone = $('#phone1').val();
    $password = $('#loginform-password').val();
    console.log($phone);
    if($phone != '' && $password != ''){
        $('#invalid_phone').html('');
        $('#invalid_password').html('');
        $.post('php/login_executer.php', {"phone": $phone, "password": $password}, function(d){
            if(d == 1){
                window.location.href = 'myprofile.php';
            }
            else{
                $('#invalid_error_login_password').html('<p style="color:red">Вы ввели неправильный телефон или пароль</p>');
            }
    
        })
    }else{
        if($phone == ''){            
            $('#invalid_phone').html('<p style="color:red">Необходимо заполнить «телефон».</p>');
        }
        if($phone != ''){            
            $('#invalid_phone').html('');
        }
        if($password == ''){
            $('#invalid_password').html('<p style="color:red">Необходимо заполнить «пароль».</p>');
        }
        if($password != ''){
            $('#invalid_password').html('');
        }
    }
 
})

$('#reset_send').click(function(){
    $phone = $('#phone1').val();
       if($phone != '') {
    $.post('php/reset_password.php', {"phone": $phone}, function(d){
        if(d == 1){
            $('#reset_send').css('display', 'none');
            $('#confirm_reset_pass').css('display', 'block');
            $('#confirm_sms').css('display', 'block');
            $('#phone1').prop('disabled', true);
            $('#msg_send_reset_pass').text('Смс отправлен на номер' +$phone+'');
        }else {
            alert('Пользователь с таким номером не существует!');
        }
    })   
}else{
    alert('Введите номер телефона');
}
})

$('#send_confirm_sms_pass').click(function(){
  $phone = $('#phone1').val();
  $code = $('#passwordresetform-code').val();
  console.log($phone);
  console.log($code);
  $.post('php/reset_password.php', {"phone_sms": $phone, "ok": $code}, function(d){
    if(d == 1){
        window.location.href = 'set_password.php?login='+$phone;
    }else{
        alert('Вы указали неверный код')
    }    
})
})

// Установка пароля

$('#set_password').click(function(){
    $pas = $('#password').val();
    $pass_check = $('#password_cheked').val();
    $ph = $('#ph').val();
    console.log($ph);
    if($pas == $pass_check){
        $.post('php/server_set_password.php', {"pass": $pas, "pass_check": $pass_check, "ph": $ph}, function(d){
            if(d == 1){
                setTimeout(function(){ window.location.href = 'index.php'; }, 3000);
                alert('Ваш пароль обновлен!');
            }else{
                alert('Ошибка при обновлении пароля!');
            }
        })
    }else{
           alert('Подтвердите пароль корректно!');
    }
})

/*
$('#signup-username').keyup(() => {
        $name = $('#signup-username').val();
        if ($name == '') {
            $('.invalid-feedback"').text('Не заполнено поле имя');
        }
    })
*/
