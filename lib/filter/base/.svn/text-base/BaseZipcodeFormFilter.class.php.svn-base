<?php

require_once(sfConfig::get('sf_lib_dir').'/filter/base/BaseFormFilterPropel.class.php');

/**
 * Zipcode filter form base class.
 *
 * @package    angelflight
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfPropelFormFilterGeneratedTemplate.php 16976 2009-04-04 12:47:44Z fabien $
 */
class BaseZipcodeFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'city'        => new sfWidgetFormFilterInput(),
      'state'       => new sfWidgetFormFilterInput(),
      'zipcode'     => new sfWidgetFormFilterInput(),
      'area_code'   => new sfWidgetFormFilterInput(),
      'fips_code'   => new sfWidgetFormFilterInput(),
      'county_name' => new sfWidgetFormFilterInput(),
      'preferred'   => new sfWidgetFormFilterInput(),
      'time_zone'   => new sfWidgetFormFilterInput(),
      'dst_flag'    => new sfWidgetFormFilterInput(),
      'zip_type'    => new sfWidgetFormFilterInput(),
      'gmt_offset'  => new sfWidgetFormFilterInput(),
      'dst_offset'  => new sfWidgetFormFilterInput(),
      'afa_org_id'  => new sfWidgetFormFilterInput(),
      'latitude'    => new sfWidgetFormFilterInput(),
      'longitude'   => new sfWidgetFormFilterInput(),
      'wing_id'     => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'city'        => new sfValidatorPass(array('required' => false)),
      'state'       => new sfValidatorPass(array('required' => false)),
      'zipcode'     => new sfValidatorPass(array('required' => false)),
      'area_code'   => new sfValidatorPass(array('required' => false)),
      'fips_code'   => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'county_name' => new sfValidatorPass(array('required' => false)),
      'preferred'   => new sfValidatorPass(array('required' => false)),
      'time_zone'   => new sfValidatorPass(array('required' => false)),
      'dst_flag'    => new sfValidatorPass(array('required' => false)),
      'zip_type'    => new sfValidatorPass(array('required' => false)),
      'gmt_offset'  => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'dst_offset'  => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'afa_org_id'  => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'latitude'    => new sfValidatorSchemaFilter('text', new sfValidatorNumber(array('required' => false))),
      'longitude'   => new sfValidatorSchemaFilter('text', new sfValidatorNumber(array('required' => false))),
      'wing_id'     => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
    ));

    $this->widgetSchema->setNameFormat('zipcode_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Zipcode';
  }

  public function getFields()
  {
    return array(
      'id'          => 'Number',
      'city'        => 'Text',
      'state'       => 'Text',
      'zipcode'     => 'Text',
      'area_code'   => 'Text',
      'fips_code'   => 'Number',
      'county_name' => 'Text',
      'preferred'   => 'Text',
      'time_zone'   => 'Text',
      'dst_flag'    => 'Text',
      'zip_type'    => 'Text',
      'gmt_offset'  => 'Number',
      'dst_offset'  => 'Number',
      'afa_org_id'  => 'Number',
      'latitude'    => 'Number',
      'longitude'   => 'Number',
      'wing_id'     => 'Number',
    );
  }
}
