<?php

/**
 * JWTJP _o/
 *   _____________
 *  /      _      \
 *  [] :: (_) :: []
 *  [] ::::::::: []
 *  [] ::::::::: []
 *  [] ::::::::: []
 *  [] ::::::::: []
 *  [_____________]
 *      I     I
 *      I_   _I
 *       /   \
 *       \   /
 *       (   )
 *       /   \
 *       \___/
*/

require 'bootstrap.php';

try {

    $config = new Respect\Config\Container( 'config/application.ini' );

    $config->application->router->always( 'Accept', array(
        'text/plain'       => $json = new JWTJP\Components\Json,
        'text/json'        => $json,
        'application/json' => $json
    ));

    echo $config->application->router->run();

} catch (Exception $e) {
    error_log($e->getMessage());
    exit('Ooops!');
}