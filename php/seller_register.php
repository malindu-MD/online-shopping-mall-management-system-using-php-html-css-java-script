<?php
session_start();
require "config.php";

if(isset($_POST['submit'])){
   
	$fname=$_POST['Firstname'];
	$lname=$_POST['Lastname'];
	$email=$_POST['email'];
	$password=$_POST['pw1'];
	$contact_num=$_POST['phoneno'];
	$s_nic=$_POST['nic'];
	$s_district=$_POST['district'];
	$s_province=$_POST['province'];
	$storename=$_POST['storename'];
	$s_address=$_POST['address'];

	$query="SELECT * FROM seller where email='{$email}'";

	$showresult=mysqli_query($con,$query);
	
	 
	 if(mysqli_num_rows($showresult)==1){
       
		echo "<script>alert('This email is already registered')";

	 }
	 else{

        $reg_query="INSERT INTO seller(Fname,Lname,email,pwd,contact_num,nic,district,province,store_name,address) VALUES('$fname','$lname','$email','$password','$contact_num','$s_nic','$s_district','$s_province','$storename','$s_address')";

	$query_run=mysqli_query($con,$reg_query);

	if($query_run){
       
		header("Location: seller_register.php");
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
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>register</title>
   
   
   

   <!-- custom css file link  -->
   <link rel="stylesheet" href="../css/seller_reg_style.css">

</head>
<body>
   


<section class="form-container">

   <form action="seller_register.php" method="post" onsubmit="return checkpassword()">
      <h3>Biz Corner Seller Registration</h3>
      <input type="text" name="Firstname"  placeholder="enter your first name" maxlength="20"  class="box" required>
      <input type="text" name="Lastname"  placeholder="enter your last name" maxlength="20"  class="box" required>
      <input type="email" name="email"  placeholder="enter your email" maxlength="50"  class="box" required >
      <input type="password" placeholder="Enter password" required id="pwd1" name="pw1" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{10,}" class="box"  title="Must contain at least one number and one uppercase and lowercase letter,and atleast 10 or more characters" >
      <input type="password" placeholder="Confirm password" class="box" required id="pwd2" name="pw2">
      <br>
					<span id="messages" style="color:red;"> </span><br>
      <input type="phone" class="box" placeholder="Enter your contact number" pattern="[0-9]{10}" title="Enter 10 digits" required name="phoneno">
      <input type="text" class="box" placeholder="Enter your NIC number" required name="nic">
      <select name="district" class="box" id="dis" name="district">
               <option selected >Select Your District</option>
					<option value="Colombo">Colombo</option>
					<option value="Gampaha">Gampaha</option>
					<option value="Kaluthara">Kaluthara</option>
					<option value="Kandy">Kandy</option>
					<option value="Matale">Matale</option>
					<option value="Nuwara Eliya">Nuwara Eliya</option>
					<option value="Galle">Galle</option>
					<option value="Matara">Matara</option>
					<option value="Hambanthota">Hambanthota</option>
					<option value="Jaffna">Jaffna</option>
					<option value="Kilinochchi">Kilinochchi</option>
					<option value="Mannar">Mannar</option>
					<option value="Vavuniya">Vavuniya</option>
					<option value="Mullaitivu">Mullaitivu</option>
					<option value="Batticaloa">Batticaloa</option>
					<option value="Ampara">Ampara</option>
					<option value="Trincomalee">Trincomalee</option>
					<option value="Kurunegala">Kurunegala</option>
					<option value="Puttalam">Puttalam</option>
					<option value=" Anuradhapura"> Anuradhapura</option>
					<option value="Polonnaruwa">Polonnaruwa</option>
					<option value="Badulla">Badulla</option>
					<option value="Moneragala">Moneragala</option>
					<option value="Ratnapura">Ratnapura</option>
					<option value="Kegalle">Kegalle</option>
					</select>
              
					<select name="province" class="box" id="prov" name="province"  >
               <option selected >Select Your Province</option>
					<option value="Western Province">Western Province</option>
					<option value="Central Province">Central Province</option>
					<option value="Southern Province">Southern Province</option>
					<option value="Uva Province">Uva Province</option>
					<option value="Sabaragamuwa Province">Sabaragamuwa Province</option>
					<option value="North Western Province">North Western Province</option>
					<option value="North Central Province">North Central Province</option>
					<option value="Nothern Province">Nothern Province</option>
					<option value="Eastern Province">Eastern Province</option>
					</select>
               <input type="text" class="box" placeholder="Enter your address" required name="address">

               <input type="text" class="box" placeholder="Enter your store name" required name="storename">
               
      <div class="sub">
      <input type="submit" value="register now" class="btn" name="submit">
      <p>already have an account?</p>
      <a href="Seller_login.php" class="option-btn">login now</a></div>
   </form>

</section>






<script >function checkpassword()
{
	var v1=document.getElementById("pwd1").value;
	var v2=document.getElementById("pwd2").value;
	
	if(v1 != v2)
	{
		document.getElementById("messages").innerHTML="*Password mismatch";
		return false;
	}
}	</script>









</body>
</html>