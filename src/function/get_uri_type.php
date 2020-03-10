<?php

namespace Express;

function get_uri_type( string $uri ) {
    $special_symbols = [':', '*'];

    if ( strpos( $uri, '==' ) ) return 'mixed';

    if ( array_intersect( $special_symbols, str_split( $uri ) ) ) return 'special_string';

    if( preg_match( "/^\/.+\/[a-z]*$/i", $uri ) ) return 'regexp';

    return 'string';
}

?>