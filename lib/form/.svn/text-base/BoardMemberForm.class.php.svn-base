<?php

/**
 * BoardMember form.
 *
 * @package    angelflight
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfPropelFormTemplate.php 10377 2008-07-21 07:10:32Z dwhittle $
 */
class BoardMemberForm extends BaseBoardMemberForm
{
  public function configure()
  {
    unset($this['id'],$this['person_id']);

    //    $years = sfConfig::get('board_member_years', array('1999'=>'1999','2000'=>'2000','2001'=>'2001','2002'=>'2002','2003'=>'2003','2004'=>'2004','2005'=>'2005','2006'=>'2006','2007'=>'2007','2008'=>'2008','2009'=>'2009'));

    $years_w = $this->year_ranges(1999,(date('Y')+10));
    //$years = explode('|', $years_w);

    $this->widgetSchema['startyear'] = new sfWidgetFormChoice(array('choices' => $years_w));
    $this->widgetSchema['endyear'] = new sfWidgetFormChoice(array('choices' => $years_w));

    $this->widgetSchema->setLabels(array('startyear' => 'Start Year'));
    $this->widgetSchema->setLabels(array('endyear' => ' &nbsp&nbsp End Year'));

    $this->validatorSchema['startyear'] = new sfValidatorInteger(array('required' => true),array('required'=>'Please confirm start year !'));
    $this->validatorSchema['endyear'] = new sfValidatorInteger(array('required' => true),array('required'=>'Please confirm end year !'));

    $this->widgetSchema->setNameFormat('bmem[%s]');
  }

  public function year_ranges($min,$max){
    $back = array();
    foreach (range($min, $max) as $number) {     
      $back[$number] = $number;
    }
    return $back;
  }
}
