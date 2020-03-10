<?php

namespace Express;

require( __DIR__ . '/function/get_uri_type.php' );


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


    /**
     * Accepts a rule for 'ALL' requests.
     *
     * @param  string $uri Request example as a string or regular expression.
     * @param  array|function $options_or_callback
     * Example = [
     *   'http-only' => false,
     *   'https-only' => true,
     *   'redirect_to_another_protocol' => true
     * ];
     * @param  function $callback Two arguments are passed
     * ( $request, $response ).
     * @return void
     */
    public function all( $uri, $options_or_callback, ...$callback ) {
        $this -> set_route_rule( 'ALL', $uri, $options_or_callback, $callback );
    }


    /**
     * Accepts a rule for 'GET' requests.
     *
     * @param  string $uri Request example as a string or regular expression.
     * @param  array|function $options_or_callback
     * Example = [
     *   'http-only' => false,
     *   'https-only' => true,
     *   'redirect_to_another_protocol' => true
     * ];
     * @param  function $callback Two arguments are passed
     * ( $request, $response ).
     * @return void
     */
    public function get( $uri, $options_or_callback, ...$callback ) {
        $this -> set_route_rule( 'GET', $uri, $options_or_callback, $callback );
    }


    /**
     * Accepts a rule for 'POST' requests.
     *
     * @param  string $uri Request example as a string or regular expression.
     * @param  array|function $options_or_callback
     * Example = [
     *   'http-only' => false,
     *   'https-only' => true,
     *   'redirect_to_another_protocol' => true
     * ];
     * @param  function $callback Two arguments are passed
     * ( $request, $response ).
     * @return void
     */
    public function post( $uri, $options_or_callback, ...$callback ) {
        $this -> set_route_rule( 'POST', $uri, $options_or_callback, $callback );
    }


    /**
     * Set rules for requests.
     *
     * @param  string $method = ALL || GET || POST.
     * @param  string $uri Request example as a string or regular expression.
     * @param  array|function $options_or_callback
     * Example = [
     *   'http-only' => false,
     *   'https-only' => true,
     *   'redirect_to_another_protocol' => true
     * ];
     * @param  function $callback Two arguments are passed
     * ( $request, $response ).
     * @return void
     */
    protected function set_route_rule( $method, $uri, $options_or_callback, ...$callback ) {
        $rule = [
            'uri' => [
                'request' => '',
                'type' => 'string',
            ],
            'method' => $method,
            'options' => [],
            'callback' => function() {},
        ];

        $rule['uri']['request'] = $uri;
        $rule['uri']['type'] = get_uri_type( $uri );

        if ( is_callable( $options_or_callback ) ) {
            $rule['callback'] = $options_or_callback;
        } else if ( is_callable( $callback ) ) {
            $rule['callback'] = $callback;
        }

        array_push( $this -> route_rules[ $method ], $rule );
        array_push( $this -> route_rules[ 'priority' ], $rule );
    }
}

?>