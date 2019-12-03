<?php
include "./includes/db-con.php";

$hob_to_update =$_GET['id'];
// echo "$skill_to_update";

$query="SELECT * FROM hobbies WHERE H_ID=$hob_to_update";
$result=mysqli_query($con,$query);

if (mysqli_num_rows($result) > 0) {

  // code...
  $row=mysqli_fetch_assoc($result);
}
else {
  echo "NO DATA ";
}

?>




<form class="" action="./handlers/update-hob-handler.php?id=<?php echo $hob_to_update; ?>" method="POST">

<input type="text" name="h_name" value="<?php echo $row['H_NAME']; ?>">
<button type="submit" name="button">SAVE</button>

</form>
