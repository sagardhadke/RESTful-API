<?php

require_once('db.php');

$action = $_GET['action'];

$response = array(
    "error" => true,
    "message" => "Oops User Not Created..."
);

if($action == "create-user"){
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    $query = "Insert into users (name, email, password) values('$name', '$email', '$password')";
    $result = $mysqli->query($query);


    if($result){
        $response['error'] = false;
        $response['message'] = "User Created Success :)";
    } 
    echo json_encode($response);
    die();

    //login user using email and password
}else if($action == "login-user"){
    $email = $_POST['email'];
    $password = $_POST['password'];

    $query = "Select * from users where email = '$email' and password = '$password'"; 
    $result = $mysqli->query($query);

    if($result->num_rows > 0){
        $userRow = $result->fetch_assoc();
        $response['error'] = false;
        $response['message'] = "User Logged in Successfully";
        $response['data'] = $userRow;

    
    }else{
        $response['error'] = true;
        $response['message'] = "Invalid username or password";
    }

    echo json_encode($response);
} else if($action == "get-user-details"){
    $user_id = $_POST['id'];

    $query = "Select * from users where id = $user_id"; 
    $result = $mysqli->query($query);

    if($result->num_rows > 0){
        $userRow = $result->fetch_assoc();
        $response['error'] = false;
        $response['message'] = "Users fetch Successfully";
        $response['data'] = $userRow;

    
    }else{
        $response['error'] = true;
        $response['message'] = "Oops User Not Found :)";
    }

    echo json_encode($response);
}

exit();

?>