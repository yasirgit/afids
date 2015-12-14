<?php

/**
 * MissionReport form.
 *
 * @package    angelflight
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfPropelFormTemplate.php 10377 2008-07-21 07:10:32Z dwhittle $
 */
class MissionReportForm extends BaseMissionReportForm
{
  public function configure()
  {
    $this->setWidgets(array(
      'id'                     => new sfWidgetFormInputHidden(),
      'mission_date'           => new widgetFormDate(array('format_date' => array('js' => 'mm/dd/yy', 'php' => 'm/d/Y')), array('class' => 'text narrow')),
      'copilot_name'           => new sfWidgetFormInput(array(), array('class' => 'text')),
      'member_copilot'         => new sfWidgetFormInputCheckbox(array(), array('value' => 1)),
      'pickup_airport_ident'   => new sfWidgetFormInput(array(), array('class' => 'text narrow')),
      'dropoff_airport_ident'  => new sfWidgetFormInput(array(), array('class' => 'text narrow')),
      'routing'                => new sfWidgetFormInput(array(), array('class' => 'text narrow')),
      'passenger_names'        => new sfWidgetFormInput(array(), array('class' => 'text')),
      'commercial_ticket_cost' => new sfWidgetFormInput(array(), array('class' => 'text narrow')),
      'airline_ref_number'     => new sfWidgetFormInput(array(), array('class' => 'text narrow')),
      'hobbs_time'             => new sfWidgetFormTime(array('format_without_seconds' => '%hour%%minute%')),
      'mileage'                => new sfWidgetFormInput(array(), array('class' => 'text narrow')),
      'expense_report'         => new sfWidgetFormTextarea(array(), array('class' =>'text')),
      'aircraft_id'            => new sfWidgetFormInput(array(), array('type' => 'radio')),
      'n_number'               => new sfWidgetFormInput(array(), array('class' => 'text narrow')),
      'makemodel'              => new sfWidgetFormInput(array(), array('class' => 'text narrow')),
      'mission_comments'       => new sfWidgetFormTextarea(array(), array('class' =>'text')),
      'photo1'                 => new sfWidgetFormInputFile(array(), array("onchange" => "checkExt(this)")),
      'photo2'                 => new sfWidgetFormInputFile(array(), array("onchange" => "checkExt(this)")),
      'photo3'                 => new sfWidgetFormInputFile(array(), array("onchange" => "checkExt(this)")),
      'photo4'                 => new sfWidgetFormInputFile(array(), array("onchange" => "checkExt(this)")),
      'photo5'                 => new sfWidgetFormInputFile(array(), array("onchange" => "checkExt(this)")),
      'leg_id'                 => new sfWidgetFormInputHidden(),
    ));

    $this->widgetSchema->setLabels(array(
      'mission_date'          => 'Mission Date',
      'copilot_name'          => 'Co-pilot Name',
      'member_copilot'        => 'Is the co-pilot a member?',
      'pickup_airport_ident'  => 'Pickup airport',
      'dropoff_airport_ident' => 'Dropoff airport',
      'routing'               => 'Routing',
      'passenger_names'       => 'Passenger Name(s)',
      'commercial_ticket_cost'=> 'Commercial Flight',
      'airline_ref_number'    => 'Airline Reference #',
      'hobbs_time'            => 'Hobbs time',
      'mileage'               => 'Mileage',
      'expense_report'        => 'Expenses',
      'aircraft_id'           => 'Other',
      'mission_comments'      => 'Mission Comment',
      'photo1'                => 'Upload photo 1',
      'photo2'                => 'Upload photo 2',
      'photo3'                => 'Upload photo 3',
      'photo4'                => 'Upload photo 4',
      'photo5'                => 'Upload photo 5',
    ));

    $this->setValidators(array(
      'id'                     => new sfValidatorPropelChoice(array('model' => 'MissionReport', 'column' => 'id', 'required' => false)),
      'mission_date'           => new sfValidatorDateTime(array('required' => true)),
      'copilot_name'           => new sfValidatorString(array('max_length' => 50, 'required' => false)),
      'member_copilot'         => new sfValidatorInteger(array('required' => false)),
      'pickup_airport_ident'   => new sfValidatorString(array('max_length' => 25, 'required' => true)),
      'dropoff_airport_ident'  => new sfValidatorString(array('max_length' => 25, 'required' => true)),
      'routing'                => new sfValidatorString(array('max_length' => 40, 'required' => false)),
      'passenger_names'        => new sfValidatorString(array('max_length' => 255, 'required' => true)),
      'commercial_ticket_cost' => new sfValidatorInteger(array('required' => false)),
      'airline_ref_number'     => new sfValidatorString(array('max_length' => 40, 'required' => false)),
      'hobbs_time'             => new sfValidatorTime(array('required' => false)),
      'mileage'                => new sfValidatorInteger(array('required' => false)),
      'expense_report'         => new sfValidatorString(array('max_length' => 2000, 'required' => false), array('max_length' => 'maximum %max_length% characters allowed')),
      'aircraft_id'            => new sfValidatorPropelChoice(array('model' => 'Aircraft', 'column' => 'id', 'required' => false)),
      'n_number'               => new sfValidatorString(array('max_length' => 8, 'required' => false)),
      'makemodel'              => new sfValidatorString(array('max_length' => 60, 'required' => false)),
      'mission_comments'       => new sfValidatorString(array('max_length' => 2000, 'required' => false), array('max_length' => 'maximum %max_length% characters allowed')),
      'photo1'                 => new sfValidatorFile(
                                            array('path' => sfConfig::get('sf_upload_dir').'/mission_report', 'max_size' => 3145728,'required' => false, 'mime_types' => 'web_images'),
                                            array('required'  => 'This field can not be empty',
                                                    'max_size'   => 'File is too large (maximum is 3MB).',
                                                    'mime_types' => 'Only image (jepg, png, gif) file is supported')
       ),
      'photo2'                 => new sfValidatorFile(
                                            array('path' => sfConfig::get('sf_upload_dir').'/mission_report', 'max_size' => 3145728,'required' => false, 'mime_types' => 'web_images'),array('required'  => 'This field can not be empty',
                                                    'max_size'   => 'File is too large (maximum is 3MB).',
                                                    'mime_types' => 'Only image (jepg, png, gif) file is supported')
       ),
      'photo3'                 => new sfValidatorFile(
                                            array('path' => sfConfig::get('sf_upload_dir').'/mission_report', 'max_size' => 3145728,'required' => false, 'mime_types' => 'web_images'),array('required'  => 'This field can not be empty',
                                                    'max_size'   => 'File is too large (maximum is 3MB).',
                                                    'mime_types' => 'Only image (jepg, png, gif) file is supported')
      ),
      'photo4'                 => new sfValidatorFile(
                                            array('path' => sfConfig::get('sf_upload_dir').'/mission_report', 'max_size' => 3145728,'required' => false, 'mime_types' => 'web_images'),array('required'  => 'This field can not be empty',
                                                    'max_size'   => 'File is too large (maximum is 3MB).',
                                                    'mime_types' => 'Only image (jepg, png, gif) file is supported')
      ),
      'photo5'                 => new sfValidatorFile(
                                            array('path' => sfConfig::get('sf_upload_dir').'/mission_report', 'max_size' => 3145728,'required' => false, 'mime_types' => 'web_images'),array('required'  => 'This field can not be empty',
                                                    'max_size'   => 'File is too large (maximum is 3MB).',
                                                    'mime_types' => 'Only image (jepg, png, gif) file is supported')
      ),
      'leg_id'                 => new sfValidatorPass(),
    ));
    $this->widgetSchema->setHelp('photo1','Max file size: 3MB and Formats: jpg, png, gif');
    $this->widgetSchema->setHelp('photo2','Max file size: 3MB and Formats: jpg, png, gif');
    $this->widgetSchema->setHelp('photo3','Max file size: 3MB and Formats: jpg, png, gif');
    $this->widgetSchema->setHelp('photo4','Max file size: 3MB and Formats: jpg, png, gif');
    $this->widgetSchema->setHelp('photo5','Max file size: 3MB and Formats: jpg, png, gif');
//File is too large (maximum is 2M bytes). 3145728
      /*$this->validatorSchema['photo1'] = new sfValidatorFile(
            array(
                    'required'   => false,
                    'max_size'   => 3145728,
                    'mime_types' =>  array(
                            'image/jpeg',
                            'image/pjpeg',
                            'image/png',
                            'image/x-png',
                            'image/gif',
                    )
            ),
            array(
                    'required'  => 'This field can not be empty',
                    'max_size'   => 'File is too large (maximum is 3MB).',
                    'mime_types' => 'Only image (jepg, png, gif) file is supported'));

          $this->validatorSchema['photo2'] = new sfValidatorFile(
            array(
                    'required'   => false,
                    'max_size'   => 3145728,
                    'mime_types' =>  array(
                            'image/jpeg',
                            'image/pjpeg',
                            'image/png',
                            'image/x-png',
                            'image/gif',
                    )
            ),
            array(
                    'required'  => 'This field can not be empty',
                    'max_size'   => 'File is too large (maximum is 3MB).',
                    'mime_types' => 'Only image (jepg, png, gif) file is supported'));


           $this->validatorSchema['photo3'] = new sfValidatorFile(
            array(
                    'required'   => false,
                    'max_size'   => 3145728,
                    'mime_types' =>  array(
                            'image/jpeg',
                            'image/pjpeg',
                            'image/png',
                            'image/x-png',
                            'image/gif',
                    )
            ),
            array(
                    'required'  => 'This field can not be empty',
                    'max_size'   => 'File is too large (maximum is 3MB).',
                    'mime_types' => 'Only image (jepg, png, gif) file is supported'));


         $this->validatorSchema['photo4'] = new sfValidatorFile(
            array(
                    'required'   => false,
                    'max_size'   => 3145728,
                    'mime_types' =>  array(
                            'image/jpeg',
                            'image/pjpeg',
                            'image/png',
                            'image/x-png',
                            'image/gif',
                    )
            ),
            array(
                    'required'  => 'This field can not be empty',
                    'max_size'   => 'File is too large (maximum is 3MB).',
                    'mime_types' => 'Only image (jepg, png, gif) file is supported'));


          $this->validatorSchema['photo5'] = new sfValidatorFile(
            array(
                    'required'   => false,
                    'max_size'   => 3145728,
                    'mime_types' =>  array(
                            'image/jpeg',
                            'image/pjpeg',
                            'image/png',
                            'image/x-png',
                            'image/gif',
                    )
            ),
            array(
                    'required'  => 'This field can not be empty',
                    'max_size'   => 'File is too large (maximum is 3MB).',
                    'mime_types' => 'Only image (jepg, png, gif) file is supported'));

*/    
    $this->widgetSchema->setNameFormat('mission_report[%s]');
  }
}
