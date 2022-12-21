<?php
session_start();
require "config.php";

if(isset($_POST['submit'])){
   
	$name=$_POST['name'];
	$email=$_POST['email1'];
	$password=$_POST['pwd'];
	$contact_num=$_POST['mobile'];
    $c_address=$_POST['address'];
    $zip_code=$_POST['zip'];
	

	


	$query="SELECT * FROM buyer_details where email='{$email}'";

	$showresult=mysqli_query($con,$query);
	
	 
	 if(mysqli_num_rows($showresult)==1){
       
		echo "<script>alert('This email is already registered')";

	 }
	 else{

        $reg_query="INSERT INTO buyer_details(name,email,password,address,zip_code,mobile_num) VALUES('$name','$email','$password','$c_address','$zip_code','$contact_num')";

	$query_run=mysqli_query($con,$reg_query);

	if($query_run){
       
	
		echo "<script>alert('you have successfully registered')";

	}
	else{
		echo "<script>alert('please check your details')</script>";
	 
		}

	 }

	
    

  
  
}
$con->close();




?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All Products | BIZ-CORNER</title>
    <link rel="stylesheet" href="../css/headerandfooter.css">
    <link rel="stylesheet" type="text/css" href="../css/user_login.css">
    <link rel="stylesheet" type="text/css" href="../css/register.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap"
        rel="stylesheet">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>
    <div class="container">
        <div class="navbar">
            <div class="logo">
                
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
      
    <div class="register-form">                  
        <div class="detailbox-left">
                <h1 class="heading-left">Create your Bizcorner Account</h1><br>
                <form action="user-register.php" method="post">
                    <p>
                        Name : 
                        <input type="text" name="name" placeholder="Enter your name" required>
                    </p>
                    <p>
                        Email : 
                        <input type="text" name="email1" placeholder="Enter your email" required>
                    </p>
                    <p>
                        Password : 
                        <input type="password" name="pwd" placeholder="password" required>
                    </p>
                    <p>
                        Confirm Password : 
                        <input type="password" name="pwd1" placeholder=" Confirm Password" required>
                    </p>
                    <p>
                        Address : 
                        <input type="text" name="address" placeholder="No 123/4, ABC Road, XYZ" required>
                    </p>
                    <p>
                        Zip Code : 
                        <input type="text" name="zip" placeholder="Zip/Postal code " required>
                    </p>
                    <p>
                        Mobile Number : 
                        <input type="tel" name="mobile" placeholder="+94123456789" required>
                    </p>
                    
                    <br>
                    <input type="submit" name="submit" value="Sign Up" >
        
                </form>
                
        </div>
       
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