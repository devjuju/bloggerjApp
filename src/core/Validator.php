<?php

declare(strict_types=1);

namespace App\Core;

class Validator
{

    public function isBiggerThan(string $value, int $length): string|bool
    {
        return strlen($value) > $length ? $value : true;
    }


    public function isSmallerThan(string $value, int $length): bool
    {
        return strlen($value) < $length;
    }


    public function isPatternInvalid(string $value): bool
    {
        return !preg_match("/^[A-Za-z '-]+$/", $value);
    }
}
