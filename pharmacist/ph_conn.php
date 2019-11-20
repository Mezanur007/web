<?php 
if (!isset($_SESSION)) {
	session_start();
	# code...
}
$connection = mysqli_connect("localhost", "root", "", "care"); // Establishing Connection with Server

if(isset($_POST['submit'])){ // Fetching variables of the form which travels in URL
$id = $_POST['id'];
$name = $_POST['name'];
$user = $_POST['user'];
$address = $_POST['address'];
$contact = $_POST['contact'];

$password = $_POST['password'];

//Insert Query of SQL
$sql = "INSERT into ph_login(id, name, user, address, contact, password) VALUES (
'$id','$name','$user','$address','$contact','$password')";
if (mysqli_query($connection, $sql)) {

    header("location: /web/pharmacist/ph_login.html");
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($connection);
}}
