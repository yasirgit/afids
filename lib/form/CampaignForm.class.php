<?php

/**
 * Campaign form.
 *
 * @package    angelflight
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfPropelFormTemplate.php 10377 2008-07-21 07:10:32Z dwhittle $
 */
class CampaignForm extends BaseCampaignForm
{
  public function configure()
  {
    unset($this['id']);

    # Fields
    $this->widgetSchema['campaign_decs'] = new sfWidgetFormTextarea(array(), array('class'=>'text'));
    $this->widgetSchema['premium_sku'] = new sfWidgetFormInput(array(), array('class' => 'text'));
    $this->widgetSchema['premium_min'] =new sfWidgetFormInput(array(), array('class' => 'text'));

    $this->widgetSchema->setLabels(array('campaign_decs' => 'Campaign Description'));
    $this->widgetSchema->setLabels(array('premium_sku' => 'Premium Sku'));
    $this->widgetSchema->setLabels(array('premium_min' => 'Premium Min'));


    $this->validatorSchema['campaign_decs'] = new sfValidatorString(array('required' => false));
    $this->validatorSchema['premium_sku'] = new sfValidatorString(array('required' => false));
    $this->validatorSchema['premium_min'] = new sfValidatorInteger(array('required' => false),array('invalid'=>'Please confirm it\'s ammount!'));

    $this->widgetSchema->setNameFormat('campaign[%s]');
  }
}
