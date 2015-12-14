<?php

/**
 * RpMemberApplicationReconciliation form base class.
 *
 * @package    angelflight
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfPropelFormGeneratedTemplate.php 16976 2009-04-04 12:47:44Z fabien $
 */
class BaseRpMemberApplicationReconciliationForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'first_name'             => new sfWidgetFormInput(),
      'last_name'              => new sfWidgetFormInput(),
      'external_id'            => new sfWidgetFormInput(),
      'renewal'                => new sfWidgetFormInput(),
      'dues_amount_paid'       => new sfWidgetFormInput(),
      'method_of_payment'      => new sfWidgetFormInput(),
      'check_number'           => new sfWidgetFormInput(),
      'donation_amount_paid'   => new sfWidgetFormInput(),
      'application_date'       => new sfWidgetFormDateTime(),
      'applicationDateDisplay' => new sfWidgetFormInput(),
      'processedDate'          => new sfWidgetFormInput(),
      'ccard_approval_number'  => new sfWidgetFormInput(),
      'payment_transaction_id' => new sfWidgetFormInput(),
      'member_class_id'        => new sfWidgetFormInput(),
      'memberClass'            => new sfWidgetFormInput(),
      'master_member_id'       => new sfWidgetFormInput(),
      'masterMemberExternalID' => new sfWidgetFormInput(),
      'masterMemberFirstName'  => new sfWidgetFormInput(),
      'masterMemberLastName'   => new sfWidgetFormInput(),
      'renewal_date'           => new sfWidgetFormDate(),
      'id'                     => new sfWidgetFormInputHidden(),
    ));

    $this->setValidators(array(
      'first_name'             => new sfValidatorString(array('max_length' => 40)),
      'last_name'              => new sfValidatorString(array('max_length' => 40)),
      'external_id'            => new sfValidatorInteger(array('required' => false)),
      'renewal'                => new sfValidatorInteger(array('required' => false)),
      'dues_amount_paid'       => new sfValidatorNumber(),
      'method_of_payment'      => new sfValidatorString(array('max_length' => 20, 'required' => false)),
      'check_number'           => new sfValidatorInteger(array('required' => false)),
      'donation_amount_paid'   => new sfValidatorNumber(array('required' => false)),
      'application_date'       => new sfValidatorDateTime(),
      'applicationDateDisplay' => new sfValidatorString(array('max_length' => 10, 'required' => false)),
      'processedDate'          => new sfValidatorString(array('max_length' => 10, 'required' => false)),
      'ccard_approval_number'  => new sfValidatorString(array('max_length' => 20, 'required' => false)),
      'payment_transaction_id' => new sfValidatorInteger(array('required' => false)),
      'member_class_id'        => new sfValidatorInteger(),
      'memberClass'            => new sfValidatorString(array('max_length' => 20)),
      'master_member_id'       => new sfValidatorInteger(array('required' => false)),
      'masterMemberExternalID' => new sfValidatorInteger(array('required' => false)),
      'masterMemberFirstName'  => new sfValidatorString(array('max_length' => 40, 'required' => false)),
      'masterMemberLastName'   => new sfValidatorString(array('max_length' => 40, 'required' => false)),
      'renewal_date'           => new sfValidatorDate(array('required' => false)),
      'id'                     => new sfValidatorPropelChoice(array('model' => 'RpMemberApplicationReconciliation', 'column' => 'id', 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('rp_member_application_reconciliation[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'RpMemberApplicationReconciliation';
  }


}
