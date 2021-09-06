<?php session_start(); ?>
<!DOCTTYPE html>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="pstyle.css">
    <title></title>
</head>
<body style="background-color: yellow">
    <center><img src="images/frontlogo.png" height="150px"></center><br>
    <div class="pad">
    <br>
        <u><h1>IPHONE 12 PRO</h1></u>
    <center><img src="images/iphone%2012pro.jpg" height="300px"><br></center>
<?php
    error_reporting(0);
    $conn = new mysqli('localhost','root','','mobile_shop');
    $sql = "SELECT * FROM product WHERE model_no='A2341';";
    $result = mysqli_query($conn, $sql);
    $resultcheck = mysqli_num_rows($result);
    if($resultcheck > 0){
     while($row = mysqli_fetch_assoc($result)){
        $_SESSION["phone"]=$row['model_no'];
        echo ("<b>Brand:</b> ".$row['brand']."<br>");
        echo "<br>";
        echo ("<b>Screen Size:</b>   ".$row['screen']."<br>");
        echo "<br>";
        echo ("<b>Operating System:</b>    ".$row['os']."<br>");
        echo "<br>";
        echo ("<b>Colour:</b>     ".$row['colour']."<br>");
        echo "<br>";
        echo ("<b>Front Camera:</b>   ".$row['front_cam']."<br>");
        echo "<br>";
        echo ("<b>Rear Camera:</b>   ".$row['rear_cam']."<br>");
        echo "<br>";
         echo ("<b>Price:</b> Rs.1,29,900/-<br>");
         echo "<br>";
        echo ("<h2>Description:</h2>    ".$row['description']."<br>");
        echo "<br>";
        echo "<br>";
     }
    }
        $conn->close;
?>
        <img class="iphone1" src="images/iphone1.png" height="450px"><br> 
        <img class="iphone2" src="images/iphone2.png" height="450px" width="500px"><br>
        <form action="typeofdel.php" method="post">
        <b>Quantity  </b><input type="number" name="quantity" required><br>
        <br>
        <br>
        <input type="radio" name="typeofdel" value="cod" required><b>Cash On Delivery</b>
        <input type="radio" name="typeofdel" value="online" required><b>Online Payment</b><br>
            <br>
            <br>
            <input type="submit" class="cancelbtn1" value="Buy Now">
        </form>
</div>
</body>
</html>
