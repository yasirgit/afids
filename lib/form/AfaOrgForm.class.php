<?php

/**
 * AfaOrg form.
 *
 * @package    angelflight
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfPropelFormTemplate.php 10377 2008-07-21 07:10:32Z dwhittle $
 */
class AfaOrgForm extends BaseAfaOrgForm
{
  public function configure()
  {
    unset($this['id']);

    $phone_options = array('mask' => '(999) 999-9999', 'ok_class' => 'field_ok', 'holder_class' => 'field_hold');

    $disable = 'disabled';
    if(sfContext::getInstance()->getUser()->hasCredential(array('@Admin'), false)){
      $disable = '';
    }
    if($this->getObject()->isNew()){
      $disable = '';
    }
    
    # Fields
    $this->widgetSchema['name'] = new sfWidgetFormInput(array(), array('class' => 'text'));
    $this->widgetSchema['org_phone'] = new widgetFormInputPhone($phone_options, array('class' => 'text narrow'));
    $this->widgetSchema['home_page_url'] = new sfWidgetFormInput(array(), array('class' => 'text'));
    $this->widgetSchema['org_fax'] = new widgetFormInputPhone($phone_options, array('class' => 'text narrow'));
    $this->widgetSchema['ref_contact_name'] = new sfWidgetFormInput(array(), array('class' => 'text'));
    $this->widgetSchema['ref_contact_email'] = new sfWidgetFormInput(array(), array('class' => 'text'));
    $this->widgetSchema['vpo_soap_server_url'] = new sfWidgetFormInput(array(), array('class' => 'text', 'disabled' => $disable));
    $this->widgetSchema['vpo_request_post_email'] = new sfWidgetFormInput(array(), array('class' => 'text', 'disabled' => $disable));
    $this->widgetSchema['vpo_user_id'] = new sfWidgetFormInput(array(), array('class' => 'text narrow', 'disabled' => $disable));
    $this->widgetSchema['vpo_user_password'] =new sfWidgetFormInput(array(), array('class' => 'text', 'disabled' => $disable));
    $this->widgetSchema['vpo_org_id'] = new sfWidgetFormInput(array(), array('class' => 'text narrow', 'disabled' => $disable));
    $this->widgetSchema['afids_requester_user_name'] = new sfWidgetFormInput(array(), array('class' => 'text', 'disabled' => $disable));
    $this->widgetSchema['afids_requester_password'] = new sfWidgetFormInput(array(), array('class' => 'text', 'disabled' => $disable));
    $this->widgetSchema['afids_soap_server_url'] = new sfWidgetFormInput(array(), array('class' => 'text', 'disabled' => $disable));
    $this->widgetSchema['afids_request_post_email'] = new sfWidgetFormInput(array(), array('class' => 'text', 'disabled' => $disable));
    $this->widgetSchema['phone_number1'] = new widgetFormInputPhone($phone_options, array('class' => 'text narrow'));
    $this->widgetSchema['phone_number2'] = new widgetFormInputPhone($phone_options, array('class' => 'text narrow'));

    $this->widgetSchema->setLabels(array('name' => 'Name'));
    $this->widgetSchema->setLabels(array('org_phone' => 'Organization Phone'));
    $this->widgetSchema->setLabels(array('home_page_url' => 'Home Page Url'));
    $this->widgetSchema->setLabels(array('org_fax' => 'Organization Fax'));
    $this->widgetSchema->setLabels(array('ref_contact_name' => 'Key contact Name'));
    $this->widgetSchema->setLabels(array('ref_contact_email' => 'Key contact Email'));
    $this->widgetSchema->setLabels(array('vpo_soap_server_url' => 'Vpo soap server url'));
    $this->widgetSchema->setLabels(array('vpo_request_post_email' => 'Vpo request post email'));
    $this->widgetSchema->setLabels(array('vpo_user_id' => 'Vpo user id'));
    $this->widgetSchema->setLabels(array('vpo_user_password' => 'Vpo user password'));
    $this->widgetSchema->setLabels(array('vpo_org_id' => 'Vpo org id'));
    $this->widgetSchema->setLabels(array('afids_requester_user_name' => 'Afids requester user name'));
    $this->widgetSchema->setLabels(array('afids_requester_password' => 'Afids requester password'));
    $this->widgetSchema->setLabels(array('afids_soap_server_url' => 'Afids soap server url'));
    $this->widgetSchema->setLabels(array('afids_request_post_email' => 'Afids request post email'));
    $this->widgetSchema->setLabels(array('phone_number1' => 'Organization Phone 2'));
    $this->widgetSchema->setLabels(array('phone_number2' => 'Organization Phone 3'));

    $this->validatorSchema['name'] = new sfValidatorString(array('required' => true),array('required'=>'Please confirm name !'));
    $this->validatorSchema['org_phone'] = new sfValidatorString(array('required' => false));
    $this->validatorSchema['home_page_url'] = new sfValidatorUrl(array('required'=>false), array('invalid'=>'Invalid URL !.'));
    $this->validatorSchema['org_fax'] = new sfValidatorString(array('required' => false));
    $this->validatorSchema['ref_contact_name'] = new sfValidatorString(array('required' => false));
    $this->validatorSchema['ref_contact_email'] = new sfValidatorEmail(array('required'=>false),array('invalid'=>'Invalid email !'));
    $this->validatorSchema['vpo_soap_server_url'] = new sfValidatorUrl(array('required'=>false), array('invalid'=>'Invalid URL !.'));
    $this->validatorSchema['vpo_request_post_email'] = new sfValidatorEmail(array('required'=>false),array('invalid'=>'Invalid email !'));
    $this->validatorSchema['vpo_user_id'] = new sfValidatorString(array('required' => false));
    $this->validatorSchema['vpo_user_password'] = new sfValidatorString(array('required' => false));
    $this->validatorSchema['vpo_org_id'] = new sfValidatorString(array('required' => false));
    $this->validatorSchema['afids_requester_user_name'] = new sfValidatorString(array('required' => false));
    $this->validatorSchema['afids_requester_password'] = new sfValidatorString(array('required' => false));
    $this->validatorSchema['afids_soap_server_url'] =new sfValidatorUrl(array('required'=>false), array('invalid'=>'Invalid URL !.'));
    $this->validatorSchema['afids_request_post_email'] = new sfValidatorEmail(array('required'=>false),array('invalid'=>'Invalid email !'));
    $this->validatorSchema['phone_number1'] = new sfValidatorString(array('required' => false));
    $this->validatorSchema['phone_number2'] = new sfValidatorString(array('required' => false));
    $this->widgetSchema->setNameFormat('afa[%s]');
  }
}
