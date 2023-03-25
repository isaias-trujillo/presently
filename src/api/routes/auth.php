<?php

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: content-type");
header('Content-type: application/json');
header("Access-Control-Allow-Methods: POST");

include_once $_SERVER['DOCUMENT_ROOT'] . '/presently-react-php' . '/src/api/services/authService.php';

$method = $_SERVER['REQUEST_METHOD'];

$decoded_input = json_decode(file_get_contents("php://input"), true);

$response = [];

switch ($method) {
    case 'POST':
        $request = $decoded_input;
        $response = loginService($request);
        break;
    default:
        $response = ['error' => 'Request method not found'];
        break;
}

echo json_encode($response);