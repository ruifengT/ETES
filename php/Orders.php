<?php
require "Config.php";

$user_id = $_POST['user_id'];
$ticket_id = $_POST['ticket_id'];
$ticket_quantity = $_POST['ticket_quantity'];
$datetime = date('YmdHis');

$sql_price = "SELECT `ticket_price` from `tickets` where `ticket_id` = " . $ticket_id;

$result = mysqli_query($conn, $sql_price);
while($row = mysqli_fetch_array($result)){
    $data[] = $row;
}

$ticket_total_price = $data[0][0] * $ticket_quantity;

$sql_insert_order = "INSERT INTO `orders`(`order_buy_user_id`, `order_sell_user_id`, `order_ticket_id`, `order_ticket_quantity`, `order_price`, `order_stmp`) VALUES ('" . $user_id . "',(SELECT `ticket_postedby` FROM `tickets` WHERE `ticket_id` = " . $ticket_id . ")," . $ticket_id . "," . $ticket_quantity . "," . $ticket_total_price . ", '" . $datetime . "')";

if(mysqli_query($conn, $sql_insert_order)){
    echo "Order palced in database.";
}
else{
    echo "Fail to place order in database.";
}
mysqli_close($conn);
?>
