<?php

use LDAP\Result;

include('database.php');
session_start();
$showsucces = false;
?>
<?php
    if(isset($_POST['submit'])){
        echo "<script>alert('are you sure to add a new students')</script>";
          
          $first_name = filter_input(INPUT_POST,"first_name", FILTER_SANITIZE_SPECIAL_CHARS);
          $first_name = strtoupper($first_name);
          $last_name = filter_input(INPUT_POST,"last_name", FILTER_SANITIZE_SPECIAL_CHARS);
          $last_name = strtoupper($last_name);
          $email = $_POST['email'];
          $gender = $_POST['gender'];
          $class = $_POST['class'];
          $address = $_POST['address'];
          $year = $_POST['year'];
          $parents_number = $_POST['parents_number'];
          $password = $_POST['password'];

          $check_student_sql = "SELECT * FROM students where first_name = '$first_name' AND last_name = '$last_name' AND class = '$class' 
                                AND parents_number='$parents_number'";
          $check = mysqli_query($conn,$check_student_sql);
          $check_row = mysqli_num_rows($check);
          if(empty($first_name) || empty($last_name)|| empty($email)|| empty($parents_number)|| empty($gender)|| empty($year)|| empty($password)
          || empty($class)|| empty($address)){
        echo "<div class='alert alert-danger '><strong>Error!</strong>somthing missing</div>";
        }
        elseif($check_row){
            echo "<div class='alert alert-danger '><strong>Error!</strong>Students alrady exists</div>";
        }
        else{
            $hash = password_hash($password,PASSWORD_DEFAULT);
            $file_name = $_FILES['image']['name'];
            $tmp_name = $_FILES['image']['tmp_name'];
            $folder = "student_image/".$file_name;
            move_uploaded_file($tmp_name,$folder);
            $sql= "INSERT INTO `students` ( `first_name`, `last_name`, `student_email`, `parents_number`, `class`, `year`, `student_address`, `gender`, `student_password`, `images`) 
                    VALUES ('$first_name',  '$last_name', '$email' ,'$parents_number', '$class' ,'$year' , '$address' ,'$gender', '$hash' , '$folder')";
            mysqli_query($conn,$sql);
            $showsucces = true;
        }
    }
?>


<!doctype html>
<html lang="en">
  <head>
    <title>Add Students </title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>
  <body class="">
  <?php include('teachernavbar.php') ?>
  <div class="container">
  <?php
      if($showsucces){
        echo"<div class='alert alert-success '><strong>Success!</strong>Student information successfylly inserted</div>";
      }
      ?>
    <h1 class="text-center text-info mt-3">Add Student</h1>
      <form action="<?php $_SERVER['PHP_SELF'] ?>" method="post" enctype="multipart/form-data">
      <div class="form-group">
        <label for="fname">First Name : </label>
        <input type="text" name="first_name" id="" class="form-control" placeholder="First Name" >
        <label for="lname">Last Name : </label>
        <input type="text" name="last_name" id="" class="form-control" placeholder="Last Name" >
        <label for="email">Email : </label>
        <input type="email" name="email" id="" class="form-control" placeholder="Email" >
        <label for="number">Number : </label>
        <input type="text" name="parents number" id="" class="form-control" placeholder="parents Number" >
       
        <div class="form-group">
    <label for="gender">Gender</label>
    <select name="gender" class="form-control" id="Gender">
      <option >Select one</option>
      <option value="Male">Male</option>
      <option value="Female">Female</option>
      
    </select>
  </div>
  <div class="form-group">
    <label for="class">Class</label>
    <select name="class" class="form-control" id="class">
      <option >Select one</option>
      <option value="6">class 6</option>
      <option value="7">class 7</option>
      <option value="8">class 8</option>
      <option value="9">class 9</option>
      <option value="10">class 10</option>
      
    </select>
  </div>
  <label for="year">Year : </label>
  <input type="number" name="year" id="" class="form-control" placeholder="year" >
        <label for="address">Address : </label>
        <input type="text" name="address" id="" class="form-control" placeholder="Address" >
        
        
        <label for="password">Password : </label>
        <input type="password" name="password" id="" class="form-control" placeholder="Password" >
        
        <label  for="image">Choose file</label>
        <input type="file" class="form-control" name="image" require>
        <small>Picture size must be 1:1</small>
        <br>
        <input type="submit" name="submit" value="Submit" class="form-control btn btn-outline-success">
      </div>
    </form>
    <!-- <input type="submit" name="Teachers" value="Teachers" class="form-control btn btn-outline-primary"> -->
      <a href="studentlist.php"class="form-control btn btn-outline-info" >See students</a>
      <a href="teacherdashboard.php"class="form-control btn btn-outline-secondary mt-2" >Go To Teacher Dashboard</a>
      <br><br><br>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>