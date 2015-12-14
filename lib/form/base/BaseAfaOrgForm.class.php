<?php

/**
 * AfaOrg form base class.
 *
 * @package    angelflight
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfPropelFormGeneratedTemplate.php 16976 2009-04-04 12:47:44Z fabien $
 */
class BaseAfaOrgForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'                        => new sfWidgetFormInputHidden(),
      'name'                      => new sfWidgetFormInput(),
      'org_phone'                 => new sfWidgetFormInput(),
      'home_page_url'             => new sfWidgetFormInput(),
      'org_fax'                   => new sfWidgetFormInput(),
      'ref_contact_name'          => new sfWidgetFormInput(),
      'ref_contact_email'         => new sfWidgetFormInput(),
      'vpo_soap_server_url'       => new sfWidgetFormInput(),
      'vpo_request_post_email'    => new sfWidgetFormInput(),
      'vpo_user_id'               => new sfWidgetFormInput(),
      'vpo_user_password'         => new sfWidgetFormInput(),
      'vpo_org_id'                => new sfWidgetFormInput(),
      'afids_requester_user_name' => new sfWidgetFormInput(),
      'afids_requester_password'  => new sfWidgetFormInput(),
      'afids_soap_server_url'     => new sfWidgetFormInput(),
      'afids_request_post_email'  => new sfWidgetFormInput(),
      'phone_number1'             => new sfWidgetFormInput(),
      'phone_number2'             => new sfWidgetFormInput(),
    ));

    $this->setValidators(array(
      'id'                        => new sfValidatorPropelChoice(array('model' => 'AfaOrg', 'column' => 'id', 'required' => false)),
      'name'                      => new sfValidatorString(array('max_length' => 60)),
      'org_phone'                 => new sfValidatorString(array('max_length' => 16, 'required' => false)),
      'home_page_url'             => new sfValidatorString(array('max_length' => 80, 'required' => false)),
      'org_fax'                   => new sfValidatorString(array('max_length' => 16, 'required' => false)),
      'ref_contact_name'          => new sfValidatorString(array('max_length' => 25, 'required' => false)),
      'ref_contact_email'         => new sfValidatorString(array('max_length' => 80, 'required' => false)),
      'vpo_soap_server_url'       => new sfValidatorString(array('max_length' => 125, 'required' => false)),
      'vpo_request_post_email'    => new sfValidatorString(array('max_length' => 125, 'required' => false)),
      'vpo_user_id'               => new sfValidatorString(array('max_length' => 25, 'required' => false)),
      'vpo_user_password'         => new sfValidatorString(array('max_length' => 25, 'required' => false)),
      'vpo_org_id'                => new sfValidatorString(array('max_length' => 5, 'required' => false)),
      'afids_requester_user_name' => new sfValidatorString(array('max_length' => 25, 'required' => false)),
      'afids_requester_password'  => new sfValidatorString(array('max_length' => 25, 'required' => false)),
      'afids_soap_server_url'     => new sfValidatorString(array('max_length' => 125, 'required' => false)),
      'afids_request_post_email'  => new sfValidatorString(array('max_length' => 125, 'required' => false)),
      'phone_number1'             => new sfValidatorString(array('max_length' => 16, 'required' => false)),
      'phone_number2'             => new sfValidatorString(array('max_length' => 16, 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('afa_org[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'AfaOrg';
  }


}
