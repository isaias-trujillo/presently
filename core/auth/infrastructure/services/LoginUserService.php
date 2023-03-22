<?php

namespace core\auth\infrastructure\services;

include_once $_SERVER['DOCUMENT_ROOT'] . '/presently/core/auth/application/UserLogger.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/presently/core/auth/infrastructure/database/MysqlUserUserRepository.php';

use core\auth\application\UserLogger;
use core\auth\infrastructure\database\MysqlUserUserRepository;

final class LoginUserService
{
    private UserLogger $userLogger;

    public function __construct()
    {
        $repository = new MysqlUserUserRepository();
        $this->userLogger = new UserLogger($repository);
    }

    public function login(string $emailOrCode, string $password): array
    {
        if (!isset($emailOrCode) || empty(trim($emailOrCode))) {
            return [
                'error' => 'Correo o código requerido',
                'user' => null
            ];
        }
        if (!isset($password) || empty(trim($password))) {
            return [
                'error' => 'Contraseña requerida',
                'user' => null
            ];
        }
        return $this->userLogger->login($emailOrCode, $password);
    }

    public function verify(string $encryptedEmail, string $encryptedRol): array
    {
        if (!isset($encryptedEmail) || empty(trim($encryptedEmail))) {
            return [
                'error' => 'invalid email'
            ];
        }
        if (!isset($encryptedRol) || empty(trim($encryptedRol))) {
            return [
                'error' => 'invalid rol'
            ];
        }
        return $this->userLogger->verify($encryptedEmail, $encryptedRol);
    }

    public function isAdmin(string $encryptedRol): bool
    {
        if (!isset($encryptedRol) || empty(trim($encryptedRol))) {
            return false;
        }
        return $this->userLogger->isAdmin($encryptedRol);
    }
}