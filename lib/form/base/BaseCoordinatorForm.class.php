<?php

/**
 * Coordinator form base class.
 *
 * @package    angelflight
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfPropelFormGeneratedTemplate.php 16976 2009-04-04 12:47:44Z fabien $
 */
class BaseCoordinatorForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'               => new sfWidgetFormInputHidden(),
      'member_id'        => new sfWidgetFormPropelChoice(array('model' => 'Member', 'add_empty' => true)),
      'lead_id'          => new sfWidgetFormPropelChoice(array('model' => 'Coordinator', 'add_empty' => true)),
      'coor_of_the_week' => new sfWidgetFormInput(),
      'coor_week_date'   => new sfWidgetFormDateTime(),
      'initial_contact'  => new sfWidgetFormInput(),
    ));

    $this->setValidators(array(
      'id'               => new sfValidatorPropelChoice(array('model' => 'Coordinator', 'column' => 'id', 'required' => false)),
      'member_id'        => new sfValidatorPropelChoice(array('model' => 'Member', 'column' => 'id', 'required' => false)),
      'lead_id'          => new sfValidatorPropelChoice(array('model' => 'Coordinator', 'column' => 'id', 'required' => false)),
      'coor_of_the_week' => new sfValidatorInteger(array('required' => false)),
      'coor_week_date'   => new sfValidatorDateTime(array('required' => false)),
      'initial_contact'  => new sfValidatorString(array('max_length' => 40, 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('coordinator[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Coordinator';
  }


}
