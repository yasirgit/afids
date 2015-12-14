<?php

require_once(sfConfig::get('sf_lib_dir').'/filter/base/BaseFormFilterPropel.class.php');

/**
 * RpMemberPhotos filter form base class.
 *
 * @package    angelflight
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfPropelFormFilterGeneratedTemplate.php 16976 2009-04-04 12:47:44Z fabien $
 */
class BaseRpMemberPhotosFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'memberID'       => new sfWidgetFormFilterInput(),
      'passID'         => new sfWidgetFormFilterInput(),
      'photoID'        => new sfWidgetFormFilterInput(),
      'submissionDate' => new sfWidgetFormFilterInput(),
      'missionDate'    => new sfWidgetFormFilterInput(),
      'passengerName'  => new sfWidgetFormFilterInput(),
      'pilotName'      => new sfWidgetFormFilterInput(),
      'photo_quality'  => new sfWidgetFormFilterInput(),
      'photo_filename' => new sfWidgetFormFilterInput(),
      'photoThumb'     => new sfWidgetFormFilterInput(),
      'wing_id'        => new sfWidgetFormFilterInput(),
      'passLastName'   => new sfWidgetFormFilterInput(),
      'pilotLastName'  => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'memberID'       => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'passID'         => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'photoID'        => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'submissionDate' => new sfValidatorPass(array('required' => false)),
      'missionDate'    => new sfValidatorPass(array('required' => false)),
      'passengerName'  => new sfValidatorPass(array('required' => false)),
      'pilotName'      => new sfValidatorPass(array('required' => false)),
      'photo_quality'  => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'photo_filename' => new sfValidatorPass(array('required' => false)),
      'photoThumb'     => new sfValidatorPass(array('required' => false)),
      'wing_id'        => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'passLastName'   => new sfValidatorPass(array('required' => false)),
      'pilotLastName'  => new sfValidatorPass(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('rp_member_photos_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'RpMemberPhotos';
  }

  public function getFields()
  {
    return array(
      'memberID'       => 'Number',
      'passID'         => 'Number',
      'photoID'        => 'Number',
      'submissionDate' => 'Text',
      'missionDate'    => 'Text',
      'passengerName'  => 'Text',
      'pilotName'      => 'Text',
      'photo_quality'  => 'Number',
      'photo_filename' => 'Text',
      'photoThumb'     => 'Text',
      'wing_id'        => 'Number',
      'passLastName'   => 'Text',
      'pilotLastName'  => 'Text',
      'id'             => 'Number',
    );
  }
}
