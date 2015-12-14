<?php

require_once(sfConfig::get('sf_lib_dir').'/filter/base/BaseFormFilterPropel.class.php');

/**
 * VpoRequestAnimal filter form base class.
 *
 * @package    angelflight
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfPropelFormFilterGeneratedTemplate.php 16976 2009-04-04 12:47:44Z fabien $
 */
class BaseVpoRequestAnimalFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'request_id'        => new sfWidgetFormPropelChoice(array('model' => 'VpoRequest', 'add_empty' => true)),
      'animal_name'       => new sfWidgetFormFilterInput(),
      'animal_type'       => new sfWidgetFormFilterInput(),
      'weight'            => new sfWidgetFormFilterInput(),
      'harness'           => new sfWidgetFormFilterInput(),
      'kennel_height'     => new sfWidgetFormFilterInput(),
      'kennel_width'      => new sfWidgetFormFilterInput(),
      'kennel_length'     => new sfWidgetFormFilterInput(),
      'handler_traveling' => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'request_id'        => new sfValidatorPropelChoice(array('required' => false, 'model' => 'VpoRequest', 'column' => 'id')),
      'animal_name'       => new sfValidatorPass(array('required' => false)),
      'animal_type'       => new sfValidatorPass(array('required' => false)),
      'weight'            => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'harness'           => new sfValidatorPass(array('required' => false)),
      'kennel_height'     => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'kennel_width'      => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'kennel_length'     => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'handler_traveling' => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
    ));

    $this->widgetSchema->setNameFormat('vpo_request_animal_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'VpoRequestAnimal';
  }

  public function getFields()
  {
    return array(
      'id'                => 'Number',
      'request_id'        => 'ForeignKey',
      'animal_name'       => 'Text',
      'animal_type'       => 'Text',
      'weight'            => 'Number',
      'harness'           => 'Text',
      'kennel_height'     => 'Number',
      'kennel_width'      => 'Number',
      'kennel_length'     => 'Number',
      'handler_traveling' => 'Number',
    );
  }
}
