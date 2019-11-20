<!DOCTYPE HTML>  
<html>
<head>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

  <style>
    .error {color: #FF0000;}
    table {
      font-family: arial, sans-serif;
      border-collapse: collapse;
      width: 100%;
    }

    td, th {
      border: 1px solid #dddddd;
      text-align: left;
      padding: 8px;
    }

    tr:nth-child(even) {
      background-color: #dddddd;
    }
  </style>
</head>
<body>  

  <?php
// define variables and set to empty values
  $idErr = $nameErr = $ageErr = $problemErr = $med1Err = $dose1Err = $med2Err =  $dose2Err = $med3Err = $dose3Err = $med4Err = $dose4Err = $timeeErr = "";
  $id = $name = $age = $problem = $med1 = $dose1 = $med2 = $dose2 = $med3 = $dose3 = $med4 = $dose4 = $timee = "";

  if (!isset($_SESSION)) {
    session_start();
  # code...
  }
$connection = mysqli_connect("localhost", "root", "", "care"); // Establishing Connection with Server

if(isset($_POST['submit'])){ // Fetching variables of the form which travels in URL
  $id = $_POST['id'];
  $name = $_POST['name'];
  $age = $_POST['age'];
  $problem = $_POST['problem'];
  $med1 = $_POST['med1'];
  $dose1 = $_POST['dose1'];
  $med2 = $_POST['med2'];
  $dose2 = $_POST['dose2'];
  $med3 = $_POST['med3'];
  $dose3 = $_POST['dose3'];
  $med4 = $_POST['med4'];
  $dose4 = $_POST['dose4'];
  $timee = $_POST['timee'];


//Insert Query of SQL
  $sql = "INSERT into d_home(id, name, age, problem, med1, dose1, med2, dose2, med3, dose3, med4, dose4, timee) VALUES ('$id','$name','$age','$problem','$med1','$dose1','$med2','$dose2','$med3','$dose3','$med4','$dose4', '$timee')";




  if (mysqli_query($connection, $sql)) {

    echo "succesfull";
  } else {
    echo "Error: " . $sql . "<br>" . mysqli_error($connection);
  }}



  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST["name"])) {
      $nameErr = "Name is required";
    } else {
      $name = test_input($_POST["name"]);
    // check if name only contains letters and whitespace
      if (!preg_match("/^[a-zA-Z ]*$/",$name)) {
        $nameErr = "Only letters and white space allowed";
      }
    }

    if (empty($_POST["age"])) {
      $ageErr = "age is required";
    } else {
      $age = test_input($_POST["age"]);
    // check if e-mail address is well-formed
      if (!preg_match("/^[0-9 ]*$/",$age)) {
        $ageErr = "Invalid age format";
      }
    }
    
    if (empty($_POST["dose"])) {
      $dose = "";
    } else {
      $dose = test_input($_POST["dose"]);
    // check if URL address syntax is valid (this regular expression also allows dashes in the URL)
      if (!preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i",$dose)) {
        $doseErr = "Invalid URL";
      }
    }

    if (empty($_POST["medicine"])) {
      $medicine = "";
    } else {
      $medicine = test_input($_POST["medicine"]);
    }

    if (empty($_POST["timee"])) {
      $timeeErr = "time is required";
    } else {
      $timee = test_input($_POST["timee"]);
    }
  }



  function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }
  ?>
  <h1>E-Patient Care</h1>
  <h2>Patient List</h2>
  <p><span class="error">* required field</span></p>
  <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">  

  Patient ID: <input type="int" name="id" value="">
   <span class="error">* <?php echo $idErr;?></span>
   <br><br>
   Patient Name: <input type="text" name="name" value="">
   <span class="error">* <?php echo $nameErr;?></span>
   <br><br>
   Patient Age: <input type="text" name="age" value="">
   <span class="error">* <?php echo $ageErr;?></span>
   <br><br>
   Patient Problem: <input type="text" name="problem" value="">
   <span class="error"><?php echo $problemErr;?></span>
   <br><br>

   Medicine 1 <input type="text" name="med1" value="">
   <span class="error"><?php echo $med1Err;?></span>
   
   Dose <input type="text" name="dose1" value="">
   <span class="error"><?php echo $dose1Err;?></span>
   <br><br>

   Medicine 2 <input type="text" name="med2" value="">
   <span class="error"><?php echo $med2Err;?></span>
   
   Dose <input type="text" name="dose2" value="">
   <span class="error"><?php echo $dose2Err;?></span>
   <br><br>

   Medicine 3 <input type="text" name="med3" value="">
   <span class="error"><?php echo $med3Err;?></span>

   Dose <input type="text" name="dose3" value="">
   <span class="error"><?php echo $dose3Err;?></span>
   <br><br>

   Medicine 4 <input type="text" name="med4" value="">
   <span class="error"><?php echo $med4Err;?></span>

   Dose <input type="text" name="dose4" value="">
   <span class="error"><?php echo $dose4Err;?></span>
   <br><br>

  Time <input type="text" name="timee" value="">
   <span class="error"><?php echo $timeeErr;?></span>
   <br><br>
   <input type="submit" name="submit" value="Submit">  
 </form>

 <?php
 $sql = "SELECT id, name, age, problem, med1, dose1, med2, dose2, med3, dose3, med4, dose4, timee  FROM d_home";
 $result = mysqli_query($connection, $sql);
 ?>
 <table>
  <tr>
    <th>ID</th>
    <th>Name</th>
    <th>Age</th>
    <th>Problem</th>
    <th>Medicine</th>
    <th>Dose</th>
    <th>Time</th>
    <th>Delete</th>
  </tr>


   <?php while($row = $result->fetch_assoc()): ?>
  
    <tr>
      <td><?php echo $row['id']; ?></td>
      <td><?php echo $row['name']; ?></td>
      <td><?php echo $row['age']; ?></td>
      <td><?php echo $row['problem']; ?></td>
      <td><?php echo $row['med1']. ", ". $row['med2']. ", ". $row['med3']. ", ". $row['med4']; ?></td>
      <td><?php echo $row['dose1']. ", ". $row['dose2']. ", ". $row['dose3']. ", ". $row['dose4']; ?></td>
       <td><?php echo $row['timee']; ?></td>
       <td>
                  <form action="/web/doctor/d_delete.php?id= <?php echo $row['id']; ?>" method="post">
                    <input type="hidden" name="delete_id" value="">
                    <button type="submit" name="delete_btn" class="btn btn-danger"> DELETE</button>
                
                  </form>
              </td>
    </tr>
   
  <?php endwhile ?>
  


</table>
<form>

 <!-- <?php 
 // Patient Age: <input type="text" name="age" value="">
//$sql= DELETE FROM 'd_home' WHERE 'd_home'.'id' = '$id'; ?>
  <button type="delete" name="delete" value="delete"> Delete</button> --> -->
 
 </form>
</body>
</html>