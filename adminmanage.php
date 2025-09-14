<?php

include("database.php");
session_start();

?>
<?php
$showalert= false;
$showsucces=false;
$showalertusername= false;
$showalertemail= false;
$showalertgender= false;
$showalertaddress= false;
$showalertnumber= false;
$showalertpassword= false;


if($_SERVER['REQUEST_METHOD']=="POST"){
  echo "<script>alert('are you sure to add a new ADMIN')</script>";
    
    $username = filter_input(INPUT_POST,"username", FILTER_SANITIZE_SPECIAL_CHARS);
    $email = $_POST['email'];
    $gender = $_POST['gender'];
    $address = $_POST['address'];
    $number = $_POST['number'];
    $password = $_POST['password'];
    $cpassword = $_POST['cpassword'];
    
    if($password == $cpassword){
      if(empty($username)){
        $showalertusername= true;
      }
      elseif(empty($email)){
        $showalertemail= true;
      }
  
      elseif(empty($gender)){
        $showalertgender= true;
      }
      // elseif(empty($course)){
      //     echo "enter age";
      // }
      elseif(empty($address)){
        $showalertaddress= true;
        
      }
      elseif(empty($number)){
        $showalertnumber= true;
        
      }
      elseif(empty($password)){
        $showalertpassword= true;
      }
      else{
        $existsql = "SELECT * FROM admins WHERE admin_name='$username'";
        $existresult = mysqli_query($conn,$existsql);
        $existuser = mysqli_num_rows($existresult);
        
        
        if($existuser>0){
          $showalert=true;
        }
        if($existuser==0){

          $hash = password_hash($password, PASSWORD_DEFAULT);

          $file_name = $_FILES['image']['name'];
          $tmp_name = $_FILES['image']['tmp_name'];
          $folder = "admin_images/".$file_name;
          move_uploaded_file($tmp_name,$folder);

          $sql = "INSERT INTO Admins (admin_name, admin_number, admin_email, admin_address, admin_gender, admin_password,images) 
          VALUES ('$username','$number','$email','$address','$gender','$hash','$folder')";
          mysqli_query($conn,$sql);
          // $aff = mysqli_affected_rows($conn);
          // echo"sumitted". " <br>". "{$aff} of rows affected";
          $showsucces = true;
          // header("location: admindashboard.php");
      }
            
        }
    }
    else{
        echo"Password are not match";
    }

   
}


mysqli_close($conn);
?>
<!doctype html>
<html lang="en">
  <head>
    <title>admin manage</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>
  <body class="">
  <?php include('adminnavbar.php'); ?>
  <?php
      if($showsucces){
        echo"<div class='alert alert-success '><strong>Success!</strong>ADMIN information successfylly inserted</div>";
      }
      if($showalert){
        echo"<div class='alert alert-danger '><strong>Error!</strong>Username already exist</div>";
      }
      if($showalertusername){
        echo"<div class='alert alert-danger '><strong>Error!</strong>Enter username</div>";
      }
      if($showalertemail){
        echo"<div class='alert alert-danger '><strong>Error!</strong>Enter email</div>";
      }
      if($showalertgender){
        echo"<div class='alert alert-danger '><strong>Error!</strong>Enter gender</div>";
      }
      if($showalertaddress){
        echo"<div class='alert alert-danger '><strong>Error!</strong>Enter address</div>";
      }
      if($showalertnumber){
        echo"<div class='alert alert-danger '><strong>Error!</strong>Enter number</div>";
      }
      if($showalertpassword){
        echo"<div class='alert alert-danger '><strong>Error!</strong>Enter passwors</div>";
      }

    ?>
    <div class="container">
    <h1 class="text-center text-primary mt-3">Add Admin</h1>
      <form action="<?php $_SERVER['PHP_SELF'] ?>" method="post" enctype="multipart/form-data">
      <div class="form-group">
        <label for="username">New Admin Name : </label>
        <input type="text" name="username" id="" class="form-control" placeholder="new admin name" >
        <label for="email">Email : </label>
        <input type="email" name="email" id="" class="form-control" placeholder="email" ><div class="form-group">
    <label for="gender">Gender</label>
    <select name="gender" class="form-control" id="gender">
      <option value="male">Male</option>
      <option value="female">Female</option>
      
    </select>
  </div>
        <label for="address">Address : </label>
        <input type="text" name="address" id="" class="form-control" placeholder="Address" >
        <label for="number">Number : </label>
        <input type="text" name="number" id="" class="form-control" placeholder="number" >
      
        <label for="password">Password : </label>
        <input type="password" name="password" id="" class="form-control" placeholder="password" >
        <label for="cpassword">Confirm Password : </label>
        <input type="password" name="cpassword" id="" class="form-control" placeholder="type the same password" >
        
        <label  for="image">Choose file</label>
        <input type="file" class="form-control" name="image" require>
        <br>
        <input type="submit" name="submit" value="Submit" class="form-control btn btn-outline-info">
      </div>
    </form>
    
      <a href="admindashboard.php"class="form-control btn btn-outline-secondary" >Go To Admin Dashboard</a>
    <br><br><br>
      <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    </div>
  </body>
</html>

