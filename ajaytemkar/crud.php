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
      <form class="p-4 myForm" action="./handlers/reg-handler.php" method="POST" id="first_form">
      <div class="form-row">
        <div class="form-group col-md-6">
          <label for="inputEmail4">Email</label>
          <input type="email" class="form-control" id="inputEmail4" name="e_mail" placeholder="Email">
        </div>
        <div class="form-group col-md-6">
          <label for="inputPassword4">Password</label>
          <input type="password" class="form-control" id="inputPassword4" name="pass" placeholder="Password">
        </div>
      </div>
      <div class="form-group">
        <label for="inputAddress">Address</label>
        <input type="text" class="form-control" id="inputAddress" name="address" placeholder="Address...">
      </div>

      <div class="form-row">
        <div class="form-group col-md-6">
          <label for="inputCity">City</label>
          <input type="text" name="city" class="form-control" id="inputCity">
        </div>
        <div class="form-group col-md-4">
          <label for="inputState">State</label>
          <select id="inputState" name="selectState" class="form-control">
            <option selected>Choose...</option>
            <option>Maharashtra</option>
            <option>Gujrat</option>
            <option>Chennai</option>

          </select>
        </div>

      </div>
      <fieldset class="form-group">
      <div class="row">
        <legend class="col-form-label col-sm-2 pt-0">Gender</legend>
        <div class="col-sm-10">
          <div class="form-check">
            <input class="form-check-input" type="radio" name="gridRadios" id="gridRadios1" value="Male" checked>
            <label class="form-check-label" for="gridRadios1">
              Male
            </label>
          </div>
          <div class="form-check">
            <input class="form-check-input" type="radio" name="gridRadios" id="gridRadios2" value="Female">
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
echo "   <input type='checkbox' value='".$row['S_NAME']."' name='check_list[]'>
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
 echo "  <option value='".$row['H_NAME']."'>".$row['H_NAME']."</option> ";
  }
             ?>

     </select>
   </div>
   <!-- // -->

      <button type="submit" class="btn btn-primary m-2" name="submit">Submit</button>

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
