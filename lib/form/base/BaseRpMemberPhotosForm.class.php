<?php

/**
 * RpMemberPhotos form base class.
 *
 * @package    angelflight
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfPropelFormGeneratedTemplate.php 16976 2009-04-04 12:47:44Z fabien $
 */
class BaseRpMemberPhotosForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'memberID'       => new sfWidgetFormInput(),
      'passID'         => new sfWidgetFormInput(),
      'photoID'        => new sfWidgetFormInput(),
      'submissionDate' => new sfWidgetFormInput(),
      'missionDate'    => new sfWidgetFormInput(),
      'passengerName'  => new sfWidgetFormInput(),
      'pilotName'      => new sfWidgetFormInput(),
      'photo_quality'  => new sfWidgetFormInput(),
      'photo_filename' => new sfWidgetFormInput(),
      'photoThumb'     => new sfWidgetFormInput(),
      'wing_id'        => new sfWidgetFormInput(),
      'passLastName'   => new sfWidgetFormInput(),
      'pilotLastName'  => new sfWidgetFormInput(),
      'id'             => new sfWidgetFormInputHidden(),
    ));

    $this->setValidators(array(
      'memberID'       => new sfValidatorInteger(),
      'passID'         => new sfValidatorInteger(),
      'photoID'        => new sfValidatorInteger(),
      'submissionDate' => new sfValidatorString(array('max_length' => 10, 'required' => false)),
      'missionDate'    => new sfValidatorString(array('max_length' => 10, 'required' => false)),
      'passengerName'  => new sfValidatorString(array('max_length' => 81)),
      'pilotName'      => new sfValidatorString(array('max_length' => 81)),
      'photo_quality'  => new sfValidatorInteger(array('required' => false)),
      'photo_filename' => new sfValidatorString(array('max_length' => 75, 'required' => false)),
      'photoThumb'     => new sfValidatorString(array('max_length' => 235, 'required' => false)),
      'wing_id'        => new sfValidatorInteger(array('required' => false)),
      'passLastName'   => new sfValidatorString(array('max_length' => 40)),
      'pilotLastName'  => new sfValidatorString(array('max_length' => 40)),
      'id'             => new sfValidatorPropelChoice(array('model' => 'RpMemberPhotos', 'column' => 'id', 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('rp_member_photos[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'RpMemberPhotos';
  }


}
