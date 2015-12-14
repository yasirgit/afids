<?php

/**
 * validatorZipcode validates zipcode. It also converts the input value to a valid zipcode.
 *
 * @package    angelflight
 * @subpackage validator
 * @author     Ariunbayar Baterdene <ariunbayar.b@gmail.com>
 */
class validatorZipcode extends sfValidatorBase
{
  /**
   * Configures the current validator.
   *
   * Available options:
   *
   *  * max_length:              The maximum length allowed (as a timestamp)
   *  * min_length:              The minimum length allowed (as a timestamp)
   *
   * Available error codes:
   *
   *  * min_length
   *  * max_length
   *
   * @param array $options    An array of options
   * @param array $messages   An array of error messages
   *
   * @see sfValidatorBase
   */
  protected function configure($options = array(), $messages = array())
  {
    $this->addMessage('max_length', '"%value%" is too long (%max_length% characters max).');
    $this->addMessage('min_length', '"%value%" is too short (%min_length% characters min).');

    $this->addOption('min_length', null);
    $this->addOption('max_length', null);
  }

  /**
   * @see sfValidatorBase
   */
  protected function doClean($value)
  {
    $clean = substr($value, 0, 5);
    $value = substr($value, 5);
    if ($value) {
      if ($value[0] == '-') $value = substr($value, 1);
      $clean .= '-'.$value;
    }

    if (function_exists('mb_strlen'))
      $length =  mb_strlen($clean, $this->getCharset());
    else
      $length = strlen($clean);

    if ($this->hasOption('max_length') && $length > $this->getOption('max_length')){
      throw new sfValidatorError($this, 'max_length', array('value' => $clean, 'max_length' => $this->getOption('max_length')));
    }

    if ($this->hasOption('min_length') && $length < $this->getOption('min_length')){
      throw new sfValidatorError($this, 'min_length', array('value' => $clean, 'min_length' => $this->getOption('min_length')));
    }

    return $clean;
  }
}
