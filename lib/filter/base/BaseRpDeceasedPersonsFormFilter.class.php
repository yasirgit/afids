<?php

require_once(sfConfig::get('sf_lib_dir').'/filter/base/BaseFormFilterPropel.class.php');

/**
 * RpDeceasedPersons filter form base class.
 *
 * @package    angelflight
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfPropelFormFilterGeneratedTemplate.php 16976 2009-04-04 12:47:44Z fabien $
 */
class BaseRpDeceasedPersonsFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'personName'      => new sfWidgetFormFilterInput(),
      'memberID'        => new sfWidgetFormFilterInput(),
      'dateOfBirth'     => new sfWidgetFormFilterInput(),
      'deceased_date'   => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => true)),
      'deceasedComment' => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'personName'      => new sfValidatorPass(array('required' => false)),
      'memberID'        => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'dateOfBirth'     => new sfValidatorPass(array('required' => false)),
      'deceased_date'   => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
      'deceasedComment' => new sfValidatorPass(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('rp_deceased_persons_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'RpDeceasedPersons';
  }

  public function getFields()
  {
    return array(
      'personName'      => 'Text',
      'memberID'        => 'Number',
      'dateOfBirth'     => 'Text',
      'deceased_date'   => 'Date',
      'deceasedComment' => 'Text',
      'id'              => 'Number',
    );
  }
}
