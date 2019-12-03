<?php


include '../includes/db-con.php';


if (isset($_POST['e_mail']) && isset($_POST['pass']) && isset($_POST['address']) && isset($_POST['city']) && isset($_POST['selectState']) && isset($_POST['gridRadios']) && isset($_POST['check_list']) && isset($_POST['hobbies'])) {


$u_email=$_POST['e_mail'];
$u_pass=$_POST['pass'];
$u_add=$_POST['address'];
$u_city=$_POST['city'];
$u_state=$_POST['selectState'];
$u_gender=$_POST['gridRadios'];

$hashed_password=password_hash($u_pass,PASSWORD_DEFAULT);

////
$chkbox = $_POST['check_list'];

$hob= $_POST['hobbies'];


///INSERTING DATA////


$query=" INSERT INTO reg_details(U_EMAIL,U_PASSWORD,U_ADDRESS,U_CITY,U_STATE,U_GENDER)
                          VALUES('$u_email','$hashed_password','$u_add','$u_city','$u_state','$u_gender')";

  if ($result=mysqli_query($con, $query)) {
                              $last_id = mysqli_insert_id($con);
                                           }
      foreach ($chkbox as $key) {
        // INSERTING CHECKBOX DATA////


        $query_to_fetch_skill_id= "SELECT * FROM skills WHERE S_NAME='$key';";
        $output=mysqli_query($con, $query_to_fetch_skill_id);


        $arr= mysqli_fetch_assoc($output);
        $s_id= $arr['S_ID'];


        $query_to_userskills= "INSERT INTO user_skills(skill_name,U_ID,S_ID)
                                           VALUES('$key',$last_id,$s_id)";
        $output1=mysqli_query($con, $query_to_userskills);
      }


      foreach ($hob as $key1) {
        // INSERTING HOBBIES DATA////

        $query_to_fetch_hob_id= "SELECT * FROM hobbies WHERE H_NAME='$key1';";
        $output=mysqli_query($con, $query_to_fetch_hob_id);


        $arr= mysqli_fetch_assoc($output);
        $h_id= $arr['H_ID'];


        $query_to_userhobbies= "INSERT INTO user_hobbies(hob_name,U_ID,hob_id)
                                                  VALUES('$key1',$last_id,$h_id)";
        $output2=mysqli_query($con, $query_to_userhobbies);
      }

     if ($result != NULL) {
       header('Location:../crud.php?register=success');
     }
     else {
       header('Location:../crud.php?register=error');
     }
}
else {

  echo "Please Fill the Form details";
}

 ?>
