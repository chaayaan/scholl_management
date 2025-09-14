<?php

include("database.php");
session_start();
?>

<!doctype html>
<html lang="en">
  <head>
    <title>Teacherlist</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>
  <body class="">
  <?php include('adminnavbar.php'); ?>
    <h1 class="text-center text-info mt-4 mb-3">Teachers information</h1>
  <div class="container-fluid">
    <table class="table ">
  <thead class="thead-dark">
    <tr>
      <th scope="col">Image</th>
      <th scope="col">Id</th>
      <th scope="col">Name</th>
      <th scope="col">Email</th>
      <th scope="col">Course</th>
      <th scope="col">Address</th>
      <th scope="col">salary</th>
      <th scope="col">Number</th>
      <th scope="col">gender</th>
      <th scope="col">Update</th>
      <th scope="col">Delete</th></tr>
      <!-- <th scope="col">Date of registrasion</th> -->
    </tr>
  </thead>
  <tbody>
    <?php
    $no=1;
    $sql= "SELECT * FROM teachers NATURAL JOIN courses";
    $result = mysqli_query($conn,$sql);
    while($row = mysqli_fetch_assoc($result)){
      ?>
        <tr><th  scope='row'><img style="width: 50px;" src="<?php echo $row['images']; ?>" alt=""></th>
        <td><?php echo $row['teacher_id']; ?></td>
        <td><?php echo $row['teacher_name']; ?></td>
        <td><?php echo $row['teacher_email']; ?></td>
        <td><?php echo $row['course_name']; ?></td>
        <td><?php echo $row['teacher_address']; ?></td>
        <td><?php echo $row['teacher_salary']; ?></td>
        <td><?php echo $row['teacher_number']; ?></td>
        <td><?php echo $row['teacher_gender']; ?></td>
        <td><a href="updateteacher.php?teacher_id=<?php echo $row['teacher_id']; ?>" class="btn btn-primary">Update</a></td>
        <td><a href="deleteteacher.php?teacher_id=<?php echo $row['teacher_id'] ;?>" class="btn btn-danger">Delete</a></td></tr>
        
    <?php
        $no++;
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
<a href="admindashboard.php"class="form-control btn btn-outline-secondary" >Go To Admin Dashboard</a>
</div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>

