               // Авторизация
$('.login-btn').click(function (e){

    $('.msg').addClass('none');
     e.preventDefault();

     $('input').removeClass('error');

     let login = $('input[name="login"]').val();
     let pass = $('input[name="pass"]').val();

     $.ajax({
          url: 'inc/signin.php',
          type: 'POST',
          dataType: 'json',
          data: {
               login: login,
               pass: pass
          },
          success (data) {

               if(data.status) {
                    document.location.href = '/loggedin.php';
               } else {

                    if(data.type === 1){
                      data.fields.forEach(function (field){
                         $('input[name="${field}"]').addClass('error');
                      });
                    }
                    $('.msg').removeClass('none').text(data.message);
               }
          }

     });
});

               //Регистрация
               $('.reg-btn').click(function (e){

                    e.preventDefault();
                    $('.error_login').addClass('none');
                    $('.error_pass').addClass('none');
                    $('.error_confirm').addClass('none');
                    $('.error_email').addClass('none');
                    $('.error_name').addClass('none');
                    $('input').removeClass('error');

                    let login = $('input[name="login"]').val();
                    let pass = $('input[name="pass"]').val();
                    let confirm_pass = $('input[name="confirm_pass"]').val();
                    let email = $('input[name="email"]').val();
                    let name = $('input[name="name"]').val();





                    $.ajax({
                         url: 'inc/registr.php',
                         type: 'POST',
                         dataType: 'json',
                         data: {
                              login: login,
                              pass: pass,
                              confirm_pass: confirm_pass,
                              email: email,
                              name: name
                         },
                         success (data) {

                              if(data.status) {
                                    document.location.href = '/index.php';
                              } else {

                                   if(data.type === 2){
                                        data.fields.forEach(function (field){
                                             $('input[name="${field}"]').addClass('error');
                                        });
                                        $('.error_login').removeClass('none').text(data.message);
                                   }
                                   if(data.type === 3){
                                        data.fields.forEach(function (field){
                                             $('input[name="${field}"]').addClass('error');
                                        });
                                        $('.error_pass').removeClass('none').text(data.message);
                                   }
                                   if(data.type === 4){
                                        data.fields.forEach(function (field){
                                             $('input[name="${field}"]').addClass('error');
                                        });
                                        $('.error_confirm').removeClass('none').text(data.message);
                                   }
                                   if(data.type === 5){
                                        data.fields.forEach(function (field){
                                             $('input[name="${field}"]').addClass('error');
                                        });
                                        $('.error_email').removeClass('none').text(data.message);
                                   }
                                   if(data.type === 6){
                                        data.fields.forEach(function (field){
                                             $('input[name="${field}"]').addClass('error');
                                        });
                                        $('.error_name').removeClass('none').text(data.message);
                                   }
                              }
                         }

                    });
               });
