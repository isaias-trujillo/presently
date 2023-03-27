<?php

include_once $_SERVER['DOCUMENT_ROOT'] . '/presently-react-php' . '/src/api/controllers/students/getOne.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/presently-react-php' . '/src/api/controllers/students/getAll.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/presently-react-php' . '/src/api/services/utils.php';

function getStudentsService(array $request): array
{
    $valid_params = ['id', 'query'];

    $params = array_keys($request);

    if (!hasValidParams($valid_params, $params)) {
        return ['error' => "Invalid params"];
    }
    if (array_key_exists('id', $request)) {
        ['id' => $id] = $request;
        return getStudentById(intval($id));
    }
    if (array_key_exists('query', $request)) {
        ['query' => $query] = $request;
        return getAllStudentsWithWord($query);
    }
    return getAllStudents();
}