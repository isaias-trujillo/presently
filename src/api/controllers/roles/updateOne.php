<?php

include_once $_SERVER['DOCUMENT_ROOT'] . '/presently-react-php/src/api/database/mysql/queries/update.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/presently-react-php/src/api/controllers/roles/getOne.php';

function updateRolById(?int $id, ?string $name): array
{
    $response = getRolById($id);

    if (isset($response['error'])) return ['error' => $response['error']];

    $query = "update roles set nombre = ? where id = ?";
    $args = [
        ['s', $name],
        ['i', $id]
    ];

    ['updated' => $updated, 'error' => $error] = update($query, $args);
    if ($error) {
        return ['error' => $error];
    }
    return ['updated' => $updated];
}