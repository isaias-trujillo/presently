<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/presently-react-php/src/api/database/mysql/queries/select.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/presently-react-php/src/api/controllers/students/buildStudent.php';

function getStudentById(string $id): array
{
    $query = "select * from estudiantes where id=?";
    $args = [
        ['i', $id]
    ];
    ['record' => $record, 'error' => $error] = selectOne($query, $args);
    if ($error) {
        return ['error' => $error];
    }
    if (!$record) {
        return ['error' => "El estudiante no existe"];
    }
    return buildStudent($record);
}