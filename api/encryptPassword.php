<?php
include_once $_SERVER['DOCUMENT_ROOT']."/vendor/autoload.php";

function encrypt($string) {
    $method = "aes-256-ctr";
    $key = "phong123456789phong1234567891707";
    if (in_array($method, openssl_get_cipher_methods()))
    {
        return openssl_encrypt($string, $method, $key);
    }
}

function descrypt($string) {
    $method = "aes-256-ctr";
    $key = "phong123456789phong1234567891707";
    if (in_array($method, openssl_get_cipher_methods()))
    {
        return openssl_decrypt($string, $method, $key);
    }
}