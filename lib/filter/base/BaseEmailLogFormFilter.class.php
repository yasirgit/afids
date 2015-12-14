<?php

require_once(sfConfig::get('sf_lib_dir').'/filter/base/BaseFormFilterPropel.class.php');

/**
 * EmailLog filter form base class.
 *
 * @package    angelflight
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfPropelFormFilterGeneratedTemplate.php 16976 2009-04-04 12:47:44Z fabien $
 */
class BaseEmailLogFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'send_date'       => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => true)),
      'sender_name'     => new sfWidgetFormFilterInput(),
      'sender_email'    => new sfWidgetFormFilterInput(),
      'recipient_count' => new sfWidgetFormFilterInput(),
      'letter_id'       => new sfWidgetFormPropelChoice(array('model' => 'EmailLetter', 'add_empty' => true)),
      'error_count'     => new sfWidgetFormFilterInput(),
      'batch_id'        => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'send_date'       => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
      'sender_name'     => new sfValidatorPass(array('required' => false)),
      'sender_email'    => new sfValidatorPass(array('required' => false)),
      'recipient_count' => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'letter_id'       => new sfValidatorPropelChoice(array('required' => false, 'model' => 'EmailLetter', 'column' => 'id')),
      'error_count'     => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'batch_id'        => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
    ));

    $this->widgetSchema->setNameFormat('email_log_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'EmailLog';
  }

  public function getFields()
  {
    return array(
      'id'              => 'Number',
      'send_date'       => 'Date',
      'sender_name'     => 'Text',
      'sender_email'    => 'Text',
      'recipient_count' => 'Number',
      'letter_id'       => 'ForeignKey',
      'error_count'     => 'Number',
      'batch_id'        => 'Number',
    );
  }
}
