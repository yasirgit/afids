<?php

require_once(sfConfig::get('sf_lib_dir').'/filter/base/BaseFormFilterPropel.class.php');

/**
 * Campaign filter form base class.
 *
 * @package    angelflight
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfPropelFormFilterGeneratedTemplate.php 16976 2009-04-04 12:47:44Z fabien $
 */
class BaseCampaignFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'campaign_decs' => new sfWidgetFormFilterInput(),
      'premium_sku'   => new sfWidgetFormFilterInput(),
      'premium_min'   => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'campaign_decs' => new sfValidatorPass(array('required' => false)),
      'premium_sku'   => new sfValidatorPass(array('required' => false)),
      'premium_min'   => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
    ));

    $this->widgetSchema->setNameFormat('campaign_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Campaign';
  }

  public function getFields()
  {
    return array(
      'id'            => 'Number',
      'campaign_decs' => 'Text',
      'premium_sku'   => 'Text',
      'premium_min'   => 'Number',
    );
  }
}
