<?php
	 session_start();

	if (!isset($_SESSION['email'])) {
		$_SESSION['msg'] = "You must log in first";
			header('location: /web/patient/p_login.html');	
	 }

	 if (isset($_GET['logout'])) {
	 		session_destroy();
	 		unset($_SESSION['email']);
			header("location: /web/patient/p_login.html");
	 }

$connection = mysqli_connect("localhost", "root", "", "care"); // Establishing Connection with Server

if(isset($_POST['submit']))
{ // Fetching variables of the form which travels in URL

	$email = $_POST['email'];
	$password = $_POST['password'];

//Insert Query of SQL
	$sql = "SELECT * from patient where email='$email' and password='$password'";
	$result=mysqli_query($connection, $sql);

	if (mysqli_num_rows($result) > 0) 
		{
				$user= mysqli_fetch_assoc($result);
				
				$_SESSION['email']=$user['email'];

				header('location: /web/patient/p_home.html');
				
		}

	else {
				array_push($_SESSION, "Wrong username/password combination");

				header('location: /web/home/h_index.html');

	 	}

}



