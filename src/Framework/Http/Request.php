<?php

namespace Framework\Http;

class Request
{
  private $queryParams = array();
  private $parsedBody;

  public function __construct(array $queryParams = array(), $parsedBody = null) {
    $this->$queryParams = $queryParams;
    $this->$parsedBody  = $parsedBody;
  }

  public function qetQueryParams(): array
  {
    return $this->$queryParams;
  }

  public function withQueryParams(array $query): self
  {
    $new = clone $this;
    $new->$queryParams = $query;
    return $new;
  }

  public function qetParsedBody()
  {
    return $this->$parsedBody;
  }

  public function withParsedBody($data): self
  {
    $new = clone $this;
    $new->$parsedBody = $data;
    return $new;
  }

  /*public function qetBody()
  {
    return file_get_contents('php://input');
  }*/
  // public function qetQueryParams() {}
}