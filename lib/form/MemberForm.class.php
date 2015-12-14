<?php

/**
 * Member form.
 *
 * @package    angelflight
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfPropelFormTemplate.php 10377 2008-07-21 07:10:32Z dwhittle $
 */
class MemberForm extends BaseMemberForm
{
  public function configure()
  {
    unset($this['id'],$this['person_id'],$this['external_id'],$this['master_member_id'],$this['active'],$this['inactive_reason'],$this['inactive_comment'],$this['contact'],$this['renewed_date'],$this['renewal_date'],$this['renewal_notice1'],$this['renewal_notice2'],$this['renewal_notice3'],$this['renewal_notice4'],$this['review_done'],$this['ed_new_member_notify'],$this['wn_new_memberN_ntify'],$this['hold_harmless_received'],$this['member_welcomed'],$this['badge_made'],$this['notebook_sent'],$this['clothing_sent'],$this['s_mod_member_notify'],$this['w_mod_member_notify'],$this['renew_mark'],$this['renewal_sent_date'],$this['s_late_renewal_notify'],$this['w_late_renewal_notify'],$this['s_inactive_notify'],$this['w_inactive_notify'],$this['w_not_oriented_notify_date1'],$this['w_not_oriented_notify_date2'],$this['no_wing_contact_ack']);

    $wings = WingPeer::getForSelectParent();
    $flight_statuses = sfConfig::get('app_flight_statuses', array('Command pilot' => 'Command pilot'));

    # Fields
    $this->widgetSchema['date_of_birth'] = new widgetFormDate(array('change_year' => true, 'change_month' => true, 'format_date' => array('js' => 'mm/dd/yy', 'php' => 'm/d/Y')), array('class' => 'text narrow'));
    $this->widgetSchema['weight'] =  new sfWidgetFormInput(array(), array('class' => 'text narrow'));
    $this->widgetSchema['languages'] = new sfWidgetFormInput(array(), array('class' => 'text'));
    $this->widgetSchema['wing_id'] = new sfWidgetFormChoice(array('choices' => $wings),array('class'=>'text narrow'));
    $this->widgetSchema['secondary_wing_id'] = new sfWidgetFormChoice(array('choices' => $wings),array('class'=>'text narrow'));
    $this->widgetSchema['join_date'] =  new widgetFormDate(array('format_date' => array('js' => 'mm/dd/yy', 'php' => 'm/d/Y')), array('class' => 'text narrow'));
    $this->widgetSchema['member_class_id'] = new sfWidgetFormPropelChoice(array('model' => 'MemberClass', 'add_empty' => '-- select --'),array('class'=>'text narrow'));
    $this->widgetSchema['spouse_name'] = new sfWidgetFormInput(array(), array('class' => 'text'));
    $this->widgetSchema['coordinator_notes'] = new sfWidgetFormTextarea(array(), array('class' => 'text'));
    $this->widgetSchema['flight_status'] =new sfWidgetFormSelect(array('choices'=>$flight_statuses),array('class'=>'text narrow'));
    $this->widgetSchema['co_pilot'] = new sfWidgetFormInputCheckbox(array(), array('value' => 1));

    # Labels
    $this->widgetSchema->setLabels(array('date_of_birth' => 'Date of birth'));
    $this->widgetSchema->setLabels(array('weight' => 'Weight'));
    $this->widgetSchema->setLabels(array('languages' => 'Languages'));
    $this->widgetSchema->setLabels(array('wing_id' => 'Wing'));
    $this->widgetSchema->setLabels(array('secondary_wing_id' => 'Secondary Wing'));
    $this->widgetSchema->setLabels(array('join_date' => 'Join Date'));
    $this->widgetSchema->setLabels(array('member_class_id' => 'Class'));
    $this->widgetSchema->setLabels(array('spouse_name' => 'Spouse/Emergency Name'));
    $this->widgetSchema->setLabels(array('coordinator_notes' => 'Coordinator\'s Notes'));
    $this->widgetSchema->setLabels(array('flight_status' => 'Flight Status'));
    $this->widgetSchema->setLabels(array('co_pilot' => 'Co-Pilot'));

    # Validation
    $this->validatorSchema['date_of_birth'] = new sfValidatorDate(array('max' => time(),'required' => false),array('invalid'=> 'Date of birth is invalid !.'));
    $this->validatorSchema['weight'] = new sfValidatorInteger(array('required' => false), array('required' => 'Please confirm first name !.','invalid'=> 'Weight is must be in number format!.'));
    $this->validatorSchema['languages'] = new sfValidatorString(array('required' => false), array('required' => 'Please confirm last name !'));
    $this->validatorSchema['wing_id'] = new sfValidatorString(array('required' => false));
    $this->validatorSchema['secondary_wing_id'] = new sfValidatorString(array('required' => false));
    $this->validatorSchema['join_date'] = new sfValidatorDate(array('max' => time(),'required' => true),array('invalid'=>'Join date is invalid !'));
    $this->validatorSchema['member_class_id'] = new sfValidatorInteger(array('required'=>true),array('required'=>'Please choice member class!'));
    $this->validatorSchema['spouse_name'] = new sfValidatorString(array('required' => false));
    $this->validatorSchema['coordinator_notes'] = new sfValidatorString(array('required' => false));
    $this->validatorSchema['flight_status'] = new sfValidatorString(array('required' => true),array('required'=>'Please choice flight status !'));
    $this->validatorSchema['co_pilot'] = new sfValidatorInteger(array('required' => false));
    # Descriptive message

    $this->setDefault('join_date', date("m/d/y"));

    #help
    $this->widgetSchema->setHelp('weight','lbs.');

    $this->widgetSchema->setNameFormat('mem[%s]');
  }
}
