<?php

require_once(sfConfig::get('sf_lib_dir').'/filter/base/BaseFormFilterPropel.class.php');

/**
 * EmailLetter filter form base class.
 *
 * @package    angelflight
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfPropelFormFilterGeneratedTemplate.php 16976 2009-04-04 12:47:44Z fabien $
 */
class BaseEmailLetterFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'subject'          => new sfWidgetFormFilterInput(),
      'sender_name'      => new sfWidgetFormFilterInput(),
      'sender_email'     => new sfWidgetFormFilterInput(),
      'body'             => new sfWidgetFormFilterInput(),
      'attach_file_path' => new sfWidgetFormFilterInput(),
      'recipients'       => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'subject'          => new sfValidatorPass(array('required' => false)),
      'sender_name'      => new sfValidatorPass(array('required' => false)),
      'sender_email'     => new sfValidatorPass(array('required' => false)),
      'body'             => new sfValidatorPass(array('required' => false)),
      'attach_file_path' => new sfValidatorPass(array('required' => false)),
      'recipients'       => new sfValidatorPass(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('email_letter_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'EmailLetter';
  }

  public function getFields()
  {
    return array(
      'id'               => 'Number',
      'subject'          => 'Text',
      'sender_name'      => 'Text',
      'sender_email'     => 'Text',
      'body'             => 'Text',
      'attach_file_path' => 'Text',
      'recipients'       => 'Text',
    );
  }
}
