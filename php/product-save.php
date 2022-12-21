<?php
session_start();
require "config.php";
if(isset($_SESSION['Seller_ID'])){

}
else{
    header("Location:seller_Login.php");
}

if(isset($_POST['add_product'])){
    $product_code=$_POST['productcode'];
    $product_name=$_POST['productname'];
    $product_title=$_POST['producttitel'];
    $product_category=$_POST['Category'];
    $product_price=$_POST['Price'];
    $product_quantity=$_POST['Quantity'];  
    $product_description=$_POST['Description'];
    $sid=$_SESSION['Seller_ID'];

//image upload coding

$picture1_name=$_FILES['img1']['name'];
$picture1_type=$_FILES['img1']['type'];
$picture1_tmp_name=$_FILES['img1']['tmp_name'];
$picture1_size=$_FILES['img1']['size'];

$picture2_name=$_FILES['img2']['name'];
$picture2_type=$_FILES['img2']['type'];
$picture2_tmp_name=$_FILES['img2']['tmp_name'];
$picture2_size=$_FILES['img2']['size'];

$picture3_name=$_FILES['img3']['name'];
$picture3_type=$_FILES['img3']['type'];
$picture3_tmp_name=$_FILES['img3']['tmp_name'];
$picture3_size=$_FILES['img3']['size'];

if(($picture1_type=="image/jpeg" || $picture1_type=="image/jpg" || $picture1_type=="image/png" || $picture1_type=="image/gif") && ($picture2_type=="image/jpeg" || $picture2_type=="image/jpg" || $picture2_type=="image/png" || $picture2_type=="image/gif") && ($picture3_type=="image/jpeg" || $picture3_type=="image/jpg" || $picture3_type=="image/png" || $picture3_type=="image/gif")){
    
    if($picture1_size<=50000000 && $picture2_size<=50000000 && $picture3_size<=50000000){

        $product_query="INSERT INTO product(p_code,p_name,p_price,p_description,category_id,seller_ID,p_img1,p_img2,p_img3,p_quantity,p_title) VALUES('$product_code','$product_name','$product_price','$product_description',' $product_category','$sid','$picture1_name','$picture2_name','$picture3_name','$product_quantity','$product_title')";

        $product_query_run=mysqli_query($con,$product_query);

        if($product_query_run){
            move_uploaded_file($picture1_tmp_name,"../upload_images/".$picture1_name);
            move_uploaded_file($picture2_tmp_name,"../upload_images/".$picture2_name);
            move_uploaded_file($picture3_tmp_name,"../upload_images/".$picture3_name);
        
            header("location:products.php");
           

}



    }




}
   
}




mysqli_close($con);

?>