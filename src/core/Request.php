<?php

declare(strict_types=1);

namespace App\Core;

class Request
{

    private array $_post;


    private array $_get;

    public function __construct()
    {
        $this->_post = $_POST;
        $this->_get = $_GET;
    }


    public function post(?string $key = null): mixed
    {
        return $this->checkGlobal($this->_post, $key);
    }

    public function get(?string $key = null): mixed
    {
        return $this->checkGlobal($this->_get, $key);
    }


    private function checkGlobal(array $global, ?string $key = null): mixed
    {
        if ($key !== null) {
            return $global[$key] ?? null;
        }
        return $global;
    }
}
