<?php

function getLang( array $request, $default ) {
  return
    !empty( $request['get']['lang'] ) ? $get['get']['lang'] :
      (!empty( $request['cookie']['lang'] ) ? $request['cookie']['lang'] :
        (!empty( $request['session']['lang'] ) ? $request['session']['lang'] :
          (!empty( $request['server']['HTTP_ACCEPT_LANGUAGE'] ) ? substr($request['server']['HTTP_ACCEPT_LANGUAGE'], 0, 2) :
            $default)));
}

if( session_status() !== PHP_SESSION_ACTIVE || session_status() === PHP_SESSION_NONE ) { // @session_start();
  session_start();
}

$request = array(
  'get'     => $_GET,
  'cookie'  => $_COOKIE,
  'session' => $_SESSION,
  'server'  => $_SERVER
);

$name = $_GET['name'] ?? 'Guest';
$lang = getLang($request, 'en');
// $lang = getLang($_GET, $_COOKIE, $_SESSION, $_SERVER, 'en');

header('X-Developer: Vovan4igg');
echo 'Hello there: ' . $name . '! Your lang is: ' . $lang . PHP_EOL;