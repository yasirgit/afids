<?php

/**
 * RpDisasterResponseStatus form base class.
 *
 * @package    angelflight
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfPropelFormGeneratedTemplate.php 16976 2009-04-04 12:47:44Z fabien $
 */
class BaseRpDisasterResponseStatusForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'lastName'         => new sfWidgetFormInput(),
      'personName'       => new sfWidgetFormInput(),
      'disasterResponse' => new sfWidgetFormInput(),
      'county'           => new sfWidgetFormInput(),
      'wingID'           => new sfWidgetFormInput(),
      'wingName'         => new sfWidgetFormInput(),
      'flightStatus'     => new sfWidgetFormInput(),
      'id'               => new sfWidgetFormInputHidden(),
    ));

    $this->setValidators(array(
      'lastName'         => new sfValidatorString(array('max_length' => 40)),
      'personName'       => new sfValidatorString(array('max_length' => 82)),
      'disasterResponse' => new sfValidatorString(array('max_length' => 30, 'required' => false)),
      'county'           => new sfValidatorString(array('max_length' => 30, 'required' => false)),
      'wingID'           => new sfValidatorInteger(array('required' => false)),
      'wingName'         => new sfValidatorString(array('max_length' => 30)),
      'flightStatus'     => new sfValidatorString(array('max_length' => 20)),
      'id'               => new sfValidatorPropelChoice(array('model' => 'RpDisasterResponseStatus', 'column' => 'id', 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('rp_disaster_response_status[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'RpDisasterResponseStatus';
  }


}
