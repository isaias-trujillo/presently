<?php

namespace core\auth\domain;
final class AuthUser
{
    public function __construct(private string $email, private string $password, private int $rol)
    {
    }

    public function passwordMatches(string $password): bool
    {
        //return PasswordEncrypt::verify($password, $this->password);
        return $this->password === $password;
    }

    public function email(): string
    {
        return $this->email;
    }

    public function rol(): int
    {
        return $this->rol;
    }
}