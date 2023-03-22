<?php

include_once $_SERVER['DOCUMENT_ROOT'].'/presently/core/auth/infrastructure/services/LoginUserService.php';

use core\auth\infrastructure\services\LoginUserService;


$emailOrCode = $_POST["email"];
$password = $_POST['password'];

$service = new LoginUserService();

$response = $service->login($emailOrCode, $password);

echo json_encode($response);