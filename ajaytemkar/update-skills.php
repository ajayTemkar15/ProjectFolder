<?php
include "./includes/db-con.php";

$skill_to_update =$_GET['id'];
// echo "$skill_to_update";

$query="SELECT * FROM skills WHERE S_ID=$skill_to_update";
$result=mysqli_query($con,$query);

if (mysqli_num_rows($result) > 0) {

  // code...
  $row=mysqli_fetch_assoc($result);
}
else {
  echo "NO DATA ";
}

?>




<form class="" action="./handlers/update-handler.php?id=<?php echo $skill_to_update; ?>" method="POST">

<input type="text" name="sName" value="<?php echo $row['S_NAME']; ?>">
<button type="submit" name="button">SAVE</button>

</form>
