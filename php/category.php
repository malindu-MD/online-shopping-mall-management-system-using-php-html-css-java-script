<?php

require "config.php";

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All Products | BIZ-CORNER</title>
    <link rel="stylesheet" href="../css/user-style-1.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>
<div class="navbar">
                <div class="logo">
                   BIZ CORNER
                </div>
                <nav>
                    <ul id="MenuItems">
                        <li> <div class="search">
                            <form action="search.php" method="post">
                            <input type="text" name="psearch" required >
                            <button type="submit"><img src="../Images/search.png" alt=""></button></form>
                        </div></li>
                        <li><a href="../index.php">Home</a></li>
                        <li><a href="../html/sellonbizcorner.html">Sell on Corner</a></li>
                        <li><div class="dropdown">
                              <span class="dropbtn">Categories</span> 
                            <div class="dropdown-content">
                            <?php
                            
            $product_query="SELECT * FROM category";
            $product_query_run=mysqli_query($con,$product_query);
            $resultcheck=mysqli_num_rows($product_query_run);
            
               if($resultcheck>0){

                while($row=mysqli_fetch_assoc($product_query_run)){

      
                  $catid=$row['category_id'];

                echo '<center><a href="category.php?cateid='.$catid.'">'.$row['category_name'].'</a></center>';



                }
                 

               }
               else{
                   
                echo '<a href="#">no category</a>';
                 
               }

                            
                            ?>    
                            
                            
                           
                            </div>
                          </div></li>
                          
                        <li><a href="">About</a></li>
                        <li><a href="">Contact</a></li>
                        <?php
                        
                        if(isset($_SESSION['buyer_name'])){

                            echo '<li><div class="dropdown">';
                            echo '<span class="dropbtn">My Account</span>'; 
                            echo '<div class="dropdown-content">';
                             echo '<a href="#">Welcome '.$_SESSION['buyer_name'].'</a>';
                             echo '<a href="ordertableuser.php">My Orders</a>';
                             echo '<a href="#">My Profile</a>';
                             echo '<a href="user_logout.php">Log Out</a>';
                             
                            echo '</div>';
                            echo '</div></li>';

                        }
                        else{

                         echo '<li><a href="user-login.php">Login/Signup</a></li>';
                        }
                        
                        ?>
                        
                    </ul>
                </nav>
                <a style="margin-top:5px ;" href="cart.php"><img src="../Images/cart.png" width="30px" height="30px"></a>
                <img src="images/menu.png" class="menu-icon" onclick="menutoggle()">
            </div>
    <!-- All Products -->
    <?php
    
    if(isset($_GET['cateid'])){

   
         $catid=$_GET['cateid'];
         $product_query1="SELECT category_name  FROM category where category_id='$catid'";
         $product_query_run1=mysqli_query($con,$product_query1);
         $resultcheck1=mysqli_num_rows( $product_query_run1);
         $row1=mysqli_fetch_assoc($product_query_run1);
    }
    
    
    ?>

    <div class="small-container">
        <div class="row row-2">
            <h2><?=$row1['category_name'];?></h2>
            
        </div>
        <div class="row">
            <?php
            
            $product_query="SELECT * FROM product where category_id='$catid'";
            $product_query_run=mysqli_query($con,$product_query);
            $resultcheck=mysqli_num_rows($product_query_run);
            if($resultcheck>0){

                while($row=mysqli_fetch_assoc($product_query_run)){
                  $id=$row['product_id'];
                  echo  '<div class="col-4">';
                  echo  '<a href="product_view.php?proidview='.$id.'"><img src="../upload_images/'.$row['p_img1'].'"></a>';
                  echo  '<h4>'.$row['p_name'].'</h4>';
                  echo  '<div class="rating">';
                  echo  '<i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star-o"></i>';
                   echo '</div><p>Rs '.$row['p_price'].'</p></div>';
                    

                }
            
               
            }

            else{
                   echo '<center>NO Product Available</center>';
            }
            
            
            ?>
            
            
        </div>
       
        <div class="page-btn">
            <span>1</span>
            <span>2</span>
            <span>3</span>
            <span>4</span>
            <span>&#8594;</span>
        </div>
    </div>

    <!-- Footer -->
    <div class="footer">
        <div class="container">
            <div class="row">
                <div class="footer-col-1">
                    <h3>Download Biz Corner  App</h3>
                    <p>Download App for Android and ios mobile phone.</p>
                    <div class="app-logo">
                        <img src="../images/app-store.png">
                        <img src="../images/play-store.png">
                    </div>
                </div>
                <div class="footer-col-2">
                    <img src="../images/logo1.png">
                    <p>Online Shopping Mall In Sri Lanka with Free Home Delivery.
                    </p>
                </div>
                <div class="footer-col-3">
                    <h3>Useful Links</h3>
                    <ul>
                        <li>Coupons</li>
                        <li>Blog Post</li>
                        <li>Return Policy</li>
                        <li>Join Affiliate</li>
                    </ul>
                </div>
                <div class="footer-col-4">
                    <h3>Follow Us</h3>
                    <ul>
                        <li>Facebook</li>
                        <li>Twitter</li>
                        <li>Instagram</li>
                        <li>Youtube</li>
                    </ul>
                </div>
            </div>
            <hr>
            <p class="copyright">Copyright 2022 - MLB_07.01_07</p>
        </div>
    </div>

   

    <script>
        var MenuItems = document.getElementById("MenuItems");
        MenuItems.style.maxHeight = "0px";
        function menutoggle() {
            if (MenuItems.style.maxHeight == "0px") {
                MenuItems.style.maxHeight = "200px"
            }
            else {
                MenuItems.style.maxHeight = "0px"
            }
        }
    </script>

</body>

</html>