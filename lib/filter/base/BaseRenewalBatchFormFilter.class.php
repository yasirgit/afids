<?php

require_once(sfConfig::get('sf_lib_dir').'/filter/base/BaseFormFilterPropel.class.php');

/**
 * RenewalBatch filter form base class.
 *
 * @package    angelflight
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfPropelFormFilterGeneratedTemplate.php 16976 2009-04-04 12:47:44Z fabien $
 */
class BaseRenewalBatchFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'renewal_batch_date'      => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => true)),
      'first_renewal_id'        => new sfWidgetFormFilterInput(),
      'second_renewal_id'       => new sfWidgetFormFilterInput(),
      'third_renewal_id'        => new sfWidgetFormFilterInput(),
      'fourth_renewal_id'       => new sfWidgetFormFilterInput(),
      'missing_form_renewal_id' => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'renewal_batch_date'      => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
      'first_renewal_id'        => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'second_renewal_id'       => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'third_renewal_id'        => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'fourth_renewal_id'       => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'missing_form_renewal_id' => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
    ));

    $this->widgetSchema->setNameFormat('renewal_batch_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'RenewalBatch';
  }

  public function getFields()
  {
    return array(
      'id'                      => 'Number',
      'renewal_batch_date'      => 'Date',
      'first_renewal_id'        => 'Number',
      'second_renewal_id'       => 'Number',
      'third_renewal_id'        => 'Number',
      'fourth_renewal_id'       => 'Number',
      'missing_form_renewal_id' => 'Number',
    );
  }
}
