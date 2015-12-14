<?php

/**
 * Donor form.
 *
 * @package    angelflight
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfPropelFormTemplate.php 10377 2008-07-21 07:10:32Z dwhittle $
 */
class DonorForm extends BaseDonorForm
{
  public function configure()
  {
    unset($this['id'],$this['date_added'],$this['date_updated']);

    $affiliations = AffiliationPeer::getForSelectParent();
    $companies = CompanyPeer::getForSelectParent();
    $persons = PersonPeer::getForSelectParent();

    # Fields
    $this->widgetSchema['co_donor_id'] = new sfWidgetFormInput(array(), array('class' => 'text narrow'));
    $this->widgetSchema['affiliation_id'] =  new sfWidgetFormChoice(array('choices' => $affiliations));
    $this->widgetSchema['block_mailings'] =new sfWidgetFormInputCheckbox(array(), array('value' => 1));
    $this->widgetSchema['prospect_comment'] =  new sfWidgetFormTextarea(array(), array('class'=>'text'));
    $this->widgetSchema['salutation'] = new sfWidgetFormInput(array(), array('class' => 'text'));
    $this->widgetSchema['company_id'] =new sfWidgetFormChoice(array('choices' => $companies));
    $this->widgetSchema['position'] = new sfWidgetFormInput(array(), array('class' => 'text'));
    $this->widgetSchema['donor_potential'] = new sfWidgetFormInput(array(), array('class' => 'text'));
    $this->widgetSchema['person_id'] = new sfWidgetFormChoice(array('choices' => $persons));

    $this->widgetSchema->setLabels(array('co_donor_id' => 'Co Donor Id'));
    $this->widgetSchema->setLabels(array('affiliation_id' => 'Affiliation Id'));
    $this->widgetSchema->setLabels(array('block_mailings' => 'Block mailings'));
    $this->widgetSchema->setLabels(array('prospect_comment' => 'Prospect comment'));
    $this->widgetSchema->setLabels(array('salutation' => 'Salutation'));
    $this->widgetSchema->setLabels(array('company_id' => 'Company'));
    $this->widgetSchema->setLabels(array('position' => 'Position'));
    $this->widgetSchema->setLabels(array('donor_potential' => 'Donor potential'));
    $this->widgetSchema->setLabels(array('person_id' => 'Person'));

    $this->validatorSchema['co_donor_id'] = new sfValidatorInteger(array('required' => false),array('invalid'=>'Co donor id must be in number format !'));
    $this->validatorSchema['affiliation_id'] = new sfValidatorInteger(array('required' => false));
    $this->validatorSchema['block_mailings'] = new sfValidatorInteger(array('required' => false));
    $this->validatorSchema['prospect_comment'] = new sfValidatorString(array('required' => false));
    $this->validatorSchema['salutation'] = new sfValidatorString(array('required' => false));
    $this->validatorSchema['company_id'] = new sfValidatorInteger(array('required' => false));
    $this->validatorSchema['position'] = new sfValidatorString(array('required' => false));
    $this->validatorSchema['donor_potential'] = new sfValidatorInteger(array('required' => false),array('invalid'=>'Donor porential must be in number format !'));
    $this->validatorSchema['person_id'] = new sfValidatorInteger(array('required' => false));

    $this->widgetSchema->setNameFormat('donor[%s]');
  }
}
