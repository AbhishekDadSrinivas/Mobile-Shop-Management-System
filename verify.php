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
    $result1  = mysqli_query($conn,"SELECT emailid, conpswd FROM customer WHERE emailid = '".$emailid."' AND conpswd='".$password."'");
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
            <div class="smart">
                <a href="smapho.html"><img src="images/smartphones.png" width="500px"></a><br>
                <a href="smapho.html" class="s1"><b>SMARTPHONES</b></a>
            </div>
            <div class="tablet">
            <a href="tablet.html"><img src="images/tablet.png" width="400px"></a><br>
                <a href="tablet.html" class="s2"><b>TABLET</b></a>
            </div>
            <div class="access">
            <a href="accessories.html"><img src="images/accessories.png" width="400px"></a><br>
                <a href="accessories.html" class="s2"><b>ACCESSORIES</b></a>
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
            <a href="login.html"><b>LOGIN FORM</b></a>
        </center>
        </body>
        </html>
        <?php
    }
    $conn->close;
}
?>
