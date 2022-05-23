<?php

namespace CodingChallenge;

/**
 *
 */

class Request
{
    public function __construct()
    {

    }

    public function method(): ?string
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST')
            return 'post';
        if ($_SERVER['REQUEST_METHOD'] === 'GET')
            return 'get';
        return null;
    }

    public function input(string $key): ?string
    {
        if (array_key_exists($key, $_GET))
            return $_GET[$key];
        if (array_key_exists($key, $_POST))
            return $_POST[$key];
        return null;
    }
}
