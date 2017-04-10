<?php
require "Config.php";

$sql = "select * from tickets";
$result = mysqli_query($conn, $sql);
while($row = mysqli_fetch_array($result)){
	$data[] = $row;
}
echo json_encode($data);
// close connection
mysqli_close($conn);
?>
