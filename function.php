<?php

function generatePassword($length = 10, $upperCase = true, $numbers = true, $special = true)
{
    // Define character sets
    $upperCaseChars = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
    $numberChars = "0123456789";
    $specialChars = "!@#$%^&*()_-=+{}[]<>?";

    $allowPass = "abcdefghijklmnopqrstuvwxyz";

    if ($upperCase) {
        $allowPass .= $upperCaseChars;
    }
    if ($numbers) {
        $allowPass .= $numberChars;
    }
    if ($special) {
        $allowPass .= $specialChars;
    }
    $randomPass = str_shuffle($allowPass);
    return substr($randomPass, 0, $length);
}
