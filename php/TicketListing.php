<?php
require "Config.php";
echo "Ticket Listing<br>";

$ticket_id = $_POST['ticket_id'];

$sql = "SELECT ticket_name, ticket_detail, ticket_quantity, ticket_price, ticket_pickup_address, ticket_stmp FROM tickets";

$result = mysqli_query($conn, $sql);

while($row = mysqli_fetch_array($result)){
    $data[] = $row;
}

echo json_encode($data);

mysqli_close($conn);
?>