<?php

/**
 * WingJob form.
 *
 * @package    angelflight
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfPropelFormTemplate.php 10377 2008-07-21 07:10:32Z dwhittle $
 */
class WingJobForm extends BaseWingJobForm
{
  public function configure()
  {
     unset($this['id'],$this['person_id']);
      

      $this->widgetSchema['short_name'] = new sfWidgetFormInput(array(), array("maxlength" => 30));
      $this->widgetSchema->setLabels(array('short_name' => 'Short Name'));

      $this->validatorSchema['short_name'] = new sfValidatorString(array('required' => true),array('required'=>'Please put a short name !'));

      $this->widgetSchema['name'] = new sfWidgetFormInput(array(), array("maxlength" => 30));
      $this->widgetSchema->setLabels(array('name' => 'Name'));

      $this->validatorSchema['name'] = new sfValidatorString(array('required' => true),array('required'=>'Please put a name !'));

      $this->widgetSchema->setNameFormat('wingrole[%s]');
  }
}
