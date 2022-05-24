<?php

/**
 * Absolute path to the JSONL database file.
 *
 * @link https://jsonlines.org/
 * @param $filename
 * @return string
 */
function db_path(string $filename): string
{
    return __DIR__.'/../database/'.$filename.".jsonl";
}

/**
 * @param mixed ...$vars
 * @return void
 */
function dump(mixed ...$vars): void
{
    echo "<pre>";
    foreach ($vars as $var)
        print_r($var);
    echo "</pre>";
}

/**
 * @param mixed ...$vars
 * @return void
 */
function dd(mixed ...$vars): void
{
    dump(...$vars);
    exit(1);
}

/**
 * @param string $template
 * @param array $vars
 * @return void
 * @throws Exception
 */
function render(string $template, array $vars = []): void
{
    $templatePath = __DIR__."/../views/".$template.".php";
    if (!file_exists($templatePath))
        throw new \Exception('Template file does not exist!');
    extract($vars);

    require_once __DIR__.'/../views/layout/top.php';
    require_once $templatePath;
    require_once __DIR__.'/../views/layout/bottom.php';
}

/**
 * @param string|null $string
 * @param int $maxLength
 * @return string
 */
function limitString(?string $string, int $maxLength = 16): string
{
    $string = $string ?? '';
    $separator = '...';
    if (strlen($string) > $maxLength)
        return substr($string, 0, $maxLength - strlen($separator)).$separator;
    return $string;
}
