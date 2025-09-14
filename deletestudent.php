<?php
include('database.php');
session_start();

// $fetch = null;
if(isset($_GET['student_id'])){
        
        $student_id = $_GET['student_id'];
        
        $sql = "DELETE FROM students WHERE student_id = '$student_id'";
        $result = mysqli_query($conn,$sql);
        
        if(!$result){
        echo "ERROR";
        }
        else{
            header("location: studentlist.php?delete_msg");
            
        }
    }
    

// echo "<script>alert('are you sure to remove the admin')</script>";

?>