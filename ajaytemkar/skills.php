<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>SKILLS</title>
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
  .head{
    font-weight: 700;
    letter-spacing: 2px;
    font-size: 50px;
    font-family: 'Philosopher';

  }
</style>
  </head>
  <body>

<h1 class="head">SKILLS</h1>
<form class="" action="./handlers/skill-handler.php" method="POST">


<input type="text" class="p-1" name="s_name" value="" placeholder="ENTER SKILLS TO ADD">
<button type="submit" name="button" class="btn btn-primary m-1">ADD</button>
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
    <th>S_ID</th>
    <th>SKILL_NAME</th>
    <th>EDIT/DELETE</th>
  </tr>
  <?php
  include './includes/db-con.php';

  $query= " SELECT * FROM skills;";
  $result=mysqli_query($con,$query);

  $i=1;
      while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr><td>".$i++."</td>
                  <td>".$row['S_NAME']."</td>
                  <td><button class='btn btn-danger m-1'><a class='text-light' href='./skill-delete.php?id=".$row['S_ID']."'>DELETE</a></button>
                  <button class='btn btn-warning m-1'><a class='text-light' href='./update-skills.php?id=".$row['S_ID']."'>UPDATE</a></button></td>
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
