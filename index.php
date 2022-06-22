<?php

$name= $_POST['name'];
$password=$_POST['password'];


$conn= new mysqli('localhost','root','','login');
if($conn->connect_error){
    echo('Connection failed :'.$conn->connect_error);
}
else{
    $stmt=$conn->prepare("insert into log(name,password) values(?,?)");
    $stmt->bind_param("ss",$name,$password);
    $stmt->execute();
    echo include("index.html");
    $stmt->close();
    $conn->close();

}

?>
