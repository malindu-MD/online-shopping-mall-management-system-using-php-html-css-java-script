<?php
session_start();
require "config.php";


if(isset($_POST['submit'])){

  $email=$_POST['email'];
  $password1=$_POST['pass'];

  $query="SELECT * FROM buyer_details where email='{$email}' and password='{$password1}' LIMIT 1";

  $showresult=mysqli_query($con,$query);
  if($showresult){
   
   if(mysqli_num_rows($showresult)==1){
      
     

     $row=mysqli_fetch_assoc($showresult);
     $_SESSION['buyer_name']=$row['name'];
     $_SESSION['User_ID']=$row['user_id'];
     
     header("Location: ../index.php");
                                 
   }
   else{
   echo "<script>alert('please check your email or password')</script>";

   }

} } 
  
$con->close();




?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All Products | BIZ-CORNER</title>
    <link rel="stylesheet" href="../css/headerandfooter.css">
    <link rel="stylesheet" type="text/css" href="../css/login.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>
    <div class="container">
        <div class="navbar">
            <div class="logo">
            BIZ CORNER
            </div>
            <nav>
                <ul id="MenuItems">
                    <li><a href="../index.php">Home</a></li>
                    <li><a href="allproducts.php">Products</a></li>
                    <li><a href="">About</a></li>
                    <li><a href="">Contact</a></li>
                    <li><a href="account.html">Account</a></li>
                </ul>
            </nav>
            <a href="cart.html"><img src="../Images/cart.png" width="30px" height="30px"></a>
            <img src="images/menu.png" class="menu-icon" onclick="menutoggle()">
        </div>
    </div>

    <div class="container1">
        
    <div class="loginform">
        <img src="../images/loginavatar.jpg" alt="Login Avatar" class="loginavatar">
        <h1>Welcome to Bizcorner! Please login.</h1>
        <form action="user-login.php" method="post">
            <p>Email</p>
            <input type="text" name="email" placeholder="email">
            <p>Password</p>
            <input type="password" name="pass" placeholder="password">
            <input type="submit" name="submit" value="Login">
            <a href="./fogot_password.html"> <p class="fogotpw">Fogot Password ?</p></a> <br>
            <p class="ifyoudont">If you don't have an account</p><br>
        </form>
        <form action="">
            <input type="submit" name="" value="Register Now">
        </form>
    </div>
          

    </div>
    
    
   

    <div class="footer">
        <div class="container">
            <div class="row">
                <div class="footer-col-1">
                    <h3>Download Biz Corner  App</h3>
                    <p>Download App for Android and ios mobile phone.</p>
                    <div class="app-logo">
                        <img src="../images/app-store.png">
                        <img src="../images/play-store.png">
                    </div>
                </div>
                <div class="footer-col-2">
                    <img src="../images/logo1.png">
                    <p>Online Shopping Mall In Sri Lanka with Free Home Delivery.
                    </p>
                </div>
                <div class="footer-col-3">
                    <h3>Useful Links</h3>
                    <ul>
                        <li>Coupons</li>
                        <li>Blog Post</li>
                        <li>Return Policy</li>
                        <li>Join Affiliate</li>
                    </ul>
                </div>
                <div class="footer-col-4">
                    <h3>Follow Us</h3>
                    <ul>
                        <li>Facebook</li>
                        <li>Twitter</li>
                        <li>Instagram</li>
                        <li>Youtube</li>
                    </ul>
                </div>
            </div>
            <hr>
            <p class="copyright">Copyright 2022 - MLB_07.01_07</p>
        </div>
    </div>

    <!-- javascript -->

    <script>
        var MenuItems = document.getElementById("MenuItems");
        MenuItems.style.maxHeight = "0px";
        function menutoggle() {
            if (MenuItems.style.maxHeight == "0px") {
                MenuItems.style.maxHeight = "200px"
            }
            else {
                MenuItems.style.maxHeight = "0px"
            }
        }
    </script>

</body>

</html>