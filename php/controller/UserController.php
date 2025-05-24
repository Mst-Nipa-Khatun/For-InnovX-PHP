<?php
require_once __DIR__ . '/../service/UsersService.php';

use service\UsersService;

header("Content-Type: application/json"); //type JSON format

$userService = new UsersService();
$method = $_SERVER['REQUEST_METHOD']; //PUT,GET,POST,DELETE

if ($method === 'POST' && isset($_POST['_method']) && $_POST['_method'] === 'PUT') {
    $method = 'PUT';
} //if any post request in _method=PUT ,then we pick it in put method,
//In HTML form if we want put method,Then we simulate POST in _method=PUT we write.



switch ($method) {
    case 'POST':
        if (
            isset($_POST['userName']) && isset($_POST['email']) && isset($_POST['password']) &&
            isset($_POST['education']) && isset($_POST['age']) && isset($_FILES['file']) //user input from from user info present or not
        ) {
            $userName = $_POST['userName'];
            $email = $_POST['email'];
            $password = $_POST['password'];
            $education = $_POST['education'];
            $age = $_POST['age'];
            $file = $_FILES['file'];

            $uploadDir = __DIR__ . '/../uploads/';
            if (!file_exists($uploadDir)) {
                mkdir($uploadDir, 0777, true); //If the folder does not exist,
                // it will be created  using mkdir().0777 folder permissions so that everyone can read, write, and execute .
                //true- mkdir() to create any necessary parent directories
            }

            $fileName = time() . "_" . $file['name']; //currebt time concat file name
            $targetPath = $uploadDir . basename($fileName); //set targetpath from uploaded and basename means just pick image name part ignore full directory name path details.
            if (move_uploaded_file($file['tmp_name'], $targetPath)) { //move upload function work for save the file in targeted folder
                $savedDir = "/For-Innovx/php/uploads/" . $fileName; //then save the directory for further use
                $result = $userService->createUser($userName, $email, $password, $education, $age, $savedDir); // successfully uploaded the file then createUser function call and store user details in db.
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
        $result = $userService->getAllUsers(); //getAllUsers function call for get all users
        $resultCount = count($result);  // count how many user are present
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
        $userId = isset($_GET['userId']) ? $_GET['userId'] : (isset($_POST['userId']) ? $_POST['userId'] : null);// if userId is present in the URL query string ($_GET).If not found,
        // then it checks in the POST data ($_POST).If it's not in either, it sets $userId to null.
        $file = isset($_FILES['file']) ? $_FILES['file'] : null; // if key file has been uploaded via $_FILES it's stored in $file.otherwise $file is set to null.

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
