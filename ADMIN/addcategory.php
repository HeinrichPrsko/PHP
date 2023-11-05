<?php
session_start();
include("CONNECTION/config.php");
include("CONNECTION/checklogin.php");
$user_data = check_login($con);

if(isset($_POST['addcategory']))
{
    $name = $_POST['name'];
    $slug = $_POST['slug'];
    $description = $_POST['description'];
    $meta_title = $_POST['meta_title'];
    $meta_description = $_POST['meta_description'];
    $meta_keywords = $_POST['meta_keywords'];
    $status = isset($_POST['status']) ? '1' : '0';
    $popular = isset($_POST['popular']) ? '1' : '0';
    $image = $_FILES['image']['name'];

    

   $allowed_extensions = array('png','jpg','jpeg');
   $file_extension = pathinfo($image, PATHINFO_EXTENSION);
   $filename = time().''.$file_extension;
   if(!in_array($file_extension,$allowed_extensions))
   {
    $_SESSION['status'] = "You are allowed with only jpg, png, jpeg image";
    $_SESSION['status_code'] = "error";
    header('location: product.php');
   }
   else
   {
    $cate_query = "INSERT INTO category (name,slug,description,meta_title,meta_description,meta_keywords,status,popular,image)
    VALUES ('$name','$slug','$description','$meta_title','$meta_description','$meta_keywords','$status','$popular','$filename')";
    $query_run = mysqli_query($con,$cate_query);
    if($query_run)
    {
      move_uploaded_file($_FILES['image']['tmp_name'], 'UPLOADS/CATEGORY/'.$filename);
      $_SESSION['status'] = " Catergory Added Successfully";
      $_SESSION['status_code'] = "success";
      header('location: product.php');
    }
    else
    {
      $_SESSION['status'] = "Something went wrong";
      $_SESSION['status_code'] = "error";
      header('location: product.php');
    }
   }
}

?>