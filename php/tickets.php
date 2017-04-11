<?php
require "Config.php";

$user_id = $_POST['user_id'];

$ticket_postedby = $user_id;

$sql = "select * from users, tickets where tickets.ticket_postedby = users.user_id and tickets.ticket_postedby = '" . $user_id . "'";

$result = mysqli_query($conn, $sql);
while($row = mysqli_fetch_array($result)){
    $data[] = $row;
}
echo json_encode($data);
mysqli_close($conn);

?>