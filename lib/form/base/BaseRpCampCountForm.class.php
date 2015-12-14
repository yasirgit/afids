<?php

/**
 * RpCampCount form base class.
 *
 * @package    angelflight
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfPropelFormGeneratedTemplate.php 16976 2009-04-04 12:47:44Z fabien $
 */
class BaseRpCampCountForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'campID'         => new sfWidgetFormInput(),
      'campName'       => new sfWidgetFormInput(),
      'agencyName'     => new sfWidgetFormInput(),
      'airportState'   => new sfWidgetFormInput(),
      'legCount'       => new sfWidgetFormInput(),
      'cancelledCount' => new sfWidgetFormInput(),
      'approvedCount'  => new sfWidgetFormInput(),
      'missionDate'    => new sfWidgetFormDateTime(),
      'id'             => new sfWidgetFormInputHidden(),
    ));

    $this->setValidators(array(
      'campID'         => new sfValidatorInteger(),
      'campName'       => new sfValidatorString(array('max_length' => 40, 'required' => false)),
      'agencyName'     => new sfValidatorString(array('max_length' => 80, 'required' => false)),
      'airportState'   => new sfValidatorString(array('max_length' => 2, 'required' => false)),
      'legCount'       => new sfValidatorInteger(),
      'cancelledCount' => new sfValidatorInteger(),
      'approvedCount'  => new sfValidatorInteger(),
      'missionDate'    => new sfValidatorDateTime(array('required' => false)),
      'id'             => new sfValidatorPropelChoice(array('model' => 'RpCampCount', 'column' => 'id', 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('rp_camp_count[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'RpCampCount';
  }


}
