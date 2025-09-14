<?php
    include('database.php');
    session_start();
    
    // $sql="SELECT * FROM class_routine";
    // $result = mysqli_query($conn,$sql);
?>
<!doctype html>
<html lang="en">
  <head>
    <title>Routine</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>
  <body class="container">
    <br>
    
    <form action="routine.php" method="POST">
  <div class="form-row align-items-center">
    <div class="col-6">
      <label class="mr-sm-3" ><p class="h3">Class Routine</p></label>
      
    </div>
    <div class="col-5">
    <select class="custom-select mr-sm-2" name="class">
        <option value="">select class</option>
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
  <table class="table table-striped">
  <thead class="thead-dark">
    <tr>
      <th scope="col">CLASS</th>
      <th scope="col">DAY</th>
      <th scope="col">1<sup>st</sup>Period <br>(10:00-11:00)</th>
      <th scope="col">2<sup>nd</sup>Period <br>(11:00-12:00)</th>
      <th scope="col">3<sup>rd</sup>Period <br>(12:00-1:00)</th>
      <th scope="col">Break<br>(1:00-1:30)</th>
      <th scope="col">4<sup>th</sup>Period <br>(1:30-2:30)</th>
      <th scope="col">5<sup>th</sup>Period <br>(2:30-3:30)</th>
    </tr>
    
  </thead>
  <tbody>
    <?php
    if(isset($_POST['submit'])){
        $class = $_POST["class"];
        
    $sql="SELECT * FROM class_routine WHERE class='$class'";
}
    else{
        $sql="SELECT * FROM class_routine ";
    }
    $result = mysqli_query($conn,$sql);

    while($row = mysqli_fetch_assoc($result)){
    
        
    ?>
      <tr>
        <th scope='row'><?php echo $row['class'] ;?> </th>
        <td ><b> <?php echo $row['day']; ?> </b></td>
        <td> <?php echo $row['1st_period']; ?></td>
        <td> <?php echo $row['2nd_period'];?></td>
        <td> <?php echo $row['3rd_period'];?></td>
        <td> <?php echo "----";?></td>
        <td> <?php echo $row['4th_period']; ?></td>
        <td> <?php echo $row['5th_period']; ?></td>
      </tr>
    
    
    <?php
    
        } 
    ?>
    
    
  </tbody>
</table>
      
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>