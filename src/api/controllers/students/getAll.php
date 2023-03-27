<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/presently-react-php/src/api/database/mysql/queries/select.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/presently-react-php/src/api/controllers/students/buildStudent.php';

function getAllStudents(): array
{
    $query = "select * from estudiantes";
    ['records' => $records, 'error' => $error] = selectAll($query);
    if ($error) {
        return ['error' => $error];
    }
    return array_map('buildStudent', $records ?? []);
}

function getAllStudentsWithWord(string $word) : array
{
    if (!$word || empty(trim($word))) {
        return getAllStudents();
    }
    $query = "select * from estudiantes where lower(codigo) like lower('%$word%') or lower(apellido_materno) like lower('%$word%') or lower(apellido_paterno) like lower('%$word%') or lower(nombres) like lower('%$word%') or lower(dni) like lower('%$word%') or lower(codigo) like lower('%$word%')";
    ['records' => $records, 'error' => $error] = selectAll($query);
    if ($error) {
        return ['error' => $error];
    }
    return array_map('buildStudent', $records ?? []);
}