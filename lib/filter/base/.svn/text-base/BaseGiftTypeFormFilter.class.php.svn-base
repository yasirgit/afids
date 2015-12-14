<?php

require_once(sfConfig::get('sf_lib_dir').'/filter/base/BaseFormFilterPropel.class.php');

/**
 * GiftType filter form base class.
 *
 * @package    angelflight
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfPropelFormFilterGeneratedTemplate.php 16976 2009-04-04 12:47:44Z fabien $
 */
class BaseGiftTypeFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'gift_type_desc' => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'gift_type_desc' => new sfValidatorPass(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('gift_type_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'GiftType';
  }

  public function getFields()
  {
    return array(
      'id'             => 'Number',
      'gift_type_desc' => 'Text',
    );
  }
}
