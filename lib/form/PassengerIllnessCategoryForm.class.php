<?php

/**
 * PassengerIllnessCategory form.
 *
 * @package    angelflight
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfPropelFormTemplate.php 10377 2008-07-21 07:10:32Z dwhittle $
 */
class PassengerIllnessCategoryForm extends BasePassengerIllnessCategoryForm
{
  public function configure()
  {
    unset($this['id']);

    # Fields
    $this->widgetSchema['category_description'] = new sfWidgetFormInput(array(), array('class' => 'text'));
    $this->widgetSchema['super_category_description'] = new sfWidgetFormInput(array(), array('class' => 'text'));


    $this->widgetSchema->setLabels(array('category_description' => 'Category Description'));
    $this->widgetSchema->setLabels(array('super_category_description' => 'Super Category Description'));

    $this->validatorSchema['category_description'] = new sfValidatorString(array('required' => false));
    $this->validatorSchema['super_category_description'] = new sfValidatorString(array('required' => false));

    $this->widgetSchema->setNameFormat('pill[%s]');
  }
}
