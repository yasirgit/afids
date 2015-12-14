<?php

require_once(sfConfig::get('sf_lib_dir').'/filter/base/BaseFormFilterPropel.class.php');

/**
 * Company filter form base class.
 *
 * @package    angelflight
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfPropelFormFilterGeneratedTemplate.php 16976 2009-04-04 12:47:44Z fabien $
 */
class BaseCompanyFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'name'                            => new sfWidgetFormFilterInput(),
      'has_matching_program'            => new sfWidgetFormFilterInput(),
      'has_payroll_withholding_program' => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'name'                            => new sfValidatorPass(array('required' => false)),
      'has_matching_program'            => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'has_payroll_withholding_program' => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
    ));

    $this->widgetSchema->setNameFormat('company_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Company';
  }

  public function getFields()
  {
    return array(
      'id'                              => 'Number',
      'name'                            => 'Text',
      'has_matching_program'            => 'Number',
      'has_payroll_withholding_program' => 'Number',
    );
  }
}
