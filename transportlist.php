<?php
include('database.php');
session_start();

?>
<!doctype html>
<html lang="en">
  <head>
    <title>Transport</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>
  <body class="container">
    <h1 class="text-center">Transport List</h1>
  <table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">Transport No</th>
      <th scope="col">Transport Route</th>
      <th scope="col">Pickup and Destination</th>
      <th scope="col">Time</th>
    </tr>
  </thead>
  <tbody>
    <?php
    $sql="SELECT * FROM transports";
    $result = mysqli_query($conn,$sql);
    while($row = mysqli_fetch_assoc($result)){

      ?>
      <tr>
      <th scope='row'><?php echo $row['transport_no'] ?> </th>
      <td> <?php echo $row['transport_route'] ?></td>
      <td> <?php echo $row['pickup_and_destination'] ?></td>
      <td> <?php echo $row['time'] ?></td>
      
    </tr>
    
    
    <?php
    
    }
    ?>
    
    
  </tbody>
</table>

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