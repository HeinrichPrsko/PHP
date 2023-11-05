

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="CSS/register.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <title>Document</title>
</head>
<body>
    <div class="wrapper">
        <form action="" method="post">
            <h1>Register</h1>
           

            <div class="input-box">
                <input name="user_name" type="text" placeholder="Username" required>
                <i class='bx bxs-user'></i>
            </div>    

            <div class="input-box">
                <input name="email" type="email" placeholder="Email" required>
                <i class='bx bxl-gmail' ></i>
            </div>


            <div class="input-box">
                <input name="Contact_number" type="tel" placeholder="ContactNumber" required>
                <i class='bx bxs-contact'></i>
            </div>

            <div class="input-box">
                <input name="address" type="text" placeholder="Address" required>
                <i class='bx bx-map' ></i>
            </div>    


            <div class="input-box">
                <input name="password" type="Password" placeholder="Password" required>
                <i class='bx bxs-lock-alt' ></i>

            </div>
            <button type="submit" class="btn" value="register">Signup</button>
            <div class="login-link">
            <p>Already have an account? <a href="login.php">Login here</a></p>
            <?php
 session_start();
 include("CONNECTION/checklogin.php");
 include("CONNECTION/config.php");
 

 if ($_SERVER['REQUEST_METHOD'] == "POST") 
    {
        //something was posted
        $contactnum = $_POST['Contact_number'];
        $address = $_POST['address'];
        $email = $_POST['email'];
        $user_name = $_POST['user_name'];
        $password = $_POST['password']; 
        $encrypted = password_hash($password, PASSWORD_DEFAULT);
        if(!empty($user_name)&& !empty($password) && !is_numeric($user_name))
        {
            //save to db
            $user_id = random_num(20);
            $query = "insert into users (user_id,user_name,email,Contact_number,address,password) values ('$user_id','$user_name','$email','$contactnum','$address','$encrypted')";
            mysqli_query($con,$query);
            header("Location:login.php");
            die;
            

        }
        else
        {
            echo"PLEASE ENTER VALID INFORMATION";
        }
    }
?>
            </div>

        </form>
    </div>
</body>
</html>