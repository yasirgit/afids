<?php

require_once(sfConfig::get('sf_lib_dir').'/filter/base/BaseFormFilterPropel.class.php');

/**
 * RpChildrenPassengers filter form base class.
 *
 * @package    angelflight
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfPropelFormFilterGeneratedTemplate.php 16976 2009-04-04 12:47:44Z fabien $
 */
class BaseRpChildrenPassengersFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'mission_date'       => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => true)),
      'displayDate'        => new sfWidgetFormFilterInput(),
      'first_name'         => new sfWidgetFormFilterInput(),
      'initial'            => new sfWidgetFormFilterInput(),
      'last_name'          => new sfWidgetFormFilterInput(),
      'passCity'           => new sfWidgetFormFilterInput(),
      'passState'          => new sfWidgetFormFilterInput(),
      'passCounty'         => new sfWidgetFormFilterInput(),
      'originIdent'        => new sfWidgetFormFilterInput(),
      'originName'         => new sfWidgetFormFilterInput(),
      'originCity'         => new sfWidgetFormFilterInput(),
      'originState'        => new sfWidgetFormFilterInput(),
      'destIdent'          => new sfWidgetFormFilterInput(),
      'destName'           => new sfWidgetFormFilterInput(),
      'destCity'           => new sfWidgetFormFilterInput(),
      'destState'          => new sfWidgetFormFilterInput(),
      'agencyName'         => new sfWidgetFormFilterInput(),
      'facility_name'      => new sfWidgetFormFilterInput(),
      'illness'            => new sfWidgetFormFilterInput(),
      'passAge'            => new sfWidgetFormFilterInput(),
      'wing_id'            => new sfWidgetFormFilterInput(),
      'passengerIllness'   => new sfWidgetFormFilterInput(),
      'passengerIllnessID' => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'mission_date'       => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
      'displayDate'        => new sfValidatorPass(array('required' => false)),
      'first_name'         => new sfValidatorPass(array('required' => false)),
      'initial'            => new sfValidatorPass(array('required' => false)),
      'last_name'          => new sfValidatorPass(array('required' => false)),
      'passCity'           => new sfValidatorPass(array('required' => false)),
      'passState'          => new sfValidatorPass(array('required' => false)),
      'passCounty'         => new sfValidatorPass(array('required' => false)),
      'originIdent'        => new sfValidatorPass(array('required' => false)),
      'originName'         => new sfValidatorPass(array('required' => false)),
      'originCity'         => new sfValidatorPass(array('required' => false)),
      'originState'        => new sfValidatorPass(array('required' => false)),
      'destIdent'          => new sfValidatorPass(array('required' => false)),
      'destName'           => new sfValidatorPass(array('required' => false)),
      'destCity'           => new sfValidatorPass(array('required' => false)),
      'destState'          => new sfValidatorPass(array('required' => false)),
      'agencyName'         => new sfValidatorPass(array('required' => false)),
      'facility_name'      => new sfValidatorPass(array('required' => false)),
      'illness'            => new sfValidatorPass(array('required' => false)),
      'passAge'            => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'wing_id'            => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'passengerIllness'   => new sfValidatorPass(array('required' => false)),
      'passengerIllnessID' => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
    ));

    $this->widgetSchema->setNameFormat('rp_children_passengers_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'RpChildrenPassengers';
  }

  public function getFields()
  {
    return array(
      'mission_date'       => 'Date',
      'displayDate'        => 'Text',
      'first_name'         => 'Text',
      'initial'            => 'Text',
      'last_name'          => 'Text',
      'passCity'           => 'Text',
      'passState'          => 'Text',
      'passCounty'         => 'Text',
      'originIdent'        => 'Text',
      'originName'         => 'Text',
      'originCity'         => 'Text',
      'originState'        => 'Text',
      'destIdent'          => 'Text',
      'destName'           => 'Text',
      'destCity'           => 'Text',
      'destState'          => 'Text',
      'agencyName'         => 'Text',
      'facility_name'      => 'Text',
      'illness'            => 'Text',
      'passAge'            => 'Number',
      'wing_id'            => 'Number',
      'passengerIllness'   => 'Text',
      'passengerIllnessID' => 'Number',
      'id'                 => 'Number',
    );
  }
}
