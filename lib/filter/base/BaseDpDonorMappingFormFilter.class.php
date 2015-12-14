<?php

require_once(sfConfig::get('sf_lib_dir').'/filter/base/BaseFormFilterPropel.class.php');

/**
 * DpDonorMapping filter form base class.
 *
 * @package    angelflight
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfPropelFormFilterGeneratedTemplate.php 16976 2009-04-04 12:47:44Z fabien $
 */
class BaseDpDonorMappingFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'afids_person_id' => new sfWidgetFormFilterInput(),
      'dp_donor_id'     => new sfWidgetFormFilterInput(),
      'dateAdded'       => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => true)),
    ));

    $this->setValidators(array(
      'afids_person_id' => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'dp_donor_id'     => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'dateAdded'       => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
    ));

    $this->widgetSchema->setNameFormat('dp_donor_mapping_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'DpDonorMapping';
  }

  public function getFields()
  {
    return array(
      'id'              => 'Number',
      'afids_person_id' => 'Number',
      'dp_donor_id'     => 'Number',
      'dateAdded'       => 'Date',
    );
  }
}
