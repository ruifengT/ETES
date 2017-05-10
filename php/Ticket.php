<?php
require "Config.php";

$ticket_id = $_POST['ticket_id'];

$sql = "select * from tickets where tickets.ticket_id = " . $ticket_id;

$result = mysqli_query($conn, $sql);
while($row = mysqli_fetch_array($result)){
    $data[] = $row;
}
echo json_encode($data);
mysqli_close($conn);
?>
