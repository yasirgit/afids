<?php

/**
 * PassengerBackup form base class.
 *
 * @package    angelflight
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfPropelFormGeneratedTemplate.php 16976 2009-04-04 12:47:44Z fabien $
 */
class BasePassengerBackupForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'                                  => new sfWidgetFormInputHidden(),
      'person_id'                           => new sfWidgetFormInput(),
      'passenger_type_id'                   => new sfWidgetFormInput(),
      'parent'                              => new sfWidgetFormInput(),
      'date_of_birth'                       => new sfWidgetFormDateTime(),
      'illness'                             => new sfWidgetFormInput(),
      'financial'                           => new sfWidgetFormInput(),
      'weight'                              => new sfWidgetFormInput(),
      'public_considerations'               => new sfWidgetFormInput(),
      'private_considerations'              => new sfWidgetFormInput(),
      'releasing_physician'                 => new sfWidgetFormInput(),
      'releasing_phone'                     => new sfWidgetFormInput(),
      'lodging_name'                        => new sfWidgetFormInput(),
      'lodging_phone'                       => new sfWidgetFormInput(),
      'lodging_phone_comment'               => new sfWidgetFormInput(),
      'facility_name'                       => new sfWidgetFormInput(),
      'facility_phone'                      => new sfWidgetFormInput(),
      'facility_phone_comment'              => new sfWidgetFormInput(),
      'requester_id'                        => new sfWidgetFormInput(),
      'medical_release_requested'           => new sfWidgetFormDateTime(),
      'medical_release_received'            => new sfWidgetFormDateTime(),
      'passenger_illness_category_id'       => new sfWidgetFormInput(),
      'releasing_fax1'                      => new sfWidgetFormInput(),
      'releasing_fax1_comment'              => new sfWidgetFormInput(),
      'releasing_email'                     => new sfWidgetFormInput(),
      'treating_physician'                  => new sfWidgetFormInput(),
      'treating_phone'                      => new sfWidgetFormInput(),
      'treating_fax1'                       => new sfWidgetFormInput(),
      'treating_fax1_comment'               => new sfWidgetFormInput(),
      'treating_email'                      => new sfWidgetFormInput(),
      'language_spoken'                     => new sfWidgetFormInput(),
      'best_contact_method'                 => new sfWidgetFormInput(),
      'emergency_contact_name'              => new sfWidgetFormInput(),
      'emergency_contact_primary_phone'     => new sfWidgetFormInput(),
      'emergency_contact_secondary_phone'   => new sfWidgetFormInput(),
      'emergency_contact_primary_comment'   => new sfWidgetFormInput(),
      'emergency_contact_secondary_comment' => new sfWidgetFormInput(),
      'travel_history_notes'                => new sfWidgetFormInput(),
      'need_medical_release'                => new sfWidgetFormInput(),
      'ground_transportation_comment'       => new sfWidgetFormInput(),
    ));

    $this->setValidators(array(
      'id'                                  => new sfValidatorPropelChoice(array('model' => 'PassengerBackup', 'column' => 'id', 'required' => false)),
      'person_id'                           => new sfValidatorInteger(),
      'passenger_type_id'                   => new sfValidatorInteger(array('required' => false)),
      'parent'                              => new sfValidatorString(array('max_length' => 50, 'required' => false)),
      'date_of_birth'                       => new sfValidatorDateTime(array('required' => false)),
      'illness'                             => new sfValidatorString(array('max_length' => 60, 'required' => false)),
      'financial'                           => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'weight'                              => new sfValidatorInteger(array('required' => false)),
      'public_considerations'               => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'private_considerations'              => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'releasing_physician'                 => new sfValidatorString(array('max_length' => 40, 'required' => false)),
      'releasing_phone'                     => new sfValidatorString(array('max_length' => 16, 'required' => false)),
      'lodging_name'                        => new sfValidatorString(array('max_length' => 40, 'required' => false)),
      'lodging_phone'                       => new sfValidatorString(array('max_length' => 16, 'required' => false)),
      'lodging_phone_comment'               => new sfValidatorString(array('max_length' => 40, 'required' => false)),
      'facility_name'                       => new sfValidatorString(array('max_length' => 40, 'required' => false)),
      'facility_phone'                      => new sfValidatorString(array('max_length' => 16, 'required' => false)),
      'facility_phone_comment'              => new sfValidatorString(array('max_length' => 40, 'required' => false)),
      'requester_id'                        => new sfValidatorInteger(array('required' => false)),
      'medical_release_requested'           => new sfValidatorDateTime(array('required' => false)),
      'medical_release_received'            => new sfValidatorDateTime(array('required' => false)),
      'passenger_illness_category_id'       => new sfValidatorInteger(array('required' => false)),
      'releasing_fax1'                      => new sfValidatorInteger(array('required' => false)),
      'releasing_fax1_comment'              => new sfValidatorString(array('max_length' => 40, 'required' => false)),
      'releasing_email'                     => new sfValidatorString(array('max_length' => 80, 'required' => false)),
      'treating_physician'                  => new sfValidatorString(array('max_length' => 40, 'required' => false)),
      'treating_phone'                      => new sfValidatorInteger(array('required' => false)),
      'treating_fax1'                       => new sfValidatorString(array('max_length' => 16, 'required' => false)),
      'treating_fax1_comment'               => new sfValidatorString(array('max_length' => 80, 'required' => false)),
      'treating_email'                      => new sfValidatorString(array('max_length' => 80, 'required' => false)),
      'language_spoken'                     => new sfValidatorString(array('max_length' => 30, 'required' => false)),
      'best_contact_method'                 => new sfValidatorString(array('max_length' => 80, 'required' => false)),
      'emergency_contact_name'              => new sfValidatorString(array('max_length' => 40, 'required' => false)),
      'emergency_contact_primary_phone'     => new sfValidatorString(array('max_length' => 16, 'required' => false)),
      'emergency_contact_secondary_phone'   => new sfValidatorString(array('max_length' => 16, 'required' => false)),
      'emergency_contact_primary_comment'   => new sfValidatorString(array('max_length' => 80, 'required' => false)),
      'emergency_contact_secondary_comment' => new sfValidatorString(array('max_length' => 80, 'required' => false)),
      'travel_history_notes'                => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'need_medical_release'                => new sfValidatorInteger(array('required' => false)),
      'ground_transportation_comment'       => new sfValidatorString(array('max_length' => 255, 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('passenger_backup[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'PassengerBackup';
  }


}
