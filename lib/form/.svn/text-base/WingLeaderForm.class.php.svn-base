<?php

/**
 * WingLeader form.
 *
 * @package    angelflight
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfPropelFormTemplate.php 10377 2008-07-21 07:10:32Z dwhittle $
 */
class WingLeaderForm extends BaseWingLeaderForm
{
  public function configure()
  {
      unset($this['id'],$this['person_id']);
      $years = $this->year_ranges(1999,(date('Y')+10));
      
      $this->widgetSchema['startyear'] = new sfWidgetFormChoice(array('choices' => $years));

      $this->widgetSchema->setLabels(array('startyear' => 'Start Year'));

      $this->validatorSchema['startyear'] = new sfValidatorInteger(array('required' => true),array('required'=>'Please confirm start year !'));

      $this->widgetSchema->setNameFormat('wingleader[%s]');
  }

  public function year_ranges($min,$max){
    $back = array();
    foreach (range($min, $max) as $number) {
      $back[$number] = $number;
    }
    return $back;
  }
}
