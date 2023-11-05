
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="CSS/login.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <title>PROJECT SYSTEM</title>
</head>

<body>
    <div class="wrapper">
        <form action="" method="post">
            <h1>Admin</h1>
            <div class="input-box">
                <input name="user_name" id="user_name" type="text" placeholder="Username" required>
                <i class='bx bxs-user'></i>
            </div>
            <div class="input-box">
                <input name="password" id="password" type="Password" placeholder="Password" required>
                <i class='bx bxs-lock-alt' ></i>
            </div>
            <button value="login" type="submit" class="btn">Login</button>
            <div class="register-link">
            
                <?php
                            session_start();
                            include("CONNECTION/checklogin.php");
                            include("CONNECTION/config.php");
 

                        if($_SERVER["REQUEST_METHOD"] === "POST") 
                        {      
                               //something was posted
                                   $user_name = $_POST['user_name'];
                                      $password = $_POST['password'];
                        if(!empty($user_name) && !empty($password) && !is_numeric($user_name))
                               {
                                 //read to db
                                  $query = "select * from admin where user_name ='$user_name' limit 1";
                                  $result = mysqli_query($con,$query);

                                 if($result)
                                    {
                                         if($result && mysqli_num_rows($result) > 0)
                                              {            
                                                 $user_data = mysqli_fetch_assoc($result);
                                                 $hashedpassword = $user_data['password'];
                        
                                                  if(password_verify($password,$hashedpassword))
                                                      {
                                                         $_SESSION['user_id'] = $user_data['user_id'];
                                                         header("location:adminpage.php");
                                                           die;
                                                       }
                                             }   
                                   }
                                       echo"WRONG USERNAME OR PASSWORD!";
                                }else
                                   {
                                 echo"PLEASE ENTER SOME VALID INFORMATION";
                                   }
                        }
                        ?>

            </div>
            
        </form>

    
    </div>

</body>
</html>