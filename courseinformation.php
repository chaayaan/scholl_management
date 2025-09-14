<?php
include('database.php');
session_start();

?>
<!doctype html>
<html lang="en">
  <head>
    <title>Courses</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>
  <body class="">
  <?php include('adminnavbar.php'); ?>
    <h1 class="text-center text-secondary">Courses List</h1>
  <table class="table table-striped container">
  <thead>
    <tr>
      <th scope="col">No</th>
      <th scope="col">Course Id</th>
      <th scope="col">Course Name</th>
      <th scope="col">Update</th>
      <th scope="col">Delete</th>
    </tr>
  </thead>
  <tbody>
    <?php
    $no=1;
    $sql="SELECT * FROM courses";
    $result = mysqli_query($conn,$sql);
    while($row = mysqli_fetch_assoc($result)){

      ?>
      <tr>
      <th scope='row'> <?php echo $no ?> </th>
      <td> <?php echo $row['course_id'] ?> </td>
      <td> <?php echo $row['course_name'] ?></td>
      <td><a href="updatecourse.php?course_id=<?php echo $row['course_id']; ?>" class="btn btn-primary">Update</a></td>
        <td><a href="deletecourse.php?course_id=<?php echo $row['course_id'] ;?>" class="btn btn-danger">Delete</a></td></tr>
    </tr>
    
    
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
<!-- <div>
<a href="admin.php"class="form-control btn btn-outline-secondary mt-2 mb-4" >Go To Admin Dashboard</a>
</div> -->
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>