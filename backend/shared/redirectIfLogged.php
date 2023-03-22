<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/presently/core/auth/infrastructure/services/LoginUserService.php';

use core\auth\infrastructure\services\LoginUserService;

if (session_status() === PHP_SESSION_NONE){
    session_start();
}

if (empty($_SESSION)) {
    echo json_encode('');
    die();
}

$email = $_SESSION["email"] ?? '';
$rol = $_SESSION['rol'] ?? '';

$service = new LoginUserService();
$response = $service->verify($email, $rol);

$loginUri = '/presently/pages/login.php';

if (isset($response['error']) || !$response['verified']) {
    $uri = $loginUri;
} else {
    if ($service->isAdmin($rol)) {
        $uri = '/presently/pages/admin/students.php';
    }
}

$redirectStatus = json_encode($uri);
echo $redirectStatus;

