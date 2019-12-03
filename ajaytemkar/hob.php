<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>HOBBIES</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css?family=Philosopher&display=swap" rel="stylesheet">
<style media="screen">
*{
  font-family: 'Philosopher';
}
  body{
    padding: 50px;
    width: 100%;
  }
  .myTable{
    width: 40%;
    text-align: center;
  }
  .hob{
    width: 250px;
  }
  .head{
    font-weight: 700;
    letter-spacing: 2px;
    font-size: 50px;
    font-family: 'Philosopher';

  }
</style>
  </head>
  <body>
    <h1 class="head">HOBBIES</h1>


<form class="" action="./handlers/hob-handler.php" method="POST">


<input class="p-1 hob" type="text" name="h_name" value="" placeholder="ENTER HOBBIES TO ADD">
<button type="submit" class="btn btn-primary m-1" name="button">ADD</button>
<?php
if (isset($_GET['register'])) {
  // code...
   if ($_GET['register']== 'success') {
     // code...
     echo "<h2>ADDED SUCCESSFULLY</h2>";
   }
   else if ($_GET['register']== 'failed') {
     // code...
     echo "<h2>SOMETHING WENT WRONG</h2>";
   }

}

 ?>

</form>
<br>

<br>
<table border="1" class="myTable">
  <tr>
    <th>H_ID</th>
    <th>HOBBIES</th>
    <th>EDIT/DELETE</th>
  </tr>
  <?php
  include './includes/db-con.php';

  $query= " SELECT * FROM hobbies;";
  $result=mysqli_query($con,$query);

  $i=1;
      while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr><td>".$i++."</td>
                  <td>".$row['H_NAME']."</td>
                  <td><button class='btn btn-danger m-1'><a class='text-light ' href='./hob-delete.php?id=".$row['H_ID']."'>DELETE</a></button>
                  <button class='btn btn-warning m-1'><a class='text-light' href='./update-hob.php?id=".$row['H_ID']."'>UPDATE</a></button></td>
                  </tr>";
                }




  ?>
</table>

<?php

if (isset($_GET['operation'])) {
// code...
if ($_GET['operation'] == 'success') {
// code...
echo "<h2>DATA DELETED</h2>";
}
elseif ($_GET['operation'] == 'error') {
// code...
echo "<h2>SOMETHING WENT WRONG</h2>";

}
}

 ?>



 <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
 <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" ></script>
 <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" ></script>
  </body>
</html>
