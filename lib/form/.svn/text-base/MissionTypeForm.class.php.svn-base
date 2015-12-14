<?php

/**
 * MissionType form.
 *
 * @package    angelflight
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfPropelFormTemplate.php 10377 2008-07-21 07:10:32Z dwhittle $
 */
class MissionTypeForm extends BaseMissionTypeForm
{
  public function configure()
  {
    unset($this['id']);

    $this->widgetSchema['name'] = new sfWidgetFormTextarea(array(),array('class'=>'text'));
    $this->widgetSchema['stat_count'] = new sfWidgetFormInputCheckbox(array(), array('value' => 1));

    $this->widgetSchema->setLabels(array('name' => 'Name'));
    $this->widgetSchema->setLabels(array('stat_count' => 'Stat count'));

    $this->validatorSchema['name'] = new sfValidatorString(array('required' => true),array('required'=>'Please confirm mission type name !'));
    $this->validatorSchema['stat_count'] = new sfValidatorString(array('required' => false));

    $this->widgetSchema->setNameFormat('mtype[%s]');
  }
}
