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


$name=$_POST['name'];
$model =$_POST['model'];
$number =$_POST['number'];
$ownName =$_POST['ownName'];
$fuelType =$_POST['fuelType'];
$coverKm =$_POST['coverKm']; 
$isActive =$_POST['isActive'];

$Query="INSERT INTO `cars` (`id`, `name`, `model`, `number`, `ownName`, 
`fuelType`, `coverKm`, `isActive`) VALUES (NULL, '$name', 
'$model', '$number', '$ownName', '$fuelType', '$coverKm', '$isActive');";

$result=$conn->query($Query);

if($result==true){
    $response=array("status"=>"1", "message" => "Data added successfully");
}else{
    $response=array("status"=>"0", "message" => "Data added failed");
}

echo json_encode($response);

?>