<?php

namespace core\shared\domain;

use Exception;

final class Enigma
{
    private const ciphering = "AES-128-CTR";
    private const options = 0;
    private const key = 'hf4dZs9fPjtbXGB8';
    private const iv = 'VSUfoiT5DsnQh4OF';

    public static function encrypt(string $text): string
    {
        return openssl_encrypt($text, self::ciphering, self::key, self::options, self::iv);
    }

    public static function decrypt(string $text): string
    {
        return openssl_decrypt($text, self::ciphering, self::key, self::options, self::iv);
    }

    public static function verify(string $text, string $hash): string
    {
        return self::encrypt($text) === $hash;
    }
}