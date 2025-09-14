<?php

include("database.php");
session_start();
?>

<!doctype html>
<html lang="en">
  <head>
    <title>Admin list</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>
  <body class="">
  <?php include('adminnavbar.php'); ?>
  <br>
    <h1 class="text-center text-primary mt-4 mb-3">Admin information</h1>
  <div class=" container-fluid">
    <table class="table">
  <thead class="thead-dark">
    <tr>
      <th scope="col">No</th>
      <th scope="col">Id</th>
      <th scope="col">Name</th>
      <th scope="col">Email</th>
      <th scope="col">Address</th>
      <th scope="col">Number</th>
      <th scope="col">Gender</th>
      <th scope="col">Update</th>
      <th scope="col">Delete</th>
      <!-- <th scope="col">Date of registrasion</th> -->
    </tr>
  </thead>
  <tbody>
    <?php
    $no=1;
    $sql= "SELECT * FROM admins";
    $result = mysqli_query($conn,$sql);
    while($row = mysqli_fetch_assoc($result))
    {
        ?>
        <tr><th scope='row'><?php echo $no ?></th>
        <td><?php echo $row['admin_id'] ?></td>
        <td><?php echo $row['admin_name'] ?></td>
        <td><?php echo $row['admin_email'] ?></td>
        <td><?php echo $row['admin_address'] ?></td>
        <td><?php echo $row['admin_number'] ?></td>
        <td><?php echo $row['admin_gender'] ?></td>
        <td><a href="updateadmin.php?admin_id=<?php echo $row['admin_id']; ?>" class="btn btn-primary">Update</a></td>
        <td><a href="deleteadmin.php?admin_id=<?php echo $row['admin_id'] ;?>" class="btn btn-danger">Delete</a></td></tr>
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
<div>
<a href="admindashboard.php"class="form-control btn btn-outline-secondary mt-2" >Go To Admin Dashboard</a>
</div>
</div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>

