<?php

require "config.php";

if(isset($_GET['proidview'])){

   $product_id=$_GET['proidview'];
   $view_queary="SELECT * FROM product where product_id='$product_id'";
   $showresult=mysqli_query($con,$view_queary);
   if(mysqli_num_rows($showresult)>0){
     
    $productrow=mysqli_fetch_assoc($showresult);

  
 }
   
     




}

?>

<html>
    <head>
         <meta charset="utf-8">
        <meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1,minimum-scale=1,user-scalable=no,viewport-fit=cover">
        <link rel="stylesheet" href="../css/user-style-1.css">
        <style>
            body{
                background-color: rgba(247, 247, 247, 0.938);
            }
            .grid-header-footer{
                width: 100%;
                height: 10%;
                grid-template-columns: auto;
                grid-template-rows: auto;
                display: grid;
                margin-bottom: 10px;
            }
            .grid-header-footer div{
                background-color: black;
                
            }
            .grid-container{
                width: 80%;
                
                gap: 10px; 
                display: grid;
                grid-template-columns: 250px 300px 150px 130px 130px 200px ;
                grid-template-rows:  auto auto auto auto auto auto ;
                
                
                box-sizing: border-box;
                margin: 0 auto 0 auto;
            }
            .grid-container div{
                padding: 10px;
                background-color: white;
                
               
                
               
            }
            .header{
                grid-column: 1/1;
                
            }
            .footer{
                grid-column: 1/1; 
            }
            .item-image{
                text-align: center;
                grid-column: 1/3;
                grid-row: 1/span 2;
            }
            .item-title{
                grid-column: 3/6;
                grid-row: 1/1;
                
            }
            .item-price{
                grid-column: 3/6;
                grid-row: 2/2;
            }
            .button-set{
                grid-column: 3/6;
                grid-row: 3/3;
            }
            .click-images{
                grid-column: 1/3;
                grid-row:3/3 ;
                
            }
            .description{
                grid-column: 1/4;
                grid-row: 4/4;
            }
            .seller-des{
                grid-row: 4/4;
                grid-column: 4/7;

            }
            .review{
                grid-column: 1/7;
                grid-row: 5/5;
            }
            .reccommend{
                grid-column: 1/7;
                grid-row:6/6;
            }
            .store-pr-images{
                grid-column: 6/7;
                grid-row: 1/span 3;
            }
            img{
                width: 500px;
                height: 400px;
                margin: auto auto auto auto;
            }
            .img-click{
                width: 100px;
                height: 100px;
                transition: 0.3s;
                border:3px solid white;

            }
            .img-click:hover{
                
                border: 3px solid rgb(249, 13, 13);
            }
            .item-font{
                
                font-family: sans-serif;
                font-size: 20px;
            }
            .price-font{
                font-family: sans-serif;
                font-size: 40px;
                color: rgba(255, 42, 0, 0.871);
            }
            .bquantity{
                background-color: #555555;
                
                color: white;
                
                text-align: center;
                text-decoration: none;
                display: inline-block;
                font-size: 25px;
                margin: 4px 2px;
                cursor: pointer;
                border: none;
                width: 35px;
                height: 35px;
            }.bquantity:hover{
                  opacity: 0.7;
            }
            .prbutton {
                background-color:#fb2525; /* Green */
                border: none;
                color: white;
                
                text-align: center;
                text-decoration: none;
                display: inline-block;
                font-size: 15px;
                cursor: pointer;
                height: 40px;
                width: 160px;
                font-family: sans-serif;
                font-weight: bold;
                margin-right: 30px;
                border-radius: 5px;
                margin-top: 10px;
                margin-bottom: 10px;
                display: inline-block;
            }
            .prbutton:hover {
                background-color: #b32525e5;
            }
            table {
            border-spacing: 10px;
            }
            td {
            
            
            padding-right: 20px;
            }
            div.gallery {
            margin-left: 30px;
            border: 1px solid #ccc;
            float: left;
            width: 180px;
            }

            div.gallery:hover {
                border: 3px solid rgb(249, 13, 13);
            }

            div.gallery img {
            width: 100%;
            height: auto;
            }

            div.desc {
            padding: 15px;
            text-align: center;
            }       



            div.gallerystore {
            
            border: 1px solid #ccc;
            height: 150px;
            width: 150px;
            margin-bottom: 5px;
            }

            div.gallerystore:hover {
            border: 3px solid rgb(249, 13, 13);
            }

            div.gallerystore img {
            width: 100%;
            height: auto;
            }

            div.descstore {
            
            text-align: center;
            margin-bottom: 5px;
            }


        </style>
    </head>
    <body>
        <div class="grid-header-footer">
            <div class="header"></div>
        </div>
        <div class="grid-container">
      
            <div class="item-image">
                <img id="container-image" src="../upload_images/<?=$productrow['p_img1'];?>">
            </div>
            <div class="item-title item-font"><?=$productrow['p_title'];?></div>
            
            <div class="store-pr-images">
                <div class="gallerystore">
                    <a target="_blank" href="img_5terre.jpg">
                      <img src="F:\Website\images\yest.webp" alt="Cinque Terre" width="600" height="400">
                    </a>
                    <div class="descstore">Add a description </div>
                  </div>
                  
                  <div class="gallerystore">
                    <a target="_blank" href="img_forest.jpg">
                      <img src="F:\Website\images\yest.webp" alt="Forest" width="600" height="400">
                    </a>
                    <div class="descstore">Add a description </div>
                  </div>
                  
                  <div class="gallerystore">
                    <a target="_blank" href="img_lights.jpg">
                      <img src="F:\Website\images\yest.webp" alt="Northern Lights" width="600" height="400">
                    </a>
                    <div class="descstore">Add a description </div>
                  </div>

            </div>
            <div class="item-price price-font"><hr>
                Rs.<?=$productrow['p_price'];?><br><br> 
                <font style="color:black;font-family: sans-serif;font-size: 25px;" >Quantity</font>
                <button class="bquantity">-</button>
                <font style="color:black;font-family: sans-serif;font-size: 25px;" >12</font>
                <button class="bquantity">+</button>
                <hr>
            </div>
            <div class="click-images">
                <table align="center" >
                    <tr>
                        <td>
                            <img id="first" class="img-click" src="../upload_images/<?=$productrow['p_img1'];?>">

                        </td>
                        <td>
                            <img id="second" class="img-click" src="../upload_images/<?=$productrow['p_img2'];?>">    
                        </td>
                        <td>
                            <img id="third" class="img-click" src="../upload_images/<?=$productrow['p_img3'];?>">
                        </td>
                    </tr>
                </table>                                                
            </div>
            <script>
                var big =document.getElementById('container-image');
                var small=document.getElementById('first');
                var small1=document.getElementById('second');
                var small2=document.getElementById('third');
                small.onclick=function(){
                    big.src=this.src;
                }
                small1.onclick=function(){
                    big.src=this.src;
                }
                small2.onclick=function(){
                    big.src=this.src;
                }

            </script>
            <div class="button-set">
                <button class="prbutton">Buy Now</button>
                <button class="prbutton">Add To Cart</button>
            </div>
            <div class="description"><?=$productrow['p_description'];?></div>
            <div class="seller-des">
                <table style="color:black;font-family: sans-serif;font-size: 25px;">

                    <tr>
                        <td colspan="3"><font style="color:black;font-family: sans-serif;font-size: 15px;" >Store Name</font><br> Cheap mart textiles    </td>
                        <td ><font style="color:black;font-family: sans-serif;font-size: 15px;" >Store ratings</font><br>94%</td>
                    </tr>
                    <tr>
                      
                        
                        <td  align="center"> </td>
                        
                    </tr>
                   
                </table>
            </div>
            <div class="review">
                <img style="width: 100%;height: 200px;"src="F:\Website\images\capture.png" alt="">
            </div>
            <div class="reccommend">
                <div class="gallery">
                    <a target="_blank" href="img_5terre.jpg">
                      <img src="F:\Website\images\yest.webp" alt="Cinque Terre" width="600" height="400">
                    </a>
                    <div class="desc">Add a description of the image here</div>
                  </div>
                  
                  <div class="gallery">
                    <a target="_blank" href="img_forest.jpg">
                      <img src="F:\Website\images\yest.webp" alt="Forest" width="600" height="400">
                    </a>
                    <div class="desc">Add a description of the image here</div>
                  </div>
                  
                  <div class="gallery">
                    <a target="_blank" href="img_lights.jpg">
                      <img src="F:\Website\images\yest.webp" alt="Northern Lights" width="600" height="400">
                    </a>
                    <div class="desc">Add a description of the image here</div>
                  </div>
                  
                  <div class="gallery">
                    <a target="_blank" href="img_mountains.jpg">
                      <img src="F:\Website\images\yest.webp" alt="Mountains" width="600" height="400">
                    </a>
                    <div class="desc">Add a description of the image here</div>
                  </div>
                  <div class="gallery">
                    <a target="_blank" href="img_mountains.jpg">
                      <img src="F:\Website\images\yest.webp" alt="Mountains" width="600" height="400">
                    </a>
                    <div class="desc">Add a description of the image here</div>
                  </div>
                  
            </div>
        </div>
        ><div class="grid-header-footer">
            
        </div>
        
    </body>
</html>