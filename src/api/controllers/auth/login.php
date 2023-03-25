<?php

include_once $_SERVER['DOCUMENT_ROOT'] . '/presently-react-php/src/api/database/mysql/queries/select.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/presently-react-php/src/api/controllers/auth/exists.php';

function login(string $emailOrCode, string $password): array
{
    $exists = user_Exists($emailOrCode);

    if (isset($exists['error'])) {
        return ['error' => $exists['error']];
    }

    $query = "select correo as 'email', rol_id as 'rol' from usuarios where (correo = ? or codigo = ?) and clave = ?";
    $args = [
        ['s', $emailOrCode],
        ['s', $emailOrCode],
        ['s', $password],
    ];
    ['record' => $record, 'error' => $error] = selectOne($query, $args);
    if ($error) {
        return ['error' => $error];
    }
    if (!$record) {
        return ['error' => "Contraseña incorrecta"];
    }
    return $record;
}