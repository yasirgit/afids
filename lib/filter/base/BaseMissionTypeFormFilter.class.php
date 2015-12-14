<?php

require_once(sfConfig::get('sf_lib_dir').'/filter/base/BaseFormFilterPropel.class.php');

/**
 * MissionType filter form base class.
 *
 * @package    angelflight
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfPropelFormFilterGeneratedTemplate.php 16976 2009-04-04 12:47:44Z fabien $
 */
class BaseMissionTypeFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'name'                           => new sfWidgetFormFilterInput(),
      'stat_count'                     => new sfWidgetFormFilterInput(),
      'color'                          => new sfWidgetFormFilterInput(),
      'user_filter_mission_types_list' => new sfWidgetFormPropelChoice(array('model' => 'UserFilter', 'add_empty' => true)),
    ));

    $this->setValidators(array(
      'name'                           => new sfValidatorPass(array('required' => false)),
      'stat_count'                     => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'color'                          => new sfValidatorPass(array('required' => false)),
      'user_filter_mission_types_list' => new sfValidatorPropelChoice(array('model' => 'UserFilter', 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('mission_type_filters[%s]');

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

    $criteria->addJoin(UserFilterMissionTypesPeer::MISSION_TYPE_ID, MissionTypePeer::ID);

    $value = array_pop($values);
    $criterion = $criteria->getNewCriterion(UserFilterMissionTypesPeer::USER_FILTER_ID, $value);

    foreach ($values as $value)
    {
      $criterion->addOr($criteria->getNewCriterion(UserFilterMissionTypesPeer::USER_FILTER_ID, $value));
    }

    $criteria->add($criterion);
  }

  public function getModelName()
  {
    return 'MissionType';
  }

  public function getFields()
  {
    return array(
      'id'                             => 'Number',
      'name'                           => 'Text',
      'stat_count'                     => 'Number',
      'color'                          => 'Text',
      'user_filter_mission_types_list' => 'ManyKey',
    );
  }
}
