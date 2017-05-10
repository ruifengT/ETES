<?php
require "Config.php";

$login_user_id = $_POST['Name'];
$login_user_password = $_POST['Password'];

$sql = "select * from logins where logins.login_user_id = '" . $login_user_id . "'";

$result = mysqli_query($conn, $sql);
while($row = mysqli_fetch_array($result)){
    $data[] = $row;
}

if(empty($data)){
    header('location: ../sign_up/signup.html?error=login_empty');
}
else{
    if(!password_verify($login_user_password, $data[0][1])){
        header('location: ../sign_up/signup.html?error=wrong_password');
    }
    else{
        header('location: ../userdashboard.html?user_id=' . $login_user_id);
    }
}
mysqli_close($conn);
?>
