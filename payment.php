<?php

$cardholder=$_POST['cardholder'];
$cardnumber=$_POST['cardnumber'];


$conn= new mysqli('localhost','root','','login');
if($conn->connect_error){
    echo('Connection failed :'.$conn->connect_error);
}
else{
    $stmt=$conn->prepare("insert into payment(cardholder,cardnumber) values(?,?)");
    $stmt->bind_param("si",$cardholder,$cardnumber);
    $stmt->execute();
    echo include("thank.html");
    $stmt->close();
    $conn->close();
}
?>
