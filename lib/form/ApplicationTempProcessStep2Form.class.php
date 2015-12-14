<?php

/**
 * ApplicationTemp form.
 *
 * @package    angelflight
 * @subpackage form
 * @author     Ariunbayar
 * @version    SVN: $Id: sfPropelFormTemplate.php 10377 2008-07-21 07:10:32Z dwhittle $
 */
class ApplicationTempProcessStep2Form extends BaseApplicationTempForm
{
  public function configure()
  {
    $yes_no = array(1 => 'Yes', 0 => 'No');
    $states = sfConfig::get('app_states', array());

    $widgets = array(
      'id'                           => new sfWidgetFormInputHidden(),
      'spouse_pilot'                 => new sfWidgetFormSelectRadio(array('choices' => $yes_no, 'formatter' => array($this, 'formatterRaw'))),
      'spouse_first_name'            => new sfWidgetFormInput(array(), array('class' => 'text narrow')),
      'spouse_last_name'             => new sfWidgetFormInput(array(), array('class' => 'text narrow')),
      'emergency_contact_name'       => new sfWidgetFormInput(array(), array('class' => 'text')),
      'emergency_contact_phone'      => new widgetFormInputPhone(array('mask' => '(999) 9999-9999', 'ok_class' => 'field_ok', 'holder_class' => 'field_hold'), array('class' => 'text narrow')),
      'applicant_copilot'            => new sfWidgetFormSelectRadio(array('choices' => $yes_no, 'formatter' => array($this, 'formatterRaw'))),
      'languages_spoken'             => new sfWidgetFormInput(array(), array('class' => 'text')),
      'date_of_birth'                => new widgetFormDate(array('change_year' => true, 'change_month' => true, 'format_date' => array('js' => 'mm/dd/yy', 'php' => 'm/d/Y')), array('class' => 'text narrow')),
      'drivers_license_state'        => new sfWidgetFormSelect(array('choices' => array_merge(array('' => 'Please Select'), $states))),
      'drivers_license_number'       => new sfWidgetFormInput(array(), array('class' => 'text narrow')),
      'height'                       => new sfWidgetFormInput(array(), array('class' => 'text narrowest')),
      'weight'                       => new sfWidgetFormInput(array(), array('class' => 'text narrowest')),
      'member_class_id'              => new sfWidgetFormPropelChoice(array('model' => 'MemberClass', 'add_empty' => 'Please Select')),
      'wing_id'                      => new sfWidgetFormPropelChoice(array('model' => 'Wing', 'method' => 'getName', 'add_empty' => 'Please Select')),
    );

    $labels = array(
      'spouse_pilot'            => 'If married, is your spouse a pilot?',
      'spouse_first_name'       => 'Spouse\'s Name',
      'emergency_contact_name'  => 'Emergency Contact Name',
      'emergency_contact_phone' => 'Emergency Contact Phone',
      'applicant_copilot'       => 'Are you interested in flying as a mission assistant?',
      'languages_spoken'        => 'Languages you speak',
      'date_of_birth'           => 'Date of Birth*',
      'drivers_license_state'   => 'State',
      'drivers_license_number'  => 'Number',
      'height'                  => 'Height',
      'weight'                  => 'Weight',
      'member_class_id'         => 'Member Class*',
      'wing_id'                 => 'Wing*',
    );

    $helps = array(
      'date_of_birth' => 'Format: mm/dd/yyyy please',
      'drivers_license_state' => 'Please provide your driver\'s license information if you plan to provide ground transportation for patients',
    );

    $validators = array(
      'id'                           => new sfValidatorPropelChoice(array('model' => 'ApplicationTemp', 'column' => 'id', 'required' => false)),
      'spouse_pilot'                 => new sfValidatorChoice(array('choices' => array_keys($yes_no), 'required' => false)),
      'spouse_first_name'            => new sfValidatorString(array('max_length' => 40, 'required' => false)),
      'spouse_last_name'             => new sfValidatorString(array('max_length' => 40, 'required' => false)),
      'emergency_contact_name'       => new sfValidatorString(array('max_length' => 40, 'required' => false)),
      'emergency_contact_phone'      => new sfValidatorString(array('max_length' => 40, 'required' => false)),
      'applicant_copilot'            => new sfValidatorChoice(array('choices' => array_keys($yes_no), 'required' => false)),
      'languages_spoken'             => new sfValidatorString(array('max_length' => 125, 'required' => false)),
      'date_of_birth'                => new sfValidatorDate(array('max' => time()), array('invalid'=> 'Date of birth is invalid !.')),
      'drivers_license_state'        => new sfValidatorChoice(array('choices' => array_keys($states), 'required' => false)),
      'drivers_license_number'       => new sfValidatorString(array('max_length' => 25, 'required' => false)),
      'height'                       => new sfValidatorInteger(array('required' => false)),
      'weight'                       => new sfValidatorInteger(array('required' => false)),
      'member_class_id'              => new sfValidatorPropelChoice(array('model' => 'MemberClass')),
      'wing_id'                      => new sfValidatorPropelChoice(array('model' => 'Wing')),
    );

    $this->setWidgets($widgets);
    $this->widgetSchema->setLabels($labels);
    $this->widgetSchema->setHelps($helps);
    $this->setValidators($validators);
    $this->widgetSchema->setNameFormat('application[%s]');
    $this->widgetSchema->getFormFormatter()->setHelpFormat('%help%');
  }

  public function formatterRaw($widget, $inputs)
  {
    $rows = array();
    foreach ($inputs as $input){
      $rows[] = $input['input'].strtr($input['label'], array('<label' => '<label class="raw"'));
    }

    return implode($this->getOption('separator'), $rows);
  }
}
