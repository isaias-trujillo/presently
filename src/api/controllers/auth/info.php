<?php

include_once $_SERVER['DOCUMENT_ROOT'] . '/presently-react-php/src/api/database/mysql/queries/select.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/presently-react-php/src/api/controllers/auth/exists.php';

function userInfo(string $email, string $rol): array
{
    $exists = user_Exists($email);

    if (isset($exists['error'])) {
        return ['error' => $exists['error']];
    }

    $query = "
                select concat(a.apellido_paterno, ' ' ,a.apellido_materno) as 'lastname' 
                from usuarios u 
                    join administradores a on u.id = a.usuario_id 
                where u.correo = $email 
                  and u.rol_id = ?";
    $args = [
        ['s', $email],
        ['i', $rol],
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