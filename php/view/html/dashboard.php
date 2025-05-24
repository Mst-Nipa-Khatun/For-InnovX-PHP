<?php
require_once __DIR__ . '/../../service/UsersService.php';

use service\UsersService;

$userService = new UsersService();
$userId = isset($_GET['userId']) ? $_GET['userId'] : null;//url check korchi userId name e kono parameter ase kina jodi thake userID te rakkchi otherwise null set korchi

$userData = null;
if ($userId !== null && is_numeric($userId)) { //jodi userId not null hoy and numeric hoy tahole userdata r moddhe userId dhore db theke ene user info ani.
    $userData = $userService->findByUserId($userId);
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>User Profile</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

</head>

<body class="bg-light">
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow">
                <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
                    <h3 class="mb-0">User Profile</h3>
                </div>
                <div class="card-body">
                    <?php if ($userData): ?>  <!--userData e kisu asekina jodi thake then next-->
                        <div class="row">
                            <div class="col-md-4 text-center">
                                <img src="<?= $userData['picture'] ?>"
                                     id="profileImage"
                                     alt="Profile Picture"
                                     class="img-fluid rounded-circle mb-3"
                                     style="max-width: 150px;">
                                <form id="uploadForm" enctype="multipart/form-data"> <!-- this form for new upload image ,multipart or formdate er maddhome file pathano hocche-->
                                    <input type="hidden" name="userId" value="<?= $userId ?>">
                                    <input type="hidden" name="_method" value="PUT">  <!--restfull convention jonni ei _method Put ta upadte kora bujhacche-->
                                    <input type="file" name="file" class="form-control mb-2" required>
                                    <button type="submit" class="btn btn-sm btn-outline-primary">Update Image</button>
                                </form>
                                <div id="uploadStatus" class="mt-2 text-success"></div> <!--after submission form showing message-->
                            </div>
                            <div class="col-md-8">
                                <h4><?= $userData['userName'] ?></h4> <!--full userData te j info ase ogulo niye show korbe-->
                                <hr>
                                <p><strong>Email:</strong> <?= $userData['email'] ?></p>
                                <p><strong>Age:</strong> <?= $userData['age'] ?></p>
                                <p><strong>Education:</strong> <?= $userData['education'] ?></p>
                            </div>
                        </div>
                    <?php else: ?>
                        <div class="alert alert-danger">No user found.</div>  <!--othewise no user found dekhabe-->
                    <?php endif; ?>
                    <a href="login.html" class="btn btn-danger mt-3" style="float: right">Logout</a>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    $('#uploadForm').on('submit', function (e) {
        e.preventDefault();

        var form = $(this)[0]; //recent form er DOM object
        var formData = new FormData(form);
        var userId = formData.get('userId');

        $.ajax({
            url: '/For-Innovx/php/controller/userController.php?userId=' + userId, //previous request e usrId ja asbe add kore khujbe
            type: 'POST',
            data: formData,
            processData: false,
            contentType: false, //browser nije multipart set korbe
            success: function (data) {
                var statusDiv = $('#uploadStatus');
                if (data.success) {
                    statusDiv.text(data.message);
                    $('#profileImage').attr('src', '/For-Innovx/php/uploads/' + formData.get('file').name + '?t=' + new Date().getTime()); //t timetamp add kora hocche,jeno purono cash theke jeno pic load naa kore
                } else {
                    statusDiv.text("Error: " + data.message);
                }
            },
            error: function (xhr, status, error) {
                $('#uploadStatus').text("Upload failed.");
                console.error(error);
            }
        });
    });
</script>
</body>
</html>
