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
    <title>Document</title>
    <link rel="stylesheet" href="../css/seller-style.css">
</head>
<body onload="toastac()">
    
    
   
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
        <div id="tot" class="toast" style="border-color: red;">
            <div class="tost-content">
                <a href="seller_logout.php"><img src="../Images/123log.png" style="height:40px ;" alt="mm"></a>
                <div class="message">
                    <span class="text-1">Hi,</span>
                    <span class="text-2"><?=$_SESSION['seller_name'];?></span>
                </div>
            </div>
            <img src="../Images/cross.png" class="close" onclick="closepop()" style="height:20px ;" alt="mm">
            <div class="progress" id="prog"></div>
        </div>
        <div class="header">
            <div class="nav">
                <div class="search">
                    <input type="text" placeholder="Search...">
                    <button type="submit"><img src="../Images/search.png" alt=""></button>
                </div>
                <div class="user">
                     <a href="./product-adding.php" class="btn">Add Product</a>
                     <a href="../index.php"><img src="../Images/1.png"></a>
                     <div class="case" onclick="toastac()">
                         <img src="../Images/user.png" alt="">
                         
                     </div>
                    
                </div>
               
            </div>
        </div>
         <div class="content">
             <div class="cards">
                 <a href="#"><div class="card">
                     <div class="box">
                         <?php
                          $sid=$_SESSION['Seller_ID'];
                          $product_query10="SELECT * FROM orderdetails o,product p  where p.product_id=o.product_id AND p.seller_ID='$sid'";
                          $product_query_run10=mysqli_query($con,$product_query10);
                          $resultcheck10=mysqli_num_rows($product_query_run10);
                          echo '<h1>'.$resultcheck10.'</h1><br>';
                         ?>
                         
                         <h3>All Orders</h3>
                     </div>
                     <div class="icon-c">
                         <img src="../Images/order.png" alt="">
                     </div>

                 </div></a>
                 <a href="#"><div class="card">
                    <div class="box">
                        <?php
                        
                        $product_query="SELECT * FROM product where seller_ID='$sid'";
                        $product_query_run=mysqli_query($con,$product_query);
                        $resultcheck=mysqli_num_rows($product_query_run);
                        echo "<h1>"."$resultcheck"."</h1>";
                        ?>
                        <br>
                        <h3>Total Products</h3>
                    </div>
                    <div class="icon-c">
                        <img src="../Images/box.png" alt="">
                    </div>

                </div></a>
                <a href="#"><div class="card">
                    <div class="box">
                        <?php
                        $product_query1="SELECT SUM(o.order_amount) FROM orderdetails o,product p  where p.product_id=o.product_id AND p.seller_ID='$sid'";
                        $product_query_run1=mysqli_query($con,$product_query1);
                        $row2=mysqli_fetch_assoc($product_query_run1);
                        echo '<h1>Rs.'.$row2['SUM(o.order_amount)'].'</h1><br>';
                        
                        ?>
                       
                        <h3>Total Sales</h3>
                    </div>
                    <div class="icon-c">
                        <img src="../Images/best-price.png" alt="">
                    </div>

                </div></a>
                <a href="#"><div class="card">
                    <div class="box">
                        <h1>0</h1><br>
                        <h3>New Messages</h3>
                    </div>
                    <div class="icon-c">
                        <img src="../Images/comments.png" alt="">
                    </div>

                </div></a>

             </div>
             <div class="details">

                <div class="recentOrders">
                    <div class="cardHeader">
                       <h2> Recent Orders </h2>
                       <a href="#" class="btn">View All</a> 
                    </div>
                    <table>
                        <thead>
                            <td>Product Name</td>
                            <td>Price</td>
                            <td>Payment</td>
                            <td>Status</td>
                        </thead>
                        <tbody>
                        <?php
							    
                                
                                $sql="SELECT * FROM orderdetails o,product p,buyer_details b,orderstatus os where p.product_id=o.product_id AND o.user_id=b.user_id AND os.sts_id=o.status_id AND p.seller_ID='$sid'";

                                $showresult1=mysqli_query($con,$sql);

                                while($row1=mysqli_fetch_assoc($showresult1)){
                            echo '<tr>';

                            echo  '<td>'.$row1['p_name'].'</td>';
                            echo  '<td>Rs '.$row1['order_amount'].'</td>';
                            echo  '<td>'.$row1['payment'].'</td>';
                            echo  '<td><span class="'.$row1['status'].'">'.$row1['status'].'</span></td>';
                            echo  '</tr>'; }?>
                           
                        </tbody>
                    </table>
                </div>

                <div class="customermessage">
                    <div class="cardHeader">
                        <h2>Customers Messages</h2>
                    </div>
                    <table>
                        <tr>
                            <td width="60px"><div class="imgbx"><img src="../Images/img1.jpg" alt=""></div> </td>
                            <td><h4>David <br><span>Kandy</span></h4></td>
                        </tr>
                        <tr>
                            <td width="60px"><div class="imgbx"><img src="../Images/img1.jpg" alt=""></div> </td>
                            <td><h4>David <br><span>Kandy</span></h4></td>
                        </tr>
                        <tr>
                            <td width="60px"><div class="imgbx"><img src="../Images/img1.jpg" alt=""></div> </td>
                            <td><h4>David <br><span>Kandy</span></h4></td>
                        </tr>
                        <tr>
                            <td width="60px"><div class="imgbx"><img src="../Images/img1.jpg" alt=""></div> </td>
                            <td><h4>David <br><span>Kandy</span></h4></td>
                        </tr>
                        <tr>
                            <td width="60px"><div class="imgbx"><img src="../Images/img1.jpg" alt=""></div> </td>
                            <td><h4>David <br><span>Kandy</span></h4></td>
                        </tr>
                        <tr>
                            <td width="60px"><div class="imgbx"><img src="../Images/img1.jpg" alt=""></div> </td>
                            <td><h4>David <br><span>Kandy</span></h4></td>
                        </tr>
                        <tr>
                            <td width="60px"><div class="imgbx"><img src="../Images/img1.jpg" alt=""></div> </td>
                            <td><h4>David <br><span>Kandy</span></h4></td>
                        </tr>
                       
                    </table>
                </div>



             </div>
         </div>
    </div>
    
   
    
    <script src="../Js/seller-script.js"></script>
    
    
</body>
</html>