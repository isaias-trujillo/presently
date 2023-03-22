<?php

namespace core\auth\infrastructure\database;

include_once $_SERVER['DOCUMENT_ROOT'] . '/presently/core/auth/domain/AuthUser.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/presently/core/auth/domain/UserRepository.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/presently/core/shared/infrastructure/MySql.php';

use core\auth\domain\AuthUser;
use core\auth\domain\UserRepository;
use core\shared\infrastructure\MySql;

final class MysqlUserUserRepository extends MySql implements UserRepository
{
    function search(string $emailOrCode): ?AuthUser
    {
        $connection = $this->connect();
        if (!$connection) {
            return null;
        }
        $query = "select correo, clave, r.id as 'rol' from usuarios join roles r on r.id = usuarios.rol_id where correo = ? or codigo = ?";
        $statement = $connection->prepare($query);
        $statement->bind_param('ss', $emailOrCode, $emailOrCode);
        $statement->execute();
        $result = $statement->get_result();
        $user = $result->fetch_assoc();
        if (!$user) {
            return null;
        }
        ['correo' => $username, 'clave' => $password, 'rol' => $rol] = $user;
        return new AuthUser(
            $username,
            $password,
            $rol
        );
    }

    function verify(string $email, int $rol): bool
    {
        $connection = $this->connect();
        if (!$connection) {
            return false;
        }
        $query = "select id from usuarios where correo = ? and rol_id = ?";
        $statement = $connection->prepare($query);
        $statement->bind_param('si', $email, $rol);
        $statement->execute();
        $result = $statement->get_result();
        $data = $result->fetch_assoc();
        if (!$data) {
            return false;
        }
        ['id' => $id] = $data;
        return $id !== null && $id > 0;
    }
}