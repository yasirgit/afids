<?php

require_once(sfConfig::get('sf_lib_dir').'/filter/base/BaseFormFilterPropel.class.php');

/**
 * RpDisasterResponseStatus filter form base class.
 *
 * @package    angelflight
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfPropelFormFilterGeneratedTemplate.php 16976 2009-04-04 12:47:44Z fabien $
 */
class BaseRpDisasterResponseStatusFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'lastName'         => new sfWidgetFormFilterInput(),
      'personName'       => new sfWidgetFormFilterInput(),
      'disasterResponse' => new sfWidgetFormFilterInput(),
      'county'           => new sfWidgetFormFilterInput(),
      'wingID'           => new sfWidgetFormFilterInput(),
      'wingName'         => new sfWidgetFormFilterInput(),
      'flightStatus'     => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'lastName'         => new sfValidatorPass(array('required' => false)),
      'personName'       => new sfValidatorPass(array('required' => false)),
      'disasterResponse' => new sfValidatorPass(array('required' => false)),
      'county'           => new sfValidatorPass(array('required' => false)),
      'wingID'           => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'wingName'         => new sfValidatorPass(array('required' => false)),
      'flightStatus'     => new sfValidatorPass(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('rp_disaster_response_status_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'RpDisasterResponseStatus';
  }

  public function getFields()
  {
    return array(
      'lastName'         => 'Text',
      'personName'       => 'Text',
      'disasterResponse' => 'Text',
      'county'           => 'Text',
      'wingID'           => 'Number',
      'wingName'         => 'Text',
      'flightStatus'     => 'Text',
      'id'               => 'Number',
    );
  }
}
