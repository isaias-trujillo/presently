<?php

include_once $_SERVER['DOCUMENT_ROOT'] . '/presently-react-php/src/api/database/mysql/queries/select.php';

function user_Exists(string $emailOrCode): array
{
    $query = "select correo as 'email', rol_id as 'rol' from usuarios where correo = ? or codigo = ?";
    $args = [
        ['s', $emailOrCode],
        ['s', $emailOrCode],
    ];
    ['record' => $record, 'error' => $error] = selectOne($query, $args);
    if ($error) {
        return ['error' => $error];
    }
    if (!$record) {
        return ['error' => "El usuario '$emailOrCode' no existe"];
    }
    return ['exists' => true];
}