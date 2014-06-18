<?php

class ValidatorNode
{
  public $input;

  public $test;
  public $params;
  public $passingTest;
  public $failingTest;

  public function __construct($test, $params)
  {
    $this->test = $test;
    $this->params = $params;
  }

  public function run()
  {
    $passes = $this->test->run($this->buildArguments($this->input->value));

    if ($passes)
      return $this->pass();
    else
      return $this->fail();
  }

  public function pass()
  {
    if ($this->passingTest)
      return $this->passingTest->run();
    else
      return true;
  }

  public function fail()
  {
    if ($this->failingTest)
      return $this->failingTest->run();
    else
      throw new ValidationException($this->test->buildMessage($this->input->label));
  }

  public function traverse()
  {
    if ($this->passingTest) {
      return $this->passingTest->traverse();
    } else {
      return $this;
    }
  }

  public function yes($test)
  {
    $this->passingTest = $test;

    return $this;
  }

  public function no($test)
  {
    $this->failingTest = $test;

    return $this;
  }

  public function buildArguments($value)
  {
    if ( ! is_null($this->params)) {
      $values = $this->params;
      array_unshift($values, $value);
    } else {
      $values = [$value];
    }

    return $values;
  }

  public function belongsTo($input)
  {
    return $this->input = $input;
  }
}
