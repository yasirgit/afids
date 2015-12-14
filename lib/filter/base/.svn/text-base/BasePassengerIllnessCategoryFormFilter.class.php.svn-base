<?php

require_once(sfConfig::get('sf_lib_dir').'/filter/base/BaseFormFilterPropel.class.php');

/**
 * PassengerIllnessCategory filter form base class.
 *
 * @package    angelflight
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfPropelFormFilterGeneratedTemplate.php 16976 2009-04-04 12:47:44Z fabien $
 */
class BasePassengerIllnessCategoryFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'category_description'       => new sfWidgetFormFilterInput(),
      'super_category_description' => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'category_description'       => new sfValidatorPass(array('required' => false)),
      'super_category_description' => new sfValidatorPass(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('passenger_illness_category_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'PassengerIllnessCategory';
  }

  public function getFields()
  {
    return array(
      'id'                         => 'Number',
      'category_description'       => 'Text',
      'super_category_description' => 'Text',
    );
  }
}
