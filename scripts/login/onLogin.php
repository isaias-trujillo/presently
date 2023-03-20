<?php
$email = $_POST["email"];
$password = $_POST['password'];

if (!isset($email) || empty(trim($email))) {
    echo json_encode([
        'response' => null,
        'hasError' => true,
        'error' => 'Correo requerido'
    ]);
    return;
}

if (!isset($password) || empty(trim($password))) {
    echo json_encode([
        'response' => null,
        'hasError' => true,
        'error' => 'Contraseña requerida'
    ]);
    return;
}

echo json_encode([
    'response' => 'all right',
    'hasError' => false,
    'error' => ''
]);
