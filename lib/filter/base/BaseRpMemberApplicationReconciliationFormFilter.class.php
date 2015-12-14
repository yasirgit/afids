<?php

require_once(sfConfig::get('sf_lib_dir').'/filter/base/BaseFormFilterPropel.class.php');

/**
 * RpMemberApplicationReconciliation filter form base class.
 *
 * @package    angelflight
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfPropelFormFilterGeneratedTemplate.php 16976 2009-04-04 12:47:44Z fabien $
 */
class BaseRpMemberApplicationReconciliationFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'first_name'             => new sfWidgetFormFilterInput(),
      'last_name'              => new sfWidgetFormFilterInput(),
      'external_id'            => new sfWidgetFormFilterInput(),
      'renewal'                => new sfWidgetFormFilterInput(),
      'dues_amount_paid'       => new sfWidgetFormFilterInput(),
      'method_of_payment'      => new sfWidgetFormFilterInput(),
      'check_number'           => new sfWidgetFormFilterInput(),
      'donation_amount_paid'   => new sfWidgetFormFilterInput(),
      'application_date'       => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'applicationDateDisplay' => new sfWidgetFormFilterInput(),
      'processedDate'          => new sfWidgetFormFilterInput(),
      'ccard_approval_number'  => new sfWidgetFormFilterInput(),
      'payment_transaction_id' => new sfWidgetFormFilterInput(),
      'member_class_id'        => new sfWidgetFormFilterInput(),
      'memberClass'            => new sfWidgetFormFilterInput(),
      'master_member_id'       => new sfWidgetFormFilterInput(),
      'masterMemberExternalID' => new sfWidgetFormFilterInput(),
      'masterMemberFirstName'  => new sfWidgetFormFilterInput(),
      'masterMemberLastName'   => new sfWidgetFormFilterInput(),
      'renewal_date'           => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => true)),
    ));

    $this->setValidators(array(
      'first_name'             => new sfValidatorPass(array('required' => false)),
      'last_name'              => new sfValidatorPass(array('required' => false)),
      'external_id'            => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'renewal'                => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'dues_amount_paid'       => new sfValidatorSchemaFilter('text', new sfValidatorNumber(array('required' => false))),
      'method_of_payment'      => new sfValidatorPass(array('required' => false)),
      'check_number'           => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'donation_amount_paid'   => new sfValidatorSchemaFilter('text', new sfValidatorNumber(array('required' => false))),
      'application_date'       => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
      'applicationDateDisplay' => new sfValidatorPass(array('required' => false)),
      'processedDate'          => new sfValidatorPass(array('required' => false)),
      'ccard_approval_number'  => new sfValidatorPass(array('required' => false)),
      'payment_transaction_id' => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'member_class_id'        => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'memberClass'            => new sfValidatorPass(array('required' => false)),
      'master_member_id'       => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'masterMemberExternalID' => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'masterMemberFirstName'  => new sfValidatorPass(array('required' => false)),
      'masterMemberLastName'   => new sfValidatorPass(array('required' => false)),
      'renewal_date'           => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
    ));

    $this->widgetSchema->setNameFormat('rp_member_application_reconciliation_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'RpMemberApplicationReconciliation';
  }

  public function getFields()
  {
    return array(
      'first_name'             => 'Text',
      'last_name'              => 'Text',
      'external_id'            => 'Number',
      'renewal'                => 'Number',
      'dues_amount_paid'       => 'Number',
      'method_of_payment'      => 'Text',
      'check_number'           => 'Number',
      'donation_amount_paid'   => 'Number',
      'application_date'       => 'Date',
      'applicationDateDisplay' => 'Text',
      'processedDate'          => 'Text',
      'ccard_approval_number'  => 'Text',
      'payment_transaction_id' => 'Number',
      'member_class_id'        => 'Number',
      'memberClass'            => 'Text',
      'master_member_id'       => 'Number',
      'masterMemberExternalID' => 'Number',
      'masterMemberFirstName'  => 'Text',
      'masterMemberLastName'   => 'Text',
      'renewal_date'           => 'Date',
      'id'                     => 'Number',
    );
  }
}
