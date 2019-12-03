<?php
include "./includes/db-con.php";


$skill_to_delete =$_GET['id'];
echo "$skill_to_delete";

$query="DELETE FROM hobbies WHERE H_ID=$skill_to_delete";
$result=mysqli_query($con,$query);

if ($result > 0) {
  // code...
  header('Location: ./hob.php?operation=success');
}
else {
  // code...
  header('Location: ./hob.php?operation=error');

}




 ?>
