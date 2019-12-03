<?php
include '../includes/db-con.php';

$user_id=$_GET['id'];

if (isset($_POST['e_mail']) && isset($_POST['pass']) && isset($_POST['address']) && isset($_POST['city']) && isset($_POST['selectState']) && isset($_POST['gridRadios']) && isset($_POST['check_list']) && isset($_POST['hobbies'])) {
  // code...
  $u_email=$_POST['e_mail'];
  $u_pass=$_POST['pass'];
  $u_add=$_POST['address'];
  $u_city=$_POST['city'];
  $u_state=$_POST['selectState'];
  $u_gender=$_POST['gridRadios'];

  $hashed_password=password_hash($u_pass,PASSWORD_DEFAULT);
  $chkbox = $_POST['check_list'];
  $hob= $_POST['hobbies'];


///QUERY TO UPDATE USER_DETAILS ///


$update_userdetails=" UPDATE reg_details
                      SET U_EMAIL='$u_email',
                          U_PASSWORD='$hashed_password',
                          U_ADDRESS='$u_add',
                          U_CITY='$u_city',
                          U_STATE='$u_state',
                          U_GENDER='$u_gender'
                    WHERE U_ID=$user_id;
                      ";
//
// echo '<pre>';
// print_r($con);
// echo 'update_userdetails ===='.$update_userdetails;
// exit;

$update_result=mysqli_query($con,$update_userdetails);

///UPDATE CHECKBOX LIST////



  $query_to_delete_userskills= "DELETE FROM user_skills WHERE U_ID=$user_id";
  $deleted=mysqli_query($con,$query_to_delete_userskills);


foreach ($chkbox as $key) {



  $query_to_fetch_skill_id= "SELECT * FROM skills WHERE S_NAME='$key';";
  $output=mysqli_query($con, $query_to_fetch_skill_id);

  $arr= mysqli_fetch_assoc($output);
  $s_id= $arr['S_ID'];


  $query_to_userskills= "INSERT INTO user_skills(skill_name,U_ID,S_ID)
                         VALUES('$key',$user_id,$s_id)";
  $output1=mysqli_query($con, $query_to_userskills);


}
// echo "<pre>";
// echo 'output1===='.$query_to_userskills;


////UPDATE HOBBIES////
$query_to_delete_userhobbies= "DELETE FROM user_hobbies WHERE U_ID=$user_id";
$deleted1=mysqli_query($con,$query_to_delete_userhobbies);


foreach ($hob as $key1) {
  // UPDATING USER HOBBIES DATA////
// echo "<pre>";
// print_r($hob);
// echo $key1;
// exit;
  $query_to_fetch_hob_id= "SELECT * FROM hobbies WHERE H_NAME='$key1';";
  $output=mysqli_query($con, $query_to_fetch_hob_id);


  $arr= mysqli_fetch_assoc($output);
  $h_id= $arr['H_ID'];
  // echo $h_id;


  $query_to_userhobbies= "INSERT INTO user_hobbies(hob_name,U_ID,hob_id)
                         VALUES('$key1',$user_id,$h_id)";

  $output2=mysqli_query($con, $query_to_userhobbies);

}

if ($update_result != NULL && $output2 != NULL && $output1 != NULL) {
  header('Location:../view-reg.php');
}
else {
  header('Location:../view-reg.php');
}

}
else {
echo "PLEASE FILL AL THE DETAILS";
}




 ?>
