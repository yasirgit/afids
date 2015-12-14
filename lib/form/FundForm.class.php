<?php

/**
 * Fund form.
 *
 * @package    angelflight
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfPropelFormTemplate.php 10377 2008-07-21 07:10:32Z dwhittle $
 */
class FundForm extends BaseFundForm
{
  public function configure()
  {
    unset($this['id']);

    $this->widgetSchema['fund_desc'] = new sfWidgetFormTextarea(array(),array('class'=>'text'));

    $this->widgetSchema->setLabels(array('fund_desc' => 'Fund Description'));

    $this->validatorSchema['fund_desc'] = new sfValidatorString(array('required' => false));

    $this->widgetSchema->setNameFormat('fund[%s]');
  }
}
