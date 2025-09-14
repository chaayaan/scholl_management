<?php
include('database.php');
session_start();

$id = $_SESSION['id'];
// $class = $_SESSION['class'];

// $sql = "SELECT * FROM students  WHERE student_id ='$id' AND class='$class' ";
$sql = "SELECT * FROM students  WHERE student_id ='$id' ";

$result = mysqli_query($conn,$sql);
$student = mysqli_fetch_assoc($result);



?>
<!doctype html>
<html lang="en">
  <head>
    <title>Student profile</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="bg.css">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>
  <body class="back">
  <nav class="navbar navbar-expand-md bg-dark navbar-dark">
      <!-- Brand -->
      <a class="navbar-brand" href="#">Student Account</a>

      <!-- Toggler/collapsibe Button -->
      <button
        class="navbar-toggler"
        type="button"
        data-toggle="collapse"
        data-target="#collapsibleNavbar"
      >
        <span class="navbar-toggler-icon"></span>
      </button>

      <!-- Navbar links -->
      <div class="collapse navbar-collapse" id="collapsibleNavbar">
        <ul class="navbar-nav">
          
          <li class="nav-item">
            <a class="nav-link" href="teacherlistforall.php">Teachers list</a>
          </li>
          
          <li class="nav-item">
            <a class="nav-link" href="courseinformationforall.php">Courses list</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="routine.php">Routine</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="transportlist.php">Transports</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Library</a>
          </li>
        </ul>
      </div>
    </nav>
    <div class="card mb-3 " style="max-width: 100%; ">
  <div class="row no-gutters">
    <div class="col-sm-5 col-md-4 col-xl-2">
    <img
            style="height: 230px"
            src="<?php echo $student['images']  ?> "
            class="img-responsive"
            alt="..."
          />
    </div>
    <div class="col-7 ">
      <div class="card-body">
        <p class="card-text h3 text-success">Student Profile</p>
        <p class="card-text">Student Id : <?php echo $student['student_id']; ?></p>
        <p class="card-text ">Student Name : <?php echo strtoupper($student['first_name'])." ".strtoupper($student['last_name']) ; ?></p>
        <p class="card-text">Class : <?php echo $student['class']; ?></p>
        <p class="card-text">Email : <?php echo $student['student_email']; ?></p>
      </div>
    </div>
  </div>
</div>
<br>
<div class="routine container-fluid">
    <p class="h4">Class Routine </p>
<table class="table table-striped">
  <thead class="thead-dark">
    <tr>
      <!-- <th scope="col" class="text-center">CLASS</th> -->
      <th scope="col" class="text-center">DAY</th>
      <th scope="col" class="text-center">1<sup>st</sup>Period <br>(10:00-11:00)</th>
      <th scope="col" class="text-center">2<sup>nd</sup>Period <br>(11:00-12:00)</th>
      <th scope="col" class="text-center">3<sup>rd</sup>Period <br>(12:00-1:00)</th>
      <th scope="col" class="text-center">Break<br>(1:00-1:30)</th>
      <th scope="col" class="text-center">4<sup>th</sup>Period <br>(1:30-2:30)</th>
      <th scope="col" class="text-center">5<sup>th</sup>Period <br>(2:30-3:30)</th>
    </tr>
    
  </thead>
  <tbody>
    <?php
    $class = $student['class'];
    $sql="SELECT * FROM class_routine WHERE class='$class'";

    $result = mysqli_query($conn,$sql);

    while($row = mysqli_fetch_assoc($result)){
    
        
    ?>
      <tr>
        <!-- <th scope='row' class="text-center"><?php echo $row['class'] ;?> </th> -->
        <td class="text-center"><b> <?php echo $row['day']; ?> </b></td>
        <td class="text-center"> <?php echo $row['1st_period']; ?></td>
        <td class="text-center"> <?php echo $row['2nd_period'];?></td>
        <td class="text-center"> <?php echo $row['3rd_period'];?></td>
        <td class="text-center"> <?php echo "----";?></td>
        <td class="text-center"> <?php echo $row['4th_period']; ?></td>
        <td class="text-center"> <?php echo $row['5th_period']; ?></td>
      </tr>
    
    
    <?php
    
        } 
    ?>
    
    
  </tbody>
</table>
</div>
<br>
<div class="card-columns container-fluid">
      
      
      
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
<div class="container-fluid">
<div class="text-right ">
        <a href="studentlogin.php" class="btn btn-danger" name="logout" value="logout">Logout</a>
    </div>
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
  header("location:studentlogin.php");
  exit;
}

?>