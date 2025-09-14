<?php
include('database.php');
    
?>
<!doctype html>
<html lang="en">
  <head>
    <title>Teacher login</title>
    <link rel="stylesheet" href="bg.css">
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>
  <body class="container " style="width:50%;">
    <br>
    <div class="container border">
    <h1 class="text-center text-primary">Teacher Login</h1><br>
    
    
    <form action="<?php $_SERVER["PHP_SELF"]  ?>" method="post">
  <div class="form-group">
    <label for="">Username</label>
    <input type="text" class="form-control" name="username" id=""  placeholder="Userame ">
    </div>
  <div class="form-group">
    <label for="">Password</label>
    <input type="password" class="form-control" name="password" id="" placeholder="Password">
  </div>
  <div class="text-center">
  <input type="submit" value="login" name="login" class="btn btn-outline-primary ">
  </div></form>
  <br>
  </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>
<?php
    if(isset($_POST["login"])){
        $username = $_POST['username'];
        $username = strtoupper($username);
        $password = $_POST["password"];
        if(empty($username) || empty($password)){
          echo"Please enter username and password";
        }
        elseif(!empty($_POST["username"]) && !empty($_POST["password"])){
          $sql ="SELECT *FROM teachers_login WHERE tl_name='$username'";
          $result = mysqli_query($conn,$sql);
          $fetchresult = mysqli_fetch_assoc($result);
          $num = mysqli_num_rows($result);
          if($num){
            if(password_verify($password,$fetchresult['tl_password'])){
              session_start();
              $_SESSION["username"] = $username;
              header("location: teacherdashboard.php");
          }
        }
            
        else{
          echo"Please enter Username and Password correctly";
        }
            
        }
    }

?>