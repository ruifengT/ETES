/* ------------------------------------ Click on login and Sign Up to  changue and view the effect
---------------------------------------
*/

function cambiar_login() {
    document.querySelector('.cont_forms').className = "cont_forms cont_forms_active_login";
    document.querySelector('.cont_form_login').style.display = "block";
    document.querySelector('.cont_form_sign_up').style.opacity = "0";

    setTimeout(function(){  document.querySelector('.cont_form_login').style.opacity = "1"; },400);

    setTimeout(function(){
    document.querySelector('.cont_form_sign_up').style.display = "none";
    },200);
  }

function cambiar_sign_up(at) {
  document.querySelector('.cont_forms').className = "cont_forms cont_forms_active_sign_up";
  document.querySelector('.cont_form_sign_up').style.display = "block";
document.querySelector('.cont_form_login').style.opacity = "0";

setTimeout(function(){  document.querySelector('.cont_form_sign_up').style.opacity = "1";
},100);

setTimeout(function(){   document.querySelector('.cont_form_login').style.display = "none";
},400);


}



function ocultar_login_sign_up() {

document.querySelector('.cont_forms').className = "cont_forms";
document.querySelector('.cont_form_sign_up').style.opacity = "0";
document.querySelector('.cont_form_login').style.opacity = "0";

setTimeout(function(){
document.querySelector('.cont_form_sign_up').style.display = "none";
document.querySelector('.cont_form_login').style.display = "none";
},500);

}

function server_login(){
    var lg_id = document.getElementById('login_user_id').value;
    var lg_pass = document.getElementById('login_user_password').value;

    $.ajax({
        url: 'php/Login.php',
        type: 'POST',
        data: {login_user_id: lg_id, login_user_password: lg_pass},
        success: function(result){
            if(result != ''){
                if(result == 'error_user_id'){
                    alert('Error: User ID does not exist in database.');
                }
                else if(result == 'error_password'){
                    alert('Error: Password doesn\'t match! Please re-enter.');
                }
                else{
                    alert('Success! Now redirect to user dashboard.')
                    window.location = 'userdashboard.html?user_id=' + result;
                }
            }
        }
    });
}

function server_signup(){
    var id = document.getElementById('user_id').value;
    var email = document.getElementById('user_email').value;
    var pass = document.getElementById('user_password').value;
    var conf_pass = document.getElementById('confirm_password').value;

    if(pass != conf_pass){
        // check if password match
        alert('Password not match!');
    }
    else{
        // ajax to post data into back end, and alert feedback
        $.ajax({
            url: 'php/Signup.php',
            type: 'POST',
            data: {user_id: id, user_email: email, user_password: pass},
            success: function(result){
                if(result != ''){
                    if(result == 'error'){
                        alert('Your username exists. Choose another one.');
                    }
                    else{
                        alert('Success! Now redirect to user dashboard.')
                        window.location = 'userdashboard.html?user_id=' + result;
                    }
                }
            }
        });
    }
}
