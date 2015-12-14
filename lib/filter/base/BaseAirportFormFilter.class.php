<?php

require_once(sfConfig::get('sf_lib_dir').'/filter/base/BaseFormFilterPropel.class.php');

/**
 * Airport filter form base class.
 *
 * @package    angelflight
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfPropelFormFilterGeneratedTemplate.php 16976 2009-04-04 12:47:44Z fabien $
 */
class BaseAirportFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'ident'                      => new sfWidgetFormFilterInput(),
      'name'                       => new sfWidgetFormFilterInput(),
      'city'                       => new sfWidgetFormFilterInput(),
      'state'                      => new sfWidgetFormFilterInput(),
      'latitude'                   => new sfWidgetFormFilterInput(),
      'longitude'                  => new sfWidgetFormFilterInput(),
      'runway_length'              => new sfWidgetFormFilterInput(),
      'wing_id'                    => new sfWidgetFormPropelChoice(array('model' => 'Wing', 'add_empty' => true)),
      'gmt_offset'                 => new sfWidgetFormFilterInput(),
      'dst_offset'                 => new sfWidgetFormFilterInput(),
      'zipcode'                    => new sfWidgetFormFilterInput(),
      'closed'                     => new sfWidgetFormFilterInput(),
      'faa_site_number'            => new sfWidgetFormFilterInput(),
      'atct'                       => new sfWidgetFormFilterInput(),
      'is_private'                 => new sfWidgetFormFilterInput(),
      'non_commercial_landing_fee' => new sfWidgetFormFilterInput(),
      'elevation'                  => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'ident'                      => new sfValidatorPass(array('required' => false)),
      'name'                       => new sfValidatorPass(array('required' => false)),
      'city'                       => new sfValidatorPass(array('required' => false)),
      'state'                      => new sfValidatorPass(array('required' => false)),
      'latitude'                   => new sfValidatorSchemaFilter('text', new sfValidatorNumber(array('required' => false))),
      'longitude'                  => new sfValidatorSchemaFilter('text', new sfValidatorNumber(array('required' => false))),
      'runway_length'              => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'wing_id'                    => new sfValidatorPropelChoice(array('required' => false, 'model' => 'Wing', 'column' => 'id')),
      'gmt_offset'                 => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'dst_offset'                 => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'zipcode'                    => new sfValidatorPass(array('required' => false)),
      'closed'                     => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'faa_site_number'            => new sfValidatorPass(array('required' => false)),
      'atct'                       => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'is_private'                 => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'non_commercial_landing_fee' => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'elevation'                  => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
    ));

    $this->widgetSchema->setNameFormat('airport_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Airport';
  }

  public function getFields()
  {
    return array(
      'id'                         => 'Number',
      'ident'                      => 'Text',
      'name'                       => 'Text',
      'city'                       => 'Text',
      'state'                      => 'Text',
      'latitude'                   => 'Number',
      'longitude'                  => 'Number',
      'runway_length'              => 'Number',
      'wing_id'                    => 'ForeignKey',
      'gmt_offset'                 => 'Number',
      'dst_offset'                 => 'Number',
      'zipcode'                    => 'Text',
      'closed'                     => 'Number',
      'faa_site_number'            => 'Text',
      'atct'                       => 'Number',
      'is_private'                 => 'Number',
      'non_commercial_landing_fee' => 'Number',
      'elevation'                  => 'Number',
    );
  }
}
