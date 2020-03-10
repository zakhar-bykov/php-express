<?php

namespace Express;

require( __DIR__ . '/module/Request.php' );
require( __DIR__ . '/Router.php' );


class Application extends Router {
    private $request;

    public function listen() {
        $this -> request = Request();

        $this -> route();
    }

    private function route() {
        foreach( array_reverse( $this -> route_rules['priority'] ) as $key => $rule ) {
            if ( $rule['uri']['request'] === $this -> request['uri'] ) {
                if ( $rule['method'] === $_SERVER['REQUEST_METHOD'] || $rule['method'] === 'ALL') {
                    call_user_func( $rule['callback'] );
                    break;
                }
            }
        }
    }
}

?>