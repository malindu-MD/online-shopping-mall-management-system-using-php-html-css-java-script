<?php
session_start();
require "config.php";


if(isset($_POST['submit'])){

  $email=$_POST['email'];
  $password=$_POST['password'];

  $query="SELECT * FROM seller where email='{$email}' and pwd='{$password}' LIMIT 1";

  $showresult=mysqli_query($con,$query);
  if($showresult){
   
   if(mysqli_num_rows($showresult)==1){
      
     

     $row=mysqli_fetch_assoc($showresult);
     $_SESSION['seller_name']=$row['Fname'];
     $_SESSION['Seller_ID']=$row['seller_ID'];
     
     header("Location: seller-dashboard-sidebar.php");
                                 
   }
   else{
   echo "<script>alert('please check your email or password')</script>";

   }

} } 
  
$con->close();




?>


<!DOCTYPE html>
<html lang="en">



<html>
	<head>
		<title> Biz Corner</title>
		<link rel="stylesheet" href="../css/loginstyle.css">
		
		
	</head>
	
	<body background="../Images/regback.jpg">
	
	<div class="loginbox">
		
		<img src="../Images/login.jpg" class="avatar">
		
		<h1>Login</h1>
		<center>
		<h3>(Seller)</h3>
		</center>
		
		<form action="seller_Login.php" method="post">
			<p>Email</p>
			<input type="text"  placeholder="Enter Email" name="email">
			
			<p> Password</p>
			<input type="password" placeholder="Enter password" name="password">
			
			<input type="submit" name="submit" value="Login">
			
			<center>
			<a href="forgotpw.html" text-align="center">Forgot Password?</a><br><br>
			</form>
			<p>If you don't have an account</p><br>
			<a href="seller_register.php">
			
			<button>Sign Up Now!</button>
			
			</a>
			</center>
			
		
	
	
	</div>
	
	</body>
</html>