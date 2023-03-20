<?php

interface UserRepository
{
    function save(User $user): void;
    function update(User $user): void;
    function delete(int $id): void;
}