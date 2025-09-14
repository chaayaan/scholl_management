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
  <body class="container-fluid">
    <h1 class="text-center text-info mt-4 mb-3"><u> Teachers information</u></h1>
  <div class="card-group row container">
    <?php
    $no=1;
    $sql= "SELECT * FROM teachers_login NATURAL JOIN courses";
    $result = mysqli_query($conn,$sql);
    while($row = mysqli_fetch_assoc($result)){
      ?>
         <div class="card col-xl-2 col-sm-4 m-1" >
  <img class="card-img-top image-fluid pt-2" src="<?php echo $row['images'] ?>" alt="Card image cap">
  <div class="card-body">
    <div >
    <h5 class="card-title image-fluid"><?php echo $row['tl_name']  ?></h5>
    </div>
    <p class="card-text"><?php echo "Teacher id : " . $row['tl_id']  ?></p>
    <p class="card-text"><?php echo "Course : " . $row['course_name']  ?></p>
    <p class="card-text"><?php echo "Email : " . $row['tl_email']  ?></p>
    
  </div>
</div>
    <?php
        $no++;
    }
    
    ?>
</div>

<!-- <div>
<a href="teachermanage.php"class="form-control btn btn-outline-secondary mt-2" >Go To Teachers Registration</a>
<a href="admin.php"class="form-control btn btn-outline-secondary mt-2" >Go To Admin Dashboard</a>
</div> -->
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>

