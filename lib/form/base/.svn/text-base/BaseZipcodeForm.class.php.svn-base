<?php

/**
 * Zipcode form base class.
 *
 * @package    angelflight
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfPropelFormGeneratedTemplate.php 16976 2009-04-04 12:47:44Z fabien $
 */
class BaseZipcodeForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'          => new sfWidgetFormInputHidden(),
      'city'        => new sfWidgetFormInput(),
      'state'       => new sfWidgetFormInput(),
      'zipcode'     => new sfWidgetFormInput(),
      'area_code'   => new sfWidgetFormInput(),
      'fips_code'   => new sfWidgetFormInput(),
      'county_name' => new sfWidgetFormInput(),
      'preferred'   => new sfWidgetFormInput(),
      'time_zone'   => new sfWidgetFormInput(),
      'dst_flag'    => new sfWidgetFormInput(),
      'zip_type'    => new sfWidgetFormInput(),
      'gmt_offset'  => new sfWidgetFormInput(),
      'dst_offset'  => new sfWidgetFormInput(),
      'afa_org_id'  => new sfWidgetFormInput(),
      'latitude'    => new sfWidgetFormInput(),
      'longitude'   => new sfWidgetFormInput(),
      'wing_id'     => new sfWidgetFormInput(),
    ));

    $this->setValidators(array(
      'id'          => new sfValidatorPropelChoice(array('model' => 'Zipcode', 'column' => 'id', 'required' => false)),
      'city'        => new sfValidatorString(array('max_length' => 28, 'required' => false)),
      'state'       => new sfValidatorString(array('max_length' => 10, 'required' => false)),
      'zipcode'     => new sfValidatorString(array('max_length' => 5)),
      'area_code'   => new sfValidatorString(array('max_length' => 3, 'required' => false)),
      'fips_code'   => new sfValidatorInteger(array('required' => false)),
      'county_name' => new sfValidatorString(array('max_length' => 25, 'required' => false)),
      'preferred'   => new sfValidatorString(array('max_length' => 1, 'required' => false)),
      'time_zone'   => new sfValidatorString(array('max_length' => 5, 'required' => false)),
      'dst_flag'    => new sfValidatorString(array('max_length' => 1, 'required' => false)),
      'zip_type'    => new sfValidatorString(array('max_length' => 1, 'required' => false)),
      'gmt_offset'  => new sfValidatorInteger(array('required' => false)),
      'dst_offset'  => new sfValidatorInteger(array('required' => false)),
      'afa_org_id'  => new sfValidatorInteger(array('required' => false)),
      'latitude'    => new sfValidatorNumber(array('required' => false)),
      'longitude'   => new sfValidatorNumber(array('required' => false)),
      'wing_id'     => new sfValidatorInteger(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('zipcode[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Zipcode';
  }


}
