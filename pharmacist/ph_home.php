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
  $idErr = $nameErr = $typeErr = $sizeErr = $quantityErr = $priceErr = "";
  $id = $name = $type = $size = $quantity = $price = "";

  if (!isset($_SESSION)) {
    session_start();
  # code...
  }
$connection = mysqli_connect("localhost", "root", "", "care"); // Establishing Connection with Server

if(isset($_POST['submit'])){ // Fetching variables of the form which travels in URL
  $id = $_POST['id'];
  $name = $_POST['name'];
  $type = $_POST['type'];
  $size = $_POST['size'];
  $quantity = $_POST['quantity'];
  $price = $_POST['price'];
 


//Insert Query of SQL
  $sql = "INSERT into ph_med_list(id, name, type, size, quantity, price) VALUES ('$id','$name','$type','$size','$quantity','$price')";




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

    if (empty($_POST["type"])) {
      $typeErr = "type is required";
    } else {
      $type = test_input($_POST["type"]);
    // check if e-mail address is well-formed
      if (!preg_match("/^[0-9 ]*$/",$type)) {
        $typeErr = "Invalid type format";
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
  <h2>Medicine List List</h2>
  <p><span class="error">* required field</span></p>
  <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">  

  Medicine ID: <input type="int" name="id" value="">
   <span class="error">* <?php echo $idErr;?></span>
   <br><br>
   Medicine Name: <input type="text" name="name" value="">
   <span class="error">* <?php echo $nameErr;?></span>
   <br><br>
   Medicine type: <input type="text" name="type" value="">
   <span class="error">* <?php echo $typeErr;?></span>
   <br><br>
   Pack size: <input type="text" name="size" value="">
   <span class="error"><?php echo $sizeErr;?></span>
   <br><br>

   Pack Quantity <input type="text" name="quantity" value="">
   <span class="error"><?php echo $quantityErr;?></span>
   
   Price <input type="text" name="price" value="">
   <span class="error"><?php echo $priceErr;?></span>
   <br><br>
   <input type="submit" name="submit" value="Submit">  

 </form>

 <?php
 $sql = "SELECT id, name, type, size, quantity, price  FROM ph_med_list";
 $result = mysqli_query($connection, $sql);
 ?>
 <table>
  <tr>
    <th>ID</th>
    <th>Name</th>
    <th>type</th>
    <th>size</th>
    <th>Quantity</th>
    <th>Prce</th>

    <th>Delete</th>
  </tr>


   <?php while($row = $result->fetch_assoc()): ?>
  
    <tr>
      <td><?php echo $row['id']; ?></td>
      <td><?php echo $row['name']; ?></td>
      <td><?php echo $row['type']; ?></td>
      <td><?php echo $row['size']; ?></td>
      <td><?php echo $row['quantity']; ?></td>
      <td><?php echo $row['price']; ?></td>
      
       <td>
                  <form action="/web/pharmacist/ph_delete.php?id= <?php echo $row['id']; ?>" method="post">
                    <input type="hidden" name="delete_id" value="">
                    <button type="submit" name="delete_btn" class="btn btn-danger"> DELETE</button>
                
                  </form>
              </td>
    </tr>
   
  <?php endwhile ?>
  


</table>
<form>

 <!-- <?php 
 // Patient type: <input type="text" name="type" value="">
//$sql= DELETE FROM 'd_home' WHERE 'd_home'.'id' = '$id'; ?>
  <button type="delete" name="delete" value="delete"> Delete</button> --> -->
 
 </form>
</body>
</html>