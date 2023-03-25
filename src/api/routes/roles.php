<?php

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: content-type");
header('Content-type: application/json');
header("Access-Control-Allow-Methods: OPTIONS,GET,PUT,POST,DELETE");

include_once $_SERVER['DOCUMENT_ROOT'] . '/presently-react-php' . '/src/api/services/rolesService.php';

$method = $_SERVER['REQUEST_METHOD'];

$response = [];

switch ($method) {
    case 'GET':
        $request = $_GET;
        $response = getRolesService($request);
        break;
    case 'POST':
        $request = $_POST;
        $response = postRolesService($request);
        break;
    case 'PATCH':
    case 'PUT' :
        $request = $_GET;
        $response = updateRolService($request);
        break;
    case 'DELETE':
        $request = $_GET;
        $response = deleteRolService($request);
        break;
    default:
        $response = ['error' => 'Request method not found'];
        break;
}

echo json_encode($response);