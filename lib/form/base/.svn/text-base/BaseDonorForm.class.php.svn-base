<?php

/**
 * Donor form base class.
 *
 * @package    angelflight
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfPropelFormGeneratedTemplate.php 16976 2009-04-04 12:47:44Z fabien $
 */
class BaseDonorForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'               => new sfWidgetFormInputHidden(),
      'co_donor_id'      => new sfWidgetFormInput(),
      'affiliation_id'   => new sfWidgetFormPropelChoice(array('model' => 'Affiliation', 'add_empty' => true)),
      'block_mailings'   => new sfWidgetFormInput(),
      'prospect_comment' => new sfWidgetFormInput(),
      'salutation'       => new sfWidgetFormInput(),
      'company_id'       => new sfWidgetFormPropelChoice(array('model' => 'Company', 'add_empty' => true)),
      'position'         => new sfWidgetFormInput(),
      'donor_potential'  => new sfWidgetFormInput(),
      'person_id'        => new sfWidgetFormPropelChoice(array('model' => 'Person', 'add_empty' => true)),
      'date_added'       => new sfWidgetFormDate(),
      'date_updated'     => new sfWidgetFormDate(),
    ));

    $this->setValidators(array(
      'id'               => new sfValidatorPropelChoice(array('model' => 'Donor', 'column' => 'id', 'required' => false)),
      'co_donor_id'      => new sfValidatorInteger(array('required' => false)),
      'affiliation_id'   => new sfValidatorPropelChoice(array('model' => 'Affiliation', 'column' => 'id', 'required' => false)),
      'block_mailings'   => new sfValidatorInteger(array('required' => false)),
      'prospect_comment' => new sfValidatorString(array('max_length' => 500, 'required' => false)),
      'salutation'       => new sfValidatorString(array('max_length' => 125, 'required' => false)),
      'company_id'       => new sfValidatorPropelChoice(array('model' => 'Company', 'column' => 'id', 'required' => false)),
      'position'         => new sfValidatorString(array('max_length' => 40, 'required' => false)),
      'donor_potential'  => new sfValidatorInteger(array('required' => false)),
      'person_id'        => new sfValidatorPropelChoice(array('model' => 'Person', 'column' => 'id', 'required' => false)),
      'date_added'       => new sfValidatorDate(array('required' => false)),
      'date_updated'     => new sfValidatorDate(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('donor[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Donor';
  }


}
