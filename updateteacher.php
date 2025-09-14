<?php
include('database.php');
session_start();
$showsuccess=false;
$showalert=false;

// $fetch = null;
if(isset($_GET['teacher_id'])){
    $teacher_id = $_GET['teacher_id'];

    $sql = "SELECT * FROM teachers WHERE teacher_id = '$teacher_id'";
    $result = mysqli_query($conn,$sql);
    
    if(!$result){
       echo "ERROR";
    }
    else{
        $fetch = mysqli_fetch_assoc($result);
        
    }
}

?>
<?php
    if($_SERVER['REQUEST_METHOD']=='POST'){
        echo "<script>alert('are you sure to update ADMIN information')</script>";
        $username = filter_input(INPUT_POST,"username", FILTER_SANITIZE_SPECIAL_CHARS);
        $username = strtoupper($username);
        $email = $_POST['email'];
        $gender = $_POST['gender'];
        $address = $_POST['address'];
        $salary = $_POST['salary'];
        $number = $_POST['number'];
        $password = $_POST['password'];
        $cpassword = $_POST['cpassword'];


        if(!empty($password) && $password === $cpassword){
            $hash = password_hash($password,PASSWORD_DEFAULT);
            $updatesql = "UPDATE teachers Set teacher_name='$username' ,teacher_email='$email',teacher_gender='$gender',teacher_address='$address',
                                            teacher_number='$number',teacher_salary='$address',teacher_password='$hash' Where teacher_id='$teacher_id'";
            $result = mysqli_query($conn, $updatesql);
            if($result){
                header("location: teacherlist.php?update_msg");
               
            }
            else{
                $showalert = true;
            }
            
        }
        else {
            $showalert = true;
        }
        // mysqli_close();
}

?>


<!doctype html>
<html lang="en">
  <head>
    <title>Update admin</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>
  <body class="">
  <?php include('adminnavbar.php'); ?>
  <?php
      if($showsuccess){
        echo"<div class='alert alert-success '><strong>Success!</strong>ADMIN information successfylly updated</div>";
      }
      if($showalert){
        echo"<div class='alert alert-danger '><strong>Error!</strong>can't Update</div>";
      }
      ?>
  <div class="container">
    <h1 class="text-center text-primary mt-3">Update Teacher information</h1>
      <form action="updateteacher.php?teacher_id=<?php echo $teacher_id; ?>" method="post">
        
      <br>
      <div class="form-group">
        <label for="username">Name : </label>
        <input type="text" name="username" id="" class="form-control" value="<?php echo $fetch['teacher_name'] ;?>" >
        <label for="email">Email : </label>
        <input type="email" name="email" id="" class="form-control" value="<?php echo $fetch['teacher_email'] ;?>"  ><div class="form-group">
    <label for="gender">Gender</label>
    <select name="gender" class="form-control"  id="gender">
      <option value="male">Male</option>
      <option value="female">Female</option>
      
    </select>
  </div>
        <label for="address">Address : </label>
        <input type="text" name="address" id="" class="form-control" value="<?php echo $fetch['teacher_address'] ;?>"  >
        <label for="address">Address : </label>
        <input type="text" name="address" id="" class="form-control" value="<?php echo $fetch['teacher_address'] ;?>"  >
        <label for="number">Number : </label>
        <input type="text" name="number" id="" class="form-control" value="<?php echo $fetch['teacher_number'] ;?>"  >
        <label for="salary">salary : </label>
        <input type="text" name="salary" id="" class="form-control" value="<?php echo $fetch['teacher_salary'] ;?>" >
      
        <label for="password">Password : </label>
        <input type="password" name="password" id="" class="form-control"  placeholder="password" >
        <label for="cpassword">Confirm Password : </label>
        <input type="password" name="cpassword" id="" class="form-control"  placeholder="type the same password" >
        <br>
        <input type="submit" name="update" value="Upadate" class="form-control btn btn-outline-success">
      </div>
    </form>
    
    <a href="admindashboard.php"class="form-control btn btn-outline-secondary" >Go To Admin Dashboard</a>
    <br><br><br>
      <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    </div>
  </body>
</html>



