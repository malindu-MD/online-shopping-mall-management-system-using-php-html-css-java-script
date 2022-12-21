<?php
session_start();
require "config.php";
if(isset($_SESSION['Seller_ID'])){

}
else{
    header("Location: admin_login.php");
}

if(isset($_GET['deleteid'])){

    $id=$_GET['deleteid'];
    $query="SELECT * FROM product WHERE product_id='$id'";
    $query_run=mysqli_query($con,$query);
    $query_data=mysqli_fetch_array($query_run);
    $img1= $query_data['p_img1'];
    $img2= $query_data['p_img2'];
    $img3= $query_data['p_img3'];

    $delete_query="DELETE  FROM product WHERE product_id='$id'";
    $delete_query_run=mysqli_query($con, $delete_query);

    if($delete_query_run){

        if((file_exists("../upload_images/".$img1)) || (file_exists("../upload_images/".$img2)) || (file_exists("../upload_images/".$img3))){

            unlink("../upload_images/".$img1);
            unlink("../upload_images/".$img2);
            unlink("../upload_images/".$img3);
        }
        header("Location:products.php");

    }

}

mysqli_close($con);


?>