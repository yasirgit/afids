<?php

require_once(sfConfig::get('sf_lib_dir').'/filter/base/BaseFormFilterPropel.class.php');

/**
 * BoardCommittee filter form base class.
 *
 * @package    angelflight
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfPropelFormFilterGeneratedTemplate.php 16976 2009-04-04 12:47:44Z fabien $
 */
class BaseBoardCommitteeFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'board_member_id' => new sfWidgetFormPropelChoice(array('model' => 'BoardMember', 'add_empty' => true)),
      'committee_id'    => new sfWidgetFormPropelChoice(array('model' => 'Committee', 'add_empty' => true)),
      'chairman'        => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'board_member_id' => new sfValidatorPropelChoice(array('required' => false, 'model' => 'BoardMember', 'column' => 'id')),
      'committee_id'    => new sfValidatorPropelChoice(array('required' => false, 'model' => 'Committee', 'column' => 'id')),
      'chairman'        => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
    ));

    $this->widgetSchema->setNameFormat('board_committee_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'BoardCommittee';
  }

  public function getFields()
  {
    return array(
      'id'              => 'Number',
      'board_member_id' => 'ForeignKey',
      'committee_id'    => 'ForeignKey',
      'chairman'        => 'Number',
    );
  }
}
