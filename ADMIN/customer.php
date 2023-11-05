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
                    <span class="link-name">Category</span>
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
                <i class="uil uil-user-circle"></i> 
                    <span class="text">Customers</span>
        </div>

            <!----DISPLAY STATUS OF UPDATE SWEET ALERT ----->
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
        <!----DISPLAY STATUS OF DELETE SWEET ALERT ----->
        <?php
        if(isset($_SESSION['stats']) && $_SESSION['stats'] !='' )
        {
            ?>
            <script>
            swal({
        title: "<?php echo $_SESSION['stats'] ?>",
        text: "",
        icon: "<?php echo $_SESSION['stats_code'] ?>",
        button: "Okay",
        });
        </script>
            <?php
            unset($_SESSION['stats']);
        }
        ?>
                     
                                        
                    
                                                           <!-- EDIT FORM (Bootstrap MODAL) -->
                                                          
        <div class="modal fade" id="editmodal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="staticBackdropLabel">EDIT DATA USER</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
        
            <form action="updateuser.php" method="post">
                <input type="hidden" name="update_id" id="update_id">

                <div class="mb-3">
                    <label class="form-label">User Name</label>
                    <input id="user_name" name="user_name" type="text" class="form-control" aria-describedby="emailHelp" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Email address</label>
                    <input id="email" name="email" type="email" class="form-control" aria-describedby="emailHelp" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Contact Number</label>
                    <input id="contact" name="contact" type="text" class="form-control"  aria-describedby="emailHelp" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Address</label>
                    <input id="address" name="address" type="text" class="form-control"  aria-describedby="emailHelp" required>
                </div>
               
                <button type="submit" name="updatedata" class="btn btn-primary">Update</button>
           </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
        
      </div>
    </div>
  </div>
</div>




                                                  <!-- DELETE FORM (Bootstrap MODAL) -->
        

                       <div class="modal fade" id="deletemodal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="staticBackdropLabel">Delete user Data</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <form action="delete.php" method="post">
                            <div class="modal-body">
                                <input type="hidden" name="delete_id" id="delete_id">

                                <h4>Do you want to delete this Data?</h4>
                            </div>
                            <button type="submit" name="delete_data" class="btn btn-primary">Yes Delete it!</button>
                            </form>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No!<button>
                                
                            </div>
                            </div>
                        </div>
                        </div>


                </div>
                </div>
            
            <div class="activity">
                <div class="activity-data">
               
                <table class="content-table">
           <thead>
           <tr>
            <th class="">ID</th>
            <th class="">User ID</th>
            <th class="">User Name</th>
            <th class="">Email</th>
            <th class="">Contact</th>
            <th class="">Address</th>
            <th class="">Date</th>
            <th class="">Update</th>
            <th class="">Delete</th>
            </tr> 
           </thead>
         <tbody>
            <?php
        

            while($row = $result->fetch_assoc()){
                echo"
                <tr>
                
                <td class='data-list'>$row[id]</td>
                <td class='data-list'>$row[user_id]</td>
                <td class='data-list'>$row[user_name]</td>
                <td class='data-list'>$row[email]</td>
                <td class='data-list'>$row[Contact_number]</td>
                <td class='data-list'>$row[addresss]</td>
                <td class='data-list'>$row[date]</td>
               
                <td class='data-list'>
                        <button type='button' class='btn btn-success editbtn' data-bs-toggle='modal'>
                            EDIT USER
                        </button>
                </td>
               
                <td class='data-list'> 
                        <button type='button' class='btn btn-danger deletebtn' data-bs-toggle='modal'>
                        DELETE 
                    </button>
                </td>
               
            </tr>
                
                ";
            }
            
            ?>
         </tbody>
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


<script>
    // FETCH AND DELETE MODAL
    $(document).ready(function () {

$('.deletebtn').on('click', function () {

    $('#deletemodal').modal('show');

            $tr = $(this).closest('tr');

        var data = $tr.children("td").map(function () {
            return $(this).text();
            }).get();

            console.log(data);

        $('#delete_id').val(data[0]);
        
  });
         });
</script>



<script>
    //FETCH AND DISPLAY DATA IN EDIT MODAL
    $(document).ready(function () {

$('.editbtn').on('click', function () {

    $('#editmodal').modal('show');

    $tr = $(this).closest('tr');

    var data = $tr.children("td").map(function () {
        return $(this).text();
    }).get();

    console.log(data);

    $('#update_id').val(data[0]);
    $('#user_name').val(data[2]);
    $('#email').val(data[3]);
    $('#contact').val(data[4]);
    $('#address').val(data[5]);
});
});
</script>


</body>
</html>
