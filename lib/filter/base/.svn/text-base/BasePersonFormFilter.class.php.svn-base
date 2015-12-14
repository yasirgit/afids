<?php

require_once(sfConfig::get('sf_lib_dir').'/filter/base/BaseFormFilterPropel.class.php');

/**
 * Person filter form base class.
 *
 * @package    angelflight
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfPropelFormFilterGeneratedTemplate.php 16976 2009-04-04 12:47:44Z fabien $
 */
class BasePersonFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'title'                 => new sfWidgetFormFilterInput(),
      'first_name'            => new sfWidgetFormFilterInput(),
      'last_name'             => new sfWidgetFormFilterInput(),
      'address1'              => new sfWidgetFormFilterInput(),
      'address2'              => new sfWidgetFormFilterInput(),
      'city'                  => new sfWidgetFormFilterInput(),
      'county'                => new sfWidgetFormFilterInput(),
      'state'                 => new sfWidgetFormFilterInput(),
      'country'               => new sfWidgetFormFilterInput(),
      'zipcode'               => new sfWidgetFormFilterInput(),
      'day_phone'             => new sfWidgetFormFilterInput(),
      'day_comment'           => new sfWidgetFormFilterInput(),
      'evening_phone'         => new sfWidgetFormFilterInput(),
      'evening_comment'       => new sfWidgetFormFilterInput(),
      'mobile_phone'          => new sfWidgetFormFilterInput(),
      'mobile_comment'        => new sfWidgetFormFilterInput(),
      'pager_phone'           => new sfWidgetFormFilterInput(),
      'pager_comment'         => new sfWidgetFormFilterInput(),
      'other_phone'           => new sfWidgetFormFilterInput(),
      'other_comment'         => new sfWidgetFormFilterInput(),
      'fax_phone1'            => new sfWidgetFormFilterInput(),
      'fax_comment1'          => new sfWidgetFormFilterInput(),
      'auto_fax'              => new sfWidgetFormFilterInput(),
      'fax_phone2'            => new sfWidgetFormFilterInput(),
      'fax_comment2'          => new sfWidgetFormFilterInput(),
      'email'                 => new sfWidgetFormFilterInput(),
      'email_text_only'       => new sfWidgetFormFilterInput(),
      'email_blocked'         => new sfWidgetFormFilterInput(),
      'username'              => new sfWidgetFormFilterInput(),
      'password'              => new sfWidgetFormFilterInput(),
      'comment'               => new sfWidgetFormFilterInput(),
      'wf_policy_agreed'      => new sfWidgetFormFilterInput(),
      'wf_policy_agreed_date' => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => true)),
      'pager_email'           => new sfWidgetFormFilterInput(),
      'block_mailings'        => new sfWidgetFormFilterInput(),
      'newsletter'            => new sfWidgetFormFilterInput(),
      'gender'                => new sfWidgetFormFilterInput(),
      'deceased'              => new sfWidgetFormFilterInput(),
      'deceased_comment'      => new sfWidgetFormFilterInput(),
      'secondary_email'       => new sfWidgetFormFilterInput(),
      'deceased_date'         => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => true)),
      'middle_name'           => new sfWidgetFormFilterInput(),
      'suffix'                => new sfWidgetFormFilterInput(),
      'nickname'              => new sfWidgetFormFilterInput(),
      'veteran'               => new sfWidgetFormFilterInput(),
      'created_at'            => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => true)),
      'person_role_list'      => new sfWidgetFormPropelChoice(array('model' => 'Role', 'add_empty' => true)),
    ));

    $this->setValidators(array(
      'title'                 => new sfValidatorPass(array('required' => false)),
      'first_name'            => new sfValidatorPass(array('required' => false)),
      'last_name'             => new sfValidatorPass(array('required' => false)),
      'address1'              => new sfValidatorPass(array('required' => false)),
      'address2'              => new sfValidatorPass(array('required' => false)),
      'city'                  => new sfValidatorPass(array('required' => false)),
      'county'                => new sfValidatorPass(array('required' => false)),
      'state'                 => new sfValidatorPass(array('required' => false)),
      'country'               => new sfValidatorPass(array('required' => false)),
      'zipcode'               => new sfValidatorPass(array('required' => false)),
      'day_phone'             => new sfValidatorPass(array('required' => false)),
      'day_comment'           => new sfValidatorPass(array('required' => false)),
      'evening_phone'         => new sfValidatorPass(array('required' => false)),
      'evening_comment'       => new sfValidatorPass(array('required' => false)),
      'mobile_phone'          => new sfValidatorPass(array('required' => false)),
      'mobile_comment'        => new sfValidatorPass(array('required' => false)),
      'pager_phone'           => new sfValidatorPass(array('required' => false)),
      'pager_comment'         => new sfValidatorPass(array('required' => false)),
      'other_phone'           => new sfValidatorPass(array('required' => false)),
      'other_comment'         => new sfValidatorPass(array('required' => false)),
      'fax_phone1'            => new sfValidatorPass(array('required' => false)),
      'fax_comment1'          => new sfValidatorPass(array('required' => false)),
      'auto_fax'              => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'fax_phone2'            => new sfValidatorPass(array('required' => false)),
      'fax_comment2'          => new sfValidatorPass(array('required' => false)),
      'email'                 => new sfValidatorPass(array('required' => false)),
      'email_text_only'       => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'email_blocked'         => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'username'              => new sfValidatorPass(array('required' => false)),
      'password'              => new sfValidatorPass(array('required' => false)),
      'comment'               => new sfValidatorPass(array('required' => false)),
      'wf_policy_agreed'      => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'wf_policy_agreed_date' => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
      'pager_email'           => new sfValidatorPass(array('required' => false)),
      'block_mailings'        => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'newsletter'            => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'gender'                => new sfValidatorPass(array('required' => false)),
      'deceased'              => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'deceased_comment'      => new sfValidatorPass(array('required' => false)),
      'secondary_email'       => new sfValidatorPass(array('required' => false)),
      'deceased_date'         => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
      'middle_name'           => new sfValidatorPass(array('required' => false)),
      'suffix'                => new sfValidatorPass(array('required' => false)),
      'nickname'              => new sfValidatorPass(array('required' => false)),
      'veteran'               => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'created_at'            => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
      'person_role_list'      => new sfValidatorPropelChoice(array('model' => 'Role', 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('person_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function addPersonRoleListColumnCriteria(Criteria $criteria, $field, $values)
  {
    if (!is_array($values))
    {
      $values = array($values);
    }

    if (!count($values))
    {
      return;
    }

    $criteria->addJoin(PersonRolePeer::PERSON_ID, PersonPeer::ID);

    $value = array_pop($values);
    $criterion = $criteria->getNewCriterion(PersonRolePeer::ROLE_ID, $value);

    foreach ($values as $value)
    {
      $criterion->addOr($criteria->getNewCriterion(PersonRolePeer::ROLE_ID, $value));
    }

    $criteria->add($criterion);
  }

  public function getModelName()
  {
    return 'Person';
  }

  public function getFields()
  {
    return array(
      'id'                    => 'Number',
      'title'                 => 'Text',
      'first_name'            => 'Text',
      'last_name'             => 'Text',
      'address1'              => 'Text',
      'address2'              => 'Text',
      'city'                  => 'Text',
      'county'                => 'Text',
      'state'                 => 'Text',
      'country'               => 'Text',
      'zipcode'               => 'Text',
      'day_phone'             => 'Text',
      'day_comment'           => 'Text',
      'evening_phone'         => 'Text',
      'evening_comment'       => 'Text',
      'mobile_phone'          => 'Text',
      'mobile_comment'        => 'Text',
      'pager_phone'           => 'Text',
      'pager_comment'         => 'Text',
      'other_phone'           => 'Text',
      'other_comment'         => 'Text',
      'fax_phone1'            => 'Text',
      'fax_comment1'          => 'Text',
      'auto_fax'              => 'Number',
      'fax_phone2'            => 'Text',
      'fax_comment2'          => 'Text',
      'email'                 => 'Text',
      'email_text_only'       => 'Number',
      'email_blocked'         => 'Number',
      'username'              => 'Text',
      'password'              => 'Text',
      'comment'               => 'Text',
      'wf_policy_agreed'      => 'Number',
      'wf_policy_agreed_date' => 'Date',
      'pager_email'           => 'Text',
      'block_mailings'        => 'Number',
      'newsletter'            => 'Number',
      'gender'                => 'Text',
      'deceased'              => 'Number',
      'deceased_comment'      => 'Text',
      'secondary_email'       => 'Text',
      'deceased_date'         => 'Date',
      'middle_name'           => 'Text',
      'suffix'                => 'Text',
      'nickname'              => 'Text',
      'veteran'               => 'Number',
      'created_at'            => 'Date',
      'person_role_list'      => 'ManyKey',
    );
  }
}
