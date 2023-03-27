<?php
function buildStudent(array $record): array
{
    return [
        'id' => $record['id'],
        "mother's lastname" => $record['apellido_paterno'],
        "father's lastname" => $record['apellido_paterno'],
        'name' => $record['nombres'],
        'dni' => $record['dni'],
        'email' => $record['correo'],
    ];
}