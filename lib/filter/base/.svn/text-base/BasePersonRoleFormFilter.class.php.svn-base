<?php

require_once(sfConfig::get('sf_lib_dir').'/filter/base/BaseFormFilterPropel.class.php');

/**
 * PersonRole filter form base class.
 *
 * @package    angelflight
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfPropelFormFilterGeneratedTemplate.php 16976 2009-04-04 12:47:44Z fabien $
 */
class BasePersonRoleFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'priority'  => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'priority'  => new sfValidatorPass(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('person_role_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'PersonRole';
  }

  public function getFields()
  {
    return array(
      'person_id' => 'ForeignKey',
      'role_id'   => 'ForeignKey',
      'priority'  => 'Text',
    );
  }
}
