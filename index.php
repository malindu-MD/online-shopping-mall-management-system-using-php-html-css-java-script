
<?php
session_start();

require "./php/config.php";

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BIZ-CORNER |Shopping Mall</title>
    <link rel="stylesheet" href="./css/user-style-1.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>
    
    <div class="header">
        <div class="container">
            <div class="navbar">
                <div class="logo">
                   BIZ CORNER
                </div>
                <nav>
                    <ul id="MenuItems">
                        <li> <div class="search">
                            <form action="./php/search.php" method="post">
                            <input type="text" name="psearch" required >
                            <button type="submit"><img src="./images/search.png" alt=""></button></form>
                        </div></li>
                        <li><a href="index.html">Home</a></li>
                        <li><a href="./html/sellonbizcorner.html">Sell on Corner</a></li>
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

                echo '<center><a href="./php/category.php?cateid='.$catid.'">'.$row['category_name'].'</a></center>';



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
                             echo '<a href="php/ordertableuser.php">My Orders</a>';
                             echo '<a href="#">My Profile</a>';
                             echo '<a href="php/user_logout.php">Log Out</a>';
                             
                            echo '</div>';
                            echo '</div></li>';

                        }
                        else{

                         echo '<li><a href="php/user-login.php">Login/Signup</a></li>';
                        }
                        
                        ?>
                        
                    </ul>
                </nav>
                <a style="margin-top:5px ;" href="cart.html"><img src="images/cart.png" width="30px" height="30px"></a>
                <img src="images/menu.png" class="menu-icon" onclick="menutoggle()">
            </div>
            <div class="row">
                <div class="col-2">
                    <h1>If shopping doesn't make you happy, <br>  then you're in the wrong shop!</h1>
                    <p>Success isn't always about greatness. It;s about consistency. Consistent <br> hard work gains
                        success. Greatness will come.</p>
                    <a href="./php/allproducts.php" class="btn">Buy Now &#8594;</a>
                </div>
                <div class="col-2">
                    <img src="images/9-2-shopping-download-png.png">
                </div>
            </div>
        </div>
    </div>

    

   
    <!-- Trending  Products -->

    <div class="small-container">
        <h2 class="title">Trending Product</h2>
        <div class="row">
        <?php
            
            $product_query2="SELECT * FROM product where p_code LIKE '%TR%'";
            $product_query_run2=mysqli_query($con,$product_query2);
            $resultcheck2=mysqli_num_rows($product_query_run2);
            if($resultcheck2>0){

                while($row2=mysqli_fetch_assoc($product_query_run2)){
                  $id2=$row2['product_id'];
                  echo  '<div class="col-4">';
                  echo  '<a href="php/product_view.php?proidview='.$id2.'"><img src="./upload_images/'.$row2['p_img1'].'"></a>';
                  echo  '<h4>'.$row2['p_name'].'</h4>';
                  echo  '<div class="rating">';
                  echo  '<i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star-o"></i>';
                   echo '</div><p>Rs '.$row2['p_price'].'</p></div>';
                    

                }
            
               
            }

            else{
                   echo '<center>NO Product Available</center>';
            }

            
            
            
            ?>


            
        </div>
        <h2 class="title">Latest Products</h2>
        <div class="row">
        <?php
            
            $product_query3="SELECT * FROM product where p_code LIKE '%LA%'";
            $product_query_run3=mysqli_query($con,$product_query3);
            $resultcheck3=mysqli_num_rows($product_query_run3);
            if($resultcheck3>0){

                while($row3=mysqli_fetch_assoc($product_query_run3)){
                  $id3=$row3['product_id'];
                  echo  '<div class="col-4">';
                  echo  '<a href="php/product_view.php?proidview='.$id3.'"><img src="./upload_images/'.$row3['p_img1'].'"></a>';
                  echo  '<h4>'.$row3['p_name'].'</h4>';
                  echo  '<div class="rating">';
                  echo  '<i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star-o"></i>';
                   echo '</div><p>Rs '.$row3['p_price'].'</p></div>';
                    

                }
            
               
            }

            else{
                   echo '<center>NO Product Available</center>';
            }
            
            
            ?>


        
            
        </div>
    </div>

    <!-- Offer -->
    <div class="offer">
        <div class="small-container">
            <div class="row">
                <?php
                 $product_query4="SELECT * FROM product where p_code='SP0001'";
                 $product_query_run4=mysqli_query($con,$product_query4);
                 $resultcheck4=mysqli_num_rows($product_query_run4);
                 if($resultcheck4>0){

                 $row4=mysqli_fetch_assoc($product_query_run4);
                 $id4=$row4['product_id'];
                    echo '<div class="col-2">';
                    echo '<img src="upload_images/'.$row4['p_img1'].'" class="offer-img">';
                    echo '</div>';
                    echo '<div class="col-2">';
                    echo '<p>Exclusively Available on Biz Corner</p>';
                    echo '<h1>'.$row4['p_name'].'</h1>';
                    echo '<small>'.$row4['p_title'].'.<br></small>';
                    echo '<a href="php/product_view.php?proidview='.$id4.'" class="btn">Buy Now </a></div>';
                 }
                 else{

                    echo '<center>NO Product Available</center>';

                 }
                
                
                ?>
            </div>
        </div>
    </div>

    <!-- Testimonial -->
    <div class="testimonial">
        <div class="small-container">
            <div class="row">
                <div class="col-3">
                    <i class="fa fa-quote-left"></i>
                    <p>Lorem ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been
                        industry's standard dummy text.</p>
                    <div class="rating">
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                    </div>
                    <img src="images/user-1.png">
                    <h3>Bavantha Sena</h3>
                </div>
                <div class="col-3">
                    <i class="fa fa-quote-left"></i>
                    <p>Lorem ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been
                        industry's standard dummy text.</p>
                    <div class="rating">
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                    </div>
                    <img src="images/user-2.png">
                    <h3>Malindu Dilshan</h3>
                </div>
                <div class="col-3">
                    <i class="fa fa-quote-left"></i>
                    <p>Lorem ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been
                        industry's standard dummy text.</p>
                    <div class="rating">
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                    </div>
                    <img src="images/user-3.png">
                    <h3>AJ</h3>
                </div>
            </div>
        </div>
    </div>

    <!-- payment method -->

    <div class="brands">
        <div class="small-container">
            <div class="row">
                <div class="col-5">
                    <img src="./images/visa-card-logo-9.png">
                </div>
                <div class="col-5">
                    <img src="images/1200px-MasterCard_Logo.svg.png">
                </div>
                <div class="col-5">
                    <img src="images/Payoneer_logo.svg.png">
                </div>
                <div class="col-5">
                    <img src="images/logo-paypal.png">
                </div>
                <div class="col-5">
                    <img src="images/skrill-logo-154A20684B-seeklogo.com.png">
                </div>
            </div>
        </div>
    </div>

  
    <div class="footer">
        <div class="container">
            <div class="row">
                <div class="footer-col-1">
                    <h3>Download Biz Corner  App</h3>
                    <p>Download App for Android and ios mobile phone.</p>
                    <div class="app-logo">
                        <img src="images/app-store.png">
                        <img src="images/play-store.png">
                    </div>
                </div>
                <div class="footer-col-2">
                    <img src="./images/logo1.png">
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