<?php
session_start();
require "config.php";
if(isset($_SESSION['Seller_ID'])){

}
else{
    header("Location:seller_Login.php");
}

if(isset($_POST['sub'])){

   $val=$_POST['sts'];
   $ood=$_POST['od'];

   echo $val;
   echo $ood;

   $sqll="UPDATE orderdetails SET status_id='$val' WHERE order_ID='$ood'";
   mysqli_query($con,$sqll);
   header("Location: ordertable.php");

  
   





}



?>
