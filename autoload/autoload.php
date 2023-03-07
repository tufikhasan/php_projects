<?php
spl_autoload_register( function ( $name ) {
    $path = str_replace( 'property\\', '', strtolower( $name ) ) . '.php';
    $path = str_replace( '\\', DIRECTORY_SEPARATOR, $path );
    include_once ( $path );
} );