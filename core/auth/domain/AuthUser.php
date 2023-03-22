<?php

namespace core\auth\domain;
final class AuthUser
{
    private int $rol;
    private string $password;
    private string $email;

    public function __construct(string $email, string $password, int $rol)
    {
        $this->email = $email;
        $this->password = $password;
        $this->rol = $rol;
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