<?php

use Framework\Http\Request;

chdir(dirname(__DIR__));
require 'vendor/autoload.php';

### initialization

/*$request = new Request();
$request->withQueryParams($_GET);
$request->withParsedBody($_POST);*/

/*$request = (new Request())
  ->withQueryParams($_GET)
  ->withParsedBody($_POST);*/

$request = RequestFactory::fromGlobals();

### action

$name = $request->qetQueryParams()['name'] ?? 'Guest';
header('X-Developer: Vovan4igg');
echo 'Hello there: ' . $name . '!' . PHP_EOL;