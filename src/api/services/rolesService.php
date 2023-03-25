<?php

include_once $_SERVER['DOCUMENT_ROOT'] . '/presently-react-php' . '/src/api/controllers/roles/getAll.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/presently-react-php' . '/src/api/controllers/roles/getOne.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/presently-react-php' . '/src/api/controllers/roles/postOne.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/presently-react-php' . '/src/api/controllers/roles/updateOne.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/presently-react-php' . '/src/api/controllers/roles/deleteOne.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/presently-react-php' . '/src/api/services/utils.php';

function getRolesService(array $request): array
{
    $valid_params = ['id', 'name', 'page'];

    $params = array_keys($request);

    if (!hasValidParams($valid_params, $params)) {
        return ['error' => "Invalid params"];
    }
    if (array_key_exists('id', $request)) {
        $id = filter_var($request['id'] ?? '', FILTER_SANITIZE_NUMBER_INT);
        return getRolById(intval($id));
    }
    if (array_key_exists('name', $request)) {
        $name = filter_var($request['name'] ?? '', FILTER_SANITIZE_STRING);
        return getRolByName($name);
    }
    if (array_key_exists('page', $request)) {
        $page = filter_var($request['page'] ?? '', FILTER_SANITIZE_NUMBER_INT);
        $perPage = filter_var($request['perPage'] ?? '', FILTER_SANITIZE_NUMBER_INT);
        $page = intval($page);
        $perPage = intval($perPage);
        return getRolesByPage($page, $perPage);
    }
    return getAllRoles();
}

function postRolesService(array $request): array
{
    $valid_params = ['name'];
    $params = array_keys($request);

    if (!hasValidParams($valid_params, $params)) {
        return ['error' => "Invalid params"];
    }
    $name = filter_var($request['name'] ?? '', FILTER_SANITIZE_STRING);
    return postRol($name);
}

function updateRolService(array $request): array
{
    $valid_params = ['id', 'name'];
    $params = array_keys($request);

    if (!hasValidParams($valid_params, $params)) {
        return ['error' => "Invalid params"];
    }
    $id = filter_var($request['id'] ?? '', FILTER_SANITIZE_NUMBER_INT);
    $name = filter_var($request['name'] ?? '', FILTER_SANITIZE_STRING);
    return updateRolById(intval($id), $name);
}

function deleteRolService(array $request): array
{
    $valid_params = ['id'];
    $params = array_keys($request);

    if (!hasValidParams($valid_params, $params)) {
        return ['error' => "Invalid params"];
    }
    $id = filter_var($request['id'] ?? '', FILTER_SANITIZE_NUMBER_INT);
    return deleteRolById(intval($id));
}