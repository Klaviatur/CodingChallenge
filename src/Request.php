<?php

namespace CodingChallenge;

class Request
{
    public readonly string $method;

    public function __construct()
    {
        $this->method = $_SERVER['REQUEST_METHOD'] === 'POST'
            ? 'post'
            : 'get';
    }

    public function input(string $key): ?string
    {
        if (array_key_exists($key, $_GET))
            return htmlspecialchars($_GET[$key]);
        if (array_key_exists($key, $_POST))
            return htmlspecialchars($_POST[$key]);
        return null;
    }
}
