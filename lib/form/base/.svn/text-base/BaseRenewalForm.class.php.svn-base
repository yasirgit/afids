<?php

/**
 * Renewal form base class.
 *
 * @package    angelflight
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfPropelFormGeneratedTemplate.php 16976 2009-04-04 12:47:44Z fabien $
 */
class BaseRenewalForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'                          => new sfWidgetFormInputHidden(),
      'renewal_date'                => new sfWidgetFormDateTime(),
      'renewal_desc'                => new sfWidgetFormInput(),
      'renewal_month'               => new sfWidgetFormInput(),
      'renewal_year'                => new sfWidgetFormInput(),
      'letter_count'                => new sfWidgetFormInput(),
      'invoice_total'               => new sfWidgetFormInput(),
      'product_price'               => new sfWidgetFormInput(),
      'printing_cost_total'         => new sfWidgetFormInput(),
      'verified_postage_count'      => new sfWidgetFormInput(),
      'verified_postage_cost'       => new sfWidgetFormInput(),
      'unverified_postage_count'    => new sfWidgetFormInput(),
      'unverified_postage_cost'     => new sfWidgetFormInput(),
      'undeliverable_postage_count' => new sfWidgetFormInput(),
      'undeliverable_postage_cost'  => new sfWidgetFormInput(),
      'international_postage_count' => new sfWidgetFormInput(),
      'international_postage_cost'  => new sfWidgetFormInput(),
      'postage_cost_total'          => new sfWidgetFormInput(),
      'mailers_club_order_number'   => new sfWidgetFormInput(),
      'mailers_club_order_date'     => new sfWidgetFormDateTime(),
      'mailers_club_completed_date' => new sfWidgetFormDateTime(),
      'mailers_club_mailing_name'   => new sfWidgetFormInput(),
      'processing_log_text'         => new sfWidgetFormInput(),
      'data_file_name'              => new sfWidgetFormInput(),
      'data_file_size'              => new sfWidgetFormInput(),
      'proof_url'                   => new sfWidgetFormInput(),
      'proof_approved_date'         => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'id'                          => new sfValidatorPropelChoice(array('model' => 'Renewal', 'column' => 'id', 'required' => false)),
      'renewal_date'                => new sfValidatorDateTime(array('required' => false)),
      'renewal_desc'                => new sfValidatorString(array('max_length' => 25, 'required' => false)),
      'renewal_month'               => new sfValidatorInteger(array('required' => false)),
      'renewal_year'                => new sfValidatorInteger(array('required' => false)),
      'letter_count'                => new sfValidatorInteger(array('required' => false)),
      'invoice_total'               => new sfValidatorInteger(array('required' => false)),
      'product_price'               => new sfValidatorInteger(array('required' => false)),
      'printing_cost_total'         => new sfValidatorInteger(array('required' => false)),
      'verified_postage_count'      => new sfValidatorInteger(array('required' => false)),
      'verified_postage_cost'       => new sfValidatorInteger(array('required' => false)),
      'unverified_postage_count'    => new sfValidatorInteger(array('required' => false)),
      'unverified_postage_cost'     => new sfValidatorInteger(array('required' => false)),
      'undeliverable_postage_count' => new sfValidatorInteger(array('required' => false)),
      'undeliverable_postage_cost'  => new sfValidatorInteger(array('required' => false)),
      'international_postage_count' => new sfValidatorInteger(array('required' => false)),
      'international_postage_cost'  => new sfValidatorInteger(array('required' => false)),
      'postage_cost_total'          => new sfValidatorInteger(array('required' => false)),
      'mailers_club_order_number'   => new sfValidatorInteger(array('required' => false)),
      'mailers_club_order_date'     => new sfValidatorDateTime(array('required' => false)),
      'mailers_club_completed_date' => new sfValidatorDateTime(array('required' => false)),
      'mailers_club_mailing_name'   => new sfValidatorString(array('max_length' => 40, 'required' => false)),
      'processing_log_text'         => new sfValidatorString(array('max_length' => 2500, 'required' => false)),
      'data_file_name'              => new sfValidatorString(array('max_length' => 75, 'required' => false)),
      'data_file_size'              => new sfValidatorInteger(array('required' => false)),
      'proof_url'                   => new sfValidatorString(array('max_length' => 125, 'required' => false)),
      'proof_approved_date'         => new sfValidatorDateTime(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('renewal[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Renewal';
  }


}
