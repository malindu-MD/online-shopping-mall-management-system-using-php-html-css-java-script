<?php
session_start();
require "config.php";
if(isset($_SESSION['Seller_ID'])){

}
else{
    header("Location:seller_Login.php");
}
$sid=$_SESSION['Seller_ID'];


    $product_query="SELECT * FROM seller where seller_ID='$sid'";
    $product_query_run=mysqli_query($con,$product_query);
    $checkrow=mysqli_num_rows($product_query_run);
    
    if($checkrow>0){
        
        $seller_details=mysqli_fetch_assoc($product_query_run);

    }
    else{

        echo "No product Found";
    }







?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Seller Profile</title>
    <link rel="stylesheet" href="../css/seller-style.css">
	<link rel="stylesheet" href="../css/seller-profile.css">
</head>
<body>
   
    <div class="side-menu">
        <div class="brand-name">
            <h1>Biz-Corner</h1>
        </div>
        <ul>
            <a href="seller-dashboard-sidebar.php"><li> <img src="../Images/dashboard (2).png" alt="fd">&nbsp;&nbsp;Dashboard</li></a>
            <a href="ordertable.php"><li> <img src="../Images/purchase-order-32.png" alt="fd">&nbsp;&nbsp;Orders</li></a>
            <a href="product-adding.php"><li> <img src="../Images/add-32.png" alt="fd">&nbsp;&nbsp;Add Products</li></a>
            <a href="products.php"><li> <img src="../Images/product-32.png" alt="fd">&nbsp;&nbsp;Products</li></a>
            <a href="#"><li> <img src="../Images/message-2-32.png" alt="fd">&nbsp;&nbsp;Message</li></a>
            <a href="seller_profile_update.php"><li> <img src="../Images/settings.png" alt="fd">&nbsp;&nbsp;Profile Settings</li></a>
            <a href="#"><li> <img src="../Images/help-web-button.png" alt="fd">&nbsp;&nbsp;Help</li></a>
            <a href="seller_logout.php"><li ><img src="../Images/account-logout-32.png" alt="fd">&nbsp;&nbsp;Log Out</li></a>
        </ul>

    </div>
    <div class="container">
        <div class="header">
            <div class="nav">
                <div class="search">
                    <input type="text" placeholder="Search...">
                    <button type="submit"><img src="../Images/search.png" alt=""></button>
                </div>
                <div class="user">
                     <a href="./product-adding.html" class="btn">Add Product</a>
                     <img src="../Images/notifications.png" alt="">
                     <div class="case">
                         <img src="../Images/user.png" alt="">
                     </div>
                </div>
            </div>
        </div>
		
		<center>
		<div class="main">
		<div class="row">
				<div class="column">
					<div class="card-box">
				    <form action="profile_update_proces.php" method="post">      		
					<span class="details">First Name:</span>
					<input type="text" id="fname" value="<?=$seller_details['Fname'];?>" disabled  name="fname" >
					<br>
					</div>
				
					<div class="card-box">
					<span class="details">Last Name:</span>
					<input type="text" id="lname" value="<?=$seller_details['Lname'];?>" disabled  name="lname">
					<br>
					</div>
					
				
					<div class="card-box">
					
					<span class="details"> District:</span>
					<input name="district" value="<?=$seller_details['district'];?>" disabled  id="dis" >
					</input>
					<br>
					</div>
				
					<div class="card-box">
					<span class="details"> Province:</span>
					<input name="province"   value="<?=$seller_details['province'];?>"  disabled id="prov"  >
					</input>
					
					<br>
					</div>
				
					<div class="card-box">
					<span class="details"> NIC number:</span>
					<input type="text" id="nic" value="<?=$seller_details['nic'];?>" disabled  name="nic">
					<br>
					</div>

					<div class="card-box">
					<span class="details"> Password:</span>
					<input type="password" disabled  value="<?=$seller_details['pwd'];?>" id="pwd" name="pwd">
					<br>
					</div>
				
					
				
				</div>
				<div class="column">
				
					
				
					<div class="card-box">
					<span class="details"> Store Name:</span>
					<input type="text"disabled id="store" value="<?=$seller_details['store_name'];?>"  name="storename">
					<br>
					</div>
				
					<div class="card-box">
					<span class="details"> Contact number:</span>
					<input type="phone" id="pnumber" value="<?=$seller_details['contact_num'];?>" disabled  title="Enter 10 digits" name="phoneno">
					</div>
					
					<div class="card-box">
					<span class="details"> Email:</span>
					<input type="email" name="email" id="emmail" value="<?=$seller_details['email'];?>" disabled>
					<br>
					</div>
					
				
					<br><a href="#" onclick="disfun()" class="btn1">Edit Details</a>
                   
				    <input type="submit" name="submit" style="font-size:20px;" class="btn1" value="Update">
					
				 
					</form>
				   
					
				</div>
				
				
			
			
		</div>
    
   </div>
   
   </center>
    </div>


	<script>

		function disfun(){

			document.getElementById("fname").disabled = false;
			document.getElementById("lname").disabled = false;
			document.getElementById("dis").disabled = false;
			document.getElementById("prov").disabled = false;
			document.getElementById("nic").disabled = false;
			document.getElementById("pwd").disabled = false;
			document.getElementById("store").disabled = false;
			document.getElementById("pnumber").disabled = false;
			document.getElementById("emmail").disabled = false;



		}



	</script>
	
	
	
	
    
    
    
</body>
</html>