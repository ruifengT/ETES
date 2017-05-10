<?php
require "Config.php";

$user_id = $_POST['Name'];
$user_password = $_POST['Password'];
$user_confirmpassward = $_POST['ConfirmPassword'];
$user_email = $_POST['Email'];
$datetime = date('YmdHis');

if($user_password != $user_confirmpassward){
    header('location: ../sign_up/signup.html?error=password');
}
else{
    $hash_password = password_hash($user_password, PASSWORD_DEFAULT);
    $sql_insert_logins = "INSERT INTO `logins`(`login_user_id`, `login_user_password`) VALUES ('" . $user_id . "','" . $hash_password . "')";
    $sql_insert_users = "INSERT INTO `users`(`user_id`, `user_email`, `user_create_stmp`) VALUES ('" . $user_id . "','" . $user_email . "','" . $datetime . "')";

    if(!mysqli_query($conn, $sql_insert_logins)){
        header('location: ../sign_up/signup.html?error=login');
    }
    else{
        if(!mysqli_query($conn, $sql_insert_users)){
            header('location: ../sign_up/signup.html?error=user');
        }
        else{
            header('location: ../userdashboard.html?user_id=' . $user_id);
        }
    }

    mysqli_close($conn);
}
?>
