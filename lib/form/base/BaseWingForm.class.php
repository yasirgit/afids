<?php

/**
 * Wing form base class.
 *
 * @package    angelflight
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfPropelFormGeneratedTemplate.php 16976 2009-04-04 12:47:44Z fabien $
 */
class BaseWingForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'                      => new sfWidgetFormInputHidden(),
      'name'                    => new sfWidgetFormInput(),
      'newsletter_abbreviation' => new sfWidgetFormInput(),
      'display_name'            => new sfWidgetFormInput(),
      'state'                   => new sfWidgetFormInput(),
      'event_wings_list'        => new sfWidgetFormPropelChoiceMany(array('model' => 'Event')),
    ));

    $this->setValidators(array(
      'id'                      => new sfValidatorPropelChoice(array('model' => 'Wing', 'column' => 'id', 'required' => false)),
      'name'                    => new sfValidatorString(array('max_length' => 30)),
      'newsletter_abbreviation' => new sfValidatorString(array('max_length' => 20, 'required' => false)),
      'display_name'            => new sfValidatorString(array('max_length' => 25, 'required' => false)),
      'state'                   => new sfValidatorString(array('max_length' => 2, 'required' => false)),
      'event_wings_list'        => new sfValidatorPropelChoiceMany(array('model' => 'Event', 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('wing[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Wing';
  }


  public function updateDefaultsFromObject()
  {
    parent::updateDefaultsFromObject();

    if (isset($this->widgetSchema['event_wings_list']))
    {
      $values = array();
      foreach ($this->object->getEventWingss() as $obj)
      {
        $values[] = $obj->getEventId();
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
    $c->add(EventWingsPeer::WING_ID, $this->object->getPrimaryKey());
    EventWingsPeer::doDelete($c, $con);

    $values = $this->getValue('event_wings_list');
    if (is_array($values))
    {
      foreach ($values as $value)
      {
        $obj = new EventWings();
        $obj->setWingId($this->object->getPrimaryKey());
        $obj->setEventId($value);
        $obj->save();
      }
    }
  }

}
