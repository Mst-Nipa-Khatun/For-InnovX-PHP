<?php
require_once __DIR__ . '/../../service/UsersService.php';

use service\UsersService;

$userService = new UsersService();
$userId = isset($_GET['userId']) ? $_GET['userId'] : null;

$userData = null;
if ($userId !== null && is_numeric($userId)) {
    $userData = $userService->findByUserId($userId);
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>User Profile</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow">
                <div class="card-header bg-primary text-white">
                    <h3 class="mb-0">User Profile</h3>
                </div>
                <div class="card-body">
                    <?php if ($userData): ?>
                        <div class="row">
                            <div class="col-md-4 text-center">
<!--                                <img src="--><?php //= htmlspecialchars($userData['picture']) ?><!--" alt="Profile Picture" class="img-fluid rounded-circle mb-3" style="max-width: 150px;">-->
                            </div>
                            <div class="col-md-8">
                                <h4><?= htmlspecialchars($userData['userName']) ?></h4>
                                <hr>
                                <p><strong>Email:</strong> <?= $userData['email'] ?></p>
                                <p><strong>Age:</strong> <?= $userData['age'] ?></p>
                                <p><strong>Education:</strong> <?= $userData['education'] ?></p>
                            </div>
                        </div>
                    <?php else: ?>
                        <div class="alert alert-danger">No user found.</div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>
