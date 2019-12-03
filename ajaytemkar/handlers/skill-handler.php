<?php
include '../includes/db-con.php';

if (isset($_POST['s_name']) ) {
  // code...
  $sname=$_POST['s_name'];


  $query=" INSERT INTO skills(S_NAME) VALUES('$sname')";
  $result=mysqli_query($con,$query);
  if ($result != NULL) {
    header('Location:../skills.php?register=success');
  }
  else {
    header('Location:../skills.php?register=failed');
  }
}





 ?>
