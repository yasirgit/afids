<?php

require_once(sfConfig::get('sf_lib_dir').'/filter/base/BaseFormFilterPropel.class.php');

/**
 * Donor filter form base class.
 *
 * @package    angelflight
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfPropelFormFilterGeneratedTemplate.php 16976 2009-04-04 12:47:44Z fabien $
 */
class BaseDonorFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'co_donor_id'      => new sfWidgetFormFilterInput(),
      'affiliation_id'   => new sfWidgetFormPropelChoice(array('model' => 'Affiliation', 'add_empty' => true)),
      'block_mailings'   => new sfWidgetFormFilterInput(),
      'prospect_comment' => new sfWidgetFormFilterInput(),
      'salutation'       => new sfWidgetFormFilterInput(),
      'company_id'       => new sfWidgetFormPropelChoice(array('model' => 'Company', 'add_empty' => true)),
      'position'         => new sfWidgetFormFilterInput(),
      'donor_potential'  => new sfWidgetFormFilterInput(),
      'person_id'        => new sfWidgetFormPropelChoice(array('model' => 'Person', 'add_empty' => true)),
      'date_added'       => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => true)),
      'date_updated'     => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => true)),
    ));

    $this->setValidators(array(
      'co_donor_id'      => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'affiliation_id'   => new sfValidatorPropelChoice(array('required' => false, 'model' => 'Affiliation', 'column' => 'id')),
      'block_mailings'   => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'prospect_comment' => new sfValidatorPass(array('required' => false)),
      'salutation'       => new sfValidatorPass(array('required' => false)),
      'company_id'       => new sfValidatorPropelChoice(array('required' => false, 'model' => 'Company', 'column' => 'id')),
      'position'         => new sfValidatorPass(array('required' => false)),
      'donor_potential'  => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'person_id'        => new sfValidatorPropelChoice(array('required' => false, 'model' => 'Person', 'column' => 'id')),
      'date_added'       => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
      'date_updated'     => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
    ));

    $this->widgetSchema->setNameFormat('donor_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Donor';
  }

  public function getFields()
  {
    return array(
      'id'               => 'Number',
      'co_donor_id'      => 'Number',
      'affiliation_id'   => 'ForeignKey',
      'block_mailings'   => 'Number',
      'prospect_comment' => 'Text',
      'salutation'       => 'Text',
      'company_id'       => 'ForeignKey',
      'position'         => 'Text',
      'donor_potential'  => 'Number',
      'person_id'        => 'ForeignKey',
      'date_added'       => 'Date',
      'date_updated'     => 'Date',
    );
  }
}
