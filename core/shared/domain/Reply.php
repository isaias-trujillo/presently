<?php

final class Reply
{
    private mixed $value;
    private ?string $error;

    private function __construct(mixed $value, string $error)
    {
        $this->value = $value;
        $this->error = $error;
    }

    public static function match(bool $condition, mixed $value, string $error): Reply
    {
        if (!$condition) {
            return new Reply(null, $error);
        }
        return new Reply($value, null);
    }

    public static function success(mixed $value): Reply
    {
        return new Reply($value, null);
    }

    public static function failure(string $error): Reply
    {
        return new Reply(null, $error);
    }

    public function value(): mixed
    {
        return $this->value;
    }

    public function error(): ?string
    {
        return $this->error;
    }
}