<?php

namespace Express;

function Request() {
    $request = [];

    if ( isset( $_SERVER ) ) {
        $request = [
            'host'               => $_SERVER['HTTP_HOST'],
            'port'               => $_SERVER['SERVER_PORT'],
            'protocol'           => $_SERVER['REQUEST_SCHEME'],
            'request_method'     => $_SERVER['REQUEST_METHOD'],
            'script_filename'    => $_SERVER['SCRIPT_FILENAME'],
            'remote_addr'        => $_SERVER['REMOTE_ADDR'],
            'uri'                => $_SERVER['REQUEST_URI'],
            'request_time'       => $_SERVER['REQUEST_TIME'],
            'request_time_float' => $_SERVER['REQUEST_TIME_FLOAT'],
        ];
    }

    if ( isset( $_FILES  ) ) $request['files'] = $_FILES;
    if ( isset( $_COOKIE ) ) $request['cookies'] = $_COOKIE;

    return $request;
}

?>