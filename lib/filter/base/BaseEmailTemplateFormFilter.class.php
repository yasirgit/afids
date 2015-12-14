<?php

require_once(sfConfig::get('sf_lib_dir').'/filter/base/BaseFormFilterPropel.class.php');

/**
 * EmailTemplate filter form base class.
 *
 * @package    angelflight
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfPropelFormFilterGeneratedTemplate.php 16976 2009-04-04 12:47:44Z fabien $
 */
class BaseEmailTemplateFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'name'         => new sfWidgetFormFilterInput(),
      'subject'      => new sfWidgetFormFilterInput(),
      'sender_name'  => new sfWidgetFormFilterInput(),
      'sender_email' => new sfWidgetFormFilterInput(),
      'body'         => new sfWidgetFormFilterInput(),
      'person_id'    => new sfWidgetFormPropelChoice(array('model' => 'Person', 'add_empty' => true)),
    ));

    $this->setValidators(array(
      'name'         => new sfValidatorPass(array('required' => false)),
      'subject'      => new sfValidatorPass(array('required' => false)),
      'sender_name'  => new sfValidatorPass(array('required' => false)),
      'sender_email' => new sfValidatorPass(array('required' => false)),
      'body'         => new sfValidatorPass(array('required' => false)),
      'person_id'    => new sfValidatorPropelChoice(array('required' => false, 'model' => 'Person', 'column' => 'id')),
    ));

    $this->widgetSchema->setNameFormat('email_template_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'EmailTemplate';
  }

  public function getFields()
  {
    return array(
      'id'           => 'Number',
      'name'         => 'Text',
      'subject'      => 'Text',
      'sender_name'  => 'Text',
      'sender_email' => 'Text',
      'body'         => 'Text',
      'person_id'    => 'ForeignKey',
    );
  }
}
