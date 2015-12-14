<?php

require_once(sfConfig::get('sf_lib_dir').'/filter/base/BaseFormFilterPropel.class.php');

/**
 * PassengerBackup filter form base class.
 *
 * @package    angelflight
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfPropelFormFilterGeneratedTemplate.php 16976 2009-04-04 12:47:44Z fabien $
 */
class BasePassengerBackupFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'person_id'                           => new sfWidgetFormFilterInput(),
      'passenger_type_id'                   => new sfWidgetFormFilterInput(),
      'parent'                              => new sfWidgetFormFilterInput(),
      'date_of_birth'                       => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => true)),
      'illness'                             => new sfWidgetFormFilterInput(),
      'financial'                           => new sfWidgetFormFilterInput(),
      'weight'                              => new sfWidgetFormFilterInput(),
      'public_considerations'               => new sfWidgetFormFilterInput(),
      'private_considerations'              => new sfWidgetFormFilterInput(),
      'releasing_physician'                 => new sfWidgetFormFilterInput(),
      'releasing_phone'                     => new sfWidgetFormFilterInput(),
      'lodging_name'                        => new sfWidgetFormFilterInput(),
      'lodging_phone'                       => new sfWidgetFormFilterInput(),
      'lodging_phone_comment'               => new sfWidgetFormFilterInput(),
      'facility_name'                       => new sfWidgetFormFilterInput(),
      'facility_phone'                      => new sfWidgetFormFilterInput(),
      'facility_phone_comment'              => new sfWidgetFormFilterInput(),
      'requester_id'                        => new sfWidgetFormFilterInput(),
      'medical_release_requested'           => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => true)),
      'medical_release_received'            => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => true)),
      'passenger_illness_category_id'       => new sfWidgetFormFilterInput(),
      'releasing_fax1'                      => new sfWidgetFormFilterInput(),
      'releasing_fax1_comment'              => new sfWidgetFormFilterInput(),
      'releasing_email'                     => new sfWidgetFormFilterInput(),
      'treating_physician'                  => new sfWidgetFormFilterInput(),
      'treating_phone'                      => new sfWidgetFormFilterInput(),
      'treating_fax1'                       => new sfWidgetFormFilterInput(),
      'treating_fax1_comment'               => new sfWidgetFormFilterInput(),
      'treating_email'                      => new sfWidgetFormFilterInput(),
      'language_spoken'                     => new sfWidgetFormFilterInput(),
      'best_contact_method'                 => new sfWidgetFormFilterInput(),
      'emergency_contact_name'              => new sfWidgetFormFilterInput(),
      'emergency_contact_primary_phone'     => new sfWidgetFormFilterInput(),
      'emergency_contact_secondary_phone'   => new sfWidgetFormFilterInput(),
      'emergency_contact_primary_comment'   => new sfWidgetFormFilterInput(),
      'emergency_contact_secondary_comment' => new sfWidgetFormFilterInput(),
      'travel_history_notes'                => new sfWidgetFormFilterInput(),
      'need_medical_release'                => new sfWidgetFormFilterInput(),
      'ground_transportation_comment'       => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'person_id'                           => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'passenger_type_id'                   => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'parent'                              => new sfValidatorPass(array('required' => false)),
      'date_of_birth'                       => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
      'illness'                             => new sfValidatorPass(array('required' => false)),
      'financial'                           => new sfValidatorPass(array('required' => false)),
      'weight'                              => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'public_considerations'               => new sfValidatorPass(array('required' => false)),
      'private_considerations'              => new sfValidatorPass(array('required' => false)),
      'releasing_physician'                 => new sfValidatorPass(array('required' => false)),
      'releasing_phone'                     => new sfValidatorPass(array('required' => false)),
      'lodging_name'                        => new sfValidatorPass(array('required' => false)),
      'lodging_phone'                       => new sfValidatorPass(array('required' => false)),
      'lodging_phone_comment'               => new sfValidatorPass(array('required' => false)),
      'facility_name'                       => new sfValidatorPass(array('required' => false)),
      'facility_phone'                      => new sfValidatorPass(array('required' => false)),
      'facility_phone_comment'              => new sfValidatorPass(array('required' => false)),
      'requester_id'                        => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'medical_release_requested'           => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
      'medical_release_received'            => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
      'passenger_illness_category_id'       => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'releasing_fax1'                      => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'releasing_fax1_comment'              => new sfValidatorPass(array('required' => false)),
      'releasing_email'                     => new sfValidatorPass(array('required' => false)),
      'treating_physician'                  => new sfValidatorPass(array('required' => false)),
      'treating_phone'                      => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'treating_fax1'                       => new sfValidatorPass(array('required' => false)),
      'treating_fax1_comment'               => new sfValidatorPass(array('required' => false)),
      'treating_email'                      => new sfValidatorPass(array('required' => false)),
      'language_spoken'                     => new sfValidatorPass(array('required' => false)),
      'best_contact_method'                 => new sfValidatorPass(array('required' => false)),
      'emergency_contact_name'              => new sfValidatorPass(array('required' => false)),
      'emergency_contact_primary_phone'     => new sfValidatorPass(array('required' => false)),
      'emergency_contact_secondary_phone'   => new sfValidatorPass(array('required' => false)),
      'emergency_contact_primary_comment'   => new sfValidatorPass(array('required' => false)),
      'emergency_contact_secondary_comment' => new sfValidatorPass(array('required' => false)),
      'travel_history_notes'                => new sfValidatorPass(array('required' => false)),
      'need_medical_release'                => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'ground_transportation_comment'       => new sfValidatorPass(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('passenger_backup_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'PassengerBackup';
  }

  public function getFields()
  {
    return array(
      'id'                                  => 'Number',
      'person_id'                           => 'Number',
      'passenger_type_id'                   => 'Number',
      'parent'                              => 'Text',
      'date_of_birth'                       => 'Date',
      'illness'                             => 'Text',
      'financial'                           => 'Text',
      'weight'                              => 'Number',
      'public_considerations'               => 'Text',
      'private_considerations'              => 'Text',
      'releasing_physician'                 => 'Text',
      'releasing_phone'                     => 'Text',
      'lodging_name'                        => 'Text',
      'lodging_phone'                       => 'Text',
      'lodging_phone_comment'               => 'Text',
      'facility_name'                       => 'Text',
      'facility_phone'                      => 'Text',
      'facility_phone_comment'              => 'Text',
      'requester_id'                        => 'Number',
      'medical_release_requested'           => 'Date',
      'medical_release_received'            => 'Date',
      'passenger_illness_category_id'       => 'Number',
      'releasing_fax1'                      => 'Number',
      'releasing_fax1_comment'              => 'Text',
      'releasing_email'                     => 'Text',
      'treating_physician'                  => 'Text',
      'treating_phone'                      => 'Number',
      'treating_fax1'                       => 'Text',
      'treating_fax1_comment'               => 'Text',
      'treating_email'                      => 'Text',
      'language_spoken'                     => 'Text',
      'best_contact_method'                 => 'Text',
      'emergency_contact_name'              => 'Text',
      'emergency_contact_primary_phone'     => 'Text',
      'emergency_contact_secondary_phone'   => 'Text',
      'emergency_contact_primary_comment'   => 'Text',
      'emergency_contact_secondary_comment' => 'Text',
      'travel_history_notes'                => 'Text',
      'need_medical_release'                => 'Number',
      'ground_transportation_comment'       => 'Text',
    );
  }
}
