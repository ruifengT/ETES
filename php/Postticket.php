<?php
require "Config.php";

$ticket_name = $_POST['Name'];
$ticket_detail = $_POST['Detail'];
$ticket_quantity = $_POST['Quantity'];
$ticket_price = $_POST['Price'];
$ticket_postedby = $_POST['ID'];
$ticket_pickup_address = $_POST['Address'];
$datetime = date('YmdHis');

$sql_post_ticket = "INSERT INTO `tickets`(`ticket_name`, `ticket_detail`, `ticket_quantity`, `ticket_price`, `ticket_postedby`, `ticket_pickup_address`, `ticket_stmp`) VALUES (" . "'". $ticket_name . "','" . $ticket_detail . "'," . $ticket_quantity . "," . $ticket_price . ",'" . $ticket_postedby . "','" . $ticket_pickup_address . "'," . $datetime . ")";

if(!mysqli_query($conn, $sql_post_ticket)){
    header('location: ../sell_tickets.html?msg=error');
}
else{
    header('location: ../sell_tickets.html?msg=success');
}

mysqli_close($conn);
?>
