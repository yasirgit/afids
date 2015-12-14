<?php

require_once(sfConfig::get('sf_lib_dir').'/filter/base/BaseFormFilterPropel.class.php');

/**
 * AfaOrg filter form base class.
 *
 * @package    angelflight
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfPropelFormFilterGeneratedTemplate.php 16976 2009-04-04 12:47:44Z fabien $
 */
class BaseAfaOrgFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'name'                      => new sfWidgetFormFilterInput(),
      'org_phone'                 => new sfWidgetFormFilterInput(),
      'home_page_url'             => new sfWidgetFormFilterInput(),
      'org_fax'                   => new sfWidgetFormFilterInput(),
      'ref_contact_name'          => new sfWidgetFormFilterInput(),
      'ref_contact_email'         => new sfWidgetFormFilterInput(),
      'vpo_soap_server_url'       => new sfWidgetFormFilterInput(),
      'vpo_request_post_email'    => new sfWidgetFormFilterInput(),
      'vpo_user_id'               => new sfWidgetFormFilterInput(),
      'vpo_user_password'         => new sfWidgetFormFilterInput(),
      'vpo_org_id'                => new sfWidgetFormFilterInput(),
      'afids_requester_user_name' => new sfWidgetFormFilterInput(),
      'afids_requester_password'  => new sfWidgetFormFilterInput(),
      'afids_soap_server_url'     => new sfWidgetFormFilterInput(),
      'afids_request_post_email'  => new sfWidgetFormFilterInput(),
      'phone_number1'             => new sfWidgetFormFilterInput(),
      'phone_number2'             => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'name'                      => new sfValidatorPass(array('required' => false)),
      'org_phone'                 => new sfValidatorPass(array('required' => false)),
      'home_page_url'             => new sfValidatorPass(array('required' => false)),
      'org_fax'                   => new sfValidatorPass(array('required' => false)),
      'ref_contact_name'          => new sfValidatorPass(array('required' => false)),
      'ref_contact_email'         => new sfValidatorPass(array('required' => false)),
      'vpo_soap_server_url'       => new sfValidatorPass(array('required' => false)),
      'vpo_request_post_email'    => new sfValidatorPass(array('required' => false)),
      'vpo_user_id'               => new sfValidatorPass(array('required' => false)),
      'vpo_user_password'         => new sfValidatorPass(array('required' => false)),
      'vpo_org_id'                => new sfValidatorPass(array('required' => false)),
      'afids_requester_user_name' => new sfValidatorPass(array('required' => false)),
      'afids_requester_password'  => new sfValidatorPass(array('required' => false)),
      'afids_soap_server_url'     => new sfValidatorPass(array('required' => false)),
      'afids_request_post_email'  => new sfValidatorPass(array('required' => false)),
      'phone_number1'             => new sfValidatorPass(array('required' => false)),
      'phone_number2'             => new sfValidatorPass(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('afa_org_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'AfaOrg';
  }

  public function getFields()
  {
    return array(
      'id'                        => 'Number',
      'name'                      => 'Text',
      'org_phone'                 => 'Text',
      'home_page_url'             => 'Text',
      'org_fax'                   => 'Text',
      'ref_contact_name'          => 'Text',
      'ref_contact_email'         => 'Text',
      'vpo_soap_server_url'       => 'Text',
      'vpo_request_post_email'    => 'Text',
      'vpo_user_id'               => 'Text',
      'vpo_user_password'         => 'Text',
      'vpo_org_id'                => 'Text',
      'afids_requester_user_name' => 'Text',
      'afids_requester_password'  => 'Text',
      'afids_soap_server_url'     => 'Text',
      'afids_request_post_email'  => 'Text',
      'phone_number1'             => 'Text',
      'phone_number2'             => 'Text',
    );
  }
}
