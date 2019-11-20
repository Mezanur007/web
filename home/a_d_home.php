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
  if (!isset($_SESSION)) {
    session_start();
  
  }
$connection = mysqli_connect("localhost", "root", "", "care"); // Establishing Connection with Server


?>

 


  <h1>E-Patient Care</h1>
  <h2>Doctors List</h2>
  


 <?php
 $sql = "SELECT id, name, user, password  FROM d_user";
 $result = mysqli_query($connection, $sql);
 ?>
 <table>
  <tr>
    <th>ID</th>
    <th>Name</th>
    <th>User</th>
    <th>Password</th>
    

  </tr>


   <?php while($row = $result->fetch_assoc()): ?>
  
    <tr>
      <td><?php echo $row['id']; ?></td>
      <td><?php echo $row['name']; ?></td>
      <td><?php echo $row['user']; ?></td>
     
       <td><?php echo $row['password']; ?></td>
       
       <td>
                  <form action="/web/home/a_d_delete.php?id= <?php echo $row['id']; ?>" method="post">
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