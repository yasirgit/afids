<?php

/**
 * GiftType form.
 *
 * @package    angelflight
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfPropelFormTemplate.php 10377 2008-07-21 07:10:32Z dwhittle $
 */
class GiftTypeForm extends BaseGiftTypeForm
{
  public function configure()
  {
    unset($this['id']);

    $this->widgetSchema['gift_type_desc'] = new sfWidgetFormTextarea(array(), array('class'=>'text'));

    $this->widgetSchema->setLabels(array('gift_type_desc' => 'Gift Type Description'));

    $this->validatorSchema['gift_type_desc'] = new sfValidatorString(array('required' => false));
    
    $this->widgetSchema->setNameFormat('gType[%s]');

  }
}
