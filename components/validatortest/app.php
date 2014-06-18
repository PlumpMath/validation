<?php

class ValidatorTest
{
  static $instancebin;

  public $name;
  public $test;
  public $message;

  public function __construct($name, $test, $errormessage)
  {
    $this->name     = $name;
    $this->test     = $test;
    $this->message  = $errormessage;
  }

  public function run($values)
  {
    return call_user_func_array($this->test, $values);
  }

  public function buildMessage($values)
  {
    return vsprintf($this->message, $values);
  }

  static function make($name, $test, $errormessage)
  {
    $me = get_called_class();
    return static::$instancebin[$name] = new $me($name, $test, $errormessage);
  }

  static function get($name)
  {
    return static::$instancebin[$name];
  }
}
