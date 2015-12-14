<?php

require_once(sfConfig::get('sf_lib_dir').'/filter/base/BaseFormFilterPropel.class.php');

/**
 * VpoRequestPassenger filter form base class.
 *
 * @package    angelflight
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfPropelFormFilterGeneratedTemplate.php 16976 2009-04-04 12:47:44Z fabien $
 */
class BaseVpoRequestPassengerFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'request_id'             => new sfWidgetFormPropelChoice(array('model' => 'VpoRequest', 'add_empty' => true)),
      'fema_no'                => new sfWidgetFormFilterInput(),
      'first_name'             => new sfWidgetFormFilterInput(),
      'last_lame'              => new sfWidgetFormFilterInput(),
      'address1'               => new sfWidgetFormFilterInput(),
      'address2'               => new sfWidgetFormFilterInput(),
      'city'                   => new sfWidgetFormFilterInput(),
      'state'                  => new sfWidgetFormFilterInput(),
      'country'                => new sfWidgetFormFilterInput(),
      'zipcode'                => new sfWidgetFormFilterInput(),
      'day_phone'              => new sfWidgetFormFilterInput(),
      'day_comment'            => new sfWidgetFormFilterInput(),
      'eve_phone'              => new sfWidgetFormFilterInput(),
      'eve_comment'            => new sfWidgetFormFilterInput(),
      'mobile_phone'           => new sfWidgetFormFilterInput(),
      'mobile_comment'         => new sfWidgetFormFilterInput(),
      'fax_phone'              => new sfWidgetFormFilterInput(),
      'fax_comment'            => new sfWidgetFormFilterInput(),
      'pager_phone'            => new sfWidgetFormFilterInput(),
      'pager_comment'          => new sfWidgetFormFilterInput(),
      'other_phone1'           => new sfWidgetFormFilterInput(),
      'other_comment1'         => new sfWidgetFormFilterInput(),
      'other_phone2'           => new sfWidgetFormFilterInput(),
      'other_comment2'         => new sfWidgetFormFilterInput(),
      'other_phone3'           => new sfWidgetFormFilterInput(),
      'other_comment3'         => new sfWidgetFormFilterInput(),
      'email'                  => new sfWidgetFormFilterInput(),
      'alt_email'              => new sfWidgetFormFilterInput(),
      'age'                    => new sfWidgetFormFilterInput(),
      'date_of_birth'          => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => true)),
      'primary_language'       => new sfWidgetFormFilterInput(),
      'english_spoken'         => new sfWidgetFormFilterInput(),
      'pregnant'               => new sfWidgetFormFilterInput(),
      'oxygen_required'        => new sfWidgetFormFilterInput(),
      'weight'                 => new sfWidgetFormFilterInput(),
      'ambulatory'             => new sfWidgetFormFilterInput(),
      'notes'                  => new sfWidgetFormFilterInput(),
      'known_medicalCondition' => new sfWidgetFormFilterInput(),
      'baggage_weight'         => new sfWidgetFormFilterInput(),
      'baggage_desc'           => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'request_id'             => new sfValidatorPropelChoice(array('required' => false, 'model' => 'VpoRequest', 'column' => 'id')),
      'fema_no'                => new sfValidatorPass(array('required' => false)),
      'first_name'             => new sfValidatorPass(array('required' => false)),
      'last_lame'              => new sfValidatorPass(array('required' => false)),
      'address1'               => new sfValidatorPass(array('required' => false)),
      'address2'               => new sfValidatorPass(array('required' => false)),
      'city'                   => new sfValidatorPass(array('required' => false)),
      'state'                  => new sfValidatorPass(array('required' => false)),
      'country'                => new sfValidatorPass(array('required' => false)),
      'zipcode'                => new sfValidatorPass(array('required' => false)),
      'day_phone'              => new sfValidatorPass(array('required' => false)),
      'day_comment'            => new sfValidatorPass(array('required' => false)),
      'eve_phone'              => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'eve_comment'            => new sfValidatorPass(array('required' => false)),
      'mobile_phone'           => new sfValidatorPass(array('required' => false)),
      'mobile_comment'         => new sfValidatorPass(array('required' => false)),
      'fax_phone'              => new sfValidatorPass(array('required' => false)),
      'fax_comment'            => new sfValidatorPass(array('required' => false)),
      'pager_phone'            => new sfValidatorPass(array('required' => false)),
      'pager_comment'          => new sfValidatorPass(array('required' => false)),
      'other_phone1'           => new sfValidatorPass(array('required' => false)),
      'other_comment1'         => new sfValidatorPass(array('required' => false)),
      'other_phone2'           => new sfValidatorPass(array('required' => false)),
      'other_comment2'         => new sfValidatorPass(array('required' => false)),
      'other_phone3'           => new sfValidatorPass(array('required' => false)),
      'other_comment3'         => new sfValidatorPass(array('required' => false)),
      'email'                  => new sfValidatorPass(array('required' => false)),
      'alt_email'              => new sfValidatorPass(array('required' => false)),
      'age'                    => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'date_of_birth'          => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
      'primary_language'       => new sfValidatorPass(array('required' => false)),
      'english_spoken'         => new sfValidatorPass(array('required' => false)),
      'pregnant'               => new sfValidatorPass(array('required' => false)),
      'oxygen_required'        => new sfValidatorPass(array('required' => false)),
      'weight'                 => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'ambulatory'             => new sfValidatorPass(array('required' => false)),
      'notes'                  => new sfValidatorPass(array('required' => false)),
      'known_medicalCondition' => new sfValidatorPass(array('required' => false)),
      'baggage_weight'         => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'baggage_desc'           => new sfValidatorPass(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('vpo_request_passenger_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'VpoRequestPassenger';
  }

  public function getFields()
  {
    return array(
      'id'                     => 'Number',
      'request_id'             => 'ForeignKey',
      'fema_no'                => 'Text',
      'first_name'             => 'Text',
      'last_lame'              => 'Text',
      'address1'               => 'Text',
      'address2'               => 'Text',
      'city'                   => 'Text',
      'state'                  => 'Text',
      'country'                => 'Text',
      'zipcode'                => 'Text',
      'day_phone'              => 'Text',
      'day_comment'            => 'Text',
      'eve_phone'              => 'Number',
      'eve_comment'            => 'Text',
      'mobile_phone'           => 'Text',
      'mobile_comment'         => 'Text',
      'fax_phone'              => 'Text',
      'fax_comment'            => 'Text',
      'pager_phone'            => 'Text',
      'pager_comment'          => 'Text',
      'other_phone1'           => 'Text',
      'other_comment1'         => 'Text',
      'other_phone2'           => 'Text',
      'other_comment2'         => 'Text',
      'other_phone3'           => 'Text',
      'other_comment3'         => 'Text',
      'email'                  => 'Text',
      'alt_email'              => 'Text',
      'age'                    => 'Number',
      'date_of_birth'          => 'Date',
      'primary_language'       => 'Text',
      'english_spoken'         => 'Text',
      'pregnant'               => 'Text',
      'oxygen_required'        => 'Text',
      'weight'                 => 'Number',
      'ambulatory'             => 'Text',
      'notes'                  => 'Text',
      'known_medicalCondition' => 'Text',
      'baggage_weight'         => 'Number',
      'baggage_desc'           => 'Text',
    );
  }
}
