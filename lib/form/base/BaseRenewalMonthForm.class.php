<?php

/**
 * RenewalMonth form base class.
 *
 * @package    angelflight
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfPropelFormGeneratedTemplate.php 16976 2009-04-04 12:47:44Z fabien $
 */
class BaseRenewalMonthForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'                      => new sfWidgetFormInputHidden(),
      'renewal_month'           => new sfWidgetFormInput(),
      'renewal_year'            => new sfWidgetFormInput(),
      'first_renewal_id'        => new sfWidgetFormInput(),
      'second_renewal_id'       => new sfWidgetFormInput(),
      'third_renewal_id'        => new sfWidgetFormInput(),
      'fourth_renewal_id'       => new sfWidgetFormInput(),
      'missing_form_renewal_id' => new sfWidgetFormInput(),
      'deletion_date'           => new sfWidgetFormDateTime(),
      'deletion_count'          => new sfWidgetFormInput(),
      'renewal_month_year'      => new sfWidgetFormInput(),
    ));

    $this->setValidators(array(
      'id'                      => new sfValidatorPropelChoice(array('model' => 'RenewalMonth', 'column' => 'id', 'required' => false)),
      'renewal_month'           => new sfValidatorInteger(array('required' => false)),
      'renewal_year'            => new sfValidatorInteger(array('required' => false)),
      'first_renewal_id'        => new sfValidatorInteger(array('required' => false)),
      'second_renewal_id'       => new sfValidatorInteger(array('required' => false)),
      'third_renewal_id'        => new sfValidatorInteger(array('required' => false)),
      'fourth_renewal_id'       => new sfValidatorInteger(array('required' => false)),
      'missing_form_renewal_id' => new sfValidatorInteger(array('required' => false)),
      'deletion_date'           => new sfValidatorDateTime(array('required' => false)),
      'deletion_count'          => new sfValidatorInteger(array('required' => false)),
      'renewal_month_year'      => new sfValidatorString(array('max_length' => 8, 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('renewal_month[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'RenewalMonth';
  }


}
