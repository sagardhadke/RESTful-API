<?php

// //use echo for print the text 
// echo "Hello Welcome To Api Development Using Php MySQL Database"

//connect to the server 

$servername = "localhost";
$user = "root";
$password = "";
$database = "car_db";

$conn=new mysqli($servername,$user,$password,$database);

if($conn->connect_error){
    die("Connection failed: ". $conn->connect_error);

}else{
    echo "Connection successful";
}

$id = $_POST['id'];
$name=$_POST['name'];
$model =$_POST['model'];
$number =$_POST['number'];
$ownName =$_POST['ownName'];
$fuelType =$_POST['fuelType'];
$coverKm =$_POST['coverKm']; 
$isActive =$_POST['isActive'];

$Query="UPDATE `cars` SET `name` = '$name', `model` = '$model', 
`number` = '$number', `ownName` = '$ownName', `fuelType` = '$fuelType', 
`coverKm` = '$coverKm', `isActive` = '$isActive' WHERE `cars`.`id` = '$id';";

$result=$conn->query($Query);

if($result==true){
    $response=array("status"=>"1", "message" => "Data Updated successfully");
}else{
    $response=array("status"=>"0", "message" => "Data Updated failed");
}

echo json_encode($response);

?>