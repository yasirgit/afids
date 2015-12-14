<?php

/**
 * validatorDateTimeCustom validates datetime. It also converts the input value to a valid date.
 *
 * @package    angelflight
 * @subpackage validator
 * @author     Ariunbayar Baterdene <ariunbayar.b@gmail.com>
 */
class validatorDateTimeCustom extends sfValidatorBase
{
  /**
   * Configures the current validator.
   *
   * Available options:
   *
   *  * date_format:             A regular expression that dates must match
   *  * date_output:             The format to use when returning a date (default to Y-m-d)
   *  * datetime_output:         The format to use when returning a date with time (default to Y-m-d H:i:s)
   *  * max:                     The maximum date allowed (as a timestamp)
   *  * min:                     The minimum date allowed (as a timestamp)
   *  * date_format_range_error: The date format to use when displaying an error for min/max (default to d/m/Y H:i:s)
   *
   * Available error codes:
   *
   *  * bad_format
   *  * min
   *  * max
   *
   * @param array $options    An array of options
   * @param array $messages   An array of error messages
   *
   * @see sfValidatorBase
   */
  protected function configure($options = array(), $messages = array())
  {
    $this->addMessage('bad_format', '"%value%" does not match the date format (%date_format%).');
    $this->addMessage('max', 'The date must be before %max%.');
    $this->addMessage('min', 'The date must be after %min%.');

    $this->addOption('date_format', null);
    $this->addOption('date_output', 'Y-m-d');
    $this->addOption('datetime_output', 'Y-m-d H:i');
    $this->addOption('min', null);
    $this->addOption('max', null);
    $this->addOption('date_format_range_error', 'd/m/Y H:i');
  }

  /**
   * @see sfValidatorBase
   */
  protected function doClean($value)
  {
    $clean = $this->convertDateArrayToTimestamp($value);

    if ($this->hasOption('max') && $clean > $this->getOption('max'))
    {
      throw new sfValidatorError($this, 'max', array('value' => $value, 'max' => date($this->getOption('date_format_range_error'), $this->getOption('max'))));
    }

    if ($this->hasOption('min') && $clean < $this->getOption('min'))
    {
      throw new sfValidatorError($this, 'min', array('value' => $value, 'min' => date($this->getOption('date_format_range_error'), $this->getOption('min'))));
    }

    return $clean === $this->getEmptyValue() ? $clean : date($this->getOption('datetime_output'), $clean);
  }

  /**
   * Converts an array representing a date to a timestamp.
   *
   * The array can contains the following keys: date, hour, minute, second
   *
   * @param  array $value  An array of date elements
   *
   * @return int A timestamp
   */
  protected function convertDateArrayToTimestamp($value)
  {
    // all elements must be empty or a number
    foreach (array('hour', 'minute', 'second') as $key)
    {
      if (isset($value[$key]) && !preg_match('#^\d+$#', $value[$key]) && !empty($value[$key]))
      {
        throw new sfValidatorError($this, 'invalid', array('value' => $value));
      }
    }
    
    // if one date value is empty, all others must be empty too
    $empties = (!isset($value['date']) || !$value['date'] ? 1 : 0);
    if (1 == $empties)
    {
      return $this->getEmptyValue();
    }

    $clean = strtotime($value['date'].' '.$value['hour'].':'.$value['minute'].':00 '.$value['period']);

    return $clean;
  }

  protected function isValueSet($values, $key)
  {
    return isset($values[$key]) && !in_array($values[$key], array(null, ''), true);
  }

  /**
   * @see sfValidatorBase
   */
  protected function isEmpty($value)
  {
    if (is_array($value))
    {
      $filtered = array_filter($value);

      return empty($filtered);
    }

    return parent::isEmpty($value);
  }
}
