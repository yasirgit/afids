<?php

/**
 * Agency form base class.
 *
 * @package    angelflight
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfPropelFormGeneratedTemplate.php 16976 2009-04-04 12:47:44Z fabien $
 */
class BaseAgencyForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'          => new sfWidgetFormInputHidden(),
      'name'        => new sfWidgetFormInput(),
      'address1'    => new sfWidgetFormInput(),
      'address2'    => new sfWidgetFormInput(),
      'city'        => new sfWidgetFormInput(),
      'county'      => new sfWidgetFormInput(),
      'state'       => new sfWidgetFormInput(),
      'country'     => new sfWidgetFormInput(),
      'zipcode'     => new sfWidgetFormInput(),
      'phone'       => new sfWidgetFormInput(),
      'comment'     => new sfWidgetFormInput(),
      'fax_phone'   => new sfWidgetFormInput(),
      'fax_comment' => new sfWidgetFormInput(),
      'email'       => new sfWidgetFormInput(),
    ));

    $this->setValidators(array(
      'id'          => new sfValidatorPropelChoice(array('model' => 'Agency', 'column' => 'id', 'required' => false)),
      'name'        => new sfValidatorString(array('max_length' => 80)),
      'address1'    => new sfValidatorString(array('max_length' => 40, 'required' => false)),
      'address2'    => new sfValidatorString(array('max_length' => 40, 'required' => false)),
      'city'        => new sfValidatorString(array('max_length' => 30, 'required' => false)),
      'county'      => new sfValidatorString(array('max_length' => 30, 'required' => false)),
      'state'       => new sfValidatorString(array('max_length' => 2, 'required' => false)),
      'country'     => new sfValidatorString(array('max_length' => 30, 'required' => false)),
      'zipcode'     => new sfValidatorString(array('max_length' => 10, 'required' => false)),
      'phone'       => new sfValidatorString(array('max_length' => 16, 'required' => false)),
      'comment'     => new sfValidatorString(array('max_length' => 40, 'required' => false)),
      'fax_phone'   => new sfValidatorString(array('max_length' => 16, 'required' => false)),
      'fax_comment' => new sfValidatorString(array('max_length' => 40, 'required' => false)),
      'email'       => new sfValidatorString(array('max_length' => 80, 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('agency[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Agency';
  }


}
