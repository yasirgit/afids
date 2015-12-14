<?php

/**
 * Campaign form base class.
 *
 * @package    angelflight
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfPropelFormGeneratedTemplate.php 16976 2009-04-04 12:47:44Z fabien $
 */
class BaseCampaignForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'            => new sfWidgetFormInputHidden(),
      'campaign_decs' => new sfWidgetFormInput(),
      'premium_sku'   => new sfWidgetFormInput(),
      'premium_min'   => new sfWidgetFormInput(),
    ));

    $this->setValidators(array(
      'id'            => new sfValidatorPropelChoice(array('model' => 'Campaign', 'column' => 'id', 'required' => false)),
      'campaign_decs' => new sfValidatorString(array('max_length' => 25, 'required' => false)),
      'premium_sku'   => new sfValidatorString(array('max_length' => 12, 'required' => false)),
      'premium_min'   => new sfValidatorInteger(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('campaign[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Campaign';
  }


}
