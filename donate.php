<?php

$name= $_POST['name'];
$age=$_POST['age'];
$email=$_POST['email'];
$mobile=$_POST['mobile'];
$country=$_POST['country'];
$amount=$_POST['amount'];


$conn= new mysqli('localhost','root','','login');
if($conn->connect_error){
    echo('Connection failed :'.$conn->connect_error);
}
else{
    $stmt=$conn->prepare("insert into donate(name,age,email,mobile,country,amount) values(?,?,?,?,?,?)");
    $stmt->bind_param("sisisi",$name,$age,$email,$mobile,$country,$amount);
    $stmt->execute();
    echo include("payment.html");
    

    $stmt->close();
    $conn->close();
}
?>

