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
$productno= $_POST["productno"];
$stock= $_POST["stock"];
$conn = new mysqli('localhost','root','','mobile_shop');
$sql= "UPDATE PRODUCT SET stock='".$stock."' WHERE product_no='".$productno."';";
if($conn->query($sql)){
    echo "UPDATED STOCK SUCESSFULLY";
}
else{
    echo "error ".$sql."<br>".$conn->error;
}
$conn->close;
?>
        </div>
    </body>
</html>