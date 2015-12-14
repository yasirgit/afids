<?php

/**
 * RenewalBatch form base class.
 *
 * @package    angelflight
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfPropelFormGeneratedTemplate.php 16976 2009-04-04 12:47:44Z fabien $
 */
class BaseRenewalBatchForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'                      => new sfWidgetFormInputHidden(),
      'renewal_batch_date'      => new sfWidgetFormDateTime(),
      'first_renewal_id'        => new sfWidgetFormInput(),
      'second_renewal_id'       => new sfWidgetFormInput(),
      'third_renewal_id'        => new sfWidgetFormInput(),
      'fourth_renewal_id'       => new sfWidgetFormInput(),
      'missing_form_renewal_id' => new sfWidgetFormInput(),
    ));

    $this->setValidators(array(
      'id'                      => new sfValidatorPropelChoice(array('model' => 'RenewalBatch', 'column' => 'id', 'required' => false)),
      'renewal_batch_date'      => new sfValidatorDateTime(array('required' => false)),
      'first_renewal_id'        => new sfValidatorInteger(array('required' => false)),
      'second_renewal_id'       => new sfValidatorInteger(array('required' => false)),
      'third_renewal_id'        => new sfValidatorInteger(array('required' => false)),
      'fourth_renewal_id'       => new sfValidatorInteger(array('required' => false)),
      'missing_form_renewal_id' => new sfValidatorInteger(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('renewal_batch[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'RenewalBatch';
  }


}
