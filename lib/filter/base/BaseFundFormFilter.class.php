<?php

require_once(sfConfig::get('sf_lib_dir').'/filter/base/BaseFormFilterPropel.class.php');

/**
 * Fund filter form base class.
 *
 * @package    angelflight
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfPropelFormFilterGeneratedTemplate.php 16976 2009-04-04 12:47:44Z fabien $
 */
class BaseFundFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'fund_desc' => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'fund_desc' => new sfValidatorPass(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('fund_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Fund';
  }

  public function getFields()
  {
    return array(
      'id'        => 'Number',
      'fund_desc' => 'Text',
    );
  }
}
