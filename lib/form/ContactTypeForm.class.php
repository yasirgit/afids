<?php

/**
 * ContactType form.
 *
 * @package    angelflight
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfPropelFormTemplate.php 10377 2008-07-21 07:10:32Z dwhittle $
 */
class ContactTypeForm extends BaseContactTypeForm
{
  public function configure()
  {
    unset($this['id']);

    # Fields
    $this->widgetSchema['contact_type_desc'] = new sfWidgetFormInput(array(), array('class' => 'text'));

    $this->widgetSchema->setLabels(array('contact_type_desc' => 'Description'));

    $this->validatorSchema['contact_type_desc'] = new sfValidatorString(array('required' => false));

    $this->widgetSchema->setNameFormat('con_type[%s]');
  }
}
