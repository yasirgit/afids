<?php

/**
 * MissionType form base class.
 *
 * @package    angelflight
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfPropelFormGeneratedTemplate.php 16976 2009-04-04 12:47:44Z fabien $
 */
class BaseMissionTypeForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'                             => new sfWidgetFormInputHidden(),
      'name'                           => new sfWidgetFormInput(),
      'stat_count'                     => new sfWidgetFormInput(),
      'color'                          => new sfWidgetFormInput(),
      'user_filter_mission_types_list' => new sfWidgetFormPropelChoiceMany(array('model' => 'UserFilter')),
    ));

    $this->setValidators(array(
      'id'                             => new sfValidatorPropelChoice(array('model' => 'MissionType', 'column' => 'id', 'required' => false)),
      'name'                           => new sfValidatorString(array('max_length' => 40)),
      'stat_count'                     => new sfValidatorInteger(array('required' => false)),
      'color'                          => new sfValidatorString(array('max_length' => 25, 'required' => false)),
      'user_filter_mission_types_list' => new sfValidatorPropelChoiceMany(array('model' => 'UserFilter', 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('mission_type[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'MissionType';
  }


  public function updateDefaultsFromObject()
  {
    parent::updateDefaultsFromObject();

    if (isset($this->widgetSchema['user_filter_mission_types_list']))
    {
      $values = array();
      foreach ($this->object->getUserFilterMissionTypess() as $obj)
      {
        $values[] = $obj->getUserFilterId();
      }

      $this->setDefault('user_filter_mission_types_list', $values);
    }

  }

  protected function doSave($con = null)
  {
    parent::doSave($con);

    $this->saveUserFilterMissionTypesList($con);
  }

  public function saveUserFilterMissionTypesList($con = null)
  {
    if (!$this->isValid())
    {
      throw $this->getErrorSchema();
    }

    if (!isset($this->widgetSchema['user_filter_mission_types_list']))
    {
      // somebody has unset this widget
      return;
    }

    if (is_null($con))
    {
      $con = $this->getConnection();
    }

    $c = new Criteria();
    $c->add(UserFilterMissionTypesPeer::MISSION_TYPE_ID, $this->object->getPrimaryKey());
    UserFilterMissionTypesPeer::doDelete($c, $con);

    $values = $this->getValue('user_filter_mission_types_list');
    if (is_array($values))
    {
      foreach ($values as $value)
      {
        $obj = new UserFilterMissionTypes();
        $obj->setMissionTypeId($this->object->getPrimaryKey());
        $obj->setUserFilterId($value);
        $obj->save();
      }
    }
  }

}
