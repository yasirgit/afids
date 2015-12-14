<?php

require_once(sfConfig::get('sf_lib_dir').'/filter/base/BaseFormFilterPropel.class.php');

/**
 * Companion filter form base class.
 *
 * @package    angelflight
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfPropelFormFilterGeneratedTemplate.php 16976 2009-04-04 12:47:44Z fabien $
 */
class BaseCompanionFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'passenger_id'            => new sfWidgetFormPropelChoice(array('model' => 'Passenger', 'add_empty' => true)),
      'name'                    => new sfWidgetFormFilterInput(),
      'relationship'            => new sfWidgetFormFilterInput(),
      'date_of_birth'           => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => true)),
      'weight'                  => new sfWidgetFormFilterInput(),
      'companion_phone'         => new sfWidgetFormFilterInput(),
      'companion_phone_comment' => new sfWidgetFormFilterInput(),
      'person_id'               => new sfWidgetFormPropelChoice(array('model' => 'Person', 'add_empty' => true)),
      'mission_companion_list'  => new sfWidgetFormPropelChoice(array('model' => 'Mission', 'add_empty' => true)),
    ));

    $this->setValidators(array(
      'passenger_id'            => new sfValidatorPropelChoice(array('required' => false, 'model' => 'Passenger', 'column' => 'id')),
      'name'                    => new sfValidatorPass(array('required' => false)),
      'relationship'            => new sfValidatorPass(array('required' => false)),
      'date_of_birth'           => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
      'weight'                  => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'companion_phone'         => new sfValidatorPass(array('required' => false)),
      'companion_phone_comment' => new sfValidatorPass(array('required' => false)),
      'person_id'               => new sfValidatorPropelChoice(array('required' => false, 'model' => 'Person', 'column' => 'id')),
      'mission_companion_list'  => new sfValidatorPropelChoice(array('model' => 'Mission', 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('companion_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function addMissionCompanionListColumnCriteria(Criteria $criteria, $field, $values)
  {
    if (!is_array($values))
    {
      $values = array($values);
    }

    if (!count($values))
    {
      return;
    }

    $criteria->addJoin(MissionCompanionPeer::COMPANION_ID, CompanionPeer::ID);

    $value = array_pop($values);
    $criterion = $criteria->getNewCriterion(MissionCompanionPeer::MISSION_ID, $value);

    foreach ($values as $value)
    {
      $criterion->addOr($criteria->getNewCriterion(MissionCompanionPeer::MISSION_ID, $value));
    }

    $criteria->add($criterion);
  }

  public function getModelName()
  {
    return 'Companion';
  }

  public function getFields()
  {
    return array(
      'id'                      => 'Number',
      'passenger_id'            => 'ForeignKey',
      'name'                    => 'Text',
      'relationship'            => 'Text',
      'date_of_birth'           => 'Date',
      'weight'                  => 'Number',
      'companion_phone'         => 'Text',
      'companion_phone_comment' => 'Text',
      'person_id'               => 'ForeignKey',
      'mission_companion_list'  => 'ManyKey',
    );
  }
}
