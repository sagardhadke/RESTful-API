<?php


$dbHost="localhost";
$dbUser="root";
$dbPassword="";
$dbName="apidev";

$mysqli = new mysqli($dbHost, $dbUser, $dbPassword, $dbName);

if ($mysqli->connect_errno){
    $response = array(
        "error" => true,
        "message" => "invalid Database Details check your details"
    );

    echo json_encode($response);
    die();
}

?>