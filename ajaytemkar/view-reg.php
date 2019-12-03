<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>VIEW REG</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="./css/view-reg.css">

  </head>
  <body>
<div class="main">

<table class="myTable table-striped text-center" border="1">
  <tr class="bg-dark text-light">
      <th scope="col">SrNo</th>
      <th scope="col">Email</th>

      <th scope="col">Address</th>
      <th scope="col">City</th>
      <th scope="col">State</th>
      <th scope="col">Gender</th>
      <th scope="col">Skills</th>
      <th scope="col">Hobbies</th>
      <th scope="col">DELETE</th>
    </tr>

    <?php

    $servername="localhost";
    $username="root";
    $password="";
    $db_name="register_form";

    $con= mysqli_connect($servername,$username,$password,$db_name);
    $query= "SELECT r.U_ID,U_EMAIL, U_ADDRESS,U_CITY,U_STATE,U_GENDER,
    group_concat(t2.skill_name) as SKILLS
    FROM reg_details r
    INNER JOIN user_skills t2 ON r.U_ID = t2.U_ID
    GROUP BY r.U_ID";

//


    $result=mysqli_query($con,$query);

$i=1;

    while ($row = mysqli_fetch_assoc($result) ) {
      // code...
      $u_id=$row['U_ID'];
      $query_for_hobbies= "SELECT r.U_ID, group_concat(t2.hob_name) as HOBBIES
                           FROM reg_details r
                           INNER JOIN user_hobbies t2
                           ON r.U_ID=t2.U_ID
                           WHERE r.U_ID=$u_id";
       //
      $resultHobbies=mysqli_query($con,$query_for_hobbies);
      $row1 = mysqli_fetch_assoc($resultHobbies);



      echo "<tr><td>".$i++."</td>
                <td>".$row['U_EMAIL']."</td>
                <td>".$row['U_ADDRESS']."</td>
                <td>".$row['U_CITY']."</td>
                <td>".$row['U_STATE']."</td>
                <td>".$row['U_GENDER']."</td>
                <td>".$row['SKILLS']."</td>
                <td>".$row1['HOBBIES']."</td>
                <td><button class='btn btn-warning m-1'><a class='text-light' href='./update-reg.php?id=".$row['U_ID']."'>UPDATE</a></button>

                <button class='btn btn-danger m-1'><a class='text-light' href='./delete-reg.php?id=".$row['U_ID']."'>DELETE</a></button></td>
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

</div>

<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" ></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" ></script>
  </body>
</html>
