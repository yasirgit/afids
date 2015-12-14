<?php

/**
 * Permission form.
 *
 * @package    angelflight
 * @subpackage form
 * @author     Ariunbayar
 * @version    SVN: $Id: sfPropelFormTemplate.php 10377 2008-07-21 07:10:32Z dwhittle $
 */
class PermissionForm extends BasePermissionForm
{
  public function configure()
  {
    unset($this->widgetSchema['role_permission_list']);
    
    $this->validatorSchema['title'] = new sfValidatorString(array('max_length' => 30), array('required'=> 'Please enter title'));
    
    $this->validatorSchema['code'] = new sfValidatorRegex(
      array('pattern' => '/^[A-z0-9_ ]+$/', 'max_length' => 30),
      array(
        'invalid' => 'Only alphanumeric, space and underscore characters allowed',
        'required'=> 'Please enter code',
      )
    );
    
    $this->validatorSchema->setPostValidator(
      new sfValidatorPropelUnique(
        array('model' => 'Permission', 'column' => array('code')),
        array('invalid' => 'A right with the same "%column%" already exist. Please choose another "%column%"!')
      )
    );
  }
}
