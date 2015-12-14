<?php

/**
 * EmailTracking form base class.
 *
 * @package    angelflight
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfPropelFormGeneratedTemplate.php 16976 2009-04-04 12:47:44Z fabien $
 */
class BaseEmailTrackingForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'            => new sfWidgetFormInputHidden(),
      'track_date'    => new sfWidgetFormDateTime(),
      'send_date'     => new sfWidgetFormDateTime(),
      'letter_id'     => new sfWidgetFormPropelChoice(array('model' => 'EmailLetter', 'add_empty' => true)),
      'rec_count'     => new sfWidgetFormInput(),
      'afids_user_id' => new sfWidgetFormInput(),
    ));

    $this->setValidators(array(
      'id'            => new sfValidatorPropelChoice(array('model' => 'EmailTracking', 'column' => 'id', 'required' => false)),
      'track_date'    => new sfValidatorDateTime(array('required' => false)),
      'send_date'     => new sfValidatorDateTime(array('required' => false)),
      'letter_id'     => new sfValidatorPropelChoice(array('model' => 'EmailLetter', 'column' => 'id', 'required' => false)),
      'rec_count'     => new sfValidatorInteger(array('required' => false)),
      'afids_user_id' => new sfValidatorInteger(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('email_tracking[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'EmailTracking';
  }


}
