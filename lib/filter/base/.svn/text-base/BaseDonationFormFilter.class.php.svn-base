<?php

require_once(sfConfig::get('sf_lib_dir').'/filter/base/BaseFormFilterPropel.class.php');

/**
 * Donation filter form base class.
 *
 * @package    angelflight
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfPropelFormFilterGeneratedTemplate.php 16976 2009-04-04 12:47:44Z fabien $
 */
class BaseDonationFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'donor_id'                   => new sfWidgetFormPropelChoice(array('model' => 'Donor', 'add_empty' => true)),
      'gift_date'                  => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => true)),
      'gift_amount'                => new sfWidgetFormFilterInput(),
      'deductible_amount'          => new sfWidgetFormFilterInput(),
      'gift_type'                  => new sfWidgetFormPropelChoice(array('model' => 'GiftType', 'add_empty' => true)),
      'check_number'               => new sfWidgetFormFilterInput(),
      'campain_id'                 => new sfWidgetFormPropelChoice(array('model' => 'Campaign', 'add_empty' => true)),
      'fund_id'                    => new sfWidgetFormPropelChoice(array('model' => 'Fund', 'add_empty' => true)),
      'gift_note'                  => new sfWidgetFormFilterInput(),
      'printed_note'               => new sfWidgetFormFilterInput(),
      'receipt_generated_date'     => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => true)),
      'follow_up'                  => new sfWidgetFormFilterInput(),
      'premium_order_date'         => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => true)),
      'tribute_first_name'         => new sfWidgetFormFilterInput(),
      'tribute_last_name'          => new sfWidgetFormFilterInput(),
      'tribute_address1'           => new sfWidgetFormFilterInput(),
      'tribute_address2'           => new sfWidgetFormFilterInput(),
      'tribute_city'               => new sfWidgetFormFilterInput(),
      'tribute_state'              => new sfWidgetFormFilterInput(),
      'tribute_zipcode'            => new sfWidgetFormFilterInput(),
      'tribute_email'              => new sfWidgetFormFilterInput(),
      'tribute_category'           => new sfWidgetFormFilterInput(),
      'tribute_message'            => new sfWidgetFormFilterInput(),
      'tribute_deliver_by'         => new sfWidgetFormFilterInput(),
      'tribute_gift_id'            => new sfWidgetFormFilterInput(),
      'person_id'                  => new sfWidgetFormFilterInput(),
      'processedDate'              => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => true)),
      'novapointe_id'              => new sfWidgetFormFilterInput(),
      'ccard_approval_number'      => new sfWidgetFormFilterInput(),
      'novapointe_fulfillment_id'  => new sfWidgetFormFilterInput(),
      'novapointe_tracking_number' => new sfWidgetFormFilterInput(),
      'novapointe_ship_date'       => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => true)),
      'tribute_letter_sent_date'   => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => true)),
      'send_tribute_card'          => new sfWidgetFormFilterInput(),
      'tribute_image_id'           => new sfWidgetFormFilterInput(),
      'ecard_read_date'            => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => true)),
      'ecardEmailSentDate'         => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => true)),
      'ecard_email_sent_result'    => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'donor_id'                   => new sfValidatorPropelChoice(array('required' => false, 'model' => 'Donor', 'column' => 'id')),
      'gift_date'                  => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
      'gift_amount'                => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'deductible_amount'          => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'gift_type'                  => new sfValidatorPropelChoice(array('required' => false, 'model' => 'GiftType', 'column' => 'id')),
      'check_number'               => new sfValidatorPass(array('required' => false)),
      'campain_id'                 => new sfValidatorPropelChoice(array('required' => false, 'model' => 'Campaign', 'column' => 'id')),
      'fund_id'                    => new sfValidatorPropelChoice(array('required' => false, 'model' => 'Fund', 'column' => 'id')),
      'gift_note'                  => new sfValidatorPass(array('required' => false)),
      'printed_note'               => new sfValidatorPass(array('required' => false)),
      'receipt_generated_date'     => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
      'follow_up'                  => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'premium_order_date'         => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
      'tribute_first_name'         => new sfValidatorPass(array('required' => false)),
      'tribute_last_name'          => new sfValidatorPass(array('required' => false)),
      'tribute_address1'           => new sfValidatorPass(array('required' => false)),
      'tribute_address2'           => new sfValidatorPass(array('required' => false)),
      'tribute_city'               => new sfValidatorPass(array('required' => false)),
      'tribute_state'              => new sfValidatorPass(array('required' => false)),
      'tribute_zipcode'            => new sfValidatorPass(array('required' => false)),
      'tribute_email'              => new sfValidatorPass(array('required' => false)),
      'tribute_category'           => new sfValidatorPass(array('required' => false)),
      'tribute_message'            => new sfValidatorPass(array('required' => false)),
      'tribute_deliver_by'         => new sfValidatorPass(array('required' => false)),
      'tribute_gift_id'            => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'person_id'                  => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'processedDate'              => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
      'novapointe_id'              => new sfValidatorPass(array('required' => false)),
      'ccard_approval_number'      => new sfValidatorPass(array('required' => false)),
      'novapointe_fulfillment_id'  => new sfValidatorPass(array('required' => false)),
      'novapointe_tracking_number' => new sfValidatorPass(array('required' => false)),
      'novapointe_ship_date'       => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
      'tribute_letter_sent_date'   => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
      'send_tribute_card'          => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'tribute_image_id'           => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'ecard_read_date'            => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
      'ecardEmailSentDate'         => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
      'ecard_email_sent_result'    => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
    ));

    $this->widgetSchema->setNameFormat('donation_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Donation';
  }

  public function getFields()
  {
    return array(
      'id'                         => 'Number',
      'donor_id'                   => 'ForeignKey',
      'gift_date'                  => 'Date',
      'gift_amount'                => 'Number',
      'deductible_amount'          => 'Number',
      'gift_type'                  => 'ForeignKey',
      'check_number'               => 'Text',
      'campain_id'                 => 'ForeignKey',
      'fund_id'                    => 'ForeignKey',
      'gift_note'                  => 'Text',
      'printed_note'               => 'Text',
      'receipt_generated_date'     => 'Date',
      'follow_up'                  => 'Number',
      'premium_order_date'         => 'Date',
      'tribute_first_name'         => 'Text',
      'tribute_last_name'          => 'Text',
      'tribute_address1'           => 'Text',
      'tribute_address2'           => 'Text',
      'tribute_city'               => 'Text',
      'tribute_state'              => 'Text',
      'tribute_zipcode'            => 'Text',
      'tribute_email'              => 'Text',
      'tribute_category'           => 'Text',
      'tribute_message'            => 'Text',
      'tribute_deliver_by'         => 'Text',
      'tribute_gift_id'            => 'Number',
      'person_id'                  => 'Number',
      'processedDate'              => 'Date',
      'novapointe_id'              => 'Text',
      'ccard_approval_number'      => 'Text',
      'novapointe_fulfillment_id'  => 'Text',
      'novapointe_tracking_number' => 'Text',
      'novapointe_ship_date'       => 'Date',
      'tribute_letter_sent_date'   => 'Date',
      'send_tribute_card'          => 'Number',
      'tribute_image_id'           => 'Number',
      'ecard_read_date'            => 'Date',
      'ecardEmailSentDate'         => 'Date',
      'ecard_email_sent_result'    => 'Number',
    );
  }
}
