<?php


namespace core\auth\domain;

interface UserRepository
{
    function search(string $emailOrCode): ?AuthUser;
    function verify(string $email, int $rol): bool;
}