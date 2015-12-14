<?php

/**
 * Donation form.
 *
 * @package    angelflight
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfPropelFormTemplate.php 10377 2008-07-21 07:10:32Z dwhittle $
 */
class DonationForm extends BaseDonationForm
{
  public function configure()
  {
    unset($this['id'],$this['tribute_first_name'],$this['tribute_last_name'],$this['tribute_address1'],$this['tribute_address2'],$this['tribute_city'],$this['tribute_state'],$this['tribute_zipcode'],$this['tribute_email'],$this['tribute_category'],$this['tribute_message'],$this['tribute_deliver_by'],$this['tribute_gift_id'],$this['person_id'],$this['processedDate'],$this['novapointe_id'],$this['ccard_approval_number'],$this['novapointe_fulfillment_id'],$this['novapointe_tracking_number'],$this['novapointe_ship_date'],$this['tribute_letter_sent_date'],$this['send_tribute_card'],$this['tribute_image_id'],$this['ecard_read_date'],$this['ecardEmailSentDate'],$this['ecard_email_sent_result']);
    
    $donars = DonorPeer::getForSelectParent();
    $campains = CampaignPeer::getForSelectParent();
    $funds = FundPeer::getForSelectParent();
    $gift_types = GiftTypePeer::getForSelectParent();

    # Fields
    $this->widgetSchema['donor_id'] = new sfWidgetFormChoice(array('choices' => $donars));
    $this->widgetSchema['gift_date'] =  new widgetFormDate(array('change_year' => true, 'change_month' => true, 'format_date' => array('js' => 'mm/dd/yy', 'php' => 'm/d/Y')), array('class' => 'text narrow'));
    $this->widgetSchema['gift_amount'] = new sfWidgetFormInput(array(), array('class' => 'text'));
    $this->widgetSchema['deductible_amount'] =  new sfWidgetFormInput(array(), array('class' => 'text'));
    $this->widgetSchema['gift_type'] = new sfWidgetFormChoice(array('choices' => $gift_types));
    $this->widgetSchema['check_number'] = new sfWidgetFormInput(array(), array('class' => 'text'));
    $this->widgetSchema['campain_id'] = new sfWidgetFormChoice(array('choices' => $campains));
    $this->widgetSchema['fund_id'] = new sfWidgetFormChoice(array('choices' => $funds));
    $this->widgetSchema['gift_note'] = new sfWidgetFormTextarea(array(), array('class'=>'text'));
    $this->widgetSchema['printed_note'] = new sfWidgetFormTextarea(array(), array('class'=>'text'));
    $this->widgetSchema['receipt_generated_date'] =  new widgetFormDate(array('change_year' => true, 'change_month' => true, 'format_date' => array('js' => 'mm/dd/yy', 'php' => 'm/d/Y')), array('class' => 'text narrow'));
    $this->widgetSchema['follow_up'] = new sfWidgetFormInputCheckbox(array(), array('value' => 1));
    $this->widgetSchema['premium_order_date'] =  new widgetFormDate(array('change_year' => true, 'change_month' => true, 'format_date' => array('js' => 'mm/dd/yy', 'php' => 'm/d/Y')), array('class' => 'text narrow'));

    $this->widgetSchema->setLabels(array('donor_id' => 'Donor'));
    $this->widgetSchema->setLabels(array('gift_date' => 'Gift Date'));
    $this->widgetSchema->setLabels(array('gift_amount' => 'Gift Ammount'));
    $this->widgetSchema->setLabels(array('deductible_amount' => 'Deductible Amount'));
    $this->widgetSchema->setLabels(array('gift_type' => 'Gift Type'));
    $this->widgetSchema->setLabels(array('check_number' => 'Check Number'));
    $this->widgetSchema->setLabels(array('campain_id' => 'Campaign'));
    $this->widgetSchema->setLabels(array('fund_id' => 'Fund'));
    $this->widgetSchema->setLabels(array('gift_note' => 'Gift Note'));
    $this->widgetSchema->setLabels(array('printed_note' => 'Printed Note'));
    $this->widgetSchema->setLabels(array('receipt_generated_date' => 'Receipt Generated Date'));
    $this->widgetSchema->setLabels(array('follow_up' => 'Follow Up'));
    $this->widgetSchema->setLabels(array('premium_order_date' => 'Premium Order Date'));

    $this->validatorSchema['donor_id'] = new sfValidatorInteger(array('required' => true));
    $this->validatorSchema['gift_date'] = new sfValidatorDate(array('max' => time(),'required' => false));
    $this->validatorSchema['gift_amount'] = new sfValidatorInteger(array('required' => false),array('invalid'=>'Gift ammount must ne in number format !'));
    $this->validatorSchema['deductible_amount'] = new sfValidatorInteger(array('required' => false));
    $this->validatorSchema['gift_type'] = new sfValidatorInteger(array('required' => true));
    $this->validatorSchema['check_number'] = new sfValidatorString(array('required' => false));
    $this->validatorSchema['campain_id'] = new sfValidatorInteger(array('required' => true));
    $this->validatorSchema['fund_id'] = new sfValidatorInteger(array('required' => true));
    $this->validatorSchema['gift_note'] = new sfValidatorString(array('required' => false));
    $this->validatorSchema['printed_note'] = new sfValidatorString(array('required' => false));
    $this->validatorSchema['receipt_generated_date'] = new sfValidatorDate(array('max' => time(),'required' => false),array('invalid'=>'Receipt Generated Date in invalid !.'));
    $this->validatorSchema['follow_up'] = new sfValidatorInteger(array('required' => false));
    $this->validatorSchema['premium_order_date'] = new sfValidatorDate(array('max' => time(),'required' => false),array('invalid'=>'Premium Order Date in invalid !.'));

    $this->widgetSchema->setNameFormat('dona[%s]');
  }
}
