<?php

include '../includes/db-con.php';

$skillid= $_GET['id'];


if (isset($_POST['h_name'])) {
  // code...
  $newValue=$_POST['h_name'];


$query= " UPDATE hobbies SET H_NAME='$newValue' WHERE H_ID=$skillid;";
$result=mysqli_query($con,$query);


$update_all_query= "UPDATE user_hobbies u
INNER JOIN hobbies h ON h.H_ID=u.hob_id
SET u.hob_name=h.H_NAME ";

$result=mysqli_query($con,$update_all_query);


if ($result > 0) {
  // code...
  header('Location: ../hob.php');
}
else {
  // code...
  header('Location: ../hob.php');

}

}

 ?>
