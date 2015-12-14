<?php

require_once(sfConfig::get('sf_lib_dir').'/filter/base/BaseFormFilterPropel.class.php');

/**
 * Fbo filter form base class.
 *
 * @package    angelflight
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfPropelFormFilterGeneratedTemplate.php 16976 2009-04-04 12:47:44Z fabien $
 */
class BaseFboFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'airport_id'      => new sfWidgetFormPropelChoice(array('model' => 'Airport', 'add_empty' => true)),
      'name'            => new sfWidgetFormFilterInput(),
      'voice_phone'     => new sfWidgetFormFilterInput(),
      'fax_phone'       => new sfWidgetFormFilterInput(),
      'discount_amount' => new sfWidgetFormFilterInput(),
      'fuel_discount'   => new sfWidgetFormFilterInput(),
      'default_fbo'     => new sfWidgetFormFilterInput(),
      'address'         => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'airport_id'      => new sfValidatorPropelChoice(array('required' => false, 'model' => 'Airport', 'column' => 'id')),
      'name'            => new sfValidatorPass(array('required' => false)),
      'voice_phone'     => new sfValidatorPass(array('required' => false)),
      'fax_phone'       => new sfValidatorPass(array('required' => false)),
      'discount_amount' => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'fuel_discount'   => new sfValidatorSchemaFilter('text', new sfValidatorNumber(array('required' => false))),
      'default_fbo'     => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'address'         => new sfValidatorPass(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('fbo_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Fbo';
  }

  public function getFields()
  {
    return array(
      'id'              => 'Number',
      'airport_id'      => 'ForeignKey',
      'name'            => 'Text',
      'voice_phone'     => 'Text',
      'fax_phone'       => 'Text',
      'discount_amount' => 'Number',
      'fuel_discount'   => 'Number',
      'default_fbo'     => 'Number',
      'address'         => 'Text',
    );
  }
}
