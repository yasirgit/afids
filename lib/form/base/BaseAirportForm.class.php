<?php

/**
 * Airport form base class.
 *
 * @package    angelflight
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfPropelFormGeneratedTemplate.php 16976 2009-04-04 12:47:44Z fabien $
 */
class BaseAirportForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'                         => new sfWidgetFormInputHidden(),
      'ident'                      => new sfWidgetFormInput(),
      'name'                       => new sfWidgetFormInput(),
      'city'                       => new sfWidgetFormInput(),
      'state'                      => new sfWidgetFormInput(),
      'latitude'                   => new sfWidgetFormInput(),
      'longitude'                  => new sfWidgetFormInput(),
      'runway_length'              => new sfWidgetFormInput(),
      'wing_id'                    => new sfWidgetFormPropelChoice(array('model' => 'Wing', 'add_empty' => true)),
      'gmt_offset'                 => new sfWidgetFormInput(),
      'dst_offset'                 => new sfWidgetFormInput(),
      'zipcode'                    => new sfWidgetFormInput(),
      'closed'                     => new sfWidgetFormInput(),
      'faa_site_number'            => new sfWidgetFormInput(),
      'atct'                       => new sfWidgetFormInput(),
      'is_private'                 => new sfWidgetFormInput(),
      'non_commercial_landing_fee' => new sfWidgetFormInput(),
      'elevation'                  => new sfWidgetFormInput(),
    ));

    $this->setValidators(array(
      'id'                         => new sfValidatorPropelChoice(array('model' => 'Airport', 'column' => 'id', 'required' => false)),
      'ident'                      => new sfValidatorString(array('max_length' => 4, 'required' => false)),
      'name'                       => new sfValidatorString(array('max_length' => 30, 'required' => false)),
      'city'                       => new sfValidatorString(array('max_length' => 30, 'required' => false)),
      'state'                      => new sfValidatorString(array('max_length' => 2, 'required' => false)),
      'latitude'                   => new sfValidatorNumber(),
      'longitude'                  => new sfValidatorNumber(),
      'runway_length'              => new sfValidatorInteger(array('required' => false)),
      'wing_id'                    => new sfValidatorPropelChoice(array('model' => 'Wing', 'column' => 'id', 'required' => false)),
      'gmt_offset'                 => new sfValidatorInteger(array('required' => false)),
      'dst_offset'                 => new sfValidatorInteger(array('required' => false)),
      'zipcode'                    => new sfValidatorString(array('max_length' => 5, 'required' => false)),
      'closed'                     => new sfValidatorInteger(array('required' => false)),
      'faa_site_number'            => new sfValidatorString(array('max_length' => 18, 'required' => false)),
      'atct'                       => new sfValidatorInteger(array('required' => false)),
      'is_private'                 => new sfValidatorInteger(array('required' => false)),
      'non_commercial_landing_fee' => new sfValidatorInteger(array('required' => false)),
      'elevation'                  => new sfValidatorInteger(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('airport[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Airport';
  }


}
