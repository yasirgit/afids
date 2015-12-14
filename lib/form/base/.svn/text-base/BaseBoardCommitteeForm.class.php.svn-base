<?php

/**
 * BoardCommittee form base class.
 *
 * @package    angelflight
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfPropelFormGeneratedTemplate.php 16976 2009-04-04 12:47:44Z fabien $
 */
class BaseBoardCommitteeForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'              => new sfWidgetFormInputHidden(),
      'board_member_id' => new sfWidgetFormPropelChoice(array('model' => 'BoardMember', 'add_empty' => false)),
      'committee_id'    => new sfWidgetFormPropelChoice(array('model' => 'Committee', 'add_empty' => false)),
      'chairman'        => new sfWidgetFormInput(),
    ));

    $this->setValidators(array(
      'id'              => new sfValidatorPropelChoice(array('model' => 'BoardCommittee', 'column' => 'id', 'required' => false)),
      'board_member_id' => new sfValidatorPropelChoice(array('model' => 'BoardMember', 'column' => 'id')),
      'committee_id'    => new sfValidatorPropelChoice(array('model' => 'Committee', 'column' => 'id')),
      'chairman'        => new sfValidatorInteger(),
    ));

    $this->validatorSchema->setPostValidator(
      new sfValidatorPropelUnique(array('model' => 'BoardCommittee', 'column' => array('board_member_id', 'committee_id')))
    );

    $this->widgetSchema->setNameFormat('board_committee[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'BoardCommittee';
  }


}
