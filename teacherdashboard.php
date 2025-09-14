<?php
include('database.php');
session_start();

$username = strtoupper($_SESSION['username']);

$sql = "SELECT * FROM teachers_login NATURAL JOIN courses WHERE tl_name='$username'";

$result = mysqli_query($conn,$sql);
$teacher = mysqli_fetch_assoc($result);



?>

<!doctype html>
<html lang="en">
  <head>
    <title>Teacher dashboard</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="bg.css">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>
  <body class="back">
  <?php include('teachernavbar.php') ?>
    <div class="card mb-3" style="max-width: 100%; ">
  <div class="row no-gutters">
    <div class="col-sm-5 col-md-4 col-xl-2">
    <img
            style="height: 230px"
            src="<?php echo $teacher['images']  ?> "
            class="img-responsive"
            alt="..."
          />
    </div>
    <div class="col-7">
      <div class="card-body">
        <p class="card-text h4 text-success">Teacher Profile</p>
        <p class="card-text "><small class="">Teacher Name : <?php echo strtoupper($teacher['tl_name']); ?></small></p>
        <p class="card-text"><small class="">Teacher Id : <?php echo $teacher['tl_id']; ?></small></p>
        <p class="card-text"><small class="">Email : <?php echo $teacher['tl_email']; ?></small></p>
        <p class="card-text"><small class="">Subject : <?php echo $teacher['course_name']; ?></small></p>
      </div>
    </div>
  </div>
</div>
    
    <div class="container-fluid">
      <!-- <div class="nav m-3">
            <a class="btn btn-outline-info m-2 " href="teacherlist.php">Teachers list</a>
            <a class="btn btn-outline-success m-2" href="#">Manage Student</a>
            <a class="btn btn-outline-success m-2" href="#">Student list</a>
            <a class="btn btn-outline-warning m-2"  href="courses.php">Courses</a>
            <a class="btn btn-outline-secondary m-2" href="#manage-transports">See Transports</a>
            <a class="btn btn-outline-secondary m-2" href="#manage-library">See Library</a>
            <a class="btn btn-outline-secondary m-2" href="#routine">Routine</a>
        </div> -->
    
    <br><br>
    <div class="card-columns">
      
      <div class="card ">
        <div class="card-body text-left">
          <p class="card-text">Teacher</p>
          <p class="card-text">
            Total Teacher :
            <?php echo $teacher_count; ?>
          </p>
        </div>
      </div>
      <div class="card ">
        <div class="card-body text-left">
          <p class="card-text">Student</p>
          <p class="card-text">Total Student :<?php echo $student_count; ?></p>
        </div>
      </div>
      <div class="card ">
        <div class="card-body text-left">
          <p class="card-text">Course</p>
          <p class="card-text">
            Total Course :
            <?php echo $course_count; ?>
          </p>
        </div>
      </div>
      <div class="card ">
        <div class="card-body text-left">
          <p class="card-text">Transport</p>
          <p class="card-text">Total transport :<?php echo $transport_count; ?></p>
        </div>
      </div>
      <div class="card ">
        <div class="card-body text-left">
          <p class="card-text">Library</p>
          <p class="card-text">Total Books :</p>
        </div>
      </div>
    </div>
    <br>
    <div class="text-right">
        <a href="teacherlogin.php" class="btn btn-danger" name="logout" value="logout">Logout</a>
    </div>
    <br>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>

<?php
if(isset($_POST["logout"])){
  session_unset();
  session_destroy();
  header("location: teacherlogin.php");
  exit;
}

?>