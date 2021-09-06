<?php
error_reporting(0);
session_start();
$emailid=$_POST["emailid"];
$password=$_POST["password"];
 //database connection
$conn = new mysqli('localhost','root','','mobile_shop');
if($conn->connect_error){
    die('connrction failed : '.$conn->connect_error);
}
elseif(isset($_POST["emailid"], $_POST["password"])){
    $result1  = mysqli_query($conn,"SELECT admin_emailid, admin_pswd FROM admin WHERE admin_emailid = '".$emailid."' AND admin_pswd='".$password."'");
     if(mysqli_num_rows($result1)>0)
     {
         $_SESSION["logged_in"]= true;
         $_SESSION["naam"] = $emailid;
          ?>
         <!DOCTTYPE html>
         <html>
         <body>
             <center><img src="images/frontlogo.png" height="200px"></center>
             </body>
         </html>
         <?php
         echo "<br>";
        echo "<br>";
        echo "<br>";
        ?>
        <!DOCTYPE html>
        <html>
        <head>
        <link rel="stylesheet" type="text/css" href="style.css" media="screen"/>    
        </head>
        <body style="background-color:Yellow">
            <div class="order">
            <br>
            <a href="addproduct.html" class="septab"><b>1.ADD PRODUCT</b></a>
            <a href="#" class="septab"><b>2.ADD ADMIN</b></a><br><br><br>
            <a href="pending_orders.php" class="septab"><b>3.PENDING ORDERS</b></a><br><br><br>
            <a href="product_table.php" class="septab"><b>4.PRODUCT TABLE</b></a>
            <a href="updatestock.html" class="septab"><b>5.UPDATE STOCK</b></a><br><br><br>
            <a href="updatesandp.html" class="septab"><b>6.UPDATE STATUS AND PAYMENT</b></a><br><br><br>
            <a href="customertable.php" class="septab"><b>7.CUSTOMER TABLE</b></a>
            <a href="#" class="septab"><b>8.ADMIN TABLE</b></a><br>
            <br>
            </div> 
            </body>
        </html>
        <?php
     }
    else
    {
        echo "<br>";
        echo "<br>";
        echo "<br>";
        echo "<br>";
        echo "<br>";
        echo "<br>";
        echo "<br>";
        echo "<br>";
        echo "<br>";
        echo "<br>";
        echo "<br>";
        echo "<br>";
        echo "<br>";
        echo "<br>";
        echo "<br>";
        echo '<span style="font-size:30px"><b><center>THE USERNAME OR PASSWORD IS INCORRECT</b></span>';
        echo "<br>";
        echo "<br>";
        echo "<b><center>click here to login form</b>";
        ?>
        <!DOCTYPE html>
        <html>
        <body style="background-color:Red">
        <center><br>
            <a href="admin.html"><b>LOGIN FORM</b></a>
        </center>
        </body>
        </html>
        <?php
    }
    $conn->close;
}
?>