<?php

/**
 * UserFilter form base class.
 *
 * @package    angelflight
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfPropelFormGeneratedTemplate.php 16976 2009-04-04 12:47:44Z fabien $
 */
class BaseUserFilterForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'                             => new sfWidgetFormInputHidden(),
      'person_id'                      => new sfWidgetFormInput(),
      'date_range1'                    => new sfWidgetFormDateTime(),
      'date_range2'                    => new sfWidgetFormDateTime(),
      'day1'                           => new sfWidgetFormInput(),
      'day2'                           => new sfWidgetFormInput(),
      'day3'                           => new sfWidgetFormInput(),
      'day4'                           => new sfWidgetFormInput(),
      'day5'                           => new sfWidgetFormInput(),
      'day6'                           => new sfWidgetFormInput(),
      'day7'                           => new sfWidgetFormInput(),
      'wing'                           => new sfWidgetFormInput(),
      'ident'                          => new sfWidgetFormInput(),
      'city'                           => new sfWidgetFormInput(),
      'zipcode'                        => new sfWidgetFormInput(),
      'state'                          => new sfWidgetFormInput(),
      'orgin'                          => new sfWidgetFormInput(),
      'dest'                           => new sfWidgetFormInput(),
      'is_pilot'                       => new sfWidgetFormInput(),
      'is_ma'                          => new sfWidgetFormInput(),
      'ifr_backup'                     => new sfWidgetFormInput(),
      'filled'                         => new sfWidgetFormInput(),
      'open'                           => new sfWidgetFormInput(),
      'max_passenger'                  => new sfWidgetFormInput(),
      'max_weight'                     => new sfWidgetFormInput(),
      'max_distance'                   => new sfWidgetFormInput(),
      'max_effciency'                  => new sfWidgetFormInput(),
      'availability'                   => new sfWidgetFormInput(),
      'alltype'                        => new sfWidgetFormInput(),
      'user_filter_mission_types_list' => new sfWidgetFormPropelChoiceMany(array('model' => 'MissionType')),
    ));

    $this->setValidators(array(
      'id'                             => new sfValidatorPropelChoice(array('model' => 'UserFilter', 'column' => 'id', 'required' => false)),
      'person_id'                      => new sfValidatorInteger(),
      'date_range1'                    => new sfValidatorDateTime(array('required' => false)),
      'date_range2'                    => new sfValidatorDateTime(array('required' => false)),
      'day1'                           => new sfValidatorString(array('max_length' => 20, 'required' => false)),
      'day2'                           => new sfValidatorString(array('max_length' => 20, 'required' => false)),
      'day3'                           => new sfValidatorString(array('max_length' => 20, 'required' => false)),
      'day4'                           => new sfValidatorString(array('max_length' => 20, 'required' => false)),
      'day5'                           => new sfValidatorString(array('max_length' => 20, 'required' => false)),
      'day6'                           => new sfValidatorString(array('max_length' => 20, 'required' => false)),
      'day7'                           => new sfValidatorString(array('max_length' => 20, 'required' => false)),
      'wing'                           => new sfValidatorString(array('max_length' => 50, 'required' => false)),
      'ident'                          => new sfValidatorString(array('max_length' => 4, 'required' => false)),
      'city'                           => new sfValidatorString(array('max_length' => 50, 'required' => false)),
      'zipcode'                        => new sfValidatorString(array('max_length' => 10, 'required' => false)),
      'state'                          => new sfValidatorString(array('max_length' => 10, 'required' => false)),
      'orgin'                          => new sfValidatorInteger(array('required' => false)),
      'dest'                           => new sfValidatorInteger(array('required' => false)),
      'is_pilot'                       => new sfValidatorInteger(array('required' => false)),
      'is_ma'                          => new sfValidatorInteger(array('required' => false)),
      'ifr_backup'                     => new sfValidatorInteger(array('required' => false)),
      'filled'                         => new sfValidatorInteger(array('required' => false)),
      'open'                           => new sfValidatorInteger(array('required' => false)),
      'max_passenger'                  => new sfValidatorInteger(array('required' => false)),
      'max_weight'                     => new sfValidatorInteger(array('required' => false)),
      'max_distance'                   => new sfValidatorInteger(array('required' => false)),
      'max_effciency'                  => new sfValidatorInteger(array('required' => false)),
      'availability'                   => new sfValidatorInteger(array('required' => false)),
      'alltype'                        => new sfValidatorInteger(array('required' => false)),
      'user_filter_mission_types_list' => new sfValidatorPropelChoiceMany(array('model' => 'MissionType', 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('user_filter[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'UserFilter';
  }


  public function updateDefaultsFromObject()
  {
    parent::updateDefaultsFromObject();

    if (isset($this->widgetSchema['user_filter_mission_types_list']))
    {
      $values = array();
      foreach ($this->object->getUserFilterMissionTypess() as $obj)
      {
        $values[] = $obj->getMissionTypeId();
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
    $c->add(UserFilterMissionTypesPeer::USER_FILTER_ID, $this->object->getPrimaryKey());
    UserFilterMissionTypesPeer::doDelete($c, $con);

    $values = $this->getValue('user_filter_mission_types_list');
    if (is_array($values))
    {
      foreach ($values as $value)
      {
        $obj = new UserFilterMissionTypes();
        $obj->setUserFilterId($this->object->getPrimaryKey());
        $obj->setMissionTypeId($value);
        $obj->save();
      }
    }
  }

}
