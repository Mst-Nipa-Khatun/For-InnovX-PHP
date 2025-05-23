<?php
require_once __DIR__ . '/../service/UsersService.php';

use service\UsersService;

header("Content-Type: application/json");

$userService = new UsersService();
$method = $_SERVER['REQUEST_METHOD'];

if ($method === 'POST' && isset($_POST['_method']) && $_POST['_method'] === 'PUT') {
    $method = 'PUT';
}

switch ($method) {
    case 'POST':
        if (
            isset($_POST['userName']) && isset($_POST['email']) && isset($_POST['password']) &&
            isset($_POST['education']) && isset($_POST['age']) && isset($_FILES['file'])
        ) {
            $userName = $_POST['userName'];
            $email = $_POST['email'];
            $password = $_POST['password'];
            $education = $_POST['education'];
            $age = $_POST['age'];
            $file = $_FILES['file'];

            $uploadDir = __DIR__ . '/../uploads/';
            if (!file_exists($uploadDir)) {
                mkdir($uploadDir, 0777, true);
            }

            $fileName = time() . "_" . $file['name'];
            $targetPath = $uploadDir . basename($fileName);
            if (move_uploaded_file($file['tmp_name'], $targetPath)) {
                $savedDir = "/For-Innovx/php/uploads/" . $fileName;
                $result = $userService->createUser($userName, $email, $password, $education, $age, $savedDir);
                echo json_encode([
                    "success" => $result,
                    "message" => $result ? "Successfully created user!" : "Failed to create user!"
                ]);
            } else {
                echo json_encode(["success" => false, "message" => "Failed to upload file"]);
            }
        } else {
            echo json_encode(["success" => false, "message" => "Missing parameters or file"]);
        }
        break;

    case 'GET':
        $result = $userService->getAllUsers();
        $resultCount = count($result);
        if ($resultCount > 0) {
            echo json_encode([
                "success" => true,
                "message" => "Successfully retrieved all users",
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

    case 'PUT':
        $userId = isset($_GET['userId']) ? $_GET['userId'] : (isset($_POST['userId']) ? $_POST['userId'] : null);
        $file = isset($_FILES['file']) ? $_FILES['file'] : null;

        if ($userId && $file) {
            $uploadDir = __DIR__ . '/../uploads/';
            if (!file_exists($uploadDir)) {
                mkdir($uploadDir, 0777, true);
            }

            $fileName = time() . "_" . $file['name'];
            $targetPath = $uploadDir . basename($fileName);

            if (move_uploaded_file($file['tmp_name'], $targetPath)) {
                $savedDir = "/For-Innovx/php/uploads/" . $fileName;
                $result = $userService->updateUserImage($userId, $savedDir);

                echo json_encode([
                    "success" => $result,
                    "message" => $result ? "Profile image updated!" : "Failed to update image!"
                ]);
            } else {
                echo json_encode(["success" => false, "message" => "Failed to upload new image"]);
            }
        } else {
            echo json_encode(["success" => false, "message" => "Missing userId or image file"]);
        }
        break;

    default:
        echo json_encode([
            "success" => false,
            "message" => "Request method not allowed"
        ]);
}
