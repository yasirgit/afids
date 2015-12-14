<?php

require_once(sfConfig::get('sf_lib_dir').'/filter/base/BaseFormFilterPropel.class.php');

/**
 * EmailListPerson filter form base class.
 *
 * @package    angelflight
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfPropelFormFilterGeneratedTemplate.php 16976 2009-04-04 12:47:44Z fabien $
 */
class BaseEmailListPersonFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'list_id'   => new sfWidgetFormPropelChoice(array('model' => 'EmailList', 'add_empty' => true)),
      'person_id' => new sfWidgetFormPropelChoice(array('model' => 'Person', 'add_empty' => true)),
    ));

    $this->setValidators(array(
      'list_id'   => new sfValidatorPropelChoice(array('required' => false, 'model' => 'EmailList', 'column' => 'id')),
      'person_id' => new sfValidatorPropelChoice(array('required' => false, 'model' => 'Person', 'column' => 'id')),
    ));

    $this->widgetSchema->setNameFormat('email_list_person_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'EmailListPerson';
  }

  public function getFields()
  {
    return array(
      'id'        => 'Number',
      'list_id'   => 'ForeignKey',
      'person_id' => 'ForeignKey',
    );
  }
}
