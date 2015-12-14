<?php

/**
 * RpNewMemberStatus form base class.
 *
 * @package    angelflight
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfPropelFormGeneratedTemplate.php 16976 2009-04-04 12:47:44Z fabien $
 */
class BaseRpNewMemberStatusForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'firstName'         => new sfWidgetFormInput(),
      'lastName'          => new sfWidgetFormInput(),
      'joinDate'          => new sfWidgetFormInput(),
      'flightStatus'      => new sfWidgetFormInput(),
      'insuranceReceived' => new sfWidgetFormInput(),
      'badgeMade'         => new sfWidgetFormInput(),
      'notebookSent'      => new sfWidgetFormInput(),
      'joinDateSort'      => new sfWidgetFormDate(),
      'wing_id'           => new sfWidgetFormInput(),
      'email'             => new sfWidgetFormInput(),
      'id'                => new sfWidgetFormInputHidden(),
    ));

    $this->setValidators(array(
      'firstName'         => new sfValidatorString(array('max_length' => 40)),
      'lastName'          => new sfValidatorString(array('max_length' => 40)),
      'joinDate'          => new sfValidatorString(array('max_length' => 10, 'required' => false)),
      'flightStatus'      => new sfValidatorString(array('max_length' => 20)),
      'insuranceReceived' => new sfValidatorString(array('max_length' => 10, 'required' => false)),
      'badgeMade'         => new sfValidatorString(array('max_length' => 10, 'required' => false)),
      'notebookSent'      => new sfValidatorString(array('max_length' => 10, 'required' => false)),
      'joinDateSort'      => new sfValidatorDate(),
      'wing_id'           => new sfValidatorInteger(array('required' => false)),
      'email'             => new sfValidatorString(array('max_length' => 80, 'required' => false)),
      'id'                => new sfValidatorPropelChoice(array('model' => 'RpNewMemberStatus', 'column' => 'id', 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('rp_new_member_status[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'RpNewMemberStatus';
  }


}
