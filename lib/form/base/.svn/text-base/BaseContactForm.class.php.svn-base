<?php

/**
 * Contact form base class.
 *
 * @package    angelflight
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfPropelFormGeneratedTemplate.php 16976 2009-04-04 12:47:44Z fabien $
 */
class BaseContactForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'              => new sfWidgetFormInputHidden(),
      'person_id'       => new sfWidgetFormPropelChoice(array('model' => 'Person', 'add_empty' => false)),
      'ref_source_id'   => new sfWidgetFormPropelChoice(array('model' => 'RefSource', 'add_empty' => true)),
      'send_app_format' => new sfWidgetFormInput(),
      'comment'         => new sfWidgetFormInput(),
      'letter_sent'     => new sfWidgetFormDate(),
      'contact_type_id' => new sfWidgetFormPropelChoice(array('model' => 'ContactType', 'add_empty' => true)),
      'date_added'      => new sfWidgetFormDate(),
      'date_updated'    => new sfWidgetFormDate(),
      'company_name'    => new sfWidgetFormInput(),
    ));

    $this->setValidators(array(
      'id'              => new sfValidatorPropelChoice(array('model' => 'Contact', 'column' => 'id', 'required' => false)),
      'person_id'       => new sfValidatorPropelChoice(array('model' => 'Person', 'column' => 'id')),
      'ref_source_id'   => new sfValidatorPropelChoice(array('model' => 'RefSource', 'column' => 'id', 'required' => false)),
      'send_app_format' => new sfValidatorString(array('max_length' => 10, 'required' => false)),
      'comment'         => new sfValidatorString(array('max_length' => 100, 'required' => false)),
      'letter_sent'     => new sfValidatorDate(array('required' => false)),
      'contact_type_id' => new sfValidatorPropelChoice(array('model' => 'ContactType', 'column' => 'id', 'required' => false)),
      'date_added'      => new sfValidatorDate(array('required' => false)),
      'date_updated'    => new sfValidatorDate(array('required' => false)),
      'company_name'    => new sfValidatorString(array('max_length' => 60, 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('contact[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Contact';
  }


}
