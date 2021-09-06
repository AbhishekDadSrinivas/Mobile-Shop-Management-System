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
$modelno= $_POST["modelno"];
$modelname= $_POST["modelname"];
$brand= $_POST["brand"];
$screen= $_POST["screen"];
$os= $_POST["os"];
$colour= $_POST["colour"];
$frontcam= $_POST["frontcam"];
$rearcam= $_POST["rearcam"];
$price= $_POST["price"];
$description= $_POST["description"];
$stock= $_POST["stock"];
$conn = new mysqli('localhost','root','','mobile_shop');
$sql= "INSERT INTO product(model_no, model_name, brand, screen, os, colour, front_cam, rear_cam, price, description, stock) VALUES('$modelno', '$modelname', '$brand', '$screen', '$os', '$colour', '$frontcam', '$rearcam', '$price', '$description', '$stock');";
if($conn->query($sql)){
    echo "PRODUCT ADDED SUCESSFULLY";
}
else{
    echo "error ".$sql."<br>".$conn->error;
}
$conn->close;
?>
        </div>
    </body>
</html>