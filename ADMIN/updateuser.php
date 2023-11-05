<?php
session_start();
include("CONNECTION/config.php");
if(isset($_POST['updatedata']))
{
    $id = $_POST['update_id'];

    $user_name = $_POST['user_name'];
    $email = $_POST['email'];
    $contact = $_POST['contact'];
    $address = $_POST['address'];

    $sql = "UPDATE users SET user_name = '$user_name', email = '$email',Contact_number = '$contact', addresss = '$address' WHERE id = $id ";
    $res = mysqli_query($con,$sql);
    
    if($res)
    {
        $_SESSION['status'] = " User Updated Successfully";
        $_SESSION['status_code'] = "success";
        header("Location:customer.php");
    }
    else
    { 
        $_SESSION['status'] = "Update Failed";
        $_SESSION['status_code'] = "error";
        header("Location:customer.php");
    }

}

?>