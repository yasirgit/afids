<?php

/**
 * sfWidgetmyFormInputCheckbox
 * fixed bug of sfWidgetFormInputCheckbox
 * 
 * @package    angelflight
 * @subpackage lib
 * @author     Ganbolor found from internet :)
 * @version    SVN: $Id: sfPropelFormTemplate.php 10377 2008-07-21 07:10:32Z dwhittle $
 */

class sfWidgetAfidsFormInputCheckbox extends sfWidgetFormInputCheckbox
{
 /**
 * Override render method due to symfony bug (http://trac.symfony-project.org/ticket/3917)
 */
 public function render($name, $value = null, $attributes = array(), $errors = array())
 {
 if (!is_null($value) && $value !== false && $value != 0)
 {
 $attributes['checked'] = 'checked';
 } 

 if (!isset($attributes['value']) && !is_null($this->getOption('value_attribute_value'))) {
 $attributes['value'] = $this->getOption('value_attribute_value');
 }

 return parent::render($name, null, $attributes, $errors);
 }
}