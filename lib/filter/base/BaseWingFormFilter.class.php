<?php

require_once(sfConfig::get('sf_lib_dir').'/filter/base/BaseFormFilterPropel.class.php');

/**
 * Wing filter form base class.
 *
 * @package    angelflight
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfPropelFormFilterGeneratedTemplate.php 16976 2009-04-04 12:47:44Z fabien $
 */
class BaseWingFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'name'                    => new sfWidgetFormFilterInput(),
      'newsletter_abbreviation' => new sfWidgetFormFilterInput(),
      'display_name'            => new sfWidgetFormFilterInput(),
      'state'                   => new sfWidgetFormFilterInput(),
      'event_wings_list'        => new sfWidgetFormPropelChoice(array('model' => 'Event', 'add_empty' => true)),
    ));

    $this->setValidators(array(
      'name'                    => new sfValidatorPass(array('required' => false)),
      'newsletter_abbreviation' => new sfValidatorPass(array('required' => false)),
      'display_name'            => new sfValidatorPass(array('required' => false)),
      'state'                   => new sfValidatorPass(array('required' => false)),
      'event_wings_list'        => new sfValidatorPropelChoice(array('model' => 'Event', 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('wing_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function addEventWingsListColumnCriteria(Criteria $criteria, $field, $values)
  {
    if (!is_array($values))
    {
      $values = array($values);
    }

    if (!count($values))
    {
      return;
    }

    $criteria->addJoin(EventWingsPeer::WING_ID, WingPeer::ID);

    $value = array_pop($values);
    $criterion = $criteria->getNewCriterion(EventWingsPeer::EVENT_ID, $value);

    foreach ($values as $value)
    {
      $criterion->addOr($criteria->getNewCriterion(EventWingsPeer::EVENT_ID, $value));
    }

    $criteria->add($criterion);
  }

  public function getModelName()
  {
    return 'Wing';
  }

  public function getFields()
  {
    return array(
      'id'                      => 'Number',
      'name'                    => 'Text',
      'newsletter_abbreviation' => 'Text',
      'display_name'            => 'Text',
      'state'                   => 'Text',
      'event_wings_list'        => 'ManyKey',
    );
  }
}
