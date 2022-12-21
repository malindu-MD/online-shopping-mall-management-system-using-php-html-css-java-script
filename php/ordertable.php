
<?php
session_start();
require "config.php";
if(isset($_SESSION['Seller_ID'])){

}
else{
    header("Location:seller_Login.php");
}
?>


<!DOCTYPE html>

<html lang="en">



<head>

    <meta charset="UTF-8">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Products</title>

    <link rel="stylesheet" href="../css/seller-style.css">

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

                     <a href="./product-adding.php" class="btn">Add Product</a>

                     <img src="../Images/1.png" alt="../index.php">

                     <div class="case">

                         <img src="../Images/user.png" alt="">

                     </div>

                </div>

            </div>

        </div>

        <div class="producttable">



            <div class="productcontainer">



                <div class="table">   

                    <div class="table_header">

                        <p>Order Details</p>

                        

                    </div>

                    <div class="table_section">

                        <table>

                            <thead>
							     <th>Date</th>
								 <th >Order ID</th>

                                 <th>Buyer Name</th>

                                 <th >Address</th>

                                 <th>Conatact Number</th>

                                 <th>Status</th>
                                 
                                 <th >Action </th>

                            </thead>
							
							<tbody>
							
							<?php
							    
                                $sid=$_SESSION['Seller_ID'];
                                $sql="SELECT * FROM orderdetails o,product p,buyer_details b,orderstatus os where p.product_id=o.product_id AND o.user_id=b.user_id AND os.sts_id=o.status_id AND p.seller_ID='$sid'";

                                $showresult=mysqli_query($con,$sql);

                                while($row=mysqli_fetch_assoc($showresult)){

                                    echo "<tr>";
                                    echo "<td>".$row['order_date']."</td>";
                                    echo "<td>".$row['order_ID']."</td>";
                                    echo "<td>".$row['name']."</td>";
                                    echo "<td>".$row['address']."</td>";
                                    echo "<td>".$row['mobile_num']."</td>";
                                    echo "<td><span class='".$row['status']."'>".$row['status']."</span></td>";
                                    echo "<td><a href='orderDetailss.php?orderid=".$row['order_ID']."'><button  class='add_new'>View Order</button></a></td>";
                                    echo("</tr>");

                               }
								

							
					
							?>

								
							 </tbody>

                           

                        </table>

                    </div>

                    

                </div>

            </div>



        </div>

    </div>

    

</body>

</html>
