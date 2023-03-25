<?php

include_once $_SERVER['DOCUMENT_ROOT'] . '/presently-react-php/src/api/database/mysql/queries/select.php';

function getAllRoles(): array
{
    $query = 'select * from roles';
    ['records' => $records, 'error' => $error] = selectAll($query);
    if ($error) {
        return ['error' => $error];
    }
    return $records;
}

function getRolesByPage(?int $page, ?int $perPage): array
{
    $query = 'select * from roles limit ? offset ?';
    ['records' => $records, 'error' => $error, 'page' => $_page, 'perPage' => $_perPage] = selectByPage($query, $page, $perPage);
    if ($error) {
        return ['error' => $error];
    }
    return [
        'page' => $_page,
        'perPage' => $_perPage,
        'records' => $records
    ];
}