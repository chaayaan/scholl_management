<?php

    $db_server = "localhost";
    $db_user = "root";
    $db_pass = "";
    $db_name = "sclmanagment";

    $conn = "";

    
    try{
        $conn = mysqli_connect($db_server,$db_user,$db_pass,$db_name);

    }
    catch(mysqli_sql_exception){
        echo "error!";

    }
    if($conn){
        // echo"Database Connect sucsessfully";
    }
    
    $adminsql = "SELECT * FROM admins ";
    $teachersql = "SELECT * FROM teachers ";
    $coursesql = "SELECT * FROM courses ";
    $transportsql = "SELECT * FROM transports ";
    $studentsql = "SELECT * FROM students ";

    $admin_count_result = mysqli_query($conn,$adminsql);
    $teacher_count_result = mysqli_query($conn,$teachersql);
    $course_count_result = mysqli_query($conn,$coursesql);
    $transport_count_result = mysqli_query($conn,$transportsql);
    $student_count_result = mysqli_query($conn,$studentsql);

    $admin_count = mysqli_num_rows($admin_count_result);
    $teacher_count = mysqli_num_rows($teacher_count_result);
    $course_count = mysqli_num_rows($course_count_result);
    $transport_count = mysqli_num_rows($transport_count_result);
    $student_count = mysqli_num_rows($student_count_result);

?>