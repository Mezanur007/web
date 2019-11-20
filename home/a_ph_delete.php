<?php 
if (!isset($_SESSION)) {
    session_start();

  $connection = mysqli_connect("localhost", "root", "", "care");
$sql = "DELETE FROM ph_login WHERE id =". $_GET['id'];
$result=mysqli_query($connection, $sql);
  }
