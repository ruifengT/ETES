<?php
require "Config.php";

$user_id = $_POST['user_id'];

$sql = "SELECT * FROM `orders` join `tickets` on `orders`.`order_ticket_id` = `tickets`.`ticket_id` WHERE `order_buy_user_id` = '" . $user_id . "' or `order_sell_user_id` = '" . $user_id . "'";

$result = mysqli_query($conn, $sql);
while($row = mysqli_fetch_array($result)){
    $data[] = $row;
}
echo json_encode($data);
mysqli_close($conn);
?>
