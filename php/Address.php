<?php
require "Config.php";

$ticket_id = $_POST['ticket_id'];

$sql_address =  "SELECT ticket_pickup_address FROM tickets WHERE ticket_id = " . $ticket_id;

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
