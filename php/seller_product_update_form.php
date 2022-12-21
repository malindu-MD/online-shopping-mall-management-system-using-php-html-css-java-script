<?php
session_start();
require "config.php";
if(isset($_SESSION['Seller_ID'])){

}
else{
    header("Location:seller_Login.php");
}

if(isset($_GET['updateid'])){
    $pid=$_GET['updateid'];
    $product_query="SELECT * FROM product where product_id='$pid'";
    $product_query_run=mysqli_query($con,$product_query);
    $checkrow=mysqli_num_rows($product_query_run);
    
    if($checkrow>0){
        
        $product=mysqli_fetch_assoc($product_query_run);

    }
    else{

        echo "No product Found";
    }


}
else{

    echo "Product ID missing from url";
}





?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>product update</title>
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
                     <a href="#" class="btn">Add Product</a>
                     <img src="../Images/notifications.png" alt="">
                     <div class="case">
                         <img src="../Images/user.png" alt="">
                     </div>
                </div>
            </div>
        </div>

        <div class="formback">
            <div class="popup" id="popup">
                <img  src="../Images/checked.png" alt="check">
                <h2>Successfully Added!!</h2>
                <p>Your Product has been successfully added.</p>
                <a href="../html/products.html"><button type="button" onclick="closepopup()">OK</button></a>
            </div>
            
        <div class="container1">
           <div class="container2">
           <header>Update Product Details</header>
           </div>
           <div class="container3">
           <form action="product-update.php" method="post" enctype="multipart/form-data">
               <div class="formfirst">
               
                  <div class="productdetails">
                    <div class="input-field">
                        <label for="productcode">Product Code</label>
                        <input type="text" value="<?=$product['p_code'];?>" name="productcode" title="Ex-#0000" placeholder="Enter Product Code" required>
                    </div>
                    
                          <div class="input-field">
                              <label for="productname">Product Name</label>
                              <input type="text" value="<?=$product['p_name'];?>"    name="productname" placeholder="Enter Product Name" required>
                          </div>
                          <div class="input-field">
                            <label for="producttitel">Product Title</label>
                            <input type="text"  value="<?=$product['p_title'];?>"   name="producttitel" placeholder="Enter Product Title" required>
                        </div>
                        <div class="input-field">
                            <label for="Category">Select Category</label>
                            <select name="Category" id="Category">
                             <option selected>Select Category</option>
                                <?php
                                  
                                $sql="SELECT * FROM category";
                                $r=mysqli_query($con,$sql);
                                $resultcheck=mysqli_num_rows($r);
                                if($resultcheck>0){
                                    while($row=mysqli_fetch_assoc($r)){ ?>
                                    <option value="<?=$row['category_id'];?>" <?=
                                    $product['category_id']==$row['category_id']?'selected':''?>><?=$row['category_name'];?></option>
                                 <?php      
                                    }
                                }
                                
                                $con->close();
                                
                                ?>
                            </select>
                        </div>
                        <div class="input-field2">
                            <div class="input-field23">
                                <label for="Price">Price</label>
                                <input type="number" value="<?=$product['p_price'];?>"  pattern="[0-9]{10}"  name="Price"  title="invalid input price" placeholder="Enter Price" required>
                            </div>
                            <div class="input-field23">
                                <label for="Quantity">Quantity</label>
                                <input type="number" value="<?=$product['p_quantity'];?>"  pattern="[0-9]{10}" 
                                title="invalid input number" name="Quantity" placeholder="Enter Quantity" required>
                            </div>

                        </div>
                        <div class="txtarea">
                            <label for="Product Description">Product Description</label>
                             <textarea name="Description"  id="Description" placeholder="Enter Product Description" rows="3" required> <?=$product['p_description'];?></textarea>
                        </div>
                        <div class="form">
                            <h2>Current Product Images</h2>
                            <div class="grid">
                                <div class="form-element">
                                 <input type="hidden" name="oldimage1" value="<?=$product['p_img1']?>">    
                                <input type="file" id="file-1" name="img1" accept="image/*">
                                    <label for="file-1" id="file-1-preview">
                                        <img src="../upload_images/<?=$product['p_img1']?>" alt="f">
                                        <div class="plus">
                                            <span>+</span>
                                        </div>
                                    </label>
                                </div>
                                <div class="form-element">
                                <input type="hidden" name="oldimage2" value="<?=$product['p_img2']?>">  
                                <input type="file" id="file-2" name="img2" accept="image/*">
                                    <label for="file-2" id="file-2-preview">
                                        <img src="../upload_images/<?=$product['p_img2']?>" alt="f">
                                        <div class="plus">
                                            <span >+</span>
                                        </div>
                                    </label>
                                </div>
                                <div class="form-element">
                                 <input type="hidden" name="pid" value="<?=$product['product_id']?>">   
                                <input type="hidden" name="oldimage3" value="<?=$product['p_img3']?>">  
                                <input type="file" id="file-3" name="img3" accept="image/*">
                                   <label for="file-3" id="file-3-preview">
                                        <img src="../upload_images/<?=$product['p_img3']?>" alt="f">
                                        <div class="plus">
                                            <span>+</span>
                                        </div>
                                    </label>
                                </div>
                            </div>
                        </div>
                      
                        <div class="bttn">
                        <button  type="submit" name="update_product"  >
                            Update
                        </button>
                        </div>
                    
                  </div>
               </div>
           </form></div>
        </div>
    </div>
    </div>

    <script src="../Js/seller-script.js"></script>
    
</body>
</html>