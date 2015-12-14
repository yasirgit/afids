<?php

/**
 * Wing form.
 *
 * @package    angelflight
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfPropelFormTemplate.php 10377 2008-07-21 07:10:32Z dwhittle $
 */
class WingForm extends BaseWingForm
{
  public function configure()
  {
    unset($this['id']);

    # Fields
    $this->widgetSchema['name'] = new sfWidgetFormInput(array(), array('class' => 'text narrow'));
    $this->widgetSchema['newsletter_abbreviation'] =  new sfWidgetFormInput(array(), array('class' => 'text narrow'));
    $this->widgetSchema['display_name'] = new sfWidgetFormInput(array(), array('class' => 'text narrow'));
    $this->widgetSchema['state'] = new sfWidgetFormInput(array(), array('class' => 'text narrowest'));

    # Labels
    $this->widgetSchema->setLabels(array('name' => 'Name'));
    $this->widgetSchema->setLabels(array('newsletter_abbreviation' => 'Newsletter Abbreviation'));
    $this->widgetSchema->setLabels(array('display_name' => 'Display Name'));
    $this->widgetSchema->setLabels(array('state' => 'state'));

    # Validation
    $this->validatorSchema['name'] = new sfValidatorString(array('required' => true),array('required'=>'Please confirm a name !'));
    $this->validatorSchema['newsletter_abbreviation'] = new sfValidatorString(array('required' => false));
    $this->validatorSchema['display_name'] = new sfValidatorString(array('required' => false));
    $this->validatorSchema['state'] = new sfValidatorString(array('required' => false));
    # Descriptive message

    $this->widgetSchema->setNameFormat('wing[%s]');
  }
}
