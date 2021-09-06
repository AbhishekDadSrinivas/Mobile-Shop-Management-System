<!DOCTYPE.html>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="pstyle.css">
    </head>
    <body style="background-color: yellow">
        <center><img src="images/frontlogo.png" height="150px"></center><br>
        <div class="pad5">
<?php 
error_reporting(0);
$orderno= $_POST["orderno"];
$status= $_POST["status"];
$payment= $_POST["payment"];
$conn = new mysqli('localhost','root','','mobile_shop');
$sql= "UPDATE orders SET status='".$status."', payment='".$payment."' WHERE orderno='".$orderno."';";
if($conn->query($sql)){
    echo "UPDATED STATUS AND PAYMENT SUCESSFULLY";
}
else{
    echo "error ".$sql."<br>".$conn->error;
}
$conn->close;
?>
        </div>
    </body>
</html>