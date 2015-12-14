<?php

require_once(sfConfig::get('sf_lib_dir').'/filter/base/BaseFormFilterPropel.class.php');

/**
 * Pilot filter form base class.
 *
 * @package    angelflight
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfPropelFormFilterGeneratedTemplate.php 16976 2009-04-04 12:47:44Z fabien $
 */
class BasePilotFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'member_id'              => new sfWidgetFormPropelChoice(array('model' => 'Member', 'add_empty' => true)),
      'primary_airport_id'     => new sfWidgetFormPropelChoice(array('model' => 'Airport', 'add_empty' => true)),
      'secondary_home_bases'   => new sfWidgetFormFilterInput(),
      'total_hours'            => new sfWidgetFormFilterInput(),
      'license_type'           => new sfWidgetFormFilterInput(),
      'ifr'                    => new sfWidgetFormFilterInput(),
      'multi_engine'           => new sfWidgetFormFilterInput(),
      'se_instructor'          => new sfWidgetFormFilterInput(),
      'me_instructor'          => new sfWidgetFormFilterInput(),
      'other_ratings'          => new sfWidgetFormFilterInput(),
      'insurance_received'     => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => true)),
      'oriented_member_id'     => new sfWidgetFormPropelChoice(array('model' => 'Pilot', 'add_empty' => true)),
      'oriented_date'          => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => true)),
      'mop_active_status'      => new sfWidgetFormFilterInput(),
      'mop_oriented_member_id' => new sfWidgetFormPropelChoice(array('model' => 'Pilot', 'add_empty' => true)),
      'mop_oriented_date'      => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => true)),
      'mop_regions_served'     => new sfWidgetFormFilterInput(),
      'mop_served_by'          => new sfWidgetFormFilterInput(),
      'mop_qualifications'     => new sfWidgetFormFilterInput(),
      'hseats'                 => new sfWidgetFormFilterInput(),
      'transplant'             => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'member_id'              => new sfValidatorPropelChoice(array('required' => false, 'model' => 'Member', 'column' => 'id')),
      'primary_airport_id'     => new sfValidatorPropelChoice(array('required' => false, 'model' => 'Airport', 'column' => 'id')),
      'secondary_home_bases'   => new sfValidatorPass(array('required' => false)),
      'total_hours'            => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'license_type'           => new sfValidatorPass(array('required' => false)),
      'ifr'                    => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'multi_engine'           => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'se_instructor'          => new sfValidatorPass(array('required' => false)),
      'me_instructor'          => new sfValidatorPass(array('required' => false)),
      'other_ratings'          => new sfValidatorPass(array('required' => false)),
      'insurance_received'     => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
      'oriented_member_id'     => new sfValidatorPropelChoice(array('required' => false, 'model' => 'Pilot', 'column' => 'id')),
      'oriented_date'          => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
      'mop_active_status'      => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'mop_oriented_member_id' => new sfValidatorPropelChoice(array('required' => false, 'model' => 'Pilot', 'column' => 'id')),
      'mop_oriented_date'      => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
      'mop_regions_served'     => new sfValidatorPass(array('required' => false)),
      'mop_served_by'          => new sfValidatorPass(array('required' => false)),
      'mop_qualifications'     => new sfValidatorPass(array('required' => false)),
      'hseats'                 => new sfValidatorPass(array('required' => false)),
      'transplant'             => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
    ));

    $this->widgetSchema->setNameFormat('pilot_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Pilot';
  }

  public function getFields()
  {
    return array(
      'id'                     => 'Number',
      'member_id'              => 'ForeignKey',
      'primary_airport_id'     => 'ForeignKey',
      'secondary_home_bases'   => 'Text',
      'total_hours'            => 'Number',
      'license_type'           => 'Text',
      'ifr'                    => 'Number',
      'multi_engine'           => 'Number',
      'se_instructor'          => 'Text',
      'me_instructor'          => 'Text',
      'other_ratings'          => 'Text',
      'insurance_received'     => 'Date',
      'oriented_member_id'     => 'ForeignKey',
      'oriented_date'          => 'Date',
      'mop_active_status'      => 'Number',
      'mop_oriented_member_id' => 'ForeignKey',
      'mop_oriented_date'      => 'Date',
      'mop_regions_served'     => 'Text',
      'mop_served_by'          => 'Text',
      'mop_qualifications'     => 'Text',
      'hseats'                 => 'Text',
      'transplant'             => 'Number',
    );
  }
}
