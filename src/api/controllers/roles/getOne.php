<?php

include_once $_SERVER['DOCUMENT_ROOT'] . '/presently-react-php/src/api/database/mysql/queries/select.php';

function getRolById(?int $id): array
{
    if ($id === null) return ['record' => null, 'error' => "Rol: id is null"];
    if ($id < 1) return ['record' => null, 'error' => "Rol: id must be at least 1"];

    $query = 'select * from roles where id = ?';
    $args = [
        ['i', $id]
    ];
    ['record' => $record, 'error' => $error] = selectOne($query, $args);
    if ($error) {
        return ['error' => $error];
    }
    if (!$record) {
        return ['error' => "Rol with id '$id' don't exists"];
    }
    return $record;
}

function getRolByName(?string $name): array
{
    if ($name == null) return ['record' => null, 'error' => "Rol: name is null"];
    if (empty(trim($name))) return ['record' => null, 'error' => "Rol: name is empty"];
    if (strlen($name) < 3 || strlen($name) > 64) return ['record' => null, 'error' => "Rol: name ${name} is out of range"];

    $query = 'select * from roles where nombre = ?';
    $args = [
        ['s', $name]
    ];
    ['record' => $record, 'error' => $error] = selectOne($query, $args);
    if ($error) {
        return ['error' => $error];
    }
    if (!$record) {
        return ['error' => "Rol with name '$name' don't exists"];
    }
    return $record;
}