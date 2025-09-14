<?php
include('database.php');
    
?>
<!doctype html>
<html lang="en">
  <head>
    <title>admin login</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  
    <link rel="stylesheet" href="bg.css">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>
  <body class="container " style="width: 50%;" >
    <br>
    <div class="container border">
    <h1 class="text-center text-primary">Admin Login</h1><br>
    
    <form  action="<?php $_SERVER["PHP_SELF"]  ?>" method="post">
    
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
        
        if(empty($_POST['username']) && empty($_POST['password'])){
          echo"Please enter username or password";
        }
        elseif(!empty($_POST["username"]) && !empty($_POST["password"])){
          $username = $_POST['username'];
        
        $password = $_POST["password"];
          $username = strtoupper($username);
          // $hash = password_hash($password, PASSWORD_DEFAULT);
          $sql ="SELECT *FROM admins WHERE admin_name='$username' ";
          $result = mysqli_query($conn,$sql);
          $fetchresult = mysqli_fetch_assoc($result);
          $num = mysqli_num_rows($result);
          if(!$num){
            echo"<P class='text-center>Please enter Username or Password correctly<p>";
          }
          elseif($num){
            if(password_verify($password,$fetchresult['admin_password'])){
              session_start();
              $_SESSION["username"] = $username;
              header("location: admindashboard.php");
            }
          }
          else{
            echo"<P class='text-center>Please enter Username or Password correctly<p>";
          }
            
        }
        else{
            echo"<P class='text-center>Please enter Username or Password correctly<p>";
        }
    }

?>