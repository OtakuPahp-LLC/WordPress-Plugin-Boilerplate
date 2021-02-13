<?php

/**
 * Register autoloader
 */
spl_autoload_register(function($required_file) {

    # Transform file name from class based to file based
    $fixed_name = strtolower( str_ireplace( '_', '-', $required_file ) );
    $file_path = explode( '\\', $fixed_name );
    $last_index = count( $file_path ) - 1;
    $file_name = "class-{$file_path[$last_index]}.php";

    # Get fully qualified path
    $fully_qualified_path =  trailingslashit( dirname(__FILE__) );
    for ( $key = 1; $key < $last_index; $key++ ) {
        $fully_qualified_path .= trailingslashit( $file_path[ $key ] );
    }
    $fully_qualified_path .= $file_name;

    # Include the file
    if ( stream_resolve_include_path($fully_qualified_path) ) {
        include_once $fully_qualified_path;
    }

});