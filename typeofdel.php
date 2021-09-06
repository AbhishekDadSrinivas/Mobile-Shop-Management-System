<?php
require "verify.php"; ?>
<!DOCTTYPE html>
<html>
    <head>
        <link type="text/css" rel="stylesheet" href="pstyle.css"/>
    </head>
    <body style="background-color: yellow">
<div class="pad3">
<?php
//error_reporting(0);
$quantity=$_POST['quantity'];
$_SESSION["quantity"]=$quantity;
$typeofdel=$_POST['typeofdel'];
$conn = new mysqli('localhost','root','','mobile_shop');
$ses=$_SESSION["naam"];
$sesp=$_SESSION["phone"];
$mname;
$pno;
$addrs;
$name;
$color;
$price;


$sql1 = "SELECT * FROM product WHERE model_no='$sesp';";
    $result1 = mysqli_query($conn, $sql1);
    $resultcheck1 = mysqli_num_rows($result1);


$sql2="SELECT * FROM customer WHERE emailid='$ses';";
$result2 = mysqli_query($conn, $sql2);
$resultcheck2 = mysqli_num_rows($result2);
if($typeofdel==cod)
{
    $_SESSION["typeofdel"]=$typeofdel;
    echo "<u><h1>CASH ON DELIVERY</h1></u> <br>";
    echo "<b>Email id:</b> $ses <br>";
    echo "<br>";
    if($resultcheck2>0){
        while($row2= mysqli_fetch_assoc($result2)){
            $pno=$row2['pno'];
            $addrs=$row2['address'];
            $name=$row2['fname'].$row2['lname'];
            echo "<b>Name :</b> $name<br>";
            echo "<br>";
            echo "<b>Mobile number:</b> $pno<br>";
            echo "<br>";
            echo "<b>Address :</b> $addrs<br>";
            echo "<br>";
        }
    }
    if($resultcheck1 > 0){
     while($row1 = mysqli_fetch_assoc($result1)){
         $mname=$row1['model_name'];
         $color=$row1['colour'];
         $price=$row1['price'] * $quantity;
     echo "<b>Model Name:</b> $mname<br>";
        echo "<br>";
     echo "<b>Colour:</b> $color<br>";
         echo "<br>";
     echo "<b>Quantity:</b> $quantity<br>";
         echo "<br>";
         echo "<b>Total Price:</b> $price<br>";
         echo "<br>";
       }
    }
    ?>
    <form method="post" action="orderplaced.php">
    <input type= "submit" value="Submit" class="submit1">
    </form>
    <?php
}
    else{
        $_SESSION["typeofdel"]=$typeofdel;
 echo "<u><h1>ONLINE PAYMENT</h1></u> <br>";
    echo "<b>Email id:</b> $ses <br>";
    echo "<br>";
    if($resultcheck2>0){
        while($row2= mysqli_fetch_assoc($result2)){
            $pno=$row2['pno'];
            $addrs=$row2['address'];
            $name=$row2['fname'].$row2['lname'];
            echo "<b>Name :</b> $name<br>";
            echo "<br>";
            echo "<b>Mobile number:</b> $pno<br>";
            echo "<br>";
            echo "<b>Address :</b> $addrs<br>";
            echo "<br>";
        }
    }
    if($resultcheck1 > 0){
     while($row1 = mysqli_fetch_assoc($result1)){
         $mname=$row1['model_name'];
         $color=$row1['colour'];
         $price=$row1['price'] * $quantity;
     echo "<b>Model Name:</b> $mname<br>";
        echo "<br>";
     echo "<b>Colour:</b> $color<br>";
         echo "<br>";
         echo "<b>Total Price:</b> $price<br>";
         echo "<br>";
          echo "<u><h1>DEBIT CARD DETAILS</h1></u> <br>";
       }
    }
    ?>
    <form method="post" action="orderplaced.php">
        <label><b>Name</b></label>
        <input type="text" placeholder="Enter the full name as in your card" name="cname" required><br>
        <br>
    <label><b>Card Number</b></label>
        <input type="number" placeholder="Enter your card number" name="cno" required><br>
        <br>
    <label><b>Expiry date</b></label>
        <input type="date" placeholder="Enter the expiry date" name="cedate" required><br>
        <br>
    <input type= "submit" value="Submit" class="submit1">
    </form>
    <?php
}
    $conn->close;
?>
        </div>
    </body>
</html>
