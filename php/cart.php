


<?php require_once('config.php');
    session_start();
    $session=$_SESSION['user_ID']=1;
    $sfee=0;
    $total=0;
    $fulltotal=0;
    
?>


<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1,minimum-scale=1,user-scalable=no,viewport-fit=cover">
        <title>Cart-Page</title>
    <style>
        
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
.header{
    grid-column: 1/1;
        
}
.grid-container{
    width : 88%;
    box-sizing: border-box;
    display: grid;
    grid-template-columns: 60% 10% 30%;
    grid-template-rows: 140px ;
    margin: auto auto auto auto;
gap: 10px;


}
.grid-container div{
    background-color: #f3ebebfd;
    border:1px;
    
    
}
.grid-cart{
    grid-column: 1/2;

    
}
.mid-grid{
    grid-column: 2/3;
}
.grid-details{
    grid-column: 3/4;
    grid-row: 1/span2;
    margin-right: 10px;
}
td{
    padding-left: 10px;
    padding-bottom: 5px;
    padding-top: 5px;
}
.font-name{
    font-family: sans-serif;
    font-size: 20px;
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
    }
.bquantity:hover{
    opacity: 0.7;
    }
input.larger{
    width: 25px;
    height: 25px;
    margin-right:10px;
    }
input.nlarge{
    width: 60px;
    height:35px;
}
td{ vertical-align: top;
    padding-left: 10px;
    padding-right: 10px;
    padding-top: 10px;

}
font.heading{
    font-family: sans-serif;
    font-weight: bold;
}
.add{
    width:50px;
}
.b-delete{
    margin-top: 12px;
    width:80px;
    border-radius: 12px
}

.btn{
    display: inline-block;
    background: white;
    color: black;
    padding: 8px 30px;
    margin: 30px 0;
    border-radius: 30px;
   
}
body{
    
}
td.p{
    padding-top:42px;
}
.pd{
    padding-top:12px;
    padding-left:10px;
}
.leftpd{
    padding-left:20px;
    
}
.rightpd{
    padding-right:20px;
}
.btn:hover{
        background:#e73535fd;
    }
    </style>    
        
    </head>
    <body>
       
        <div class="grid-container">
            <?php
                if(isset($_POST["add"])){
                    

                     $totalquery="select * from total where user_id=$session";
                    $totalqueryrun=mysqli_query($con,$totalquery);
                    $trow=mysqli_fetch_assoc($totalqueryrun);
                    
                    
                    
                $price=$_POST["hidden_price"];
                $quantity=$_POST['quantity'];
                $totalprice=$_POST['quantity']*$price;
                $pid=$_GET['id'];
                    
                $gettotal="select * from total where product_id=$pid  and user_id=$session";
                $RUN=mysqli_query($con,$gettotal);
                $rungettotal=mysqli_fetch_assoc($RUN);
                $norget=mysqli_num_rows($RUN);
               if($norget==0){
                $cquery="insert into total(quantity,product_id,price,totalprice,user_id) values('{$quantity}','{$pid}','{$price}','{$totalprice}','{$session}')";
                $cresult=mysqli_query($con,$cquery);
               
                $viewquery="select sum(totalprice) from total where user_id=$session";
                $runview=mysqli_query($con,$viewquery);
                $record=mysqli_fetch_assoc($runview);
                $GLOBALS['total']=$record['sum(totalprice)'];
                $GLOBALS['sfee']=225;
                $GLOBALS['fulltotal']=$total+$sfee;
               }    else {
                    echo'<script>alert("Item is included");</script>';
               }

                
                //print_r($trow);
                
                
                              
            }
            
            ?>
                
            <?php
                
                $queary="SELECT p.p_title, p.p_description,p_price, c.product_id,p.p_name,c.user_id FROM product p ,cart c WHERE  c.product_id=p.product_id AND c.user_id=$session;";
                $result=mysqli_query($con,$queary);
                if($nor=mysqli_num_rows($result)>0)
               
                {
                    while($record=mysqli_fetch_array($result)){
            ?> 
                                     
                        
        <div class="grid-cart"> 
           <form method="post" action="cart.php?action=add&id=<?php echo $record['product_id'];?>" >
                <table  width="100%">
                    
                    <tr>
                    <td height="40px" class="font-name bot" align="right"> 
                        
                        <input type="hidden" name="hidden_price" value="<?php echo $record['p_price'];?>">
                        <input type="hidden" name="hidden_id" value="<?php echo $record['product_id'];?>"> 
                        
                        <td width="110px" height="110px" >
                            <img src="C:\xampp\htdocs\website\2.png" width="115px" height="100px">
                        </td>
                        <td width="250px" class="p font-name">
                            <?php echo $record['p_title']; ?>
                        </td>
                        <td class=" p">
                            
                        <input type="number" id="quantity" name="quantity" min="1" max="1000" class="nlarge" value="1">                                                   
                        </td>
                                       
                        <td width="200px" align="center" class="p font-name" >
                        <?php echo $record['p_price']; ?>
                            
                            
                        </td>
                        <td class=>
                        <a href="cart.php?cal=<?= $record['product_id'];?>"><input type="submit" id="add" name="add" value="Add" class="btn"></a>
                        </td>
                    
                    </tr>
                </table>
            </form>
        </div>
        <div class="mid-grid pd"><a href="delete.php?id=<?= $record['product_id'];?>"> <button class="btn"> Delete</button></a> </div>
        <?php
          }
        }
        ?>
        
        <div class="grid-details">
            <h3 align="center";>
                Order Summary
            </h3>
            <br>
            <form action="checkout.php" method="post">
                <table  width="100%">
                    <tr>
                        <td class="leftpd">Subtotal</td>
                        <td align="right" colspan="2" class="rightpd"><?php echo $total ?></td> 
                    </tr>
                    <tr> 
                        <td class="leftpd">
                        <input type="hidden" name="transfer_id" value="<?php echo $record['p_price'];?>">
                         Shipping Fee
                        </td>
                        <td align="right" colspan="2" class="rightpd"> <?php echo $sfee?></td>
                    </tr>
                    <tr>
                        <td class="leftpd">Total</td>
                        <td align="right" colspan="2" class="rightpd"><?php echo $fulltotal ?></td>
                    </tr>
                    <tr><?php 
                        
                    ?>
                        <td colspan=2 align="center">
                        <input type="submit" value="Proceed To Checkout" name="submit" class="btn">
                        </td></form>
                        <td><form action="cart.php" method="post">
                            <input type="submit" value="Reset" name="reset" class="btn" >
                        </form>
                        
                        </td>
                    </tr>        
                </table>
            
           
        </div>
        <?php
            if(isset($_POST['reset'])){

                $dquery="DELETE FROM total WHERE user_id=$session ";
                $Dresult=mysqli_query($con,$dquery);
            }
        ?>

    </body>
</html>