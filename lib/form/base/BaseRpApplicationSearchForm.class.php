<?php

/**
 * RpApplicationSearch form base class.
 *
 * @package    angelflight
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfPropelFormGeneratedTemplate.php 16976 2009-04-04 12:47:44Z fabien $
 */
class BaseRpApplicationSearchForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'applicationID'            => new sfWidgetFormInput(),
      'applicationDate'          => new sfWidgetFormDateTime(),
      'personID'                 => new sfWidgetFormInput(),
      'firstName'                => new sfWidgetFormInput(),
      'lastName'                 => new sfWidgetFormInput(),
      'address1'                 => new sfWidgetFormInput(),
      'city'                     => new sfWidgetFormInput(),
      'state'                    => new sfWidgetFormInput(),
      'zipcode'                  => new sfWidgetFormInput(),
      'county'                   => new sfWidgetFormInput(),
      'areaCode'                 => new sfWidgetFormInput(),
      'dayPhone'                 => new sfWidgetFormInput(),
      'dayComment'               => new sfWidgetFormInput(),
      'eveningPhone'             => new sfWidgetFormInput(),
      'eveComment'               => new sfWidgetFormInput(),
      'mobilePhone'              => new sfWidgetFormInput(),
      'mobileComment'            => new sfWidgetFormInput(),
      'otherPhone'               => new sfWidgetFormInput(),
      'otherComment'             => new sfWidgetFormInput(),
      'pagerPhone'               => new sfWidgetFormInput(),
      'pagerComment'             => new sfWidgetFormInput(),
      'email'                    => new sfWidgetFormInput(),
      'spousePilot'              => new sfWidgetFormInput(),
      'wingID'                   => new sfWidgetFormInput(),
      'wingName'                 => new sfWidgetFormInput(),
      'renewalDate'              => new sfWidgetFormDate(),
      'joinDate'                 => new sfWidgetFormDate(),
      'joinYear'                 => new sfWidgetFormInput(),
      'refSourceID'              => new sfWidgetFormInput(),
      'refSourceName'            => new sfWidgetFormInput(),
      'companyMatchFunds'        => new sfWidgetFormInput(),
      'companyName'              => new sfWidgetFormInput(),
      'companyPosition'          => new sfWidgetFormInput(),
      'vocationClassID'          => new sfWidgetFormInput(),
      'vocationClassName'        => new sfWidgetFormInput(),
      'memberAOPA'               => new sfWidgetFormInput(),
      'memberKiwanis'            => new sfWidgetFormInput(),
      'memberRotary'             => new sfWidgetFormInput(),
      'memberLions'              => new sfWidgetFormInput(),
      'member99s'                => new sfWidgetFormInput(),
      'memberWIA'                => new sfWidgetFormInput(),
      'missionOrientation'       => new sfWidgetFormInput(),
      'missionCoordination'      => new sfWidgetFormInput(),
      'pilotRecruitment'         => new sfWidgetFormInput(),
      'fundRaising'              => new sfWidgetFormInput(),
      'celebrityContacts'        => new sfWidgetFormInput(),
      'graphicArts'              => new sfWidgetFormInput(),
      'hospitalOutreach'         => new sfWidgetFormInput(),
      'eventPlanning'            => new sfWidgetFormInput(),
      'mediaRelations'           => new sfWidgetFormInput(),
      'telephoneWork'            => new sfWidgetFormInput(),
      'computers'                => new sfWidgetFormInput(),
      'printing'                 => new sfWidgetFormInput(),
      'writing'                  => new sfWidgetFormInput(),
      'speakersBureau'           => new sfWidgetFormInput(),
      'wingTeam'                 => new sfWidgetFormInput(),
      'webInternet'              => new sfWidgetFormInput(),
      'foundationContacts'       => new sfWidgetFormInput(),
      'aviationContacts'         => new sfWidgetFormInput(),
      'disasterResponseInterest' => new sfWidgetFormInput(),
      'active'                   => new sfWidgetFormInput(),
      'primary_airport_id'       => new sfWidgetFormInput(),
      'homeBase'                 => new sfWidgetFormInput(),
      'id'                       => new sfWidgetFormInputHidden(),
    ));

    $this->setValidators(array(
      'applicationID'            => new sfValidatorInteger(),
      'applicationDate'          => new sfValidatorDateTime(),
      'personID'                 => new sfValidatorInteger(),
      'firstName'                => new sfValidatorString(array('max_length' => 40)),
      'lastName'                 => new sfValidatorString(array('max_length' => 40)),
      'address1'                 => new sfValidatorString(array('max_length' => 40, 'required' => false)),
      'city'                     => new sfValidatorString(array('max_length' => 30, 'required' => false)),
      'state'                    => new sfValidatorString(array('max_length' => 2, 'required' => false)),
      'zipcode'                  => new sfValidatorString(array('max_length' => 30, 'required' => false)),
      'county'                   => new sfValidatorString(array('max_length' => 30, 'required' => false)),
      'areaCode'                 => new sfValidatorString(array('max_length' => 3, 'required' => false)),
      'dayPhone'                 => new sfValidatorString(array('max_length' => 16, 'required' => false)),
      'dayComment'               => new sfValidatorString(array('max_length' => 40, 'required' => false)),
      'eveningPhone'             => new sfValidatorString(array('max_length' => 16, 'required' => false)),
      'eveComment'               => new sfValidatorString(array('max_length' => 40, 'required' => false)),
      'mobilePhone'              => new sfValidatorString(array('max_length' => 16, 'required' => false)),
      'mobileComment'            => new sfValidatorString(array('max_length' => 40, 'required' => false)),
      'otherPhone'               => new sfValidatorString(array('max_length' => 16, 'required' => false)),
      'otherComment'             => new sfValidatorString(array('max_length' => 40, 'required' => false)),
      'pagerPhone'               => new sfValidatorString(array('max_length' => 16, 'required' => false)),
      'pagerComment'             => new sfValidatorString(array('max_length' => 40, 'required' => false)),
      'email'                    => new sfValidatorString(array('max_length' => 80, 'required' => false)),
      'spousePilot'              => new sfValidatorInteger(array('required' => false)),
      'wingID'                   => new sfValidatorInteger(),
      'wingName'                 => new sfValidatorString(array('max_length' => 30)),
      'renewalDate'              => new sfValidatorDate(array('required' => false)),
      'joinDate'                 => new sfValidatorDate(),
      'joinYear'                 => new sfValidatorInteger(array('required' => false)),
      'refSourceID'              => new sfValidatorInteger(array('required' => false)),
      'refSourceName'            => new sfValidatorString(array('max_length' => 60, 'required' => false)),
      'companyMatchFunds'        => new sfValidatorInteger(array('required' => false)),
      'companyName'              => new sfValidatorString(array('max_length' => 40, 'required' => false)),
      'companyPosition'          => new sfValidatorString(array('max_length' => 40, 'required' => false)),
      'vocationClassID'          => new sfValidatorInteger(array('required' => false)),
      'vocationClassName'        => new sfValidatorString(array('max_length' => 30, 'required' => false)),
      'memberAOPA'               => new sfValidatorInteger(array('required' => false)),
      'memberKiwanis'            => new sfValidatorInteger(array('required' => false)),
      'memberRotary'             => new sfValidatorInteger(array('required' => false)),
      'memberLions'              => new sfValidatorInteger(array('required' => false)),
      'member99s'                => new sfValidatorInteger(array('required' => false)),
      'memberWIA'                => new sfValidatorInteger(array('required' => false)),
      'missionOrientation'       => new sfValidatorInteger(array('required' => false)),
      'missionCoordination'      => new sfValidatorInteger(array('required' => false)),
      'pilotRecruitment'         => new sfValidatorInteger(array('required' => false)),
      'fundRaising'              => new sfValidatorInteger(array('required' => false)),
      'celebrityContacts'        => new sfValidatorInteger(array('required' => false)),
      'graphicArts'              => new sfValidatorInteger(array('required' => false)),
      'hospitalOutreach'         => new sfValidatorInteger(array('required' => false)),
      'eventPlanning'            => new sfValidatorInteger(array('required' => false)),
      'mediaRelations'           => new sfValidatorInteger(array('required' => false)),
      'telephoneWork'            => new sfValidatorInteger(array('required' => false)),
      'computers'                => new sfValidatorInteger(array('required' => false)),
      'printing'                 => new sfValidatorInteger(array('required' => false)),
      'writing'                  => new sfValidatorInteger(array('required' => false)),
      'speakersBureau'           => new sfValidatorInteger(array('required' => false)),
      'wingTeam'                 => new sfValidatorInteger(array('required' => false)),
      'webInternet'              => new sfValidatorInteger(array('required' => false)),
      'foundationContacts'       => new sfValidatorInteger(array('required' => false)),
      'aviationContacts'         => new sfValidatorInteger(array('required' => false)),
      'disasterResponseInterest' => new sfValidatorInteger(array('required' => false)),
      'active'                   => new sfValidatorInteger(),
      'primary_airport_id'       => new sfValidatorInteger(array('required' => false)),
      'homeBase'                 => new sfValidatorString(array('max_length' => 4, 'required' => false)),
      'id'                       => new sfValidatorPropelChoice(array('model' => 'RpApplicationSearch', 'column' => 'id', 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('rp_application_search[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'RpApplicationSearch';
  }


}
