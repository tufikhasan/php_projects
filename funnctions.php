<?php
$original = "abcdefghijklmnopqrstuvwxyz0123456789@!#$%^&;:'~";
$key = "l96&~x8m$%fho!bt#:d@epyk5vscw^zr30aqi12u;g74'nj";
function encryptDecrypt( $userInput, $main, $replace ) {
    $result = "";
    for ( $i = 0; $i < strlen( $userInput ); $i++ ) {
        $char = $userInput[$i];
        $position = strpos( $main, $char );
        if ( $position !== false ) {
            $replacement = $replace[$position];
        } else {
            $replacement = $char;
        }
        $result .= $replacement;
    }
    return $result;
}