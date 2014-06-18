<?php

class ValidationException extends Exception
{
  public function __construct($msg, Exception $e = null)
  {
    parent::__construct($msg, 0, $e);
  }
}
