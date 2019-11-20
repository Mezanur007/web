<?php 
if (!isset($_SESSION)) {
	session_start();
	# code...
}
$connection = mysqli_connect("localhost", "root", "", "care"); // Establishing Connection with Server

if(isset($_POST['submit'])){ // Fetching variables of the form which travels in URL
$name = $_POST['name'];
$contact = $_POST['contact'];
$age = $_POST['age'];
$height = $_POST['height'];
$weight = $_POST['weight'];
$gender = $_POST['gender'];
$email = $_POST['email'];
$password = $_POST['password'];

//Insert Query of SQL
$sql = "INSERT into patient(name, contact, age, height, weight, gender, email, password) VALUES ('$name','$contact', '$age','$height','$weight','$gender','$email','$password')";
if (mysqli_query($connection, $sql)) {

    header("location: /web/home/h_index.html");
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($connection);
}}
