<?php

require_once(sfConfig::get('sf_lib_dir').'/filter/base/BaseFormFilterPropel.class.php');

/**
 * MissionPhoto filter form base class.
 *
 * @package    angelflight
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfPropelFormFilterGeneratedTemplate.php 16976 2009-04-04 12:47:44Z fabien $
 */
class BaseMissionPhotoFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'first_name'      => new sfWidgetFormFilterInput(),
      'last_name'       => new sfWidgetFormFilterInput(),
      'submission_date' => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => true)),
      'mission_date'    => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => true)),
      'passenger_name'  => new sfWidgetFormFilterInput(),
      'pilot_name'      => new sfWidgetFormFilterInput(),
      'origin'          => new sfWidgetFormFilterInput(),
      'destination'     => new sfWidgetFormFilterInput(),
      'caption'         => new sfWidgetFormFilterInput(),
      'comment'         => new sfWidgetFormFilterInput(),
      'photo_filename'  => new sfWidgetFormFilterInput(),
      'mission_id'      => new sfWidgetFormPropelChoice(array('model' => 'Mission', 'add_empty' => true)),
      'review_date'     => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => true)),
      'review_by'       => new sfWidgetFormFilterInput(),
      'approved'        => new sfWidgetFormFilterInput(),
      'filesize'        => new sfWidgetFormFilterInput(),
      'height'          => new sfWidgetFormFilterInput(),
      'width'           => new sfWidgetFormFilterInput(),
      'file_format'     => new sfWidgetFormFilterInput(),
      'photo_quality'   => new sfWidgetFormFilterInput(),
      'event_id'        => new sfWidgetFormFilterInput(),
      'leg_id'          => new sfWidgetFormPropelChoice(array('model' => 'MissionLeg', 'add_empty' => true)),
      'category'        => new sfWidgetFormFilterInput(),
      'photo_use'       => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'first_name'      => new sfValidatorPass(array('required' => false)),
      'last_name'       => new sfValidatorPass(array('required' => false)),
      'submission_date' => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
      'mission_date'    => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
      'passenger_name'  => new sfValidatorPass(array('required' => false)),
      'pilot_name'      => new sfValidatorPass(array('required' => false)),
      'origin'          => new sfValidatorPass(array('required' => false)),
      'destination'     => new sfValidatorPass(array('required' => false)),
      'caption'         => new sfValidatorPass(array('required' => false)),
      'comment'         => new sfValidatorPass(array('required' => false)),
      'photo_filename'  => new sfValidatorPass(array('required' => false)),
      'mission_id'      => new sfValidatorPropelChoice(array('required' => false, 'model' => 'Mission', 'column' => 'id')),
      'review_date'     => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
      'review_by'       => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'approved'        => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'filesize'        => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'height'          => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'width'           => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'file_format'     => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'photo_quality'   => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'event_id'        => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'leg_id'          => new sfValidatorPropelChoice(array('required' => false, 'model' => 'MissionLeg', 'column' => 'id')),
      'category'        => new sfValidatorPass(array('required' => false)),
      'photo_use'       => new sfValidatorPass(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('mission_photo_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'MissionPhoto';
  }

  public function getFields()
  {
    return array(
      'id'              => 'Number',
      'first_name'      => 'Text',
      'last_name'       => 'Text',
      'submission_date' => 'Date',
      'mission_date'    => 'Date',
      'passenger_name'  => 'Text',
      'pilot_name'      => 'Text',
      'origin'          => 'Text',
      'destination'     => 'Text',
      'caption'         => 'Text',
      'comment'         => 'Text',
      'photo_filename'  => 'Text',
      'mission_id'      => 'ForeignKey',
      'review_date'     => 'Date',
      'review_by'       => 'Number',
      'approved'        => 'Number',
      'filesize'        => 'Number',
      'height'          => 'Number',
      'width'           => 'Number',
      'file_format'     => 'Number',
      'photo_quality'   => 'Number',
      'event_id'        => 'Number',
      'leg_id'          => 'ForeignKey',
      'category'        => 'Text',
      'photo_use'       => 'Text',
    );
  }
}
