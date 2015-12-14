<?php

/**
 * VpoRequestPassenger form base class.
 *
 * @package    angelflight
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfPropelFormGeneratedTemplate.php 16976 2009-04-04 12:47:44Z fabien $
 */
class BaseVpoRequestPassengerForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'                     => new sfWidgetFormInputHidden(),
      'request_id'             => new sfWidgetFormPropelChoice(array('model' => 'VpoRequest', 'add_empty' => true)),
      'fema_no'                => new sfWidgetFormInput(),
      'first_name'             => new sfWidgetFormInput(),
      'last_lame'              => new sfWidgetFormInput(),
      'address1'               => new sfWidgetFormInput(),
      'address2'               => new sfWidgetFormInput(),
      'city'                   => new sfWidgetFormInput(),
      'state'                  => new sfWidgetFormInput(),
      'country'                => new sfWidgetFormInput(),
      'zipcode'                => new sfWidgetFormInput(),
      'day_phone'              => new sfWidgetFormInput(),
      'day_comment'            => new sfWidgetFormInput(),
      'eve_phone'              => new sfWidgetFormInput(),
      'eve_comment'            => new sfWidgetFormInput(),
      'mobile_phone'           => new sfWidgetFormInput(),
      'mobile_comment'         => new sfWidgetFormInput(),
      'fax_phone'              => new sfWidgetFormInput(),
      'fax_comment'            => new sfWidgetFormInput(),
      'pager_phone'            => new sfWidgetFormInput(),
      'pager_comment'          => new sfWidgetFormInput(),
      'other_phone1'           => new sfWidgetFormInput(),
      'other_comment1'         => new sfWidgetFormInput(),
      'other_phone2'           => new sfWidgetFormInput(),
      'other_comment2'         => new sfWidgetFormInput(),
      'other_phone3'           => new sfWidgetFormInput(),
      'other_comment3'         => new sfWidgetFormInput(),
      'email'                  => new sfWidgetFormInput(),
      'alt_email'              => new sfWidgetFormInput(),
      'age'                    => new sfWidgetFormInput(),
      'date_of_birth'          => new sfWidgetFormDate(),
      'primary_language'       => new sfWidgetFormInput(),
      'english_spoken'         => new sfWidgetFormInput(),
      'pregnant'               => new sfWidgetFormInput(),
      'oxygen_required'        => new sfWidgetFormInput(),
      'weight'                 => new sfWidgetFormInput(),
      'ambulatory'             => new sfWidgetFormInput(),
      'notes'                  => new sfWidgetFormInput(),
      'known_medicalCondition' => new sfWidgetFormInput(),
      'baggage_weight'         => new sfWidgetFormInput(),
      'baggage_desc'           => new sfWidgetFormInput(),
    ));

    $this->setValidators(array(
      'id'                     => new sfValidatorPropelChoice(array('model' => 'VpoRequestPassenger', 'column' => 'id', 'required' => false)),
      'request_id'             => new sfValidatorPropelChoice(array('model' => 'VpoRequest', 'column' => 'id', 'required' => false)),
      'fema_no'                => new sfValidatorString(array('max_length' => 25, 'required' => false)),
      'first_name'             => new sfValidatorString(array('max_length' => 40, 'required' => false)),
      'last_lame'              => new sfValidatorString(array('max_length' => 40, 'required' => false)),
      'address1'               => new sfValidatorString(array('max_length' => 40, 'required' => false)),
      'address2'               => new sfValidatorString(array('max_length' => 40, 'required' => false)),
      'city'                   => new sfValidatorString(array('max_length' => 30, 'required' => false)),
      'state'                  => new sfValidatorString(array('max_length' => 2, 'required' => false)),
      'country'                => new sfValidatorString(array('max_length' => 30, 'required' => false)),
      'zipcode'                => new sfValidatorString(array('max_length' => 10, 'required' => false)),
      'day_phone'              => new sfValidatorString(array('max_length' => 16, 'required' => false)),
      'day_comment'            => new sfValidatorString(array('max_length' => 40, 'required' => false)),
      'eve_phone'              => new sfValidatorInteger(array('required' => false)),
      'eve_comment'            => new sfValidatorString(array('max_length' => 40, 'required' => false)),
      'mobile_phone'           => new sfValidatorString(array('max_length' => 16, 'required' => false)),
      'mobile_comment'         => new sfValidatorString(array('max_length' => 40, 'required' => false)),
      'fax_phone'              => new sfValidatorString(array('max_length' => 16, 'required' => false)),
      'fax_comment'            => new sfValidatorString(array('max_length' => 40, 'required' => false)),
      'pager_phone'            => new sfValidatorString(array('max_length' => 16, 'required' => false)),
      'pager_comment'          => new sfValidatorString(array('max_length' => 40, 'required' => false)),
      'other_phone1'           => new sfValidatorString(array('max_length' => 16, 'required' => false)),
      'other_comment1'         => new sfValidatorString(array('max_length' => 40, 'required' => false)),
      'other_phone2'           => new sfValidatorString(array('max_length' => 16, 'required' => false)),
      'other_comment2'         => new sfValidatorString(array('max_length' => 40, 'required' => false)),
      'other_phone3'           => new sfValidatorString(array('max_length' => 16, 'required' => false)),
      'other_comment3'         => new sfValidatorString(array('max_length' => 40, 'required' => false)),
      'email'                  => new sfValidatorString(array('max_length' => 80, 'required' => false)),
      'alt_email'              => new sfValidatorString(array('max_length' => 80, 'required' => false)),
      'age'                    => new sfValidatorInteger(array('required' => false)),
      'date_of_birth'          => new sfValidatorDate(array('required' => false)),
      'primary_language'       => new sfValidatorString(array('max_length' => 30, 'required' => false)),
      'english_spoken'         => new sfValidatorString(array('max_length' => 25, 'required' => false)),
      'pregnant'               => new sfValidatorString(array('max_length' => 25, 'required' => false)),
      'oxygen_required'        => new sfValidatorString(array('max_length' => 25, 'required' => false)),
      'weight'                 => new sfValidatorInteger(array('required' => false)),
      'ambulatory'             => new sfValidatorString(array('max_length' => 25, 'required' => false)),
      'notes'                  => new sfValidatorString(array('max_length' => 125, 'required' => false)),
      'known_medicalCondition' => new sfValidatorString(array('max_length' => 125, 'required' => false)),
      'baggage_weight'         => new sfValidatorInteger(array('required' => false)),
      'baggage_desc'           => new sfValidatorString(array('max_length' => 125, 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('vpo_request_passenger[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'VpoRequestPassenger';
  }


}
