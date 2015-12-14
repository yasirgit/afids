<?php

require_once(sfConfig::get('sf_lib_dir').'/filter/base/BaseFormFilterPropel.class.php');

/**
 * EmailTracking filter form base class.
 *
 * @package    angelflight
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfPropelFormFilterGeneratedTemplate.php 16976 2009-04-04 12:47:44Z fabien $
 */
class BaseEmailTrackingFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'track_date'    => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => true)),
      'send_date'     => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => true)),
      'letter_id'     => new sfWidgetFormPropelChoice(array('model' => 'EmailLetter', 'add_empty' => true)),
      'rec_count'     => new sfWidgetFormFilterInput(),
      'afids_user_id' => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'track_date'    => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
      'send_date'     => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
      'letter_id'     => new sfValidatorPropelChoice(array('required' => false, 'model' => 'EmailLetter', 'column' => 'id')),
      'rec_count'     => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'afids_user_id' => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
    ));

    $this->widgetSchema->setNameFormat('email_tracking_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'EmailTracking';
  }

  public function getFields()
  {
    return array(
      'id'            => 'Number',
      'track_date'    => 'Date',
      'send_date'     => 'Date',
      'letter_id'     => 'ForeignKey',
      'rec_count'     => 'Number',
      'afids_user_id' => 'Number',
    );
  }
}
