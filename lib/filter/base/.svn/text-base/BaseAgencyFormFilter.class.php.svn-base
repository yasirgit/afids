<?php

require_once(sfConfig::get('sf_lib_dir').'/filter/base/BaseFormFilterPropel.class.php');

/**
 * Agency filter form base class.
 *
 * @package    angelflight
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfPropelFormFilterGeneratedTemplate.php 16976 2009-04-04 12:47:44Z fabien $
 */
class BaseAgencyFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'name'        => new sfWidgetFormFilterInput(),
      'address1'    => new sfWidgetFormFilterInput(),
      'address2'    => new sfWidgetFormFilterInput(),
      'city'        => new sfWidgetFormFilterInput(),
      'county'      => new sfWidgetFormFilterInput(),
      'state'       => new sfWidgetFormFilterInput(),
      'country'     => new sfWidgetFormFilterInput(),
      'zipcode'     => new sfWidgetFormFilterInput(),
      'phone'       => new sfWidgetFormFilterInput(),
      'comment'     => new sfWidgetFormFilterInput(),
      'fax_phone'   => new sfWidgetFormFilterInput(),
      'fax_comment' => new sfWidgetFormFilterInput(),
      'email'       => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'name'        => new sfValidatorPass(array('required' => false)),
      'address1'    => new sfValidatorPass(array('required' => false)),
      'address2'    => new sfValidatorPass(array('required' => false)),
      'city'        => new sfValidatorPass(array('required' => false)),
      'county'      => new sfValidatorPass(array('required' => false)),
      'state'       => new sfValidatorPass(array('required' => false)),
      'country'     => new sfValidatorPass(array('required' => false)),
      'zipcode'     => new sfValidatorPass(array('required' => false)),
      'phone'       => new sfValidatorPass(array('required' => false)),
      'comment'     => new sfValidatorPass(array('required' => false)),
      'fax_phone'   => new sfValidatorPass(array('required' => false)),
      'fax_comment' => new sfValidatorPass(array('required' => false)),
      'email'       => new sfValidatorPass(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('agency_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Agency';
  }

  public function getFields()
  {
    return array(
      'id'          => 'Number',
      'name'        => 'Text',
      'address1'    => 'Text',
      'address2'    => 'Text',
      'city'        => 'Text',
      'county'      => 'Text',
      'state'       => 'Text',
      'country'     => 'Text',
      'zipcode'     => 'Text',
      'phone'       => 'Text',
      'comment'     => 'Text',
      'fax_phone'   => 'Text',
      'fax_comment' => 'Text',
      'email'       => 'Text',
    );
  }
}
