<?php

/**
 * BoardMember form base class.
 *
 * @package    angelflight
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfPropelFormGeneratedTemplate.php 16976 2009-04-04 12:47:44Z fabien $
 */
class BaseBoardMemberForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'        => new sfWidgetFormInputHidden(),
      'person_id' => new sfWidgetFormPropelChoice(array('model' => 'Person', 'add_empty' => false)),
      'startyear' => new sfWidgetFormInput(),
      'endyear'   => new sfWidgetFormInput(),
    ));

    $this->setValidators(array(
      'id'        => new sfValidatorPropelChoice(array('model' => 'BoardMember', 'column' => 'id', 'required' => false)),
      'person_id' => new sfValidatorPropelChoice(array('model' => 'Person', 'column' => 'id')),
      'startyear' => new sfValidatorInteger(),
      'endyear'   => new sfValidatorInteger(),
    ));

    $this->widgetSchema->setNameFormat('board_member[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'BoardMember';
  }


}
