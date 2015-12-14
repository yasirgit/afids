<?php

/**
 * Person form base class.
 *
 * @package    angelflight
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfPropelFormGeneratedTemplate.php 16976 2009-04-04 12:47:44Z fabien $
 */
class BasePersonForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'                    => new sfWidgetFormInputHidden(),
      'title'                 => new sfWidgetFormInput(),
      'first_name'            => new sfWidgetFormInput(),
      'last_name'             => new sfWidgetFormInput(),
      'address1'              => new sfWidgetFormInput(),
      'address2'              => new sfWidgetFormInput(),
      'city'                  => new sfWidgetFormInput(),
      'county'                => new sfWidgetFormInput(),
      'state'                 => new sfWidgetFormInput(),
      'country'               => new sfWidgetFormInput(),
      'zipcode'               => new sfWidgetFormInput(),
      'day_phone'             => new sfWidgetFormInput(),
      'day_comment'           => new sfWidgetFormInput(),
      'evening_phone'         => new sfWidgetFormInput(),
      'evening_comment'       => new sfWidgetFormInput(),
      'mobile_phone'          => new sfWidgetFormInput(),
      'mobile_comment'        => new sfWidgetFormInput(),
      'pager_phone'           => new sfWidgetFormInput(),
      'pager_comment'         => new sfWidgetFormInput(),
      'other_phone'           => new sfWidgetFormInput(),
      'other_comment'         => new sfWidgetFormInput(),
      'fax_phone1'            => new sfWidgetFormInput(),
      'fax_comment1'          => new sfWidgetFormInput(),
      'auto_fax'              => new sfWidgetFormInput(),
      'fax_phone2'            => new sfWidgetFormInput(),
      'fax_comment2'          => new sfWidgetFormInput(),
      'email'                 => new sfWidgetFormInput(),
      'email_text_only'       => new sfWidgetFormInput(),
      'email_blocked'         => new sfWidgetFormInput(),
      'username'              => new sfWidgetFormInput(),
      'password'              => new sfWidgetFormInput(),
      'comment'               => new sfWidgetFormInput(),
      'wf_policy_agreed'      => new sfWidgetFormInput(),
      'wf_policy_agreed_date' => new sfWidgetFormDate(),
      'pager_email'           => new sfWidgetFormInput(),
      'block_mailings'        => new sfWidgetFormInput(),
      'newsletter'            => new sfWidgetFormInput(),
      'gender'                => new sfWidgetFormInput(),
      'deceased'              => new sfWidgetFormInput(),
      'deceased_comment'      => new sfWidgetFormInput(),
      'secondary_email'       => new sfWidgetFormInput(),
      'deceased_date'         => new sfWidgetFormDate(),
      'middle_name'           => new sfWidgetFormInput(),
      'suffix'                => new sfWidgetFormInput(),
      'nickname'              => new sfWidgetFormInput(),
      'veteran'               => new sfWidgetFormInput(),
      'created_at'            => new sfWidgetFormDateTime(),
      'person_role_list'      => new sfWidgetFormPropelChoiceMany(array('model' => 'Role')),
    ));

    $this->setValidators(array(
      'id'                    => new sfValidatorPropelChoice(array('model' => 'Person', 'column' => 'id', 'required' => false)),
      'title'                 => new sfValidatorString(array('max_length' => 12, 'required' => false)),
      'first_name'            => new sfValidatorString(array('max_length' => 40)),
      'last_name'             => new sfValidatorString(array('max_length' => 40)),
      'address1'              => new sfValidatorString(array('max_length' => 40, 'required' => false)),
      'address2'              => new sfValidatorString(array('max_length' => 40, 'required' => false)),
      'city'                  => new sfValidatorString(array('max_length' => 30, 'required' => false)),
      'county'                => new sfValidatorString(array('max_length' => 30, 'required' => false)),
      'state'                 => new sfValidatorString(array('max_length' => 2, 'required' => false)),
      'country'               => new sfValidatorString(array('max_length' => 30, 'required' => false)),
      'zipcode'               => new sfValidatorString(array('max_length' => 30, 'required' => false)),
      'day_phone'             => new sfValidatorString(array('max_length' => 16, 'required' => false)),
      'day_comment'           => new sfValidatorString(array('max_length' => 40, 'required' => false)),
      'evening_phone'         => new sfValidatorString(array('max_length' => 16, 'required' => false)),
      'evening_comment'       => new sfValidatorString(array('max_length' => 40, 'required' => false)),
      'mobile_phone'          => new sfValidatorString(array('max_length' => 16, 'required' => false)),
      'mobile_comment'        => new sfValidatorString(array('max_length' => 40, 'required' => false)),
      'pager_phone'           => new sfValidatorString(array('max_length' => 16, 'required' => false)),
      'pager_comment'         => new sfValidatorString(array('max_length' => 40, 'required' => false)),
      'other_phone'           => new sfValidatorString(array('max_length' => 16, 'required' => false)),
      'other_comment'         => new sfValidatorString(array('max_length' => 40, 'required' => false)),
      'fax_phone1'            => new sfValidatorString(array('max_length' => 16, 'required' => false)),
      'fax_comment1'          => new sfValidatorString(array('max_length' => 40, 'required' => false)),
      'auto_fax'              => new sfValidatorInteger(),
      'fax_phone2'            => new sfValidatorString(array('max_length' => 16, 'required' => false)),
      'fax_comment2'          => new sfValidatorString(array('max_length' => 40, 'required' => false)),
      'email'                 => new sfValidatorString(array('max_length' => 80, 'required' => false)),
      'email_text_only'       => new sfValidatorInteger(array('required' => false)),
      'email_blocked'         => new sfValidatorInteger(array('required' => false)),
      'username'              => new sfValidatorString(array('max_length' => 20, 'required' => false)),
      'password'              => new sfValidatorString(array('max_length' => 50, 'required' => false)),
      'comment'               => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'wf_policy_agreed'      => new sfValidatorInteger(array('required' => false)),
      'wf_policy_agreed_date' => new sfValidatorDate(array('required' => false)),
      'pager_email'           => new sfValidatorString(array('max_length' => 80, 'required' => false)),
      'block_mailings'        => new sfValidatorInteger(array('required' => false)),
      'newsletter'            => new sfValidatorInteger(array('required' => false)),
      'gender'                => new sfValidatorString(array('max_length' => 7, 'required' => false)),
      'deceased'              => new sfValidatorInteger(array('required' => false)),
      'deceased_comment'      => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'secondary_email'       => new sfValidatorString(array('max_length' => 80, 'required' => false)),
      'deceased_date'         => new sfValidatorDate(array('required' => false)),
      'middle_name'           => new sfValidatorString(array('max_length' => 25, 'required' => false)),
      'suffix'                => new sfValidatorString(array('max_length' => 25, 'required' => false)),
      'nickname'              => new sfValidatorString(array('max_length' => 25, 'required' => false)),
      'veteran'               => new sfValidatorInteger(array('required' => false)),
      'created_at'            => new sfValidatorDateTime(array('required' => false)),
      'person_role_list'      => new sfValidatorPropelChoiceMany(array('model' => 'Role', 'required' => false)),
    ));

    $this->validatorSchema->setPostValidator(
      new sfValidatorPropelUnique(array('model' => 'Person', 'column' => array('username')))
    );

    $this->widgetSchema->setNameFormat('person[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Person';
  }


  public function updateDefaultsFromObject()
  {
    parent::updateDefaultsFromObject();

    if (isset($this->widgetSchema['person_role_list']))
    {
      $values = array();
      foreach ($this->object->getPersonRoles() as $obj)
      {
        $values[] = $obj->getRoleId();
      }

      $this->setDefault('person_role_list', $values);
    }

  }

  protected function doSave($con = null)
  {
    parent::doSave($con);

    $this->savePersonRoleList($con);
  }

  public function savePersonRoleList($con = null)
  {
    if (!$this->isValid())
    {
      throw $this->getErrorSchema();
    }

    if (!isset($this->widgetSchema['person_role_list']))
    {
      // somebody has unset this widget
      return;
    }

    if (is_null($con))
    {
      $con = $this->getConnection();
    }

    $c = new Criteria();
    $c->add(PersonRolePeer::PERSON_ID, $this->object->getPrimaryKey());
    PersonRolePeer::doDelete($c, $con);

    $values = $this->getValue('person_role_list');
    if (is_array($values))
    {
      foreach ($values as $value)
      {
        $obj = new PersonRole();
        $obj->setPersonId($this->object->getPrimaryKey());
        $obj->setRoleId($value);
        $obj->save();
      }
    }
  }

}
