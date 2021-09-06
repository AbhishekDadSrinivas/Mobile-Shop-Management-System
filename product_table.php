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
    $sql = "SELECT * FROM product ;";
    $result = mysqli_query($conn, $sql);
    $resultcheck = mysqli_num_rows($result);
    if($resultcheck > 0){
        echo "<table><tr><th>Product No.</th><th>Model No.</th><th>Model Name</th><th>Brand</th><th>Screen</th><th>OS</th><th>Colour</th><th>Front_Cam</th><th>Rear_Cam</th><th>Price</th><th>Stock</th></tr>";
    while($row = mysqli_fetch_assoc($result)){
       echo "<tr><td>".$row["product_no"]."</td><td>".$row["model_no"]."</td><td>".$row["model_name"]."</td><td>".$row["brand"]."</td><td>".$row["screen"]."</td><td>".$row["os"]."</td><td>".$row["colour"]."</td><td>".$row["front_cam"]."</td><td>".$row["rear_cam"]."</td><td>".$row["price"]."</td><td>".$row["stock"]."</td></tr>";
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