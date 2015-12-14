<?php

require_once(sfConfig::get('sf_lib_dir').'/filter/base/BaseFormFilterPropel.class.php');

/**
 * RpMembersNoMissions filter form base class.
 *
 * @package    angelflight
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfPropelFormFilterGeneratedTemplate.php 16976 2009-04-04 12:47:44Z fabien $
 */
class BaseRpMembersNoMissionsFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'firstName'    => new sfWidgetFormFilterInput(),
      'lastName'     => new sfWidgetFormFilterInput(),
      'county'       => new sfWidgetFormFilterInput(),
      'zipcode'      => new sfWidgetFormFilterInput(),
      'memberAC'     => new sfWidgetFormFilterInput(),
      'joinDate'     => new sfWidgetFormFilterInput(),
      'orientedDate' => new sfWidgetFormFilterInput(),
      'joinDateSort' => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'wing_id'      => new sfWidgetFormFilterInput(),
      'email'        => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'firstName'    => new sfValidatorPass(array('required' => false)),
      'lastName'     => new sfValidatorPass(array('required' => false)),
      'county'       => new sfValidatorPass(array('required' => false)),
      'zipcode'      => new sfValidatorPass(array('required' => false)),
      'memberAC'     => new sfValidatorPass(array('required' => false)),
      'joinDate'     => new sfValidatorPass(array('required' => false)),
      'orientedDate' => new sfValidatorPass(array('required' => false)),
      'joinDateSort' => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
      'wing_id'      => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'email'        => new sfValidatorPass(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('rp_members_no_missions_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'RpMembersNoMissions';
  }

  public function getFields()
  {
    return array(
      'firstName'    => 'Text',
      'lastName'     => 'Text',
      'county'       => 'Text',
      'zipcode'      => 'Text',
      'memberAC'     => 'Text',
      'joinDate'     => 'Text',
      'orientedDate' => 'Text',
      'joinDateSort' => 'Date',
      'wing_id'      => 'Number',
      'email'        => 'Text',
      'id'           => 'Number',
    );
  }
}
