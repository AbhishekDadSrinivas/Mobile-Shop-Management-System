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
    $conn = new mysqli('localhost','root','','mobile_shop');
    $sql = "SELECT * FROM customer ;";
    $result = mysqli_query($conn, $sql);
    $resultcheck = mysqli_num_rows($result);
    if($resultcheck > 0){
        echo "<table><tr><th>Customer No.</th><th>First Name</th><th>Last Name</th><th>Phone No.</th><th>Email Id</th><th>Gender</th><th>Date of Birth</th><th>Address</th></tr>";
    while($row = mysqli_fetch_assoc($result)){
       echo "<tr><td>".$row["cno"]."</td><td>".$row["fname"]."</td><td>".$row["lname"]."</td><td>".$row["pno"]."</td><td>".$row["emailid"]."</td><td>".$row["gender"]."</td><td>".$row["dob"]."</td><td>".$row["address"]."</td></tr>";
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
        echo '<span style="font-size:50px"><b><center>NO CUSTOMERS</b></span>';
        #echo "error: ".$sql."<br>".$conn->error;
    }
    $conn->close;
?>
    </body>
</html>