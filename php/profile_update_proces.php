<?php
session_start();
require "config.php";
if(isset($_SESSION['Seller_ID'])){

}
else{
    header("Location:seller_Login.php");
}

$sid=$_SESSION['Seller_ID'];

if(isset($_POST['submit'])){
   
	$fname=$_POST['fname'];
	$lname=$_POST['lname'];
	$email=$_POST['email'];
	$password=$_POST['pwd'];
	$contact_numm=$_POST['phoneno'];
	$s_nic=$_POST['nic'];
	$s_district=$_POST['district'];
	$s_province=$_POST['province'];
	$storename=$_POST['storename'];
	
    
    
    
    $update_query="UPDATE seller SET Fname='$fname',Lname='$lname',email='$email',pwd='$password',contact_num='$contact_numm',nic='$s_nic',district='$s_district',province='$s_province',store_name='$storename' where seller_ID='$sid'";

	mysqli_query($con,$update_query);

    header("Location:seller_profile_update.php");

    $con->close();



}

?>

	
	
	