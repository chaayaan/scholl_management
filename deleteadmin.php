<?php
include('database.php');
session_start();

// $fetch = null;
if(isset($_GET['admin_id'])){
        
        $admin_id = $_GET['admin_id'];
        
        $sql = "DELETE FROM admins WHERE admin_id = '$admin_id'";
        $result = mysqli_query($conn,$sql);
        
        if(!$result){
        echo "ERROR";
        }
        else{
            header("location: adminlist.php?delete_msg");
            
        }
    }
    

// echo "<script>alert('are you sure to remove the admin')</script>";

?>