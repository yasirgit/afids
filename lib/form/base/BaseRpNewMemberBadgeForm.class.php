<?php

/**
 * RpNewMemberBadge form base class.
 *
 * @package    angelflight
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfPropelFormGeneratedTemplate.php 16976 2009-04-04 12:47:44Z fabien $
 */
class BaseRpNewMemberBadgeForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'applicationID'        => new sfWidgetFormInput(),
      'personID'             => new sfWidgetFormInput(),
      'memberID'             => new sfWidgetFormInput(),
      'externalID'           => new sfWidgetFormInput(),
      'firstName'            => new sfWidgetFormInput(),
      'lastName'             => new sfWidgetFormInput(),
      'email'                => new sfWidgetFormInput(),
      'addressOne'           => new sfWidgetFormInput(),
      'addressTwo'           => new sfWidgetFormInput(),
      'city'                 => new sfWidgetFormInput(),
      'state'                => new sfWidgetFormInput(),
      'zipcode'              => new sfWidgetFormInput(),
      'badgeMade'            => new sfWidgetFormDate(),
      'notebookSent'         => new sfWidgetFormDate(),
      'ed_new_member_notify' => new sfWidgetFormDate(),
      'wn_new_memberN_ntify' => new sfWidgetFormDate(),
      'joinDate'             => new sfWidgetFormDate(),
      'flightStatus'         => new sfWidgetFormInput(),
      'wing_id'              => new sfWidgetFormInput(),
      'joinDateSort'         => new sfWidgetFormDate(),
      'id'                   => new sfWidgetFormInputHidden(),
    ));

    $this->setValidators(array(
      'applicationID'        => new sfValidatorInteger(array('required' => false)),
      'personID'             => new sfValidatorInteger(),
      'memberID'             => new sfValidatorInteger(),
      'externalID'           => new sfValidatorInteger(array('required' => false)),
      'firstName'            => new sfValidatorString(array('max_length' => 40)),
      'lastName'             => new sfValidatorString(array('max_length' => 40)),
      'email'                => new sfValidatorString(array('max_length' => 80, 'required' => false)),
      'addressOne'           => new sfValidatorString(array('max_length' => 40, 'required' => false)),
      'addressTwo'           => new sfValidatorString(array('max_length' => 40, 'required' => false)),
      'city'                 => new sfValidatorString(array('max_length' => 30, 'required' => false)),
      'state'                => new sfValidatorString(array('max_length' => 2, 'required' => false)),
      'zipcode'              => new sfValidatorString(array('max_length' => 30, 'required' => false)),
      'badgeMade'            => new sfValidatorDate(array('required' => false)),
      'notebookSent'         => new sfValidatorDate(array('required' => false)),
      'ed_new_member_notify' => new sfValidatorDate(array('required' => false)),
      'wn_new_memberN_ntify' => new sfValidatorDate(array('required' => false)),
      'joinDate'             => new sfValidatorDate(),
      'flightStatus'         => new sfValidatorString(array('max_length' => 20)),
      'wing_id'              => new sfValidatorInteger(array('required' => false)),
      'joinDateSort'         => new sfValidatorDate(),
      'id'                   => new sfValidatorPropelChoice(array('model' => 'RpNewMemberBadge', 'column' => 'id', 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('rp_new_member_badge[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'RpNewMemberBadge';
  }


}
