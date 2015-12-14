<?php

/**
 * Event form base class.
 *
 * @package    angelflight
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfPropelFormGeneratedTemplate.php 16976 2009-04-04 12:47:44Z fabien $
 */
class BaseEventForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'                    => new sfWidgetFormInputHidden(),
      'event_name'            => new sfWidgetFormInput(),
      'event_date'            => new sfWidgetFormDateTime(),
      'event_time'            => new sfWidgetFormInput(),
      'location'              => new sfWidgetFormInput(),
      'short_desc'            => new sfWidgetFormInput(),
      'long_desc'             => new sfWidgetFormTextarea(),
      'contact_info'          => new sfWidgetFormInput(),
      'email_sent_date'       => new sfWidgetFormDateTime(),
      'online_reservation'    => new sfWidgetFormInput(),
      'adult_cost'            => new sfWidgetFormInput(),
      'child_cost'            => new sfWidgetFormInput(),
      'adult_door_cost'       => new sfWidgetFormInput(),
      'child_door_cost'       => new sfWidgetFormInput(),
      'signup_deadline'       => new sfWidgetFormDateTime(),
      'onsite_signup_ok'      => new sfWidgetFormInput(),
      'max_persons'           => new sfWidgetFormInput(),
      'collect_secure_info'   => new sfWidgetFormInput(),
      'addl_info_fields'      => new sfWidgetFormInput(),
      'addl_info_fields_help' => new sfWidgetFormInput(),
      'event_wings_list'      => new sfWidgetFormPropelChoiceMany(array('model' => 'Wing')),
    ));

    $this->setValidators(array(
      'id'                    => new sfValidatorPropelChoice(array('model' => 'Event', 'column' => 'id', 'required' => false)),
      'event_name'            => new sfValidatorString(array('max_length' => 60)),
      'event_date'            => new sfValidatorDateTime(array('required' => false)),
      'event_time'            => new sfValidatorString(array('max_length' => 30, 'required' => false)),
      'location'              => new sfValidatorString(array('max_length' => 60, 'required' => false)),
      'short_desc'            => new sfValidatorString(array('max_length' => 500, 'required' => false)),
      'long_desc'             => new sfValidatorString(array('required' => false)),
      'contact_info'          => new sfValidatorString(array('max_length' => 100, 'required' => false)),
      'email_sent_date'       => new sfValidatorDateTime(array('required' => false)),
      'online_reservation'    => new sfValidatorInteger(array('required' => false)),
      'adult_cost'            => new sfValidatorInteger(array('required' => false)),
      'child_cost'            => new sfValidatorInteger(array('required' => false)),
      'adult_door_cost'       => new sfValidatorInteger(array('required' => false)),
      'child_door_cost'       => new sfValidatorInteger(array('required' => false)),
      'signup_deadline'       => new sfValidatorDateTime(array('required' => false)),
      'onsite_signup_ok'      => new sfValidatorInteger(array('required' => false)),
      'max_persons'           => new sfValidatorInteger(array('required' => false)),
      'collect_secure_info'   => new sfValidatorInteger(array('required' => false)),
      'addl_info_fields'      => new sfValidatorString(array('max_length' => 500, 'required' => false)),
      'addl_info_fields_help' => new sfValidatorString(array('max_length' => 500, 'required' => false)),
      'event_wings_list'      => new sfValidatorPropelChoiceMany(array('model' => 'Wing', 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('event[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Event';
  }


  public function updateDefaultsFromObject()
  {
    parent::updateDefaultsFromObject();

    if (isset($this->widgetSchema['event_wings_list']))
    {
      $values = array();
      foreach ($this->object->getEventWingss() as $obj)
      {
        $values[] = $obj->getWingId();
      }

      $this->setDefault('event_wings_list', $values);
    }

  }

  protected function doSave($con = null)
  {
    parent::doSave($con);

    $this->saveEventWingsList($con);
  }

  public function saveEventWingsList($con = null)
  {
    if (!$this->isValid())
    {
      throw $this->getErrorSchema();
    }

    if (!isset($this->widgetSchema['event_wings_list']))
    {
      // somebody has unset this widget
      return;
    }

    if (is_null($con))
    {
      $con = $this->getConnection();
    }

    $c = new Criteria();
    $c->add(EventWingsPeer::EVENT_ID, $this->object->getPrimaryKey());
    EventWingsPeer::doDelete($c, $con);

    $values = $this->getValue('event_wings_list');
    if (is_array($values))
    {
      foreach ($values as $value)
      {
        $obj = new EventWings();
        $obj->setEventId($this->object->getPrimaryKey());
        $obj->setWingId($value);
        $obj->save();
      }
    }
  }

}
