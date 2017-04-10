<?php
require "Config.php";

$user_id = $_POST['user_id'];

$sql = "select * from logins, users where logins.login_user_id = users.user_id and users.user_id = '" . $user_id . "'";

$result = mysqli_query($conn, $sql);
while($row = mysqli_fetch_array($result)){
    $data[] = $row;
}
echo json_encode($data);
mysqli_close($conn);
?>
