<?php

/**
 * VpoRequestCargo form base class.
 *
 * @package    angelflight
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfPropelFormGeneratedTemplate.php 16976 2009-04-04 12:47:44Z fabien $
 */
class BaseVpoRequestCargoForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'                => new sfWidgetFormInputHidden(),
      'request_id'        => new sfWidgetFormPropelChoice(array('model' => 'VpoRequest', 'add_empty' => true)),
      'hazardous'         => new sfWidgetFormInput(),
      'cargo_type'        => new sfWidgetFormInput(),
      'weight'            => new sfWidgetFormInput(),
      'height'            => new sfWidgetFormInput(),
      'length'            => new sfWidgetFormInput(),
      'width'             => new sfWidgetFormInput(),
      'special_handling'  => new sfWidgetFormInput(),
      'oc_first_name'     => new sfWidgetFormInput(),
      'oc_last_name'      => new sfWidgetFormInput(),
      'oc_day_phone'      => new sfWidgetFormInput(),
      'oc_day_comment'    => new sfWidgetFormInput(),
      'oc_mobile_phone'   => new sfWidgetFormInput(),
      'oc_mobile_comment' => new sfWidgetFormInput(),
      'oc_other_phone1'   => new sfWidgetFormInput(),
      'oc_other_comment1' => new sfWidgetFormInput(),
      'oc_other_phone2'   => new sfWidgetFormInput(),
      'oc_other_comment2' => new sfWidgetFormInput(),
      'oc_email'          => new sfWidgetFormInput(),
      'oc_alt_email'      => new sfWidgetFormInput(),
      'dc_first_name'     => new sfWidgetFormInput(),
      'dc_last_name'      => new sfWidgetFormInput(),
      'dc_day_phone'      => new sfWidgetFormInput(),
      'dc_day_comment'    => new sfWidgetFormInput(),
      'dc_mobile_hone'    => new sfWidgetFormInput(),
      'dc_mobile_comment' => new sfWidgetFormInput(),
      'dc_other_phone1'   => new sfWidgetFormInput(),
      'dc_other_comment1' => new sfWidgetFormInput(),
      'dc_other_phone2'   => new sfWidgetFormInput(),
      'dc_other_comment2' => new sfWidgetFormInput(),
      'dc_email'          => new sfWidgetFormInput(),
      'dc_alt_email'      => new sfWidgetFormInput(),
      'item_description'  => new sfWidgetFormInput(),
    ));

    $this->setValidators(array(
      'id'                => new sfValidatorPropelChoice(array('model' => 'VpoRequestCargo', 'column' => 'id', 'required' => false)),
      'request_id'        => new sfValidatorPropelChoice(array('model' => 'VpoRequest', 'column' => 'id', 'required' => false)),
      'hazardous'         => new sfValidatorInteger(array('required' => false)),
      'cargo_type'        => new sfValidatorString(array('max_length' => 40, 'required' => false)),
      'weight'            => new sfValidatorInteger(array('required' => false)),
      'height'            => new sfValidatorInteger(array('required' => false)),
      'length'            => new sfValidatorInteger(array('required' => false)),
      'width'             => new sfValidatorInteger(array('required' => false)),
      'special_handling'  => new sfValidatorString(array('max_length' => 125, 'required' => false)),
      'oc_first_name'     => new sfValidatorString(array('max_length' => 40, 'required' => false)),
      'oc_last_name'      => new sfValidatorString(array('max_length' => 40, 'required' => false)),
      'oc_day_phone'      => new sfValidatorString(array('max_length' => 16, 'required' => false)),
      'oc_day_comment'    => new sfValidatorString(array('max_length' => 40, 'required' => false)),
      'oc_mobile_phone'   => new sfValidatorString(array('max_length' => 16, 'required' => false)),
      'oc_mobile_comment' => new sfValidatorString(array('max_length' => 40, 'required' => false)),
      'oc_other_phone1'   => new sfValidatorString(array('max_length' => 16, 'required' => false)),
      'oc_other_comment1' => new sfValidatorString(array('max_length' => 40, 'required' => false)),
      'oc_other_phone2'   => new sfValidatorString(array('max_length' => 16, 'required' => false)),
      'oc_other_comment2' => new sfValidatorString(array('max_length' => 40, 'required' => false)),
      'oc_email'          => new sfValidatorString(array('max_length' => 80, 'required' => false)),
      'oc_alt_email'      => new sfValidatorString(array('max_length' => 80, 'required' => false)),
      'dc_first_name'     => new sfValidatorString(array('max_length' => 40, 'required' => false)),
      'dc_last_name'      => new sfValidatorString(array('max_length' => 40, 'required' => false)),
      'dc_day_phone'      => new sfValidatorString(array('max_length' => 16, 'required' => false)),
      'dc_day_comment'    => new sfValidatorString(array('max_length' => 40, 'required' => false)),
      'dc_mobile_hone'    => new sfValidatorInteger(array('required' => false)),
      'dc_mobile_comment' => new sfValidatorString(array('max_length' => 40, 'required' => false)),
      'dc_other_phone1'   => new sfValidatorString(array('max_length' => 16, 'required' => false)),
      'dc_other_comment1' => new sfValidatorString(array('max_length' => 40, 'required' => false)),
      'dc_other_phone2'   => new sfValidatorString(array('max_length' => 16, 'required' => false)),
      'dc_other_comment2' => new sfValidatorString(array('max_length' => 40, 'required' => false)),
      'dc_email'          => new sfValidatorString(array('max_length' => 80, 'required' => false)),
      'dc_alt_email'      => new sfValidatorString(array('max_length' => 80, 'required' => false)),
      'item_description'  => new sfValidatorString(array('max_length' => 255, 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('vpo_request_cargo[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'VpoRequestCargo';
  }


}
