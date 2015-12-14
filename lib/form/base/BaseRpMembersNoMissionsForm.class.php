<?php

/**
 * RpMembersNoMissions form base class.
 *
 * @package    angelflight
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfPropelFormGeneratedTemplate.php 16976 2009-04-04 12:47:44Z fabien $
 */
class BaseRpMembersNoMissionsForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'firstName'    => new sfWidgetFormInput(),
      'lastName'     => new sfWidgetFormInput(),
      'county'       => new sfWidgetFormInput(),
      'zipcode'      => new sfWidgetFormInput(),
      'memberAC'     => new sfWidgetFormInput(),
      'joinDate'     => new sfWidgetFormInput(),
      'orientedDate' => new sfWidgetFormInput(),
      'joinDateSort' => new sfWidgetFormDate(),
      'wing_id'      => new sfWidgetFormInput(),
      'email'        => new sfWidgetFormInput(),
      'id'           => new sfWidgetFormInputHidden(),
    ));

    $this->setValidators(array(
      'firstName'    => new sfValidatorString(array('max_length' => 40)),
      'lastName'     => new sfValidatorString(array('max_length' => 40)),
      'county'       => new sfValidatorString(array('max_length' => 30, 'required' => false)),
      'zipcode'      => new sfValidatorString(array('max_length' => 30, 'required' => false)),
      'memberAC'     => new sfValidatorString(array('max_length' => 3, 'required' => false)),
      'joinDate'     => new sfValidatorString(array('max_length' => 10, 'required' => false)),
      'orientedDate' => new sfValidatorString(array('max_length' => 10, 'required' => false)),
      'joinDateSort' => new sfValidatorDate(),
      'wing_id'      => new sfValidatorInteger(array('required' => false)),
      'email'        => new sfValidatorString(array('max_length' => 80, 'required' => false)),
      'id'           => new sfValidatorPropelChoice(array('model' => 'RpMembersNoMissions', 'column' => 'id', 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('rp_members_no_missions[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'RpMembersNoMissions';
  }


}
