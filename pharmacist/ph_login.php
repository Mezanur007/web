<?php
	 session_start();

	 if (!isset($_SESSION['user'])) {
	$_SESSION['msg'] = "You must log in first";
		header('location: /web/pharmacist/ph_login.html');	
		 }

if (isset($_GET['logout'])) {
			session_destroy();
		unset($_SESSION['user']);
			header("location: /web/pharmacist/ph_login.html");
	 }

$connection = mysqli_connect("localhost", "root", "", "care"); // Establishing Connection with Server

if(isset($_POST['submit']))
{ // Fetching variables of the form which travels in URL

	$user = $_POST['user'];
	$password = $_POST['password'];

//Insert Query of SQL
	$sql = "SELECT * from ph_login where user='$user' and password='$password'";
	$result=mysqli_query($connection, $sql);

	if (mysqli_num_rows($result) > 0) 
		{
				$userr= mysqli_fetch_assoc($result);
				
				$_SESSION['user']=$userr['user'];

				header('location: /web/pharmacist/ph_home.php');
				
		}

	else {
				array_push($_SESSION, "Wrong username/password combination");

				header('location: /web/pharmacist/ph_login.html');

	 	}

}



