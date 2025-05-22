<?php

require_once __DIR__ . '/../service/LoginService.php';
use service\LoginService;

header("Content-Type: application/json");

$loginService = new LoginService();
$method = $_SERVER['REQUEST_METHOD'];

switch ($method) {
    case 'POST':
        $requestBody = file_get_contents("php://input");
        $data = json_decode($requestBody, true);


        if (isset($data['userName']) && isset($data['password'])) {
            $result = $loginService->login($data['userName'], $data['password']);
            echo json_encode($result);
        } else {
            echo json_encode(["error" => "Missing parameters"]);
        }
        break;
    default:
        echo json_encode(
            ["success" => false, "message" => "Request method not allowed"]
        );

}




