<?php

/**
 * Camp form base class.
 *
 * @package    angelflight
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfPropelFormGeneratedTemplate.php 16976 2009-04-04 12:47:44Z fabien $
 */
class BaseCampForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'                    => new sfWidgetFormInputHidden(),
      'agency_id'             => new sfWidgetFormPropelChoice(array('model' => 'Agency', 'add_empty' => false)),
      'airport_id'            => new sfWidgetFormPropelChoice(array('model' => 'Airport', 'add_empty' => true)),
      'fbo_id'                => new sfWidgetFormPropelChoice(array('model' => 'Fbo', 'add_empty' => true)),
      'camp_name'             => new sfWidgetFormInput(),
      'camp_phone'            => new sfWidgetFormInput(),
      'session'               => new sfWidgetFormInput(),
      'camp_phone_comment'    => new sfWidgetFormInput(),
      'lodging_name'          => new sfWidgetFormInput(),
      'lodging_phone'         => new sfWidgetFormInput(),
      'lodging_phone_comment' => new sfWidgetFormInput(),
      'arrival_date'          => new sfWidgetFormDateTime(),
      'arrival_comment'       => new sfWidgetFormInput(),
      'departure_date'        => new sfWidgetFormDateTime(),
      'departure_comment'     => new sfWidgetFormInput(),
      'comment'               => new sfWidgetFormInput(),
      'grouped_mission'       => new sfWidgetFormInput(),
      'flight_information'    => new sfWidgetFormInput(),
      'camp_passenger_list'   => new sfWidgetFormPropelChoiceMany(array('model' => 'Passenger')),
    ));

    $this->setValidators(array(
      'id'                    => new sfValidatorPropelChoice(array('model' => 'Camp', 'column' => 'id', 'required' => false)),
      'agency_id'             => new sfValidatorPropelChoice(array('model' => 'Agency', 'column' => 'id')),
      'airport_id'            => new sfValidatorPropelChoice(array('model' => 'Airport', 'column' => 'id', 'required' => false)),
      'fbo_id'                => new sfValidatorPropelChoice(array('model' => 'Fbo', 'column' => 'id', 'required' => false)),
      'camp_name'             => new sfValidatorString(array('max_length' => 40, 'required' => false)),
      'camp_phone'            => new sfValidatorString(array('max_length' => 16, 'required' => false)),
      'session'               => new sfValidatorString(array('max_length' => 100, 'required' => false)),
      'camp_phone_comment'    => new sfValidatorString(array('max_length' => 40, 'required' => false)),
      'lodging_name'          => new sfValidatorString(array('max_length' => 40, 'required' => false)),
      'lodging_phone'         => new sfValidatorString(array('max_length' => 16, 'required' => false)),
      'lodging_phone_comment' => new sfValidatorString(array('max_length' => 40, 'required' => false)),
      'arrival_date'          => new sfValidatorDateTime(array('required' => false)),
      'arrival_comment'       => new sfValidatorString(array('max_length' => 150, 'required' => false)),
      'departure_date'        => new sfValidatorDateTime(array('required' => false)),
      'departure_comment'     => new sfValidatorString(array('max_length' => 150, 'required' => false)),
      'comment'               => new sfValidatorString(array('max_length' => 500, 'required' => false)),
      'grouped_mission'       => new sfValidatorString(array('max_length' => 5, 'required' => false)),
      'flight_information'    => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'camp_passenger_list'   => new sfValidatorPropelChoiceMany(array('model' => 'Passenger', 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('camp[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Camp';
  }


  public function updateDefaultsFromObject()
  {
    parent::updateDefaultsFromObject();

    if (isset($this->widgetSchema['camp_passenger_list']))
    {
      $values = array();
      foreach ($this->object->getCampPassengers() as $obj)
      {
        $values[] = $obj->getPassengerId();
      }

      $this->setDefault('camp_passenger_list', $values);
    }

  }

  protected function doSave($con = null)
  {
    parent::doSave($con);

    $this->saveCampPassengerList($con);
  }

  public function saveCampPassengerList($con = null)
  {
    if (!$this->isValid())
    {
      throw $this->getErrorSchema();
    }

    if (!isset($this->widgetSchema['camp_passenger_list']))
    {
      // somebody has unset this widget
      return;
    }

    if (is_null($con))
    {
      $con = $this->getConnection();
    }

    $c = new Criteria();
    $c->add(CampPassengerPeer::CAMP_ID, $this->object->getPrimaryKey());
    CampPassengerPeer::doDelete($c, $con);

    $values = $this->getValue('camp_passenger_list');
    if (is_array($values))
    {
      foreach ($values as $value)
      {
        $obj = new CampPassenger();
        $obj->setCampId($this->object->getPrimaryKey());
        $obj->setPassengerId($value);
        $obj->save();
      }
    }
  }

}
