<?php

require_once(sfConfig::get('sf_lib_dir').'/filter/base/BaseFormFilterPropel.class.php');

/**
 * EventReservation filter form base class.
 *
 * @package    angelflight
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfPropelFormFilterGeneratedTemplate.php 16976 2009-04-04 12:47:44Z fabien $
 */
class BaseEventReservationFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'event_id'            => new sfWidgetFormPropelChoice(array('model' => 'Event', 'add_empty' => true)),
      'member_id'           => new sfWidgetFormFilterInput(),
      'reservation_date'    => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => true)),
      'first_name'          => new sfWidgetFormFilterInput(),
      'last_name'           => new sfWidgetFormFilterInput(),
      'address'             => new sfWidgetFormFilterInput(),
      'city'                => new sfWidgetFormFilterInput(),
      'state'               => new sfWidgetFormFilterInput(),
      'zipcode'             => new sfWidgetFormFilterInput(),
      'phone'               => new sfWidgetFormFilterInput(),
      'email'               => new sfWidgetFormFilterInput(),
      'adult_guests'        => new sfWidgetFormFilterInput(),
      'child_guests'        => new sfWidgetFormFilterInput(),
      'guest_names'         => new sfWidgetFormFilterInput(),
      'amt_paid'            => new sfWidgetFormFilterInput(),
      'method_of_payment'   => new sfWidgetFormFilterInput(),
      'payment_date'        => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => true)),
      'auth_number'         => new sfWidgetFormFilterInput(),
      'status'              => new sfWidgetFormFilterInput(),
      'comments'            => new sfWidgetFormFilterInput(),
      'collect_secure_info' => new sfWidgetFormFilterInput(),
      'addl_info_fields'    => new sfWidgetFormFilterInput(),
      'novapointe_trans_id' => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'event_id'            => new sfValidatorPropelChoice(array('required' => false, 'model' => 'Event', 'column' => 'id')),
      'member_id'           => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'reservation_date'    => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
      'first_name'          => new sfValidatorPass(array('required' => false)),
      'last_name'           => new sfValidatorPass(array('required' => false)),
      'address'             => new sfValidatorPass(array('required' => false)),
      'city'                => new sfValidatorPass(array('required' => false)),
      'state'               => new sfValidatorPass(array('required' => false)),
      'zipcode'             => new sfValidatorPass(array('required' => false)),
      'phone'               => new sfValidatorPass(array('required' => false)),
      'email'               => new sfValidatorPass(array('required' => false)),
      'adult_guests'        => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'child_guests'        => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'guest_names'         => new sfValidatorPass(array('required' => false)),
      'amt_paid'            => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'method_of_payment'   => new sfValidatorPass(array('required' => false)),
      'payment_date'        => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
      'auth_number'         => new sfValidatorPass(array('required' => false)),
      'status'              => new sfValidatorPass(array('required' => false)),
      'comments'            => new sfValidatorPass(array('required' => false)),
      'collect_secure_info' => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'addl_info_fields'    => new sfValidatorPass(array('required' => false)),
      'novapointe_trans_id' => new sfValidatorPass(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('event_reservation_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'EventReservation';
  }

  public function getFields()
  {
    return array(
      'id'                  => 'Number',
      'event_id'            => 'ForeignKey',
      'member_id'           => 'Number',
      'reservation_date'    => 'Date',
      'first_name'          => 'Text',
      'last_name'           => 'Text',
      'address'             => 'Text',
      'city'                => 'Text',
      'state'               => 'Text',
      'zipcode'             => 'Text',
      'phone'               => 'Text',
      'email'               => 'Text',
      'adult_guests'        => 'Number',
      'child_guests'        => 'Number',
      'guest_names'         => 'Text',
      'amt_paid'            => 'Number',
      'method_of_payment'   => 'Text',
      'payment_date'        => 'Date',
      'auth_number'         => 'Text',
      'status'              => 'Text',
      'comments'            => 'Text',
      'collect_secure_info' => 'Number',
      'addl_info_fields'    => 'Text',
      'novapointe_trans_id' => 'Text',
    );
  }
}
