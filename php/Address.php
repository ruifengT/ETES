<?php
require "Config.php";

$order_id = 1; // change this to next line for POST
//$order_id = $_POST['order_id'];

$sql_address = "SELECT u1.`user_address` as `buyer`, u2.`user_address` as `seller` from `orders` o, `users` u1, `users` u2 where o.`order_buy_user_id` = u1.`user_id` and o.`order_sell_user_id` = u2.`user_id` and o.`order_id` = " . $order_id;

$result = mysqli_query($conn, $sql_address);
while($row = mysqli_fetch_array($result)){
    $data[] = $row;
}

if(empty($data)){
    echo json_encode('0');
}
else{
    echo json_encode($data[0]);
}

mysqli_close($conn);
?>
