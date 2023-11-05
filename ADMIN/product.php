<?php
 session_start(); 
 include("CONNECTION/checklogin.php");
 include("CONNECTION/config.php");
 include("CONNECTION/showusers.php");
 include('INCLUDE/script.php');
 $user_data = check_login($con);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!----======== CSS ======== -->
    <link rel="stylesheet" href="CSS/categoryform.css">
    <link rel="stylesheet" href="CSS/modal.css">
    <link rel="stylesheet" href="CSS/sidebar.css">
    <link rel="stylesheet" href="CSS/table.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    
    
    
    <!----===== Iconscout CSS ===== -->
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
    <title>Admin Dashboard Panel</title>
</head>
<body>

<div>
<nav>
        <div class="logo-name">
        <div class="logo-image">
               <img src="IMAGE/pic1.jpg" alt="2joints">
            </div>
            <span class="logo_name">MX ARTE</span>
        </div>
        <div class="menu-items">
            <ul class="nav-links">
                <li><a href="adminpage.php">
                    <i class="uil uil-estate"></i>
                    <span class="link-name">Dahsboard</span>
                </a></li>
                <li><a href="customer.php">
                <i class="uil uil-user"></i>
                    <span class="link-name">Customers</span>
                </a></li>
                <li><a href="product.php">
                <i class="uil uil-store"></i>
                    <span class="link-name">Store</span>
                </a></li>
            </ul>
            
            <ul class="logout-mode">
                <li class="logout"><a href="logout.php">
                    <i class="uil uil-signout"></i>
                    <span class="link-name">Logout</span>
                </a></li>
                <li class="mode">
                    <a href="#">
                        <i class="uil uil-moon"></i>
                    <span class="link-name">Dark Mode</span>
                </a>
                <div class="mode-toggle">
                  <span class="switch"></span>
                </div>
            </li>
            </ul>
           
        </div>
    </nav>

    <section class="dashboard">
        <div class="top">
            <i class="uil uil-bars sidebar-toggle"></i>
            <div class="search-box">
                <i class="uil uil-search"></i>
                <input type="text" placeholder="Search here...">
            </div>
        </div>
        <div class="dash-content">
        <div class="overview">
        <div class="title">
                     <i class="uil uil-store"></i>
                    <span class="text">Category</span>
        </div>

            <!-----DISPLAY STATUS OF ADD CATEGORY SWEET ALERT ---->
            <?php
            if(isset($_SESSION['status']) && $_SESSION['status'] !='' )
            {
                ?>
                <script>
            swal({
        title: "<?php echo $_SESSION['status'] ?>",
        text: "",
        icon: "<?php echo $_SESSION['status_code'] ?>",
        button: "Okay",
        });
        </script>
            <?php 
             unset($_SESSION['status']);
            }

            ?>
                                                                   <!----===== ADD CATEGORY MODAL ===== -->  
        <div class="modal" id="addcategory" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="staticBackdropLabel">Add category</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">

                        <form action="addcategory.php" method="post" enctype="multipart/form-data">
                        <div class="row">
                                <div class="col-md-6">
                                    <label for="">Name</label>
                                    <input type="text" name="name" id="name" placeholder="Enter Category Name" class="form-control">
                                </div>
                                <div class="col-md-6">
                                    <label for="">Slug</label>
                                    <input type="text" name="slug" id="slug" placeholder="Enter Slug" class="form-control">
                                </div>
                            
                                <div class="col-md-12">
                                    <label for="">Description</label>
                                    <textarea name="description" id="description" rows="3" placeholder="Enter description" class="form-control"></textarea>
                                </div>
                                <div class="col-md-12">
                                    <label for="">Upload Image</label>
                                    <input type="file" name="image" id="image" class="form-control">
                                </div> 
                                <div class="col-md-12">
                                    <label for="">Meta Title</label>
                                    <input type="text" name="meta_title" id="meta_title" placeholder="Enter meta title" class="form-control">
                                </div> 
                                <div class="col-md-12">
                                    <label for="">Meta Description</label>
                                    <textarea name="meta_description" id="meta_description" rows="3" placeholder="Enter meta description" class="form-control"></textarea>
                                </div>
                                <div class="col-md-12">
                                    <label for="">Meta Keywords</label>
                                    <textarea name="meta_keywords" id="meta_keywords" rows="3" placeholder="Enter meta keywords" class="form-control"></textarea>
                                </div>
                                <div class="col-md-6">
                                    <label for="">Status</label>
                                    <input type="checkbox" id="status" name="status">
                                </div>
                                <div class="col-md-6">
                                    <label for="">Popular</label>
                                    <input type="checkbox" id="popular" name="popular">
                                </div>
                            </div>
                            <button type="submit" name="addcategory" class="btn btn-primary">SUBMIT</button>
                        </form>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
        
      </div>
    </div>
  </div>
</div>
      


                </div>
                </div>
            
            <div class="activity">
                            <button type="button" class="btn btn-info addbtn" data-bs-toggle="modal" data-bs-target="#addcategory">
                 Add Category
                </button>

                <div class="activity-data">
                <table class="content-table">
                    <thead>
                        <tr>
                            <th>tanginamo</th>
                        </tr>
                    </thead>
                </table>
                </div>
            </div>
   
        </div>
        
        </section>
       <script src="JS/script.js"></script>
       <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"></script>



</body>
</html>