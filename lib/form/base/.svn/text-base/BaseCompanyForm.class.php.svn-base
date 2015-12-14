<?php

/**
 * Company form base class.
 *
 * @package    angelflight
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfPropelFormGeneratedTemplate.php 16976 2009-04-04 12:47:44Z fabien $
 */
class BaseCompanyForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'                              => new sfWidgetFormInputHidden(),
      'name'                            => new sfWidgetFormInput(),
      'has_matching_program'            => new sfWidgetFormInput(),
      'has_payroll_withholding_program' => new sfWidgetFormInput(),
    ));

    $this->setValidators(array(
      'id'                              => new sfValidatorPropelChoice(array('model' => 'Company', 'column' => 'id', 'required' => false)),
      'name'                            => new sfValidatorString(array('max_length' => 40, 'required' => false)),
      'has_matching_program'            => new sfValidatorInteger(array('required' => false)),
      'has_payroll_withholding_program' => new sfValidatorInteger(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('company[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Company';
  }


}
