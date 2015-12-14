<?php

require_once(sfConfig::get('sf_lib_dir').'/filter/base/BaseFormFilterPropel.class.php');

/**
 * Coordinator filter form base class.
 *
 * @package    angelflight
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfPropelFormFilterGeneratedTemplate.php 16976 2009-04-04 12:47:44Z fabien $
 */
class BaseCoordinatorFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'member_id'        => new sfWidgetFormPropelChoice(array('model' => 'Member', 'add_empty' => true)),
      'lead_id'          => new sfWidgetFormPropelChoice(array('model' => 'Coordinator', 'add_empty' => true)),
      'coor_of_the_week' => new sfWidgetFormFilterInput(),
      'coor_week_date'   => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => true)),
      'initial_contact'  => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'member_id'        => new sfValidatorPropelChoice(array('required' => false, 'model' => 'Member', 'column' => 'id')),
      'lead_id'          => new sfValidatorPropelChoice(array('required' => false, 'model' => 'Coordinator', 'column' => 'id')),
      'coor_of_the_week' => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'coor_week_date'   => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
      'initial_contact'  => new sfValidatorPass(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('coordinator_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Coordinator';
  }

  public function getFields()
  {
    return array(
      'id'               => 'Number',
      'member_id'        => 'ForeignKey',
      'lead_id'          => 'ForeignKey',
      'coor_of_the_week' => 'Number',
      'coor_week_date'   => 'Date',
      'initial_contact'  => 'Text',
    );
  }
}
