<?php

include '../includes/db-con.php';

$skillid= $_GET['id'];


if (isset($_POST['sName'])) {
  // code...
  $newValue=$_POST['sName'];


$query= " UPDATE skills SET S_NAME='$newValue' WHERE S_ID=$skillid;";
$result=mysqli_query($con,$query);

$update_all_query= "UPDATE user_skills u
INNER JOIN skills s ON s.S_ID=u.S_ID
SET u.skill_name=s.S_NAME ";

$output=mysqli_query($con,$update_all_query);


if ($result > 0 && $output > 0) {
  // code...
  header('Location: ../skills.php');
}
else {
  // code...
  header('Location: ../skills.php');

}

}

 ?>
