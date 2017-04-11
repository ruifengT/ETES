<!DOCTYPE html>
<html>
<head>
<style>
table {
    width: 100%;
    border-collapse: collapse;
}

table, td, th {
    border: 1px solid black;
    padding: 5px;
}

th {text-align: left;}
</style>
</head>
<body>

<?php
require "Config.php";

$sql = "SELECT ticket_name, ticket_detail, ticket_quantity, ticket_price, ticket_pickup_address FROM tickets";
$result = mysqli_query($conn, $sql);

// while($row = mysqli_fetch_array($result)){
//     $data[] = $row;
// }

echo "<table>";
while($row = mysqli_fetch_array($result)){
	echo "<tr>";
	echo "<td>" . $row['ticket_name'] . "</td>";
	echo "<td>" . $row['ticket_detail'] . "</td>";
	echo "<td>" . $row['ticket_quantity'] . "</td>";
	echo "<td>" . $row['ticket_price'] . "</td>";
	echo "<td>" . $row['ticket_pickup_address'] . "</td>";
	echo "</tr>";
	}
echo "</table>";
//echo json_encode($data);
mysqli_close($conn);
?>
</body>
</html>