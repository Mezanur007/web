<?php
$conn =mysqli_connect("localhost", "root", "", "wdp");
if ($conn->connect_error) {
	die("Connection failed: ". $conn->connect_error);
	
}
else
echo "ok";
?>