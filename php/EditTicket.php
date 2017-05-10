<?php
require "Config.php";

$ticket_id = $_POST['ID'];
$ticket_name = $_POST['Name'];
$ticket_detail = $_POST['Detail'];
$ticket_quantity = $_POST['Quantity'];
$ticket_price = $_POST['Price'];
$ticket_postedby = $_POST['Postby'];
$ticket_pickup_address = $_POST['Address'];

$sql_update_ticket = "UPDATE `tickets` SET `ticket_name`='" . $ticket_name . "',`ticket_detail`='" . $ticket_detail . "',`ticket_quantity`=" . $ticket_quantity . ",`ticket_price`=" . $ticket_price . ",`ticket_pickup_address`='" . $ticket_pickup_address . "' WHERE `ticket_id`=" . $ticket_id;


if(!mysqli_query($conn, $sql_update_ticket)){
    header('location: ../userdashboard.html?user_id=' . $ticket_postedby . '&msg=edit_t_error');
}
else{
    header('location: ../userdashboard.html?user_id=' . $ticket_postedby . '&msg=edit_t_success');
}

mysqli_close($conn);
?>
