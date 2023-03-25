<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/presently-react-php' . '/src/api/controllers/auth/login.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/presently-react-php' . '/src/api/services/utils.php';

function loginService($request): array
{
    $valid_params = ['emailOrCode', 'password'];

    $params = array_keys($request);

    if (!hasValidParams($valid_params, $params)) {
        return ['error' => "Invalid params"];
    }
    ['emailOrCode' => $emailOrCode, 'password' => $password] = $request;
    return login($emailOrCode, $password);
}
