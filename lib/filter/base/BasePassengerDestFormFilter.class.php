<?php

require_once(sfConfig::get('sf_lib_dir').'/filter/base/BaseFormFilterPropel.class.php');

/**
 * PassengerDest filter form base class.
 *
 * @package    angelflight
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfPropelFormFilterGeneratedTemplate.php 16976 2009-04-04 12:47:44Z fabien $
 */
class BasePassengerDestFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'passenger_id'           => new sfWidgetFormFilterInput(),
      'lodging'                => new sfWidgetFormFilterInput(),
      'facility'               => new sfWidgetFormFilterInput(),
      'facility_city'          => new sfWidgetFormFilterInput(),
      'facility_state'         => new sfWidgetFormFilterInput(),
      'lod_phone'              => new sfWidgetFormFilterInput(),
      'lod_phone_comment'      => new sfWidgetFormFilterInput(),
      'fac_phone'              => new sfWidgetFormFilterInput(),
      'facility_phone_comment' => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'passenger_id'           => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'lodging'                => new sfValidatorPass(array('required' => false)),
      'facility'               => new sfValidatorPass(array('required' => false)),
      'facility_city'          => new sfValidatorPass(array('required' => false)),
      'facility_state'         => new sfValidatorPass(array('required' => false)),
      'lod_phone'              => new sfValidatorPass(array('required' => false)),
      'lod_phone_comment'      => new sfValidatorPass(array('required' => false)),
      'fac_phone'              => new sfValidatorPass(array('required' => false)),
      'facility_phone_comment' => new sfValidatorPass(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('passenger_dest_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'PassengerDest';
  }

  public function getFields()
  {
    return array(
      'id'                     => 'Number',
      'passenger_id'           => 'Number',
      'lodging'                => 'Text',
      'facility'               => 'Text',
      'facility_city'          => 'Text',
      'facility_state'         => 'Text',
      'lod_phone'              => 'Text',
      'lod_phone_comment'      => 'Text',
      'fac_phone'              => 'Text',
      'facility_phone_comment' => 'Text',
    );
  }
}
