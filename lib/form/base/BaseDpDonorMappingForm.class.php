<?php

/**
 * DpDonorMapping form base class.
 *
 * @package    angelflight
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfPropelFormGeneratedTemplate.php 16976 2009-04-04 12:47:44Z fabien $
 */
class BaseDpDonorMappingForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'              => new sfWidgetFormInputHidden(),
      'afids_person_id' => new sfWidgetFormInput(),
      'dp_donor_id'     => new sfWidgetFormInput(),
      'dateAdded'       => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'id'              => new sfValidatorPropelChoice(array('model' => 'DpDonorMapping', 'column' => 'id', 'required' => false)),
      'afids_person_id' => new sfValidatorInteger(array('required' => false)),
      'dp_donor_id'     => new sfValidatorInteger(array('required' => false)),
      'dateAdded'       => new sfValidatorDateTime(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('dp_donor_mapping[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'DpDonorMapping';
  }


}
