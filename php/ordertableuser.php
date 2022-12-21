<?php
session_start();
require "config.php";
if(isset($_SESSION['User_ID'])){

}
else{
    header("Location:user-login.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/sample.css" type="text/css">
    <link rel="stylesheet" href="../css/sample1.css" type="text/css">

    <title>sample</title>
</head>
<body>
    <!-- creating a side menu. left class -->
    <div class="wrapper">
        <div class="sidebar">
            <h2>Menu</h2>
            <ul>
                <li><a href="#">My Account</a></li>
                <li><a href="#">Orders</a></li>
                <li><a href="#">Ready to Ship</a></li>
                <li><a href="#">Shipped Orders</a></li>
                <li><a href="#">Returned Orders</a></li>
                <li><a href="#">Vouchers</a></li>
                <li><a href="#">Help center</a></li>
                <li><a href="#">Invite a Friend</a></li>
            </ul>
        </div>
        <div class="getApp"> <hr><br>
            <p>BizCorner Mobile App</p>
            <p class="smallDetail">Search Anywhere, Anytime!</p>
            <div class="qrCode">
                <img src="./QR.png" alt="QR Code">
            </div>
        </div>
    </div>

    <!-- Adding user image and user name details. right class -->
    <div class="user-details">
        <div class="detail-box">
            <div class="detail-items">
                <div class="my-image">
                    <img src="./AJ.jpg" alt="">
                    <a href="#">change image</a><br>
                    <a href="#">change password</a><br><br><hr>
                </div><br>
                <div class="my-details">
                    <p>Username : Anjana Prabhath </p> <br><hr><br>
                    <p> Address : No 123/4,ABC road, XYX</p> <br><hr><br>
                    <p>Postal Code : 00500</p> <br><hr><br>
                    <p> Tel : +94 75 755 9622</p> <br><hr><br>
                    <a href="#">Edit details</a>
                </div>
                
            </div>
        </div>
    </div>
    <!-- adding middle details -->
    <div class="middle-details">
        <div class="producttable">

            <div class="productcontainer">

                <div class="table">   
                    <div class="table_header">
                        <p>Order Details</p>
                        <div> <input type="text" placeholder="order ID" /> <button  class="add_new">Search</button> </div>
                    </div>
                    <div class="table_section">
                        <table>
                            <thead>
                                 <th>Order Date</th>
                                 <th>Order ID</th>
                                 <th>Product Name</th>
                                 <th>Store Name</th>
                                 <th>Order Amount</th>
                                <th>Status</th>
                            </thead>


                            <tbody>
                               <?php
							    
                                $uid=$_SESSION['User_ID'];
                                $sql="SELECT * FROM orderdetails o,product p,seller s,buyer_details b,orderstatus os where p.product_id=o.product_id AND s.seller_ID=p.seller_ID AND o.user_id=b.user_id AND os.sts_id=o.status_id AND o.user_id='$uid'";

                                $showresult=mysqli_query($con,$sql);

                                while($row=mysqli_fetch_assoc($showresult)){

                                    echo "<tr style{color:black}>";
                                    echo "<td>".$row['order_date']."</td>";
                                    echo "<td>".$row['order_ID']."</td>";
                                    echo "<td>".$row['p_name']."</td>";
                                    echo "<td>".$row['store_name']."</td>";
                                    echo "<td>Rs ".$row['order_amount']."</td>";
                                    echo "<td>".$row['status']."</td>";
                                    echo("</tr>");

                               }
								

							
					
							?>

                              
                            </tbody>
                        </table>
                    </div>
                    
                </div>
            </div>
            
    </div>

</body>
</html>
