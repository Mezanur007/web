<?php
$connection = mysqli_connect("localhost", "root", "", "care"); // Establishing Connection with Server

if(isset($_POST['submit'])){ // Fetching variables of the form which travels in URL
$name = $_POST['name'];
$specialist = $_POST['specialist'];
$chamber = $_POST['chamber'];
$id = $_POST['id'];
$password = $_POST['password'];

//Insert Query of SQL
$sql = "INSERT into doctor(name, specialist, chamber, id, password) VALUES ('$name','$specialist','$chamber','$id','$password')";
if (mysqli_query($connection, $sql)) {

    header("location: /web/doctor/d_login.html");
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($connection);
}}
?>