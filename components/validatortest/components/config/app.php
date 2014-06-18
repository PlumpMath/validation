<?php

/**
 *
 * default tests
 *
 */

ValidatorTest::make('in options', function ($value, $options) {
  return in_array($value, $options);
}, '%s is not a valid choice.');

ValidatorTest::make('filled', function ($value) {
  return !!$value;
}, '%s is required.');

ValidatorTest::make('only letters', function ($value) {
  return !!preg_match('/^[a-zA-Z ]+$/', $value);
}, '%s cannot contain numbers or symbols.');
