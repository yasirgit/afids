<?php

require_once(sfConfig::get('sf_lib_dir').'/filter/base/BaseFormFilterPropel.class.php');

/**
 * Contact filter form base class.
 *
 * @package    angelflight
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfPropelFormFilterGeneratedTemplate.php 16976 2009-04-04 12:47:44Z fabien $
 */
class BaseContactFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'person_id'       => new sfWidgetFormPropelChoice(array('model' => 'Person', 'add_empty' => true)),
      'ref_source_id'   => new sfWidgetFormPropelChoice(array('model' => 'RefSource', 'add_empty' => true)),
      'send_app_format' => new sfWidgetFormFilterInput(),
      'comment'         => new sfWidgetFormFilterInput(),
      'letter_sent'     => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => true)),
      'contact_type_id' => new sfWidgetFormPropelChoice(array('model' => 'ContactType', 'add_empty' => true)),
      'date_added'      => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => true)),
      'date_updated'    => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => true)),
      'company_name'    => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'person_id'       => new sfValidatorPropelChoice(array('required' => false, 'model' => 'Person', 'column' => 'id')),
      'ref_source_id'   => new sfValidatorPropelChoice(array('required' => false, 'model' => 'RefSource', 'column' => 'id')),
      'send_app_format' => new sfValidatorPass(array('required' => false)),
      'comment'         => new sfValidatorPass(array('required' => false)),
      'letter_sent'     => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
      'contact_type_id' => new sfValidatorPropelChoice(array('required' => false, 'model' => 'ContactType', 'column' => 'id')),
      'date_added'      => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
      'date_updated'    => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
      'company_name'    => new sfValidatorPass(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('contact_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Contact';
  }

  public function getFields()
  {
    return array(
      'id'              => 'Number',
      'person_id'       => 'ForeignKey',
      'ref_source_id'   => 'ForeignKey',
      'send_app_format' => 'Text',
      'comment'         => 'Text',
      'letter_sent'     => 'Date',
      'contact_type_id' => 'ForeignKey',
      'date_added'      => 'Date',
      'date_updated'    => 'Date',
      'company_name'    => 'Text',
    );
  }
}
