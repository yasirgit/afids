<?php

/**
 * Companion form base class.
 *
 * @package    angelflight
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfPropelFormGeneratedTemplate.php 16976 2009-04-04 12:47:44Z fabien $
 */
class BaseCompanionForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'                      => new sfWidgetFormInputHidden(),
      'passenger_id'            => new sfWidgetFormPropelChoice(array('model' => 'Passenger', 'add_empty' => false)),
      'name'                    => new sfWidgetFormInput(),
      'relationship'            => new sfWidgetFormInput(),
      'date_of_birth'           => new sfWidgetFormDate(),
      'weight'                  => new sfWidgetFormInput(),
      'companion_phone'         => new sfWidgetFormInput(),
      'companion_phone_comment' => new sfWidgetFormInput(),
      'person_id'               => new sfWidgetFormPropelChoice(array('model' => 'Person', 'add_empty' => false)),
      'mission_companion_list'  => new sfWidgetFormPropelChoiceMany(array('model' => 'Mission')),
    ));

    $this->setValidators(array(
      'id'                      => new sfValidatorPropelChoice(array('model' => 'Companion', 'column' => 'id', 'required' => false)),
      'passenger_id'            => new sfValidatorPropelChoice(array('model' => 'Passenger', 'column' => 'id')),
      'name'                    => new sfValidatorString(array('max_length' => 50, 'required' => false)),
      'relationship'            => new sfValidatorString(array('max_length' => 30, 'required' => false)),
      'date_of_birth'           => new sfValidatorDate(array('required' => false)),
      'weight'                  => new sfValidatorInteger(array('required' => false)),
      'companion_phone'         => new sfValidatorString(array('max_length' => 16, 'required' => false)),
      'companion_phone_comment' => new sfValidatorString(array('max_length' => 40, 'required' => false)),
      'person_id'               => new sfValidatorPropelChoice(array('model' => 'Person', 'column' => 'id')),
      'mission_companion_list'  => new sfValidatorPropelChoiceMany(array('model' => 'Mission', 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('companion[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Companion';
  }


  public function updateDefaultsFromObject()
  {
    parent::updateDefaultsFromObject();

    if (isset($this->widgetSchema['mission_companion_list']))
    {
      $values = array();
      foreach ($this->object->getMissionCompanions() as $obj)
      {
        $values[] = $obj->getMissionId();
      }

      $this->setDefault('mission_companion_list', $values);
    }

  }

  protected function doSave($con = null)
  {
    parent::doSave($con);

    $this->saveMissionCompanionList($con);
  }

  public function saveMissionCompanionList($con = null)
  {
    if (!$this->isValid())
    {
      throw $this->getErrorSchema();
    }

    if (!isset($this->widgetSchema['mission_companion_list']))
    {
      // somebody has unset this widget
      return;
    }

    if (is_null($con))
    {
      $con = $this->getConnection();
    }

    $c = new Criteria();
    $c->add(MissionCompanionPeer::COMPANION_ID, $this->object->getPrimaryKey());
    MissionCompanionPeer::doDelete($c, $con);

    $values = $this->getValue('mission_companion_list');
    if (is_array($values))
    {
      foreach ($values as $value)
      {
        $obj = new MissionCompanion();
        $obj->setCompanionId($this->object->getPrimaryKey());
        $obj->setMissionId($value);
        $obj->save();
      }
    }
  }

}
