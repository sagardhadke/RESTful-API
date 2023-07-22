<?php

require_once('db.php');


$action = $_GET['action'];

if($action == "create-user"){
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    $query = "Insert into users (name, email, password) values('$name', '$email', '$password')";
    $result = $mysqli->query($query);

    $response = array(
        "error" => true,
        "message" => "Opps User Not Created..."
    );

    if($result){
        $response['error'] = false;
        $response['message'] = "User Created Success :)";
    } 
    echo json_encode($response);
    die();
}

exit();

?>