<?php

/**
 * Requester form.
 *
 * @package    angelflight
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfPropelFormTemplate.php 10377 2008-07-21 07:10:32Z dwhittle $
 */
class RequesterForm extends BaseRequesterForm
{
  public function configure()
  {
    unset($this['id'],$this['person_id'],$this['agency_id']);

    $agencies = AgencyPeer::getForSelectParent();

    # Fields
    //    $this->widgetSchema['agency_id'] = new sfWidgetFormSelect(array('choices' => $agencies),array('class'=>'text narrow'));
    $this->widgetSchema['title'] = new sfWidgetFormInput(array(), array('class' => 'text'));    
    $this->widgetSchema['how_find_af'] = new sfWidgetFormTextarea(array(),array('class'=>'text'));

    # Labels
    //    $this->widgetSchema->setLabels(array('agency_id' => 'Agency'));
    $this->widgetSchema->setLabels(array('title' => 'Title'));    
    $this->widgetSchema->setLabels(array('how_find_af' => 'How find AF'));

    # Validation
    //    $this->validatorSchema['agency_id'] = new sfValidatorInteger(array('required' => false));
    $this->validatorSchema['title'] = new sfValidatorString(array('required' => false));    
    $this->validatorSchema['how_find_af'] = new sfValidatorString(array('required' => false));

    #help
    $this->widgetSchema->setNameFormat('reqs[%s]');
  }
}
