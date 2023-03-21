<?php

namespace core\shared\domain;
final class PasswordEncrypt
{
    public static function encrypt(string $password): string
    {
        return password_hash($password, PASSWORD_BCRYPT);
    }

    public static function verify($password, $hash): bool
    {
        return password_verify($password, $hash);
    }
}