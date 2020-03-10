<?php

namespace Express;


class Router {
    protected $route_rules;   // $router -> get( '/home', function( $req, $res ) => {} )
    protected $use_rules;     // $router -> use( 'view', $path )
    protected $set_rules;     // $router -> set( 'http', true )

    public function __construct() {
        $rules = [
            'priority' => [],
            'ALL' => [],
            'GET' => [],
            'POST' => [],
        ];

        $this -> route_rules = $rules;
        $this -> use_rules   = $rules;
        $this -> set_rules   = $rules;
    }
}

?>