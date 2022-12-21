<?php require_once('config.php');
    session_start();
    $session=$_SESSION['user_ID']=1;
    $sfee=0;
    $total=0;
    $fulltotal=0;
    $setquery="select * from total where user_id=$session";
    $rsetquery=mysqli_query($con,$setquery);
    while($transferdata=mysqli_fetch_assoc($rsetquery)){
        $idarray[]=$transferdata['product_id'];
   
    }



?>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
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
       
            
    }
    .header{
        grid-column: 1/1;
    }
    .grid-container{
        width : 88%;
        box-sizing: border-box;
        display: grid;
        grid-template-columns: 20% 20%;20% 30%;
        grid-template-rows: 20px 90px 90px 90px 90px 90px 90px 90px 90px 90px 90px  ;
        margin: auto auto auto auto;
    gap: 10px;


    }
    .grid-container div{
        
        box-sizing: border-box;
        border: 1px solid black;
        
    }
    .grid-row{
        grid-column:1/5;
    }
    .grid-item-details{
        grid-column: 1/4;

        
    }
    .right-grid{
        grid-column: 4/5;
        grid-row:2/span 3;
      
    }
    .order-grid{
        grid-column:4/5;
        grid-row:5/7;
    }
    img{
        width:60px;
        height:60px;
    }
    td{ vertical-align: top;
    padding-top: 5px;
    padding-right: 5px;
    padding-left:5px;
}
td.pad{
  padding-right:20px;  
}
input.nlarge{
    width: 50px;
    height:30px;
}
d{
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
    width:180px;
    font-size:10px:
   
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
    .toppad{
        padding-top:30px;
    }
    </style>
</head><div class="grid-header-footer"> <div class ="header" ></div></div>
<body>
    <?php
    $userdata="select * from buyer_details where user_id=$session";
    $Ruser_data=mysqli_query($con,$userdata);
    $recordd=mysqli_fetch_array($Ruser_data);

    ?>
    <div class="grid-container">
        <div class ="grid-row">
           
        </div><?php
                
                $queary="SELECT t.totalprice, p.p_img1, p.p_price,t.quantity, p.p_name ,p.p_description FROM product p,total t WHERE p.product_id=t.product_id AND t.user_id=$session;";
                $result=mysqli_query($con,$queary);
                if($nor=mysqli_num_rows($result)>0)
               
                {
                    while($record=mysqli_fetch_array($result)){
            ?> 
        
        <div class= "grid-item-details" >
            <table width="100%" >
            <tr>
                <td width="100px">
                    <img src="\<?php echo $record['p_name']; ?>" alt="">           
                </td>
               <td  class="font-name bot toppad" >
               <?php echo $record['p_name']; ?>
               </td>
               <td width="100px" class="font-name bot toppad" >
               <span><?php echo $record['quantity']; ?></span>
               </td>
               <td width="120px" align="right" class="pad  font-name bot toppad" >
               <?php echo $record['totalprice']; ?>
                   
           </tr> 
            </table>
        </div>
        <?php
          }
        }
        ?>
        <div class = "right-grid" ><table>
            <tr>
                <td>
                <?php echo $recordd['username'];?>
                </td>
            </tr>
        </table>
        
        </div>
        <div class ="order-grid">
            <form action="place_order.php" method="post">
                <table width="100%">
                    <tr>
                        <td class="font-name">
                        <input type="radio" name="cash" id="cash">Card Payment<br><BR>
                        <input type="radio" name="cash" id="del">Cash on Delivery
                
                        </td><tr>
                        <td align="center">
                        <input type="submit" class="btn" value="Place Order" name="porder">
                        </td>
                        </tr>
                        
                    </tr>
                </table>
                
            </form>

        </div>

    </div>
    
</body>
</html>