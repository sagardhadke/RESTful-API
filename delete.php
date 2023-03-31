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


$Query="DELETE FROM cars WHERE `cars`.`id` = $id";

$result=$conn->query($Query);

if($result==true){
    $response=array("status"=>"1", "message" => "Data Deleted successfully");
}else{
    $response=array("status"=>"0", "message" => "Data Deleted failed");
}

echo json_encode($response);

?>