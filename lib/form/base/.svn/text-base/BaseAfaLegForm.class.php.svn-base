<?php

/**
 * AfaLeg form base class.
 *
 * @package    angelflight
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfPropelFormGeneratedTemplate.php 16976 2009-04-04 12:47:44Z fabien $
 */
class BaseAfaLegForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'                 => new sfWidgetFormInputHidden(),
      'pilot_name'         => new sfWidgetFormInput(),
      'day_phone'          => new sfWidgetFormInput(),
      'night_phone'        => new sfWidgetFormInput(),
      'fax_phone'          => new sfWidgetFormInput(),
      'aircraft_id'        => new sfWidgetFormPropelChoice(array('model' => 'Aircraft', 'add_empty' => true)),
      'n_number'           => new sfWidgetFormInput(),
      'aircraft_color'     => new sfWidgetFormInput(),
      'etd'                => new sfWidgetFormInput(),
      'eta'                => new sfWidgetFormInput(),
      'afa_org_id'         => new sfWidgetFormPropelChoice(array('model' => 'AfaOrg', 'add_empty' => true)),
      'pilot_mobile_phone' => new sfWidgetFormInput(),
    ));

    $this->setValidators(array(
      'id'                 => new sfValidatorPropelChoice(array('model' => 'MissionLeg', 'column' => 'id', 'required' => false)),
      'pilot_name'         => new sfValidatorString(array('max_length' => 50, 'required' => false)),
      'day_phone'          => new sfValidatorString(array('max_length' => 16, 'required' => false)),
      'night_phone'        => new sfValidatorString(array('max_length' => 16, 'required' => false)),
      'fax_phone'          => new sfValidatorString(array('max_length' => 16, 'required' => false)),
      'aircraft_id'        => new sfValidatorPropelChoice(array('model' => 'Aircraft', 'column' => 'id', 'required' => false)),
      'n_number'           => new sfValidatorString(array('max_length' => 8, 'required' => false)),
      'aircraft_color'     => new sfValidatorString(array('max_length' => 20, 'required' => false)),
      'etd'                => new sfValidatorString(array('max_length' => 15, 'required' => false)),
      'eta'                => new sfValidatorString(array('max_length' => 15, 'required' => false)),
      'afa_org_id'         => new sfValidatorPropelChoice(array('model' => 'AfaOrg', 'column' => 'id', 'required' => false)),
      'pilot_mobile_phone' => new sfValidatorInteger(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('afa_leg[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'AfaLeg';
  }


}
