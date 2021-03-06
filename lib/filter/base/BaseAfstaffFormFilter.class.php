<?php

require_once(sfConfig::get('sf_lib_dir').'/filter/base/BaseFormFilterPropel.class.php');

/**
 * Afstaff filter form base class.
 *
 * @package    angelflight
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfPropelFormFilterGeneratedTemplate.php 16976 2009-04-04 12:47:44Z fabien $
 */
class BaseAfstaffFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'person_id' => new sfWidgetFormPropelChoice(array('model' => 'Person', 'add_empty' => true)),
      'position'  => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'person_id' => new sfValidatorPropelChoice(array('required' => false, 'model' => 'Person', 'column' => 'id')),
      'position'  => new sfValidatorPass(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('afstaff_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Afstaff';
  }

  public function getFields()
  {
    return array(
      'id'        => 'Number',
      'person_id' => 'ForeignKey',
      'position'  => 'Text',
    );
  }
}
