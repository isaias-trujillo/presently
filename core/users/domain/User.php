<?php

final class User
{
    public int $id;
    public string $email;
    public string $password;
    public Rol $rol;

    public function __construct(int $id, string $email, string $password, Rol $rol)
    {
        $this->id = $id;
        $this->email = $email;
        $this->password = $password;
        $this->rol = $rol;
    }

    public function isAdmin(): bool
    {
        return $this->rol->name === 'admin';
    }

    public function isTeacher(): bool
    {
        return $this->rol->name === 'profesor';
    }
}