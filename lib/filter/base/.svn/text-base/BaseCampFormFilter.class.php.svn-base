<?php

require_once(sfConfig::get('sf_lib_dir').'/filter/base/BaseFormFilterPropel.class.php');

/**
 * Camp filter form base class.
 *
 * @package    angelflight
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfPropelFormFilterGeneratedTemplate.php 16976 2009-04-04 12:47:44Z fabien $
 */
class BaseCampFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'agency_id'             => new sfWidgetFormPropelChoice(array('model' => 'Agency', 'add_empty' => true)),
      'airport_id'            => new sfWidgetFormPropelChoice(array('model' => 'Airport', 'add_empty' => true)),
      'fbo_id'                => new sfWidgetFormPropelChoice(array('model' => 'Fbo', 'add_empty' => true)),
      'camp_name'             => new sfWidgetFormFilterInput(),
      'camp_phone'            => new sfWidgetFormFilterInput(),
      'session'               => new sfWidgetFormFilterInput(),
      'camp_phone_comment'    => new sfWidgetFormFilterInput(),
      'lodging_name'          => new sfWidgetFormFilterInput(),
      'lodging_phone'         => new sfWidgetFormFilterInput(),
      'lodging_phone_comment' => new sfWidgetFormFilterInput(),
      'arrival_date'          => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => true)),
      'arrival_comment'       => new sfWidgetFormFilterInput(),
      'departure_date'        => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => true)),
      'departure_comment'     => new sfWidgetFormFilterInput(),
      'comment'               => new sfWidgetFormFilterInput(),
      'grouped_mission'       => new sfWidgetFormFilterInput(),
      'flight_information'    => new sfWidgetFormFilterInput(),
      'camp_passenger_list'   => new sfWidgetFormPropelChoice(array('model' => 'Passenger', 'add_empty' => true)),
    ));

    $this->setValidators(array(
      'agency_id'             => new sfValidatorPropelChoice(array('required' => false, 'model' => 'Agency', 'column' => 'id')),
      'airport_id'            => new sfValidatorPropelChoice(array('required' => false, 'model' => 'Airport', 'column' => 'id')),
      'fbo_id'                => new sfValidatorPropelChoice(array('required' => false, 'model' => 'Fbo', 'column' => 'id')),
      'camp_name'             => new sfValidatorPass(array('required' => false)),
      'camp_phone'            => new sfValidatorPass(array('required' => false)),
      'session'               => new sfValidatorPass(array('required' => false)),
      'camp_phone_comment'    => new sfValidatorPass(array('required' => false)),
      'lodging_name'          => new sfValidatorPass(array('required' => false)),
      'lodging_phone'         => new sfValidatorPass(array('required' => false)),
      'lodging_phone_comment' => new sfValidatorPass(array('required' => false)),
      'arrival_date'          => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
      'arrival_comment'       => new sfValidatorPass(array('required' => false)),
      'departure_date'        => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
      'departure_comment'     => new sfValidatorPass(array('required' => false)),
      'comment'               => new sfValidatorPass(array('required' => false)),
      'grouped_mission'       => new sfValidatorPass(array('required' => false)),
      'flight_information'    => new sfValidatorPass(array('required' => false)),
      'camp_passenger_list'   => new sfValidatorPropelChoice(array('model' => 'Passenger', 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('camp_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function addCampPassengerListColumnCriteria(Criteria $criteria, $field, $values)
  {
    if (!is_array($values))
    {
      $values = array($values);
    }

    if (!count($values))
    {
      return;
    }

    $criteria->addJoin(CampPassengerPeer::CAMP_ID, CampPeer::ID);

    $value = array_pop($values);
    $criterion = $criteria->getNewCriterion(CampPassengerPeer::PASSENGER_ID, $value);

    foreach ($values as $value)
    {
      $criterion->addOr($criteria->getNewCriterion(CampPassengerPeer::PASSENGER_ID, $value));
    }

    $criteria->add($criterion);
  }

  public function getModelName()
  {
    return 'Camp';
  }

  public function getFields()
  {
    return array(
      'id'                    => 'Number',
      'agency_id'             => 'ForeignKey',
      'airport_id'            => 'ForeignKey',
      'fbo_id'                => 'ForeignKey',
      'camp_name'             => 'Text',
      'camp_phone'            => 'Text',
      'session'               => 'Text',
      'camp_phone_comment'    => 'Text',
      'lodging_name'          => 'Text',
      'lodging_phone'         => 'Text',
      'lodging_phone_comment' => 'Text',
      'arrival_date'          => 'Date',
      'arrival_comment'       => 'Text',
      'departure_date'        => 'Date',
      'departure_comment'     => 'Text',
      'comment'               => 'Text',
      'grouped_mission'       => 'Text',
      'flight_information'    => 'Text',
      'camp_passenger_list'   => 'ManyKey',
    );
  }
}
