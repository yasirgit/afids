<?php

/**
 * Role form.
 *
 * @package    angelflight
 * @subpackage form
 * @author     Ariunbayar
 * @version    SVN: $Id: sfPropelFormTemplate.php 10377 2008-07-21 07:10:32Z dwhittle $
 */
class RoleForm extends BaseRoleForm
{
  public function configure()
  {
    unset(
      $this->widgetSchema['person_role_list'],
      $this->widgetSchema['role_permission_list']
    );
    
    $this->validatorSchema['title'] = new sfValidatorRegex(
      array('pattern' => '/^[A-z0-9_ ]+$/', 'max_length' => 30),
      array(
        'invalid' => 'Only alphanumeric, space and underscore characters allowed',
        'required'=> 'Please enter role name',
      )
    );
    
    $this->validatorSchema->setPostValidator(
      new sfValidatorPropelUnique(
        array('model' => 'Role', 'column' => array('title')),
        array('invalid' => 'A role with the same "%column%" already exist. Please choose another name!')
      )
    );
  }
}
