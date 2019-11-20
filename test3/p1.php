<?php
$connection = mysqli_connect("localhost", "root", "", "wdp"); // Establishing Connection with Server

if(isset($_POST['submit'])){ // Fetching variables of the form which travels in URL
$id = $_POST['id'];
$name = $_POST['name'];
$pass = $_POST['pass'];
$contact = $_POST['contact'];
$age = $_POST['age'];
$gender = $_POST['gender'];
$weight = $_POST['weight'];
$height = $_POST['height'];

//Insert Query of SQL
$sql = "INSERT into patient(id,name, pass, contact, age,gender,weight,height) VALUES ('$id','$name', '$pass', '$contact', '$age','$gender','$weight','$height')";
if (mysqli_query($connection, $sql)) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($connection);
}}
?>