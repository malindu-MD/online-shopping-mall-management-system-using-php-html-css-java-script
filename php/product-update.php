<?php
session_start();
require "config.php";
if(isset($_SESSION['Seller_ID'])){

}
else{
    header("Location:seller_Login.php");
}

if(isset($_POST['update_product'])){
    $product_code=$_POST['productcode'];
    $product_name=$_POST['productname'];
    $product_title=$_POST['producttitel'];
    $product_category=$_POST['Category'];
    $product_price=$_POST['Price'];
    $product_quantity=$_POST['Quantity'];  
    $product_description=$_POST['Description'];
    $sid=$_SESSION['Seller_ID'];
    $old_image1=$_POST['oldimage1'];
    $old_image2=$_POST['oldimage2'];
    $old_image3=$_POST['oldimage3'];
    $product_id=$_POST['pid'];

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

if($picture1_name!=""){
 
    $updateimagename1=$picture1_name;
    unlink("../upload_images/". $old_image1);
    move_uploaded_file($picture1_tmp_name,"../upload_images/".$picture1_name);

}
else{
    $updateimagename1=$old_image1;
}


if($picture2_name!=""){
 
    $updateimagename2=$picture2_name;
    unlink("../upload_images/". $old_image2);
    move_uploaded_file($picture2_tmp_name,"../upload_images/".$picture2_name);
   

}
else{
    $updateimagename2=$old_image2;

}


if($picture3_name!=""){
 
    $updateimagename3=$picture3_name;
    unlink("../upload_images/". $old_image3);
    move_uploaded_file($picture3_tmp_name,"../upload_images/".$picture3_name);

}
else{
    $updateimagename3=$old_image3;
}

$update_product_query="UPDATE product SET p_code='$product_code',p_name=' $product_name',p_price='$product_price',p_description='$product_description',category_id='$product_category',seller_ID='$sid',p_img1='$updateimagename1',p_img2='$updateimagename2',p_img3='$updateimagename3',p_quantity='$product_quantity',p_title='$product_quantity' where  product_id='$product_id'";

mysqli_query($con,$update_product_query);

header("Location:products.php");

mysqli_close($con);


}
?>