<?php
////USER DETAILS///

include './includes/db-con.php';
$user_id=$_GET['id'];

$query_to_update= "SELECT * FROM reg_details WHERE reg_details.U_ID=$user_id";

$fetch_user=mysqli_query($con,$query_to_update);

if (mysqli_num_rows($fetch_user)>0) {
  $data=mysqli_fetch_assoc($fetch_user);
}

///QUERY TO UPDATE HOBBIES///
$query_to_update_hobbies= "SELECT U_ID ,
                            GROUP_CONCAT(hob_name) AS hob_name
                            FROM user_hobbies WHERE U_ID=$user_id";
$fetch_user_hobbies=mysqli_query($con,$query_to_update_hobbies);
if (mysqli_num_rows($fetch_user_hobbies)>0) {
  $hob_data=mysqli_fetch_assoc($fetch_user_hobbies);
}

$userhob=$hob_data['hob_name'];

///QUERY TO UPDATE CHECK BOX///
$query_to_update_checkbox="SELECT U_ID ,
                           GROUP_CONCAT(skill_name) AS skill_name
                           FROM user_skills WHERE U_ID=$user_id";

         $fetch_user_checkbox=mysqli_query($con,$query_to_update_checkbox);
         if (mysqli_num_rows($fetch_user_checkbox)>0) {
         $check_data=mysqli_fetch_assoc($fetch_user_checkbox);
                           }
    $user_checklist=  $check_data['skill_name'];

 ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>CRUD</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="./css/crud.css">
    <link href="https://fonts.googleapis.com/css?family=Philosopher&display=swap" rel="stylesheet">
  </head>
  <body>


    <div class="container">
<h1 class="head">REGISTER</h1>
      <form class="p-4 myForm" action="./handlers/userupdate-handler.php?id=<?php echo $user_id; ?>" method="POST" id="first_form">
      <div class="form-row">
        <div class="form-group col-md-6">
          <label for="inputEmail4">Email</label>
          <input type="email" class="form-control" id="inputEmail4" name="e_mail" placeholder="Email" value="<?php echo $data['U_EMAIL']; ?>">
        </div>
        <div class="form-group col-md-6">
          <label for="inputPassword4">Password</label>
          <input type="password" class="form-control" id="inputPassword4" name="pass" placeholder="Password" value="<?php echo $data['U_PASSWORD']; ?>">
        </div>
      </div>
      <div class="form-group">
        <label for="inputAddress">Address</label>
        <input type="text" class="form-control" id="inputAddress" name="address" placeholder="Address..." value="<?php echo $data['U_ADDRESS']; ?>">
      </div>

      <div class="form-row">
        <div class="form-group col-md-6">
          <label for="inputCity">City</label>
          <input type="text" name="city" class="form-control" id="inputCity" value="<?php echo $data['U_CITY']; ?>">
        </div>
        <div class="form-group col-md-4">
          <label for="inputState">State</label>
          <select id="inputState" name="selectState" class="form-control">
            <option >Choose...</option>
            <option value="Maharashtra" <?php echo ($data['U_STATE'] == 'Maharashtra')?'selected':''; ?>>Maharashtra</option>
            <option value="Gujrat" <?php echo ($data['U_STATE'] == 'Gujrat')?'selected':''; ?>>Gujrat</option>
            <option value="Chennai" <?php echo ($data['U_STATE'] == 'Chennai')?'selected':''; ?>>Chennai</option>

          </select>
        </div>

      </div>
      <fieldset class="form-group">
      <div class="row">
        <legend class="col-form-label col-sm-2 pt-0">Gender</legend>
        <div class="col-sm-10">
          <div class="form-check">
            <input class="form-check-input" type="radio" name="gridRadios" id="gridRadios1" value="Male" <?php echo ($data['U_GENDER']=='Male')?'checked':''; ?>>
            <label class="form-check-label" for="gridRadios1">
              Male
            </label>
          </div>
          <div class="form-check">
            <input class="form-check-input" type="radio" name="gridRadios" id="gridRadios2" value="Female" <?php echo ($data['U_GENDER']=='Female')?'checked':''; ?>>
            <label class="form-check-label" for="gridRadios2">
              Female
            </label>
          </div>
        </div>
      </div>
    </fieldset>

  <label for="inputAddress">Select your Technical exposure :</label>

    <!-- // -->
    <div class="input-group-text">

      <?php
      include './includes/db-con.php';

      $query= " SELECT * FROM skills;";
      $result=mysqli_query($con,$query);

      $i=1;
          while ($row = mysqli_fetch_assoc($result)) {
              $currentchecklist=$row['S_NAME'];
                ////update checklist///
                // $user_checklist=  $check_data['skill_name'];

                $checked_data = '';
                if(strpos($user_checklist,$currentchecklist)!== false)
                   {
                     $checked_data =  "checked";
                   }



echo "   <input type='checkbox' value='".$row['S_NAME']."' name='check_list[]' ".$checked_data." >
   <label class='m-1'>".$row['S_NAME']."</label>";
 }
            ?>

   </div>
   <label for="" class="m-2">Hobbies:</label>

   <div class="input-group-text">
     <select class="mySelect " multiple name="hobbies[]">
       <?php
       include './includes/db-con.php';

       $query= " SELECT * FROM hobbies;";
       $result=mysqli_query($con,$query);

       $i=1;
           while ($row = mysqli_fetch_assoc($result)) {


                      //update hobbies//
              $currenthob=$row['H_NAME'];
              $selected = '';
              if(strpos($userhob,$currenthob)!== false)
                 {
                   $selected =  "selected";
                 }


 echo "  <option value='".$currenthob." '".$selected." >".$currenthob."</option> ";
  }
             ?>

     </select>
   </div>
   <!-- // -->

      <button type="submit" class="btn btn-primary m-2" name="submit">SAVE CHANGES</button>

    <?php
    if (isset($_GET['register'])) {
      // code...
       if ($_GET['register']== 'success') {
         // code...
         echo "<h2>REGISTERD SUCCESSFULLY</h2>";
       }
       else if ($_GET['register']== 'error') {
         // code...
         echo "<h2>SOMETHING WENT WRONG</h2>";
       }

    }

     ?>



    </form>

  </div>

<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" ></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" ></script>
<script type="text/javascript" src="./scripts/crud.js">

</script>
  </body>
</html>
