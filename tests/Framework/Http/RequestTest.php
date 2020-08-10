<?php

namespace Tests\Framework\Http;

use Framework\Http\Request;
use PHPUnit\Framework\TestCase;

class RequestTest extends TestCase
{
  /*protected function setUp(): void
  {
    parent::setUp();

    $_GET  = array();
    $_POST = array();
  }*/

  public function testEmpty(): void
  {
    $request = new Request();

    self::assertEquals(array(), $request->qetQueryParams());
    self::assertNull($request->qetParsedBody());
  }

  public function testQueryParams(): void
  {
    $request = (new Request())
      ->withQueryParams($data = array(
        'name' => 'John',
        'age'  => 28
      ));

    self::assertEquals($data, $request->qetQueryParams());
    self::assertNull($request->qetParsedBody());
  }

  public function testParsedBody(): void
  {
    $request = (new Request())
      ->withParsedBody($data = array('title' => 'Title'));

    self::assertEquals(array(), $request->qetQueryParams());
    self::assertEquals($data, $request->qetParsedBody());
  }
}