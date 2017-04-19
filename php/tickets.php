<?php
require "Config.php";

$ticket_postedby = $_POST['ticket_postedby'];

$sql = "select * from users, tickets where tickets.ticket_postedby = users.user_id and tickets.ticket_postedby = '" . $ticket_postedby . "'";

$result = mysqli_query($conn, $sql);
while($row = mysqli_fetch_array($result)){
    $data[] = $row;
}
echo json_encode($data);
mysqli_close($conn);

?>
