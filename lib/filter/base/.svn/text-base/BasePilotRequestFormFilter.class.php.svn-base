<?php

require_once(sfConfig::get('sf_lib_dir').'/filter/base/BaseFormFilterPropel.class.php');

/**
 * PilotRequest filter form base class.
 *
 * @package    angelflight
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfPropelFormFilterGeneratedTemplate.php 16976 2009-04-04 12:47:44Z fabien $
 */
class BasePilotRequestFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'member_id'                => new sfWidgetFormPropelChoice(array('model' => 'Member', 'add_empty' => true)),
      'group_camp_id'            => new sfWidgetFormPropelChoice(array('model' => 'Camp', 'add_empty' => true)),
      'home_base'                => new sfWidgetFormFilterInput(),
      'number_seats'             => new sfWidgetFormFilterInput(),
      'total_weight'             => new sfWidgetFormFilterInput(),
      'multiple_pick'            => new sfWidgetFormFilterInput(),
      'leg_id'                   => new sfWidgetFormPropelChoice(array('model' => 'MissionLeg', 'add_empty' => true)),
      'date'                     => new sfWidgetFormFilterInput(),
      'pilot_type'               => new sfWidgetFormFilterInput(),
      'comment'                  => new sfWidgetFormFilterInput(),
      'accepted'                 => new sfWidgetFormFilterInput(),
      'processed'                => new sfWidgetFormFilterInput(),
      'pilot_status'             => new sfWidgetFormFilterInput(),
      'on_hold'                  => new sfWidgetFormFilterInput(),
      'mission_assistant_wanted' => new sfWidgetFormFilterInput(),
      'miss_assis_id'            => new sfWidgetFormFilterInput(),
      'mission_assistant_name'   => new sfWidgetFormFilterInput(),
      'ifr_backup_wanted'        => new sfWidgetFormFilterInput(),
      'created_at'               => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => true)),
      'number_date_assign'       => new sfWidgetFormFilterInput(),
      'aircraft_id'              => new sfWidgetFormFilterInput(),
      'tail'                     => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'member_id'                => new sfValidatorPropelChoice(array('required' => false, 'model' => 'Member', 'column' => 'id')),
      'group_camp_id'            => new sfValidatorPropelChoice(array('required' => false, 'model' => 'Camp', 'column' => 'id')),
      'home_base'                => new sfValidatorPass(array('required' => false)),
      'number_seats'             => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'total_weight'             => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'multiple_pick'            => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'leg_id'                   => new sfValidatorPropelChoice(array('required' => false, 'model' => 'MissionLeg', 'column' => 'id')),
      'date'                     => new sfValidatorPass(array('required' => false)),
      'pilot_type'               => new sfValidatorPass(array('required' => false)),
      'comment'                  => new sfValidatorPass(array('required' => false)),
      'accepted'                 => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'processed'                => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'pilot_status'             => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'on_hold'                  => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'mission_assistant_wanted' => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'miss_assis_id'            => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'mission_assistant_name'   => new sfValidatorPass(array('required' => false)),
      'ifr_backup_wanted'        => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'created_at'               => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
      'number_date_assign'       => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'aircraft_id'              => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'tail'                     => new sfValidatorPass(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('pilot_request_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'PilotRequest';
  }

  public function getFields()
  {
    return array(
      'id'                       => 'Number',
      'member_id'                => 'ForeignKey',
      'group_camp_id'            => 'ForeignKey',
      'home_base'                => 'Text',
      'number_seats'             => 'Number',
      'total_weight'             => 'Number',
      'multiple_pick'            => 'Number',
      'leg_id'                   => 'ForeignKey',
      'date'                     => 'Text',
      'pilot_type'               => 'Text',
      'comment'                  => 'Text',
      'accepted'                 => 'Number',
      'processed'                => 'Number',
      'pilot_status'             => 'Number',
      'on_hold'                  => 'Number',
      'mission_assistant_wanted' => 'Number',
      'miss_assis_id'            => 'Number',
      'mission_assistant_name'   => 'Text',
      'ifr_backup_wanted'        => 'Number',
      'created_at'               => 'Date',
      'number_date_assign'       => 'Number',
      'aircraft_id'              => 'Number',
      'tail'                     => 'Text',
    );
  }
}
