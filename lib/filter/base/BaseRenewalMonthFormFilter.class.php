<?php

require_once(sfConfig::get('sf_lib_dir').'/filter/base/BaseFormFilterPropel.class.php');

/**
 * RenewalMonth filter form base class.
 *
 * @package    angelflight
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfPropelFormFilterGeneratedTemplate.php 16976 2009-04-04 12:47:44Z fabien $
 */
class BaseRenewalMonthFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'renewal_month'           => new sfWidgetFormFilterInput(),
      'renewal_year'            => new sfWidgetFormFilterInput(),
      'first_renewal_id'        => new sfWidgetFormFilterInput(),
      'second_renewal_id'       => new sfWidgetFormFilterInput(),
      'third_renewal_id'        => new sfWidgetFormFilterInput(),
      'fourth_renewal_id'       => new sfWidgetFormFilterInput(),
      'missing_form_renewal_id' => new sfWidgetFormFilterInput(),
      'deletion_date'           => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => true)),
      'deletion_count'          => new sfWidgetFormFilterInput(),
      'renewal_month_year'      => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'renewal_month'           => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'renewal_year'            => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'first_renewal_id'        => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'second_renewal_id'       => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'third_renewal_id'        => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'fourth_renewal_id'       => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'missing_form_renewal_id' => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'deletion_date'           => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
      'deletion_count'          => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'renewal_month_year'      => new sfValidatorPass(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('renewal_month_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'RenewalMonth';
  }

  public function getFields()
  {
    return array(
      'id'                      => 'Number',
      'renewal_month'           => 'Number',
      'renewal_year'            => 'Number',
      'first_renewal_id'        => 'Number',
      'second_renewal_id'       => 'Number',
      'third_renewal_id'        => 'Number',
      'fourth_renewal_id'       => 'Number',
      'missing_form_renewal_id' => 'Number',
      'deletion_date'           => 'Date',
      'deletion_count'          => 'Number',
      'renewal_month_year'      => 'Text',
    );
  }
}
