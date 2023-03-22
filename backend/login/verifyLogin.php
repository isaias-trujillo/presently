<?php

include_once $_SERVER['DOCUMENT_ROOT'] . '/presently/core/auth/infrastructure/services/LoginUserService.php';

use core\auth\infrastructure\services\LoginUserService;

session_start();

$email = $_POST["email"];
$rol = $_POST['rol'];

$_SESSION['email'] = $email;
$_SESSION['rol'] = $rol;

$service = new LoginUserService();
$response = $service->verify($email, $rol);

echo json_encode($response);