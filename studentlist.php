<?php

include("database.php");
session_start();
?>

<!doctype html>
<html lang="en">
  <head>
    <title>Student list</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>
  <body class="">
  <?php include('teachernavbar.php') ?>
    <br>
    <div class="container-fluid">
  <form action="<?php $_SERVER['PHP_SELF'] ; ?>" method="POST">
  <div class="form-row align-items-center">
    <div class="col-7">
      <label class="mr-sm-3" >
        <p class="h3 text-left text-info">Student list</p></label>
    </div>
    <div class="col-4">
    <select class="custom-select mr-sm-2" name="class">
        <option >select class</option>
        <option value="6">Class 6</option>
        <option value="7">Class 7</option>
        <option value="8">Class 8</option>
        <option value="9">Class 9</option>
        <option value="10">Class 10</option>
      </select>
    </div>
    <div class="col-1">
      <button type="submit" class="btn btn-primary" name="submit" >Submit</button>
    </div>
  </div>
</form>
<br>
  <table class="table ">
  <thead class="thead-dark">
    <tr>
      <th scope="col">Id</th>
      <th scope="col">Class</th>
      <th scope="col">Name</th>
      <th scope="col">Email</th>
      <th scope="col">Number</th>
      <th scope="col">Gender</th>
      <th scope="col">Images</th>
      <th scope="col">Update</th>
      <th scope="col">Delete</th></tr>
      <!-- <th scope="col">Date of registrasion</th> -->
    </tr>
  </thead>
  <tbody>
  <?php
    if(isset($_POST['submit'])){
        $class = $_POST["class"];
        
    $sql="SELECT * FROM students WHERE class='$class'";
}
    else{
        $sql="SELECT * FROM students ";
    }
    $result = mysqli_query($conn,$sql);

    while($row = mysqli_fetch_assoc($result)){
    ?>
        <tr><th  scope='row'><?php echo $row['student_id']; ?></th>
        <td><?php echo $row['class']; ?></td>
        <td><?php echo $row['first_name'] . " " . $row['last_name']; ?></td>
        <td><?php echo $row['student_email']; ?></td>
        <td><?php echo $row['parents_number']; ?></td>
        <td><?php echo $row['gender']; ?></td>
        <td><img style="width: 50px;" src="<?php echo $row['images']; ?>" alt=""></td>
        <td><a href="updatestudent.php?student_id=<?php echo $row['student_id']; ?>" class="btn btn-primary">Update</a></td>
        <td><a href="deletestudent.php?student_id=<?php echo $row['student_id'] ;?>" class="btn btn-danger">Delete</a></td></tr>
       
    <?php
    }
    
    ?>
    
  </tbody>
</table>
<?php
if(isset($_GET['update_msg'])){
  echo "<h4 class='text-success'>Update successfully</h4>";
}
if(isset($_GET['delete_msg'])){
  echo "<h4 class='text-danger'>Deleted successfully</h4>";
}
?>
<a href="teacherdashboard.php"class="form-control btn btn-outline-secondary" >Go To Teacher Dashboard</a>
</div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>

