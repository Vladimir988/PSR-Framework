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

// composer require roave/security-advisories:dev-master --- включить доп защиту от установки устаревших или уязвимых компонентов
// composer dump-autoload --- добавить аутолоад для композера не в папку вендоров
// vendor/bin/phpunit --- запустить тесты phpunits