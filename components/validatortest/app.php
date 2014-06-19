<?php

class ValidatorTest extends Factory
{
  static $instancebin;

  public $name;
  public $test;
  public $message;

  public function run($values)
  {
    return call_user_func_array($this->test, $values);
  }

  public function buildMessage($values)
  {
    return vsprintf($this->message, $values);
  }
}
