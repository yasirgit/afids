<?php

require_once(sfConfig::get('sf_lib_dir').'/filter/base/BaseFormFilterPropel.class.php');

/**
 * RpNewMemberStatus filter form base class.
 *
 * @package    angelflight
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfPropelFormFilterGeneratedTemplate.php 16976 2009-04-04 12:47:44Z fabien $
 */
class BaseRpNewMemberStatusFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'firstName'         => new sfWidgetFormFilterInput(),
      'lastName'          => new sfWidgetFormFilterInput(),
      'joinDate'          => new sfWidgetFormFilterInput(),
      'flightStatus'      => new sfWidgetFormFilterInput(),
      'insuranceReceived' => new sfWidgetFormFilterInput(),
      'badgeMade'         => new sfWidgetFormFilterInput(),
      'notebookSent'      => new sfWidgetFormFilterInput(),
      'joinDateSort'      => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'wing_id'           => new sfWidgetFormFilterInput(),
      'email'             => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'firstName'         => new sfValidatorPass(array('required' => false)),
      'lastName'          => new sfValidatorPass(array('required' => false)),
      'joinDate'          => new sfValidatorPass(array('required' => false)),
      'flightStatus'      => new sfValidatorPass(array('required' => false)),
      'insuranceReceived' => new sfValidatorPass(array('required' => false)),
      'badgeMade'         => new sfValidatorPass(array('required' => false)),
      'notebookSent'      => new sfValidatorPass(array('required' => false)),
      'joinDateSort'      => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
      'wing_id'           => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'email'             => new sfValidatorPass(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('rp_new_member_status_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'RpNewMemberStatus';
  }

  public function getFields()
  {
    return array(
      'firstName'         => 'Text',
      'lastName'          => 'Text',
      'joinDate'          => 'Text',
      'flightStatus'      => 'Text',
      'insuranceReceived' => 'Text',
      'badgeMade'         => 'Text',
      'notebookSent'      => 'Text',
      'joinDateSort'      => 'Date',
      'wing_id'           => 'Number',
      'email'             => 'Text',
      'id'                => 'Number',
    );
  }
}
