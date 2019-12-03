<?php
include "./includes/db-con.php";


$reg_to_delete =$_GET['id'];
echo "$reg_to_delete";

$query="DELETE FROM reg_details WHERE U_ID=$reg_to_delete";
$result=mysqli_query($con,$query);

if ($result > 0) {
  // code...
  header('Location: ./view-reg.php?operation=success');
}
else {
  // code...
  header('Location: ./view-reg.php?operation=error');

}




 ?>
