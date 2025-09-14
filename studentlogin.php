<?php
include('database.php');
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Student login</title>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1, shrink-to-fit=no"
    />
    <link rel="stylesheet" href="studentlogin.css" />
    <!-- Bootstrap CSS -->
    <link
      rel="stylesheet"
      href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
      integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T"
      crossorigin="anonymous"
    />
  </head>
  <body>
    <!-- <body class="container " style="width:50%;"> -->
    <!-- <br>
    <div class="border container">
    <br>
    <h1 class="text-center text-primary">Student Login</h1><br>
    
    <form action="<?php $_SERVER["PHP_SELF"]  ?>" method="post">
    <div>
    <label for="">ID</label>
    <input type="text" class="form-control" name="id" id=""  placeholder="Enter Your Student ID">
    </div>
    <div class="form-group">
    <label for="class">Class</label>
    <select name="class" class="form-control" id="class">
      <option >Select one</option>
      <option value="6">class 6</option>
      <option value="7">class 7</option>
      <option value="8">class 8</option>
      <option value="9">class 9</option>
      <option value="10">class 10</option>
      
    </select>
  
    </div>
    <div class="form-group">
      <label for="">Password</label>
      <input type="password" class="form-control" name="password" id="" placeholder="Password">
    </div>
    <div class="text-center">
    <input type="submit" value="login" name="login" class="btn btn-outline-primary ">
    </div>
  </form> -->
    <!-- <br> -->
    <div id="login">
    <form action="<?php $_SERVER["PHP_SELF"]  ?>" method="post">
    <h1>Log In</h1>
    <input type="text" name="id" id=""  placeholder="Enter Your Student ID">
    <input type="password" placeholder="Password" name="password">
    <button value="login" name="login">Log in</button>
  </form>
</div>
  
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script
      src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
      integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
      crossorigin="anonymous"
    ></script>
    <script
      src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
      integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
      crossorigin="anonymous"
    ></script>
    <script
      src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
      integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
      crossorigin="anonymous"
    ></script>
  </body>
</html>
<?php
// if(isset($_POST['login'])){    
//     $id = $_POST['id'];
//     $class = $_POST['class'];
//     $password = $_POST['password'];
    
//     if(empty($id) || empty($class) || empty($password) ){
//         echo"Please enter all information for login";
//     }
//     elseif(!empty($_POST["id"]) && !empty($_POST["class"]) && !empty($_POST["password"])){
//         $sql ="SELECT * FROM students  WHERE student_id = '$id' ";
//         $result = mysqli_query($conn,$sql);
//         $fetchresult = mysqli_fetch_assoc($result);
//         $num = mysqli_num_rows($result);
//         if($num){
//           if(password_verify($password,$fetchresult['student_password'])){
//             session_start();
//             $_SESSION['id']= $id;
//             $_SESSION['class']= $class;
//             header("location: studentdashboard.php");
//         }
//       }
          
//       else{
//         echo"Please enter information correctly";
//       }
//     }
// }

?>
<?php
if(isset($_POST['login'])){    
    $id = $_POST['id'];
    // $class = $_POST['class'];
    $password = $_POST['password'];
    
    if(empty($id) || empty($password) ){
        echo "Please enter all information for login";
    }
    elseif(!empty($_POST["id"]) && !empty($_POST["password"])){
        $sql ="SELECT * FROM students  WHERE student_id = '$id' ";
        $result = mysqli_query($conn,$sql);
        $fetchresult = mysqli_fetch_assoc($result);
        $num = mysqli_num_rows($result);
        if($num){
          if(password_verify($password,$fetchresult['student_password'])){
            session_start();
            $_SESSION['id']= $id;
            // $_SESSION['class']= $class;
            header("location: studentdashboard.php");
        }
      }
          
      else{
        echo"Please enter information correctly";
      }
    }
}
?>
