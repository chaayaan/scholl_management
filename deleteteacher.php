<?php
include('database.php');
session_start();

// $fetch = null;
if(isset($_GET['teacher_id'])){
        
        $teacher_id = $_GET['teacher_id'];
        
    $sql = "DELETE FROM teachers WHERE teacher_id = '$teacher_id'";
    $result = mysqli_query($conn,$sql);
    $sql2 = "DELETE FROM teachers_login 
            WHERE tl_id = '$teacher_id'";
    $result2 = mysqli_query($conn,$sql2);    
        if(!$result && !$result){
        echo "ERROR";
        }
        else{
            header("location: teacherlist.php?delete_msg");
            
        }
    }
    

// echo "<script>alert('are you sure to remove the teacher')</script>";

?>