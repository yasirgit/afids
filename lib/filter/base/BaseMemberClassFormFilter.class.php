<?php

require_once(sfConfig::get('sf_lib_dir').'/filter/base/BaseFormFilterPropel.class.php');

/**
 * MemberClass filter form base class.
 *
 * @package    angelflight
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfPropelFormFilterGeneratedTemplate.php 16976 2009-04-04 12:47:44Z fabien $
 */
class BaseMemberClassFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'name'            => new sfWidgetFormFilterInput(),
      'initial_fee'     => new sfWidgetFormFilterInput(),
      'renewal_fee'     => new sfWidgetFormFilterInput(),
      'sub_initial_fee' => new sfWidgetFormFilterInput(),
      'sub_renewal_fee' => new sfWidgetFormFilterInput(),
      'renewal_period'  => new sfWidgetFormFilterInput(),
      'fly_missions'    => new sfWidgetFormFilterInput(),
      'newsletters'     => new sfWidgetFormFilterInput(),
      'sub_newsletters' => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'name'            => new sfValidatorPass(array('required' => false)),
      'initial_fee'     => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'renewal_fee'     => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'sub_initial_fee' => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'sub_renewal_fee' => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'renewal_period'  => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'fly_missions'    => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'newsletters'     => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'sub_newsletters' => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
    ));

    $this->widgetSchema->setNameFormat('member_class_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'MemberClass';
  }

  public function getFields()
  {
    return array(
      'id'              => 'Number',
      'name'            => 'Text',
      'initial_fee'     => 'Number',
      'renewal_fee'     => 'Number',
      'sub_initial_fee' => 'Number',
      'sub_renewal_fee' => 'Number',
      'renewal_period'  => 'Number',
      'fly_missions'    => 'Number',
      'newsletters'     => 'Number',
      'sub_newsletters' => 'Number',
    );
  }
}
