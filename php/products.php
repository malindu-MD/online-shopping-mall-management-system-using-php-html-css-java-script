<?php
session_start();
require "config.php";
if(isset($_SESSION['Seller_ID'])){

}
else{
    header("Location:seller_Login.php");
}?>


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
<script type="text/javascript">var popup=document.getElementById("popup");
function openpopup(){

    popup.classList.add("openpopup");
 }


function closepopup(){

    popup.classList.remove("openpopup");
    
} </script>

    <?php
    
    
     
 
   
       echo '<script type="text/javascript" src="../Js/seller-script.js"></script>';
   

  
    
     
      
    ?>
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
                     <a href="../index.php"><img src="../Images/1.png"></a>
                     <div class="case">
                         <img src="../Images/user.png" alt="">
                     </div>
                </div>
            </div>
        </div>
        <div class="producttable">

        <div class="popup" id="popup">
                <img  src="../Images/checked.png" alt="check">
                <h2>Successfully Added!!</h2>
                <p>Your Product has been successfully added.</p>
                <a href="products.php"><button type="button" onclick="closepopup()">OK</button></a>
            </div>

            <div class="productcontainer">

                <div class="table">   
                    <div class="table_header">
                        <p>Product Details</p>
                        <div> <form action=""><input required type="text" placeholder="product code" /> <button onclick="openpopup()" class="add_new">Search</button></form> </div>
                    </div>
                    <div class="table_section">
                        <table>
                            <thead>
                                 <th>Code</th>
                                 <th>Name</th>
                                 <th>Image</th>
                                 <th>Price</th>
                                 <th>Quantity</th>
                                 <th>Action</th>
                            </thead>
                            <tbody>
                            <?php
                             $sid=$_SESSION['Seller_ID'];
                            $product_query="SELECT * FROM product where seller_ID='$sid'";
                            $product_query_run=mysqli_query($con,$product_query);
                            $resultcheck=mysqli_num_rows($product_query_run);
                            if($resultcheck>0){
                              while($row=mysqli_fetch_assoc($product_query_run)){
                                $id=$row['product_id'];
                                echo "<tr><td>".$row['p_code']."</td>";
                                echo "<td>".$row['p_name']."</td>";
                                echo "<a href='product_view.php?proidview=".$id."'><td><img src='";
                                echo "../upload_images/";
                                echo  $row['p_img1']."'></td></a>";
                                echo "<td>Rs ".$row['p_price']."</td>";
                                echo "<td>".$row['p_quantity']."</td>";
                               
                                echo '<td ><div class="pro-btn"><a href="seller-productdelete.php?deleteid='.$id.'"><button  class="btn1">Delete</button></a>
                                  <a href="seller_product_update_form.php?updateid='.$id.'" ><button class="btn2">Edit</button></a></div></td></tr>';

    

                              }

                            }
                            else{
                                echo "<tr><td colspan='6'>No<td>no products available</tr>";
                            }

                            
                            mysqli_close($con);
                            
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