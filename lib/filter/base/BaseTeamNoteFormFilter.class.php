<?php

require_once(sfConfig::get('sf_lib_dir').'/filter/base/BaseFormFilterPropel.class.php');

/**
 * TeamNote filter form base class.
 *
 * @package    angelflight
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfPropelFormFilterGeneratedTemplate.php 16976 2009-04-04 12:47:44Z fabien $
 */
class BaseTeamNoteFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'note'    => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'note'    => new sfValidatorPass(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('team_note_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'TeamNote';
  }

  public function getFields()
  {
    return array(
      'role_id' => 'ForeignKey',
      'note'    => 'Text',
    );
  }
}
