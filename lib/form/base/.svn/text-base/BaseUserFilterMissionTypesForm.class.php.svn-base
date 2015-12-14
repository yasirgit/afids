<?php

/**
 * UserFilterMissionTypes form base class.
 *
 * @package    angelflight
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfPropelFormGeneratedTemplate.php 16976 2009-04-04 12:47:44Z fabien $
 */
class BaseUserFilterMissionTypesForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'user_filter_id'  => new sfWidgetFormInputHidden(),
      'mission_type_id' => new sfWidgetFormInputHidden(),
    ));

    $this->setValidators(array(
      'user_filter_id'  => new sfValidatorPropelChoice(array('model' => 'UserFilter', 'column' => 'id', 'required' => false)),
      'mission_type_id' => new sfValidatorPropelChoice(array('model' => 'MissionType', 'column' => 'id', 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('user_filter_mission_types[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'UserFilterMissionTypes';
  }


}
