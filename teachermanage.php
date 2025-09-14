<?php

include("database.php");


?>
<?php
$courses_sql = "SELECT course_id, course_name FROM courses";
$courses_result = mysqli_query($conn,$courses_sql);
// $courses_fetch = mysqli_fetch_row($courses_result);

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

if(isset($_POST['submit'])){
  echo "<script>alert('are you sure to add a new TEACHER')</script>";
    
    $username = filter_input(INPUT_POST,"username", FILTER_SANITIZE_SPECIAL_CHARS);
    $username = strtoupper($username);
    $email = $_POST['email'];
    $gender = $_POST['gender'];
    $course = $_POST['course'];
    $address = $_POST['address'];
    $salary = $_POST['salary'];
    $number = $_POST['number'];
    $password = $_POST['password'];

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
      $existsql = "SELECT * FROM teachers WHERE teacher_name='$username'";
      $existresult = mysqli_query($conn,$existsql);
      $existuser = mysqli_num_rows($existresult);
      if($existuser){
        $showalert=true;
      }
      else{
        $hash = password_hash($password, PASSWORD_DEFAULT);
          $file_name = $_FILES['image']['name'];
          $tmp_name = $_FILES['image']['tmp_name'];
          $folder = "teacher_images/".$file_name;
          move_uploaded_file($tmp_name,$folder);
        $sql = "INSERT INTO Teachers (teacher_name, teacher_email, teacher_number, teacher_address, teacher_gender, course_id,teacher_salary, teacher_password,images) 
        VALUES ('$username','$email','$number','$address','$gender','$course',$salary,'$hash','$folder')";
        mysqli_query($conn,$sql);
        // $aff = mysqli_affected_rows($conn);
        // echo"sumitted". " <br>". "{$aff} of rows affected";
        $showsucces = true;
        // header("location: teacherlist.php");
      }
      
        
    }
}





mysqli_close($conn);
?>
<!doctype html>
<html lang="en">
  <head>
    <title>Teacher manage</title>
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
        echo"<div class='alert alert-success '><strong>Success!</strong>Teacher information successfylly inserted</div>";
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
    <h1 class="text-center text-info mt-3">Add Teachers</h1>
      <form action="<?php $_SERVER['PHP_SELF'] ?>" method="post" enctype="multipart/form-data">
      <div class="form-group">
        <label for="username">Name : </label>
        <input type="text" name="username" id="" class="form-control" placeholder="Name" >
        <label for="email">Email : </label>
        <input type="email" name="email" id="" class="form-control" placeholder="Email" >
        <!-- <label for="age">Age : </label>
        <input type="text" name="age" id="" class="form-control" placeholder="age" >
         -->
       
        <div class="form-group">
    <label for="gender">Gender</label>
    <select name="gender" class="form-control" id="Gender">
      <option >Select one</option>
      <option value="Male">Male</option>
      <option value="Female">Female</option>
      
    </select>
  </div>
  <div class="form-group">
  <label for="course">Course</label>
    <select name="course" class="form-control" id="Course">
            <option >Select</option>
            <?php
                while ($course = mysqli_fetch_assoc($courses_result)) {
                    echo "<option value='" .$course['course_id'] . "'>" .$course['course_name']. "</option>";
                }
                ?>
    </select>


  </div>
        <label for="address">Address : </label>
        <input type="text" name="address" id="" class="form-control" placeholder="Address" >
        <label for="salary">Salary : </label>
        <input type="number" name="salary" id="" class="form-control" placeholder="salary" >
        <label for="number">Number : </label>
        <input type="text" name="number" id="" class="form-control" placeholder="Number" >
      
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
      <a href="teacherlist.php"class="form-control btn btn-outline-info" >See Teachers</a>
      <a href="admindashboard.php"class="form-control btn btn-outline-secondary mt-2" >Go To Admin Dashboard</a>
      <br><br><br>
      <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    </div>
  </body>
</html>

