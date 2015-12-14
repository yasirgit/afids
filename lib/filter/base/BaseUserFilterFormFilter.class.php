<?php

require_once(sfConfig::get('sf_lib_dir').'/filter/base/BaseFormFilterPropel.class.php');

/**
 * UserFilter filter form base class.
 *
 * @package    angelflight
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfPropelFormFilterGeneratedTemplate.php 16976 2009-04-04 12:47:44Z fabien $
 */
class BaseUserFilterFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'person_id'                      => new sfWidgetFormFilterInput(),
      'date_range1'                    => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => true)),
      'date_range2'                    => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => true)),
      'day1'                           => new sfWidgetFormFilterInput(),
      'day2'                           => new sfWidgetFormFilterInput(),
      'day3'                           => new sfWidgetFormFilterInput(),
      'day4'                           => new sfWidgetFormFilterInput(),
      'day5'                           => new sfWidgetFormFilterInput(),
      'day6'                           => new sfWidgetFormFilterInput(),
      'day7'                           => new sfWidgetFormFilterInput(),
      'wing'                           => new sfWidgetFormFilterInput(),
      'ident'                          => new sfWidgetFormFilterInput(),
      'city'                           => new sfWidgetFormFilterInput(),
      'zipcode'                        => new sfWidgetFormFilterInput(),
      'state'                          => new sfWidgetFormFilterInput(),
      'orgin'                          => new sfWidgetFormFilterInput(),
      'dest'                           => new sfWidgetFormFilterInput(),
      'is_pilot'                       => new sfWidgetFormFilterInput(),
      'is_ma'                          => new sfWidgetFormFilterInput(),
      'ifr_backup'                     => new sfWidgetFormFilterInput(),
      'filled'                         => new sfWidgetFormFilterInput(),
      'open'                           => new sfWidgetFormFilterInput(),
      'max_passenger'                  => new sfWidgetFormFilterInput(),
      'max_weight'                     => new sfWidgetFormFilterInput(),
      'max_distance'                   => new sfWidgetFormFilterInput(),
      'max_effciency'                  => new sfWidgetFormFilterInput(),
      'availability'                   => new sfWidgetFormFilterInput(),
      'alltype'                        => new sfWidgetFormFilterInput(),
      'user_filter_mission_types_list' => new sfWidgetFormPropelChoice(array('model' => 'MissionType', 'add_empty' => true)),
    ));

    $this->setValidators(array(
      'person_id'                      => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'date_range1'                    => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
      'date_range2'                    => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
      'day1'                           => new sfValidatorPass(array('required' => false)),
      'day2'                           => new sfValidatorPass(array('required' => false)),
      'day3'                           => new sfValidatorPass(array('required' => false)),
      'day4'                           => new sfValidatorPass(array('required' => false)),
      'day5'                           => new sfValidatorPass(array('required' => false)),
      'day6'                           => new sfValidatorPass(array('required' => false)),
      'day7'                           => new sfValidatorPass(array('required' => false)),
      'wing'                           => new sfValidatorPass(array('required' => false)),
      'ident'                          => new sfValidatorPass(array('required' => false)),
      'city'                           => new sfValidatorPass(array('required' => false)),
      'zipcode'                        => new sfValidatorPass(array('required' => false)),
      'state'                          => new sfValidatorPass(array('required' => false)),
      'orgin'                          => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'dest'                           => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'is_pilot'                       => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'is_ma'                          => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'ifr_backup'                     => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'filled'                         => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'open'                           => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'max_passenger'                  => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'max_weight'                     => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'max_distance'                   => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'max_effciency'                  => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'availability'                   => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'alltype'                        => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'user_filter_mission_types_list' => new sfValidatorPropelChoice(array('model' => 'MissionType', 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('user_filter_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function addUserFilterMissionTypesListColumnCriteria(Criteria $criteria, $field, $values)
  {
    if (!is_array($values))
    {
      $values = array($values);
    }

    if (!count($values))
    {
      return;
    }

    $criteria->addJoin(UserFilterMissionTypesPeer::USER_FILTER_ID, UserFilterPeer::ID);

    $value = array_pop($values);
    $criterion = $criteria->getNewCriterion(UserFilterMissionTypesPeer::MISSION_TYPE_ID, $value);

    foreach ($values as $value)
    {
      $criterion->addOr($criteria->getNewCriterion(UserFilterMissionTypesPeer::MISSION_TYPE_ID, $value));
    }

    $criteria->add($criterion);
  }

  public function getModelName()
  {
    return 'UserFilter';
  }

  public function getFields()
  {
    return array(
      'id'                             => 'Number',
      'person_id'                      => 'Number',
      'date_range1'                    => 'Date',
      'date_range2'                    => 'Date',
      'day1'                           => 'Text',
      'day2'                           => 'Text',
      'day3'                           => 'Text',
      'day4'                           => 'Text',
      'day5'                           => 'Text',
      'day6'                           => 'Text',
      'day7'                           => 'Text',
      'wing'                           => 'Text',
      'ident'                          => 'Text',
      'city'                           => 'Text',
      'zipcode'                        => 'Text',
      'state'                          => 'Text',
      'orgin'                          => 'Number',
      'dest'                           => 'Number',
      'is_pilot'                       => 'Number',
      'is_ma'                          => 'Number',
      'ifr_backup'                     => 'Number',
      'filled'                         => 'Number',
      'open'                           => 'Number',
      'max_passenger'                  => 'Number',
      'max_weight'                     => 'Number',
      'max_distance'                   => 'Number',
      'max_effciency'                  => 'Number',
      'availability'                   => 'Number',
      'alltype'                        => 'Number',
      'user_filter_mission_types_list' => 'ManyKey',
    );
  }
}
