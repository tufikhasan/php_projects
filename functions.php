<?php
function displayKey( $key ) {
    printf( "value=%s", $key );
}
function encodeData( $key, $originalData ) {
    $originalKey = "abcdefghijklmnopqrstuvwxyz1234567890ABCDEFGHIJKLMNOPQRSTUVWXYZ*&^%#@!?~";
    $result = '';
    $len = strlen( $originalData );
    for ( $i = 0; $i < $len; $i++ ) {
        $cur = $originalData[$i];
        $position = strpos( $originalKey, $cur );
        if ( $position !== false ) {
            $result .= $key[$position];
        } else {
            $result .= $cur;
        }
    }
    return $result;
}
function decodeData( $key, $originalData ) {
    $originalKey = "abcdefghijklmnopqrstuvwxyz1234567890ABCDEFGHIJKLMNOPQRSTUVWXYZ*&^%#@!?~";
    $result = '';
    $len = strlen( $originalData );
    for ( $i = 0; $i < $len; $i++ ) {
        $cur = $originalData[$i];
        $position = strpos( $key, $cur );
        if ( $position !== false ) {
            $result .= $originalKey[$position];
        } else {
            $result .= $cur;
        }
    }
    return $result;
}