<?php

/**
 * Donation form base class.
 *
 * @package    angelflight
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfPropelFormGeneratedTemplate.php 16976 2009-04-04 12:47:44Z fabien $
 */
class BaseDonationForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'                         => new sfWidgetFormInputHidden(),
      'donor_id'                   => new sfWidgetFormPropelChoice(array('model' => 'Donor', 'add_empty' => false)),
      'gift_date'                  => new sfWidgetFormDate(),
      'gift_amount'                => new sfWidgetFormInput(),
      'deductible_amount'          => new sfWidgetFormInput(),
      'gift_type'                  => new sfWidgetFormPropelChoice(array('model' => 'GiftType', 'add_empty' => false)),
      'check_number'               => new sfWidgetFormInput(),
      'campain_id'                 => new sfWidgetFormPropelChoice(array('model' => 'Campaign', 'add_empty' => false)),
      'fund_id'                    => new sfWidgetFormPropelChoice(array('model' => 'Fund', 'add_empty' => false)),
      'gift_note'                  => new sfWidgetFormInput(),
      'printed_note'               => new sfWidgetFormInput(),
      'receipt_generated_date'     => new sfWidgetFormDateTime(),
      'follow_up'                  => new sfWidgetFormInput(),
      'premium_order_date'         => new sfWidgetFormDateTime(),
      'tribute_first_name'         => new sfWidgetFormInput(),
      'tribute_last_name'          => new sfWidgetFormInput(),
      'tribute_address1'           => new sfWidgetFormInput(),
      'tribute_address2'           => new sfWidgetFormInput(),
      'tribute_city'               => new sfWidgetFormInput(),
      'tribute_state'              => new sfWidgetFormInput(),
      'tribute_zipcode'            => new sfWidgetFormInput(),
      'tribute_email'              => new sfWidgetFormInput(),
      'tribute_category'           => new sfWidgetFormInput(),
      'tribute_message'            => new sfWidgetFormInput(),
      'tribute_deliver_by'         => new sfWidgetFormInput(),
      'tribute_gift_id'            => new sfWidgetFormInput(),
      'person_id'                  => new sfWidgetFormInput(),
      'processedDate'              => new sfWidgetFormDate(),
      'novapointe_id'              => new sfWidgetFormInput(),
      'ccard_approval_number'      => new sfWidgetFormInput(),
      'novapointe_fulfillment_id'  => new sfWidgetFormInput(),
      'novapointe_tracking_number' => new sfWidgetFormInput(),
      'novapointe_ship_date'       => new sfWidgetFormDate(),
      'tribute_letter_sent_date'   => new sfWidgetFormDate(),
      'send_tribute_card'          => new sfWidgetFormInput(),
      'tribute_image_id'           => new sfWidgetFormInput(),
      'ecard_read_date'            => new sfWidgetFormDate(),
      'ecardEmailSentDate'         => new sfWidgetFormDate(),
      'ecard_email_sent_result'    => new sfWidgetFormInput(),
    ));

    $this->setValidators(array(
      'id'                         => new sfValidatorPropelChoice(array('model' => 'Donation', 'column' => 'id', 'required' => false)),
      'donor_id'                   => new sfValidatorPropelChoice(array('model' => 'Donor', 'column' => 'id')),
      'gift_date'                  => new sfValidatorDate(array('required' => false)),
      'gift_amount'                => new sfValidatorInteger(array('required' => false)),
      'deductible_amount'          => new sfValidatorInteger(array('required' => false)),
      'gift_type'                  => new sfValidatorPropelChoice(array('model' => 'GiftType', 'column' => 'id')),
      'check_number'               => new sfValidatorString(array('max_length' => 10, 'required' => false)),
      'campain_id'                 => new sfValidatorPropelChoice(array('model' => 'Campaign', 'column' => 'id')),
      'fund_id'                    => new sfValidatorPropelChoice(array('model' => 'Fund', 'column' => 'id')),
      'gift_note'                  => new sfValidatorString(array('max_length' => 125, 'required' => false)),
      'printed_note'               => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'receipt_generated_date'     => new sfValidatorDateTime(array('required' => false)),
      'follow_up'                  => new sfValidatorInteger(array('required' => false)),
      'premium_order_date'         => new sfValidatorDateTime(array('required' => false)),
      'tribute_first_name'         => new sfValidatorString(array('max_length' => 30, 'required' => false)),
      'tribute_last_name'          => new sfValidatorString(array('max_length' => 30, 'required' => false)),
      'tribute_address1'           => new sfValidatorString(array('max_length' => 30, 'required' => false)),
      'tribute_address2'           => new sfValidatorString(array('max_length' => 30, 'required' => false)),
      'tribute_city'               => new sfValidatorString(array('max_length' => 30, 'required' => false)),
      'tribute_state'              => new sfValidatorString(array('max_length' => 2, 'required' => false)),
      'tribute_zipcode'            => new sfValidatorString(array('max_length' => 10, 'required' => false)),
      'tribute_email'              => new sfValidatorString(array('max_length' => 80, 'required' => false)),
      'tribute_category'           => new sfValidatorString(array('max_length' => 20, 'required' => false)),
      'tribute_message'            => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'tribute_deliver_by'         => new sfValidatorString(array('max_length' => 20, 'required' => false)),
      'tribute_gift_id'            => new sfValidatorInteger(array('required' => false)),
      'person_id'                  => new sfValidatorInteger(array('required' => false)),
      'processedDate'              => new sfValidatorDate(array('required' => false)),
      'novapointe_id'              => new sfValidatorString(array('max_length' => 30, 'required' => false)),
      'ccard_approval_number'      => new sfValidatorString(array('max_length' => 30, 'required' => false)),
      'novapointe_fulfillment_id'  => new sfValidatorString(array('max_length' => 30, 'required' => false)),
      'novapointe_tracking_number' => new sfValidatorString(array('max_length' => 40, 'required' => false)),
      'novapointe_ship_date'       => new sfValidatorDate(array('required' => false)),
      'tribute_letter_sent_date'   => new sfValidatorDate(array('required' => false)),
      'send_tribute_card'          => new sfValidatorInteger(array('required' => false)),
      'tribute_image_id'           => new sfValidatorInteger(array('required' => false)),
      'ecard_read_date'            => new sfValidatorDate(array('required' => false)),
      'ecardEmailSentDate'         => new sfValidatorDate(array('required' => false)),
      'ecard_email_sent_result'    => new sfValidatorInteger(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('donation[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Donation';
  }


}
