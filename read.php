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

$Query="SELECT * FROM cars";

$result=$conn->query($Query);

if($result==true){
    $row=$result->fetch_all(MYSQLI_ASSOC);
    $response=array("status"=>"1", "Data" => $row);
}else{
    $response=array("status"=>"0", "Data" => "Data Not Found");
}

echo json_encode($response);

?>