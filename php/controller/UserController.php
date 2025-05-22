<?php
require_once __DIR__ . '/../service/UsersService.php';

use service\UsersService;

header("Content-Type: application/json");

$userService = new UsersService();
$method = $_SERVER['REQUEST_METHOD']; //GET,POST,PUT,DELETE,PATCH

switch ($method) {
    case 'POST':
        $requestBody = file_get_contents("php://input");
        /**
         * Here [true] means convert to accessible PHP array
         * Here [false] means convert to  accessible PHP object.
         */
        $data = json_decode($requestBody, true);


        if (isset($data['userName']) && isset($data['email']) && isset($data['password']) && isset($data['education']) && isset($data['age']) && isset($data['picture'])) {
            $result = $userService->createUser($data['userName'], $data['email'], $data['password'], $data['education'], $data['age'], $data['picture']);
            echo json_encode(
                [
                    "success" => $result,
                    "message" => $result ? "Successfully created user!" : "Failed to create user!"
                ]
            );
        } else {
            echo json_encode(["error" => "Missing parameters"]);
        }
        break;
    case 'GET':
        $result = $userService->getAllUsers();
        $resultCount = count($result);
        if ($resultCount > 0) {
            echo json_encode([
                "success" => true,
                "message" => "Successful retrieve all users",
                "users" => $result
            ]);
        } else {
            echo json_encode([
                "success" => false,
                "message" => "No Users Found",
                "users" => $result
            ]);
        }
        break;

    default:
        echo json_encode(
            ["success" => false, "message" => "Request method not allowed"]
        );

}



