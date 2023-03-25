<?php

include_once $_SERVER['DOCUMENT_ROOT'] . '/presently-react-php/src/api/database/mysql/queries/delete.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/presently-react-php/src/api/controllers/roles/getOne.php';

function deleteRolById(?int $id): array
{
    $response = getRolById($id);

    if (isset($response['error'])) return ['error' => $response['error']];

    $query = "delete from roles where id = ?";
    $args = [
        ['i', $id]
    ];

    ['deleted' => $deleted, 'error' => $error] = delete($query, $args);
    if ($error) {
        return ['error' => $error];
    }
    return ['deleted' => $deleted];
}
