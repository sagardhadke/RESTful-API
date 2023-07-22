<?php

require_once('db.php');


$action = $_GET['action'];

if($action == "create-user"){
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    $query = "Insert into users (name, email, password) values('$name', '$email', '$password')";
    $result = $mysqli->query($query);

    if($result){
        $response = array(
            "error" => true,
            "message" => "User created successfully"
        );

        echo json_encode($response);
        die();
    } else{
        $response = array(
            "error" => true,
            "message" => "Oops User not created"
        );

        echo json_encode($response);
        die();
    }

}

die();

?>