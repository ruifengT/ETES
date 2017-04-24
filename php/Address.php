<?php
require "Config.php";

//$order_id = 2; // change this to next line for POST
$ticket_id = $_POST['ticketId'];
//$sql_address =  "SELECT ticket_pickup_address FROM tickets AS t INNER JOIN orders AS o ON t.ticket_id = o.order_ticket_id WHERE order_id = " . $order_id;

$sql_address = "select ticket_pickup_address from tickets where ticket_id = ". $ticket_id;

$result = mysqli_query($conn, $sql_address)  or die ("Error: ".mysqli_error($conn));
while($row = mysqli_fetch_array($result)){
    $data[] = $row;
}
if(empty($data)){
    echo json_encode('0');
}
else{
    echo json_encode($data);
}

mysqli_close($conn);
?>
