<?php
require "Config.php";

$user_id = $_POST['ID'];
$user_name = $_POST['Name'];
$user_email = $_POST['Email'];
$user_phone = $_POST['Phone'];
$user_address = $_POST['Address'];
$user_creditcard = $_POST['Credit'];

$sql_update_user = "UPDATE `users` SET `user_name`='" . $user_name . "',`user_email`='" . $user_email . "',`user_phone`='" . $user_phone . "',`user_address`='" . $user_address . "',`user_creditcard`='" . $user_creditcard . "' WHERE `user_id`='" . $user_id . "'";


if(!mysqli_query($conn, $sql_update_user)){
    header('location: ../userdashboard.html?user_id=' . $user_id . '&msg=edit_error');
}
else{
    header('location: ../userdashboard.html?user_id=' . $user_id . '&msg=edit_success');
}

mysqli_close($conn);
?>
