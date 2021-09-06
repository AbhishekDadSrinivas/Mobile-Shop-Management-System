<?php session_start(); ?>
<!DOCTTYPE html>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="pstyle.css">
    <title></title>
</head>
<body style="background-color: yellow">
    <center><img src="images/frontlogo.png" height="150px"></center><br>
    <?php
    error_reporting(0);
    $ses=$_SESSION["naam"];
    $cuno=$_SESSION["customer_no"];
    $conn = new mysqli('localhost','root','','mobile_shop');
    $sql = "SELECT * FROM orders where status='NOT DELIVERED' OR payment='NOT PAID' ;";
    $result = mysqli_query($conn, $sql);
    $resultcheck = mysqli_num_rows($result);
    if($resultcheck > 0){
        echo "<table><tr><th>Order No.</th><th>Type of delivery</th><th>Total Price</th><th>Quantity</th><th>Status</th><th>Payment</th><th>Date_of_Order</th><th>Product_no.</th><th>Customer_no.</th></tr>";
    while($row = mysqli_fetch_assoc($result)){
       echo "<tr><td>".$row["orderno"]."</td><td>".$row["typeofdel"]."</td><td>".$row["tot_price"]."</td><td>".$row["quantity"]."</td><td>".$row["status"]."</td><td>".$row["payment"]."</td><td>".$row["dateof_order"]."</td><td>".$row["product_no"]."</td><td>".$row["cno"]."</td></tr>";
     }
        echo "</table>";
    }
    else{
        echo "<br>";
        echo "<br>";
        echo "<br>";
        echo "<br>";
        echo "<br>";
        echo "<br>";
        echo "<br>";
        echo "<br>";
        echo "<br>";
        echo '<span style="font-size:50px"><b><center>NO PRODUCTS</b></span>';
        #echo "error: ".$sql."<br>".$conn->error;
    }
    $conn->close;
?>
    </body>
</html>