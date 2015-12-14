<?php

require_once(sfConfig::get('sf_lib_dir').'/filter/base/BaseFormFilterPropel.class.php');

/**
 * RoleNotification filter form base class.
 *
 * @package    angelflight
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfPropelFormFilterGeneratedTemplate.php 16976 2009-04-04 12:47:44Z fabien $
 */
class BaseRoleNotificationFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'mid'          => new sfWidgetFormFilterInput(),
      'role_id'      => new sfWidgetFormFilterInput(),
      'notification' => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'mid'          => new sfValidatorPass(array('required' => false)),
      'role_id'      => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'notification' => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
    ));

    $this->widgetSchema->setNameFormat('role_notification_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'RoleNotification';
  }

  public function getFields()
  {
    return array(
      'id'           => 'Number',
      'mid'          => 'Text',
      'role_id'      => 'Number',
      'notification' => 'Number',
    );
  }
}
