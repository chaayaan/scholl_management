<?php
include("database.php");
session_start();
?>
<?php
$showsucces = false;
$showalert=false;

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    echo "<script>alert('are you sure to add a new course')</script>";

    $course_id = $_POST['cid'];
    $course_name = $_POST['cname'];
    if(!empty($course_id) && !empty($course_name) ){
        $existsql = "SELECT * FROM courses where course_name = '$course_name' or course_id ='$course_id'";
        $existresult = mysqli_query($conn,$existsql);
        $course = mysqli_fetch_assoc($existresult);
        $existrow = mysqli_num_rows($existresult);
        if($existrow){
            $showalert = true;
        }
        else{
            
            $course_insert_sql = "INSERT INTO courses(course_id,course_name) values ('$course_id','$course_name')";
            mysqli_query($conn,$course_insert_sql);
            $showsucces = true;
        }
    }
    else{
        $showalert=true;
    }
}
mysqli_close($conn);

?>

<!doctype html>
<html lang="en">
  <head>
    <title>Add course</title>
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
        echo"<div class='alert alert-success '><strong>Success!</strong>Course information successfylly inserted</div>";
      }
      if($showalert){
        echo"<div class='alert alert-danger '><strong>Error!</strong>course id or course name alrady exist</div>";
      }
      ?>
      <br>
      
      <div class="container border ">
        <br>
      <h2 class="text-info text-center">Add Courses</h2>
        <form action="<?php $_SERVER["PHP_SELF"] ?>" method="post">
        <div class="form-group">
        <label for="id">Course id</label>
        <input type="text" name="cid" id="" class="form-control" placeholder="Type carefully" require>
        <br>
        <label for="course_name">Course name</label>
        <input type="text" name="cname" id="" class="form-control" placeholder="Type carefully" require>
        <br>
        <input type="submit" name="submit" value="Submit" class="form-control btn btn-outline-success">
      </div>    
       
    </form>
    
      <a href="courseinformation.php"class="form-control btn btn-outline-info" >See Courses</a>
      <a href="admindashboard.php"class="form-control btn btn-outline-secondary mt-2" >Go To Admin Dashboard</a>
      <br><br><br>
      </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>