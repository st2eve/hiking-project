<?php
    declare(strict_types=1);
    error_reporting(E_ALL);
    ini_set("display_errors", 1);

    function is_post_request(): bool
    {
        return strtoupper($_SERVER['REQUEST_METHOD']) === 'POST';
    }

    function is_get_request(): bool
    {
        return strtoupper($_SERVER['REQUEST_METHOD']) === 'GET';
    }