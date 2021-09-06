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
$emailid= $_POST["emailid"];
$name= $_POST["name"];
$pno= $_POST["pno"];
$issue= $_POST["issue"];
$conn = new mysqli('localhost','root','','mobile_shop');
$sql= "INSERT INTO feedback(name, emailid, pno, issue) VALUES('$name', '$emailid', '$pno', '$issue');";
if($conn->query($sql)){
    echo "THANK YOU FOR YOUR FEEDBACK";
}
else{
    echo "error ".$sql."<br>".$conn->error;
}
$conn->close;
?>
        </div>
    </body>
</html>