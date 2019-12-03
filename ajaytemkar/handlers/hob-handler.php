<?php
include '../includes/db-con.php';

if (isset($_POST['h_name']) ) {
  // code...
  $sname=$_POST['h_name'];


  $query=" INSERT INTO hobbies(H_NAME) VALUES('$sname')";
  $result=mysqli_query($con,$query);
  if ($result != NULL) {
    header('Location:../hob.php?register=success');
  }
  else {
    header('Location:../hob.php?register=failed');
  }
}





 ?>
