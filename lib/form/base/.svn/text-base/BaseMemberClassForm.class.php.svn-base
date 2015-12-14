<?php

/**
 * MemberClass form base class.
 *
 * @package    angelflight
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfPropelFormGeneratedTemplate.php 16976 2009-04-04 12:47:44Z fabien $
 */
class BaseMemberClassForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'              => new sfWidgetFormInputHidden(),
      'name'            => new sfWidgetFormInput(),
      'initial_fee'     => new sfWidgetFormInput(),
      'renewal_fee'     => new sfWidgetFormInput(),
      'sub_initial_fee' => new sfWidgetFormInput(),
      'sub_renewal_fee' => new sfWidgetFormInput(),
      'renewal_period'  => new sfWidgetFormInput(),
      'fly_missions'    => new sfWidgetFormInput(),
      'newsletters'     => new sfWidgetFormInput(),
      'sub_newsletters' => new sfWidgetFormInput(),
    ));

    $this->setValidators(array(
      'id'              => new sfValidatorPropelChoice(array('model' => 'MemberClass', 'column' => 'id', 'required' => false)),
      'name'            => new sfValidatorString(array('max_length' => 20)),
      'initial_fee'     => new sfValidatorInteger(),
      'renewal_fee'     => new sfValidatorInteger(),
      'sub_initial_fee' => new sfValidatorInteger(),
      'sub_renewal_fee' => new sfValidatorInteger(),
      'renewal_period'  => new sfValidatorInteger(array('required' => false)),
      'fly_missions'    => new sfValidatorInteger(),
      'newsletters'     => new sfValidatorInteger(),
      'sub_newsletters' => new sfValidatorInteger(),
    ));

    $this->widgetSchema->setNameFormat('member_class[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'MemberClass';
  }


}
