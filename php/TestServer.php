<?php
require "Config.php";

echo "Test Server Page<br>";
$datetime = date("m/d/y H:i:s");
echo "Local Time: " . $datetime;
// all table in database
$tables = ["logins", "orders", "securities", "tickets", "users"];
foreach($tables as $table){
    // initialize data & key array
    $datas = array();
    $keys = array();
    //fetch data
    $sql = "select * from " . $table . "";
    $result = mysqli_query($conn, $sql);
    while($row = mysqli_fetch_array($result)){
    	$datas[] = $row;
    }
    // error message if data is null
    if(empty($datas)){
    	echo "SQL result is empty";
    }
    // print data in table
    else{
        echo "<br>" . $table . "<br>";
    	$all_keys = array_keys($datas[0]);
    	// get string key
    	foreach($all_keys as $all_key){
    		if(!is_int($all_key)) $keys[] = $all_key;
    	}
    	// table begins
    	echo "<table border='1' cellpadding='0' cellspacing='0' align='top'>";
    	// print keys row
    	foreach($keys as $key){
    		echo "<th>" .  $key . "</th>";
    	}
    	// print datas items row
    	foreach($datas as $data){
    		echo "<tr>";
    		foreach($keys as $key){
    			echo "<td>" . $data[$key] . "</td>";
    		}
    		echo "</tr>";
    	}
    	echo "</table>";
    }
}
// close connection
mysqli_close($conn);
?>
