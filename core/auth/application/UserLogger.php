<?php

namespace core\auth\application;

include_once $_SERVER['DOCUMENT_ROOT'] . '/presently/core/auth/domain/UserRepository.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/presently/core/shared/domain/Enigma.php';

use core\auth\domain\UserRepository;
use core\shared\domain\Enigma;

final class UserLogger
{
    public function __construct(private UserRepository $repository)
    {

    }

    function login(string $emailOrCode, string $password): array
    {
        $user = $this->repository->search($emailOrCode);
        if (!$user) {
            return [
                'error' => "Usuario no encontrado",
                'user' => null
            ];
        }
        if (!$user->passwordMatches($password)) {
            return [
                'error' => "Clave incorrecta",
                'user' => null
            ];
        }
        return [
            'error' => null,
            'user' => [
                'email' => Enigma::encrypt($user->email()),
                'rol' => Enigma::encrypt($user->rol())
            ]
        ];
    }

    function verify(string $encryptedEmail, string $encryptedRol): array
    {
        $email = Enigma::decrypt($encryptedEmail);
        $rol = Enigma::decrypt($encryptedRol);
        return [
            'verified' => $this->repository->verify($email, $rol),
        ];
    }

    function isAdmin(string $encryptedRol): bool
    {
        return Enigma::verify('1', $encryptedRol);
    }
}