<?php

/**
 * Finds and returns state name from 2 letter abbreviation
 * @param string $state_code 2 letter state code
 * @return string State name. If not found it will return null value
 */
function get_state($state_code)
{
  $states = sfConfig::get('app_states');
  if (isset($states[strtoupper($state_code)])) {
    return $states[strtoupper($state_code)];
  }
  return null;
}