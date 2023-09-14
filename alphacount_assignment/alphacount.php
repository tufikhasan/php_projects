#! /usr/bin/env php
<?php
$string = $argv[1];
$trimmedString = preg_replace( "/[^a-zA-Z]+/", "", $string );
echo strlen( $trimmedString );
