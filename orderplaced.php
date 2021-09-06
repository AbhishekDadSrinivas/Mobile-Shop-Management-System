<?php
require "verify.php"; ?>
<!DOCTTYPE html>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="pstyle.css">
    <title></title>
</head>
<body style="background-color: yellow">
    <center><img src="images/frontlogo.png" height="150px"></center><br>
    <div class="pad4">
    <?php
    $quantity=$_SESSION["quantity"];
$typeofdel=$_SESSION["typeofdel"];
$conn = new mysqli('localhost','root','','mobile_shop');
$ses=$_SESSION["naam"];
$sesp=$_SESSION["phone"];
$customer_no;
$product_no;
$price;
$stock;
$newstock;
$cname=$_POST["cname"];
$cno=$_POST["cno"];
$cedate=$_POST["cedate"];
        $sql1 = "SELECT * FROM product WHERE model_no='$sesp';";
    $result1 = mysqli_query($conn, $sql1);
    $resultcheck1 = mysqli_num_rows($result1);


$sql2="SELECT * FROM customer WHERE emailid='$ses';";
$result2 = mysqli_query($conn, $sql2);
$resultcheck2 = mysqli_num_rows($result2);
        
        if($resultcheck2>0){
        while($row2= mysqli_fetch_assoc($result2)){
            $customer_no=$row2['cno'];
        }
    }
    if($resultcheck1 > 0){
     while($row1 = mysqli_fetch_assoc($result1)){
         $product_no=$row1['product_no'];
         $price=$row1['price'] * $quantity;
         $stock=$row1['stock'];
         
       }
    }
    $startdate=strtotime("today");
    $enddate=strtotime("+2 days", $startdate);
     $date_format=date("Y/m/d", $startdate);
     $sql4= "INSERT INTO orders(typeofdel, quantity, tot_price, dateof_order, card_name, card_no, expiry_date, product_no, cno) VALUES('$typeofdel', '$quantity', '$price', '$date_format', '$cname', '$cno', '$cedate', '$product_no', '$customer_no')";
        
     $sql6= "INSERT INTO orders(typeofdel, quantity,  tot_price, dateof_order, product_no, cno) VALUES('$typeofdel', '$quantity', '$price', '$date_format', '$product_no', '$customer_no')";
        
      if($typeofdel=="cod"){
          if($quantity<=$stock){
          $newstock=$stock-$quantity;
          $sql5="UPDATE product SET stock='$newstock' WHERE product.model_no='$sesp';";
          $conn->query($sql5);
          $conn->query($sql6);
          echo"Thank You"."<br>";
        echo "<br>";
        echo"Your order has been submited on: ";
        echo date("d-m-Y", $startdate);
        echo" the product will be reached on or before  ";
        echo date("d-m-Y", $enddate);
      }
          else{
              echo "REQUIRED QUANTITY IS NOT AVAILABLE";
          }
      }
        else{
            if($quantity<=$stock){
          $newstock=$stock-$quantity;
          $sql5="UPDATE product SET stock='$newstock' WHERE product.model_no='$sesp';";
          $conn->query($sql5);
          $conn->query($sql4);
          echo"Thank You"."<br>";
        echo "<br>";
        echo"Your order has been submited on: ";
        echo date("d-m-Y", $startdate);
        echo" the product will be reached on or before  ";
        echo date("d-m-Y", $enddate);
      }
          else{
              echo "REQUIRED QUANTITY IS NOT AVAILABLE";
          }
        }
        
        
    ?>
    <br>
    <br>
    <p>For Order satus check your orders</p>
    <a href="smapho.html">Click here</a>
        <br>
    <center><p>NOTE: STRICTLY DO NOT REFRESH THIS PAGE ONCE YOU HAVE PLACED ORDER</p></center>
    </div>
    
    </body>
</html>
