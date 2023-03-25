<?php

include_once $_SERVER['DOCUMENT_ROOT'] . '/presently-react-php/src/api/database/mysql/queries/insert.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/presently-react-php/src/api/controllers/roles/getOne.php';

function postRol(?string $name): array
{
    if ($name === null) {
        return ['error' => "Rol: name cannot be null"];
    }

    if (empty(trim($name))) {
        return ['error' => "Rol: name cannot be empty"];
    }

    $response = getRolByName($name);

    if ($response != null && !isset($response['error'])) {
        return ['error' => "Duplicated rol with name '${name}'"];
    }

    $query = 'insert into roles (nombre) values (?)';
    $args = [
        ['s', trim($name)]
    ];
    ['id' => $id, 'error' => $error] = insertOne($query, $args);
    if ($error) {
        return ['error' => $error];
    }
    return ['inserted' => $id > 0, 'id' => $id];
}
