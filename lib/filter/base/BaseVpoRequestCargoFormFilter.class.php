<?php

require_once(sfConfig::get('sf_lib_dir').'/filter/base/BaseFormFilterPropel.class.php');

/**
 * VpoRequestCargo filter form base class.
 *
 * @package    angelflight
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfPropelFormFilterGeneratedTemplate.php 16976 2009-04-04 12:47:44Z fabien $
 */
class BaseVpoRequestCargoFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'request_id'        => new sfWidgetFormPropelChoice(array('model' => 'VpoRequest', 'add_empty' => true)),
      'hazardous'         => new sfWidgetFormFilterInput(),
      'cargo_type'        => new sfWidgetFormFilterInput(),
      'weight'            => new sfWidgetFormFilterInput(),
      'height'            => new sfWidgetFormFilterInput(),
      'length'            => new sfWidgetFormFilterInput(),
      'width'             => new sfWidgetFormFilterInput(),
      'special_handling'  => new sfWidgetFormFilterInput(),
      'oc_first_name'     => new sfWidgetFormFilterInput(),
      'oc_last_name'      => new sfWidgetFormFilterInput(),
      'oc_day_phone'      => new sfWidgetFormFilterInput(),
      'oc_day_comment'    => new sfWidgetFormFilterInput(),
      'oc_mobile_phone'   => new sfWidgetFormFilterInput(),
      'oc_mobile_comment' => new sfWidgetFormFilterInput(),
      'oc_other_phone1'   => new sfWidgetFormFilterInput(),
      'oc_other_comment1' => new sfWidgetFormFilterInput(),
      'oc_other_phone2'   => new sfWidgetFormFilterInput(),
      'oc_other_comment2' => new sfWidgetFormFilterInput(),
      'oc_email'          => new sfWidgetFormFilterInput(),
      'oc_alt_email'      => new sfWidgetFormFilterInput(),
      'dc_first_name'     => new sfWidgetFormFilterInput(),
      'dc_last_name'      => new sfWidgetFormFilterInput(),
      'dc_day_phone'      => new sfWidgetFormFilterInput(),
      'dc_day_comment'    => new sfWidgetFormFilterInput(),
      'dc_mobile_hone'    => new sfWidgetFormFilterInput(),
      'dc_mobile_comment' => new sfWidgetFormFilterInput(),
      'dc_other_phone1'   => new sfWidgetFormFilterInput(),
      'dc_other_comment1' => new sfWidgetFormFilterInput(),
      'dc_other_phone2'   => new sfWidgetFormFilterInput(),
      'dc_other_comment2' => new sfWidgetFormFilterInput(),
      'dc_email'          => new sfWidgetFormFilterInput(),
      'dc_alt_email'      => new sfWidgetFormFilterInput(),
      'item_description'  => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'request_id'        => new sfValidatorPropelChoice(array('required' => false, 'model' => 'VpoRequest', 'column' => 'id')),
      'hazardous'         => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'cargo_type'        => new sfValidatorPass(array('required' => false)),
      'weight'            => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'height'            => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'length'            => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'width'             => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'special_handling'  => new sfValidatorPass(array('required' => false)),
      'oc_first_name'     => new sfValidatorPass(array('required' => false)),
      'oc_last_name'      => new sfValidatorPass(array('required' => false)),
      'oc_day_phone'      => new sfValidatorPass(array('required' => false)),
      'oc_day_comment'    => new sfValidatorPass(array('required' => false)),
      'oc_mobile_phone'   => new sfValidatorPass(array('required' => false)),
      'oc_mobile_comment' => new sfValidatorPass(array('required' => false)),
      'oc_other_phone1'   => new sfValidatorPass(array('required' => false)),
      'oc_other_comment1' => new sfValidatorPass(array('required' => false)),
      'oc_other_phone2'   => new sfValidatorPass(array('required' => false)),
      'oc_other_comment2' => new sfValidatorPass(array('required' => false)),
      'oc_email'          => new sfValidatorPass(array('required' => false)),
      'oc_alt_email'      => new sfValidatorPass(array('required' => false)),
      'dc_first_name'     => new sfValidatorPass(array('required' => false)),
      'dc_last_name'      => new sfValidatorPass(array('required' => false)),
      'dc_day_phone'      => new sfValidatorPass(array('required' => false)),
      'dc_day_comment'    => new sfValidatorPass(array('required' => false)),
      'dc_mobile_hone'    => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'dc_mobile_comment' => new sfValidatorPass(array('required' => false)),
      'dc_other_phone1'   => new sfValidatorPass(array('required' => false)),
      'dc_other_comment1' => new sfValidatorPass(array('required' => false)),
      'dc_other_phone2'   => new sfValidatorPass(array('required' => false)),
      'dc_other_comment2' => new sfValidatorPass(array('required' => false)),
      'dc_email'          => new sfValidatorPass(array('required' => false)),
      'dc_alt_email'      => new sfValidatorPass(array('required' => false)),
      'item_description'  => new sfValidatorPass(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('vpo_request_cargo_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'VpoRequestCargo';
  }

  public function getFields()
  {
    return array(
      'id'                => 'Number',
      'request_id'        => 'ForeignKey',
      'hazardous'         => 'Number',
      'cargo_type'        => 'Text',
      'weight'            => 'Number',
      'height'            => 'Number',
      'length'            => 'Number',
      'width'             => 'Number',
      'special_handling'  => 'Text',
      'oc_first_name'     => 'Text',
      'oc_last_name'      => 'Text',
      'oc_day_phone'      => 'Text',
      'oc_day_comment'    => 'Text',
      'oc_mobile_phone'   => 'Text',
      'oc_mobile_comment' => 'Text',
      'oc_other_phone1'   => 'Text',
      'oc_other_comment1' => 'Text',
      'oc_other_phone2'   => 'Text',
      'oc_other_comment2' => 'Text',
      'oc_email'          => 'Text',
      'oc_alt_email'      => 'Text',
      'dc_first_name'     => 'Text',
      'dc_last_name'      => 'Text',
      'dc_day_phone'      => 'Text',
      'dc_day_comment'    => 'Text',
      'dc_mobile_hone'    => 'Number',
      'dc_mobile_comment' => 'Text',
      'dc_other_phone1'   => 'Text',
      'dc_other_comment1' => 'Text',
      'dc_other_phone2'   => 'Text',
      'dc_other_comment2' => 'Text',
      'dc_email'          => 'Text',
      'dc_alt_email'      => 'Text',
      'item_description'  => 'Text',
    );
  }
}
