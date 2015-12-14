<?php
/**
 * MissionPhoto form.
 *
 * @package    angelflight
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfPropelFormTemplate.php 10377 2008-07-21 07:10:32Z dwhittle $
 */
class MissionPhotoForm extends BaseMissionPhotoForm
{
  public function configure()
  {
    unset($this['submission_date'],$this['mission_id'],$this['review_date'],$this['review_by'],$this['approved'],$this['filesize'],
      $this['height'],$this['width'],$this['file_format'],$this['photo_quality'],$this['leg_id'],$this['category'],$this['photo_use']);
  	      
    $this->widgetSchema['mission_date']   = new widgetFormDateTimeCustom(array('format_date' => array('js' => 'mm/dd/yy', 'php' => 'm/d/Y')), array('class' => 'text narrow'));
    $this->widgetSchema['caption']        = new sfWidgetFormTextarea(array(), array('class'=>'text'));
    $this->widgetSchema['comment']        = new sfWidgetFormTextarea(array(), array('class'=>'text'));
    $this->widgetSchema['photo_filename'] = new sfWidgetFormInputFile();
  	      
    $this->widgetSchema->setLabels(array('photo_filename' => 'Photo'));

    $this->validatorSchema['mission_date']     = new validatorDateTimeCustom(array('required' => true),array('invalid'=>'Mission Date is invalid !.'));
    $this->validatorSchema['passenger_name']   = new sfValidatorString(array('required' => true));
    $this->validatorSchema['pilot_name']       = new sfValidatorString(array('required' => true));
    $this->validatorSchema['origin']           = new sfValidatorString(array('required' => true));
    $this->validatorSchema['first_name']       = new sfValidatorString(array('required' => true));
    $this->validatorSchema['last_name']        = new sfValidatorString(array('required' => true));
    $this->validatorSchema['destination']      = new sfValidatorString(array('required' => true));
    $this->validatorSchema['caption']          = new sfValidatorString(array('required' => true));
    $this->validatorSchema['comment']          = new sfValidatorString(array('required' => true));

    $this->validatorSchema->setPreValidator(new sfValidatorCallback(array('callback' => array($this, 'preValidateLogo'))));
    
    $this->widgetSchema->setNameFormat('mission_photo[%s]');
  }
  
  public function preValidateLogo($validator, $values)
  { 
    $required = false;
    $filename = sfConfig::get('sf_upload_dir').'/mission_photo/display/'.$this->getObject()->getPhotoFilename();

    if (!is_file($filename))
    {
      $required = true;
    }

    $this->validatorSchema['photo_filename']   = new sfValidatorFile(array(
                   'path' => sfConfig::get('sf_upload_dir').'/mission_photo/display',
                   'required' => $required,
                   'max_size' => '1242880',
                   'mime_types' => 'web_images'),
             array('max_size' => 'max size is 1MB!',
                   'mime_types' => 'only web images allowed (jpg, png, gif)'));
    return $values;
  }
}
