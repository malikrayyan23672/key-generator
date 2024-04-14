<?php

function generateKey($length)
{
    $str = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789@#$%";
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $rand = rand(0, strlen($str));
        $randomString .= $str[$rand];
    }

    return $randomString;
}
?>