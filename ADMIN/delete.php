<?php
session_start();
include("CONNECTION/config.php");
if(isset($_POST['delete_data']))
{
    $id = $_POST['delete_id'];


    $sql = "DELETE FROM users WHERE id = $id ";
    $query = mysqli_query($con,$sql);
    
    if($query)
    {
        $_SESSION['stats'] = " User Deleted Successfully";
        $_SESSION['stats_code'] = "success";
        header("Location:customer.php");
    }
    else
    {
   
        $_SESSION['stats'] = "Delete Failed";
        $_SESSION['stats_code'] = "error";
        header("Location:customer.php");
    }

}

?>