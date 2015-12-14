<?php

/**
 * MemberClass form.
 *
 * @package    angelflight
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfPropelFormTemplate.php 10377 2008-07-21 07:10:32Z dwhittle $
 */
class MemberClassForm extends BaseMemberClassForm
{
  public function configure()
  {
    unset($this['id']);

    $this->widgetSchema['name'] = new sfWidgetFormInput(array(), array('class' => 'text'));
    $this->widgetSchema['initial_fee'] =  new sfWidgetFormInput(array(), array('class' => 'text'));
    $this->widgetSchema['renewal_fee'] =  new sfWidgetFormInput(array(), array('class' => 'text'));
    $this->widgetSchema['sub_initial_fee'] = new sfWidgetFormInput(array(), array('class' => 'text'));
    $this->widgetSchema['sub_renewal_fee'] =  new sfWidgetFormInput(array(), array('class' => 'text'));
    $this->widgetSchema['renewal_period'] = new sfWidgetFormInput(array(), array('class' => 'text narrowest'));
    $this->widgetSchema['fly_missions'] = new sfWidgetFormInputCheckbox(array(), array('value' => 1));
    $this->widgetSchema['newsletters'] = new sfWidgetFormInputCheckbox(array(), array('value' => 1));
    $this->widgetSchema['sub_newsletters'] = new sfWidgetFormInputCheckbox(array(), array('value' => 1));

    $this->widgetSchema->setLabels(array('name' => 'Name'));
    $this->widgetSchema->setLabels(array('initial_fee' => 'Initial Fee'));
    $this->widgetSchema->setLabels(array('renewal_fee' => 'Renewal Fee'));
    $this->widgetSchema->setLabels(array('sub_initial_fee' => 'Sub Initial Fee'));
    $this->widgetSchema->setLabels(array('sub_renewal_fee' => 'Sub Renewal Fee'));
    $this->widgetSchema->setLabels(array('renewal_period' => 'Renewal Period'));
    $this->widgetSchema->setLabels(array('fly_missions' => 'Can Fly Missions'));
    $this->widgetSchema->setLabels(array('newsletters' => 'Receives Newsletters'));
    $this->widgetSchema->setLabels(array('sub_newsletters' => 'Subsidiary Receives Newsletters'));
    
    $this->validatorSchema['name'] = new sfValidatorString(array('required' => true),array('required'=>'Please confirm a name !'));
    $this->validatorSchema['initial_fee'] = new sfValidatorInteger(array('required' => true),array('required'=>'Please confirm a initial fee !','invalid'=>'Initial must be in number format !'));
    $this->validatorSchema['renewal_fee'] = new sfValidatorInteger(array('required' => true),array('required'=>'Please confirm a renewal fee !','invalid'=>'Renewal fee must be in number format !'));
    $this->validatorSchema['sub_initial_fee'] = new sfValidatorInteger(array('required' => true),array('required'=>'Please confirm a sub intial fee !','invalid'=>'Sub renewal fee must be in number format !'));
    $this->validatorSchema['sub_renewal_fee'] = new sfValidatorInteger(array('required' => true),array('required'=>'Please confirm a sub renewal fee !','invalid'=>'Sub renewal fee must be in number format !'));
    $this->validatorSchema['renewal_period'] = new sfValidatorInteger(array('required' => false),array('invalid'=>'Renewal period mus t be in number format! '));//
    $this->validatorSchema['fly_missions'] = new sfValidatorInteger(array('required' => false));
    $this->validatorSchema['newsletters'] = new sfValidatorInteger(array('required' => false));
    $this->validatorSchema['sub_newsletters'] = new sfValidatorInteger(array('required' => false));

    $this->widgetSchema->setNameFormat('mclass[%s]');
  }
}
