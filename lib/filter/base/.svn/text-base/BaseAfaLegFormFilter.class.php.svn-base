<?php

require_once(sfConfig::get('sf_lib_dir').'/filter/base/BaseFormFilterPropel.class.php');

/**
 * AfaLeg filter form base class.
 *
 * @package    angelflight
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfPropelFormFilterGeneratedTemplate.php 16976 2009-04-04 12:47:44Z fabien $
 */
class BaseAfaLegFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'pilot_name'         => new sfWidgetFormFilterInput(),
      'day_phone'          => new sfWidgetFormFilterInput(),
      'night_phone'        => new sfWidgetFormFilterInput(),
      'fax_phone'          => new sfWidgetFormFilterInput(),
      'aircraft_id'        => new sfWidgetFormPropelChoice(array('model' => 'Aircraft', 'add_empty' => true)),
      'n_number'           => new sfWidgetFormFilterInput(),
      'aircraft_color'     => new sfWidgetFormFilterInput(),
      'etd'                => new sfWidgetFormFilterInput(),
      'eta'                => new sfWidgetFormFilterInput(),
      'afa_org_id'         => new sfWidgetFormPropelChoice(array('model' => 'AfaOrg', 'add_empty' => true)),
      'pilot_mobile_phone' => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'pilot_name'         => new sfValidatorPass(array('required' => false)),
      'day_phone'          => new sfValidatorPass(array('required' => false)),
      'night_phone'        => new sfValidatorPass(array('required' => false)),
      'fax_phone'          => new sfValidatorPass(array('required' => false)),
      'aircraft_id'        => new sfValidatorPropelChoice(array('required' => false, 'model' => 'Aircraft', 'column' => 'id')),
      'n_number'           => new sfValidatorPass(array('required' => false)),
      'aircraft_color'     => new sfValidatorPass(array('required' => false)),
      'etd'                => new sfValidatorPass(array('required' => false)),
      'eta'                => new sfValidatorPass(array('required' => false)),
      'afa_org_id'         => new sfValidatorPropelChoice(array('required' => false, 'model' => 'AfaOrg', 'column' => 'id')),
      'pilot_mobile_phone' => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
    ));

    $this->widgetSchema->setNameFormat('afa_leg_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'AfaLeg';
  }

  public function getFields()
  {
    return array(
      'id'                 => 'ForeignKey',
      'pilot_name'         => 'Text',
      'day_phone'          => 'Text',
      'night_phone'        => 'Text',
      'fax_phone'          => 'Text',
      'aircraft_id'        => 'ForeignKey',
      'n_number'           => 'Text',
      'aircraft_color'     => 'Text',
      'etd'                => 'Text',
      'eta'                => 'Text',
      'afa_org_id'         => 'ForeignKey',
      'pilot_mobile_phone' => 'Number',
    );
  }
}
