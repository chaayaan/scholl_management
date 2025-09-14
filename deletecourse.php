<?php
include('database.php');
session_start();

// $fetch = null;
if(isset($_GET['course_id'])){
        
        $course_id = $_GET['course_id'];
        
        $sql = "DELETE FROM courses WHERE course_id = '$course_id'";
        $result = mysqli_query($conn,$sql);
        
        if(!$result){
        echo "ERROR";
        }
        else{
            header("location: courseinformation.php?delete_msg");
            
        }
    }
    

// echo "<script>alert('are you sure to remove the teacher')</script>";

?>