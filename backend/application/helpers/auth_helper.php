<?php
defined('BASEPATH') OR exit('No direct script access allowed');

if (!function_exists('hash_password')) {
    function hash_password(string $password): string
    {
        return password_hash($password, PASSWORD_BCRYPT);
    }
}

if (!function_exists('verify_password')) {
    function verify_password(string $password, string $hash): bool
    {
        return password_verify($password, $hash);
    }
}
