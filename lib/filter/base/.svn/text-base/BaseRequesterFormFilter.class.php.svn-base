<?php

require_once(sfConfig::get('sf_lib_dir').'/filter/base/BaseFormFilterPropel.class.php');

/**
 * Requester filter form base class.
 *
 * @package    angelflight
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfPropelFormFilterGeneratedTemplate.php 16976 2009-04-04 12:47:44Z fabien $
 */
class BaseRequesterFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'person_id'   => new sfWidgetFormPropelChoice(array('model' => 'Person', 'add_empty' => true)),
      'agency_id'   => new sfWidgetFormPropelChoice(array('model' => 'Agency', 'add_empty' => true)),
      'title'       => new sfWidgetFormFilterInput(),
      'how_find_af' => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'person_id'   => new sfValidatorPropelChoice(array('required' => false, 'model' => 'Person', 'column' => 'id')),
      'agency_id'   => new sfValidatorPropelChoice(array('required' => false, 'model' => 'Agency', 'column' => 'id')),
      'title'       => new sfValidatorPass(array('required' => false)),
      'how_find_af' => new sfValidatorPass(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('requester_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Requester';
  }

  public function getFields()
  {
    return array(
      'id'          => 'Number',
      'person_id'   => 'ForeignKey',
      'agency_id'   => 'ForeignKey',
      'title'       => 'Text',
      'how_find_af' => 'Text',
    );
  }
}
