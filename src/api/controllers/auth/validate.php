<?php

include_once $_SERVER['DOCUMENT_ROOT'] . '/presently-react-php/src/api/database/mysql/queries/select.php';

function user_is_valid(string $email, string $rol): array
{
    $exists = user_Exists($email);
    if (isset($exists['error'])) {
        return ['error' => $exists['error']];
    }
    $query = "select rol_id from usuarios where correo = ? and clave = ?";
    $args = [
        ['s', $email],
        ['i', $rol],
    ];
    ['record' => $record, 'error' => $error] = selectOne($query, $args);
    if ($error) {
        return ['error' => $error];
    }
    $rol_id = $record['rol_id'];
    if (!$record || $rol != $rol_id) {
        return ['error' => "El usuario '$email' tiene un rol diferente"];
    }
    return ['valid' => true, 'rol' => $rol_id];
}