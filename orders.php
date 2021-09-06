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
    $conn = new mysqli('localhost','root','','mobile_shop');
    $cuno;
    $sql2="SELECT * FROM customer WHERE emailid='$ses';";
$result2 = mysqli_query($conn, $sql2);
$resultcheck2 = mysqli_num_rows($result2);
        
        if($resultcheck2>0){
        while($row2= mysqli_fetch_assoc($result2)){
            $cuno=$row2['cno'];
        }
    }
    $sql = "SELECT * FROM orders natural join product WHERE cno='$cuno';";
    $result = mysqli_query($conn, $sql);
    $resultcheck = mysqli_num_rows($result);
    if($resultcheck > 0){
        echo "<table><tr><th>Order No.</th><th>Model Name</th><th>Colour</th><th>Total Price</th><th>Type of Delivery</th><th>Quantity</th><th>Ordered Date</th><th>Status</th><th>Payment</th></tr>";
    while($row = mysqli_fetch_assoc($result)){
       echo "<tr><td>".$row["orderno"]."</td><td>".$row["model_name"]."</td><td>".$row["colour"]."</td><td>".$row["tot_price"]."</td><td>".$row["typeofdel"]."</td><td>".$row["quantity"]."</td><td>".$row["dateof_order"]."</td><td>".$row["status"]."</td><td>".$row["payment"]."</td></tr>";
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
        echo '<span style="font-size:50px"><b><center>NO ORDERS</b></span>';
        #echo "error: ".$sql."<br>".$conn->error;
    }
    $conn->close;
?>
    </body>
</html>