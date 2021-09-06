<!DOCTYPE html>
<html>
    <head>
    <link rel="stylesheet" type="text/css" href="pstyle.css">
    </head>
     <body>
        <center><img src="images/frontlogo.png" height="150px"></center><br>
<?php
$fname=$_POST["fname"];
$lname=$_POST["lname"];
$pno=$_POST["pno"];
$emailid=$_POST["emailid"];
$gender=$_POST["gender"];
$dob=$_POST["dob"];
$address=$_POST["address"];
$crtpswd=$_POST["crtpswd"];
$conpswd=$_POST["conpswd"];
$conn = new mysqli('localhost','root','','mobile_shop');
if($conn->connect_error){
    die('connrction failed : '.$conn->connect_error);
}
$result1  = mysqli_query($conn,"SELECT emailid, conpswd FROM customer WHERE emailid = '".$emailid."'");
if(mysqli_num_rows($result1)>0){
    echo "<br>";
        echo "<br>";
        echo "<br>";
        echo "<br>";
        echo "<br>";
        echo "<br>";
        echo "<br>";
        echo "<br>";
        echo "<br>";
        echo '<span style="font-size:50px"><b><center>EMAIL ID ALREADY EXISTS</b></span>';
        ?>
        <!DOCTYPE html>
        <html>
        <body style="background-color:Red">
        <center><br>
            <a href="login.html"><b>LOGIN</b></a>
        </center>
        </body>
        </html>
        <?php
}
else{
    if($crtpswd==$conpswd){
    $sql= "INSERT INTO customer(fname, lname, pno, emailid, gender, dob, address, crtpswd, conpswd) VALUES('$fname', '$lname', '$pno', '$emailid', '$gender', '$dob', '$address', '$crtpswd', '$conpswd')";
    if($conn->query($sql)){
        
        echo "<br>";
        echo "<br>";
        echo "<br>";
        echo "<br>";
        echo "<br>";
        echo "<br>";
        echo "<br>";
        echo "<br>";
        echo "<br>";
        echo '<span style="font-size:50px"><b><center>CREATED ACCOUNT SUCESSFULLY</b></span>';
        ?>
        <!DOCTYPE html>
        <html>
        <body style="background-color:Yellow">
        <center><br>
            <a href="login.html"><b>LOGIN</b></a>
        </center>
        </body>
        </html>
        <?php
    }
    else{
        echo "error: ".$sql."<br>".$conn->error;
    }
    $conn->close();
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
        echo '<span style="font-size:50px"><b><center>WARNING: THE PASSWORD MUST BE SAME</b></span>';
        ?>
        <!DOCTYPE html>
        <html>
        <body style="background-color:Red">
        <center><br>
            <a href="createacc.html"><b>CLICK HERE</b></a>
        </center>
        </body>
        </html>
        <?php
    }
    
    
}
?>
    </body>
</html>