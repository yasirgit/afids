<?php

require_once(sfConfig::get('sf_lib_dir').'/filter/base/BaseFormFilterPropel.class.php');

/**
 * RpNewMemberBadge filter form base class.
 *
 * @package    angelflight
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfPropelFormFilterGeneratedTemplate.php 16976 2009-04-04 12:47:44Z fabien $
 */
class BaseRpNewMemberBadgeFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'applicationID'        => new sfWidgetFormFilterInput(),
      'personID'             => new sfWidgetFormFilterInput(),
      'memberID'             => new sfWidgetFormFilterInput(),
      'externalID'           => new sfWidgetFormFilterInput(),
      'firstName'            => new sfWidgetFormFilterInput(),
      'lastName'             => new sfWidgetFormFilterInput(),
      'email'                => new sfWidgetFormFilterInput(),
      'addressOne'           => new sfWidgetFormFilterInput(),
      'addressTwo'           => new sfWidgetFormFilterInput(),
      'city'                 => new sfWidgetFormFilterInput(),
      'state'                => new sfWidgetFormFilterInput(),
      'zipcode'              => new sfWidgetFormFilterInput(),
      'badgeMade'            => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => true)),
      'notebookSent'         => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => true)),
      'ed_new_member_notify' => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => true)),
      'wn_new_memberN_ntify' => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => true)),
      'joinDate'             => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'flightStatus'         => new sfWidgetFormFilterInput(),
      'wing_id'              => new sfWidgetFormFilterInput(),
      'joinDateSort'         => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
    ));

    $this->setValidators(array(
      'applicationID'        => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'personID'             => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'memberID'             => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'externalID'           => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'firstName'            => new sfValidatorPass(array('required' => false)),
      'lastName'             => new sfValidatorPass(array('required' => false)),
      'email'                => new sfValidatorPass(array('required' => false)),
      'addressOne'           => new sfValidatorPass(array('required' => false)),
      'addressTwo'           => new sfValidatorPass(array('required' => false)),
      'city'                 => new sfValidatorPass(array('required' => false)),
      'state'                => new sfValidatorPass(array('required' => false)),
      'zipcode'              => new sfValidatorPass(array('required' => false)),
      'badgeMade'            => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
      'notebookSent'         => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
      'ed_new_member_notify' => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
      'wn_new_memberN_ntify' => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
      'joinDate'             => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
      'flightStatus'         => new sfValidatorPass(array('required' => false)),
      'wing_id'              => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'joinDateSort'         => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
    ));

    $this->widgetSchema->setNameFormat('rp_new_member_badge_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'RpNewMemberBadge';
  }

  public function getFields()
  {
    return array(
      'applicationID'        => 'Number',
      'personID'             => 'Number',
      'memberID'             => 'Number',
      'externalID'           => 'Number',
      'firstName'            => 'Text',
      'lastName'             => 'Text',
      'email'                => 'Text',
      'addressOne'           => 'Text',
      'addressTwo'           => 'Text',
      'city'                 => 'Text',
      'state'                => 'Text',
      'zipcode'              => 'Text',
      'badgeMade'            => 'Date',
      'notebookSent'         => 'Date',
      'ed_new_member_notify' => 'Date',
      'wn_new_memberN_ntify' => 'Date',
      'joinDate'             => 'Date',
      'flightStatus'         => 'Text',
      'wing_id'              => 'Number',
      'joinDateSort'         => 'Date',
      'id'                   => 'Number',
    );
  }
}
