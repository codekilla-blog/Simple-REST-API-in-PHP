<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

include 'dbConfig.php';
$data = json_decode(file_get_contents("php://input"));
// $data will recieve data we sent from postman as an array
$sql = "SELECT * FROM users WHERE username='$data->username' AND password='$data->password'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    echo json_encode($row);
} else {
    echo json_encode(array('status' => 'failed', 'msg' => 'Username or password is incorrect'));
}
return;
