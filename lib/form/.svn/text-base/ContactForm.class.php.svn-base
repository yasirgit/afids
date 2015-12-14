<?php

/**
 * Contact form.
 *
 * @package    angelflight
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfPropelFormTemplate.php 10377 2008-07-21 07:10:32Z dwhittle $
 */
class ContactForm extends BaseContactForm
{
  public function configure()
  {
    unset($this['id'],$this['person_id'],$this['date_added'],$this['date_updated']);

    $sources = RefSourcePeer::getForSelectParent();
    $types = ContactTypePeer::getForSelectParent();
    $companies = CompanyPeer::getForSelectParent();

    # Fields
    $this->widgetSchema['ref_source_id'] = new sfWidgetFormChoice(array('choices' => $sources),array('class'=>'text narrow'));
    $this->widgetSchema['send_app_format'] = new sfWidgetFormInput(array(), array('class' => 'text'));
    $this->widgetSchema['comment'] = new sfWidgetFormInput(array(), array('class' => 'text'));
    $this->widgetSchema['letter_sent'] =   new widgetFormDate(array('change_year' => true, 'change_month' => true, 'format_date' => array('js' => 'mm/dd/yy', 'php' => 'm/d/Y')), array('class' => 'text narrow'));
    $this->widgetSchema['contact_type_id'] = new sfWidgetFormChoice(array('choices' => $types),array('class'=>'text narrow'));
    $this->widgetSchema['company_name'] = new sfWidgetFormChoice(array('choices' => $companies),array('class'=>'text narrow'));

    $this->widgetSchema->setLabels(array('person_id' => 'Person'));
    $this->widgetSchema->setLabels(array('ref_source_id' => 'Ref Source'));
    $this->widgetSchema->setLabels(array('send_app_format' => 'Send Application Format'));
    $this->widgetSchema->setLabels(array('comment' => 'Comment'));
    $this->widgetSchema->setLabels(array('letter_sent' => 'Letter Sent'));
    $this->widgetSchema->setLabels(array('contact_type_id' => 'Contact Type'));
    $this->widgetSchema->setLabels(array('company_name' => 'Company Name'));

    $this->validatorSchema['ref_source_id'] = new sfValidatorInteger(array('required' => false));
    $this->validatorSchema['send_app_format'] = new sfValidatorString(array('required' => false));
    $this->validatorSchema['comment'] = new sfValidatorString(array('required' => false));
    $this->validatorSchema['letter_sent'] =  new sfValidatorDate(array('max' => time(),'required' => false),array('invalid'=> 'Letter sent is invalid !.'));
    $this->validatorSchema['contact_type_id'] = new sfValidatorInteger(array('required' => false));
    $this->validatorSchema['company_name'] = new sfValidatorInteger(array('required' => false));

    $this->widgetSchema->setNameFormat('contact[%s]');
  }
}
