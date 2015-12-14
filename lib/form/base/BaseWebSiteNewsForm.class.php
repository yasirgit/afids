<?php

/**
 * WebSiteNews form base class.
 *
 * @package    angelflight
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfPropelFormGeneratedTemplate.php 16976 2009-04-04 12:47:44Z fabien $
 */
class BaseWebSiteNewsForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'                => new sfWidgetFormInputHidden(),
      'news_item'         => new sfWidgetFormInput(),
      'item_date'         => new sfWidgetFormDate(),
      'expire_date'       => new sfWidgetFormDate(),
      'archive_date'      => new sfWidgetFormDate(),
      'headline'          => new sfWidgetFormInput(),
      'author'            => new sfWidgetFormInput(),
      'wing_list'         => new sfWidgetFormInput(),
      'contact_name'      => new sfWidgetFormInput(),
      'contact_email'     => new sfWidgetFormInput(),
      'news_body'         => new sfWidgetFormInput(),
      'short_description' => new sfWidgetFormInput(),
      'priority'          => new sfWidgetFormInput(),
    ));

    $this->setValidators(array(
      'id'                => new sfValidatorPropelChoice(array('model' => 'WebSiteNews', 'column' => 'id', 'required' => false)),
      'news_item'         => new sfValidatorInteger(),
      'item_date'         => new sfValidatorDate(array('required' => false)),
      'expire_date'       => new sfValidatorDate(array('required' => false)),
      'archive_date'      => new sfValidatorDate(array('required' => false)),
      'headline'          => new sfValidatorString(array('max_length' => 75, 'required' => false)),
      'author'            => new sfValidatorString(array('max_length' => 50, 'required' => false)),
      'wing_list'         => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'contact_name'      => new sfValidatorString(array('max_length' => 50, 'required' => false)),
      'contact_email'     => new sfValidatorString(array('max_length' => 75, 'required' => false)),
      'news_body'         => new sfValidatorString(array('max_length' => 5000, 'required' => false)),
      'short_description' => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'priority'          => new sfValidatorInteger(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('web_site_news[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'WebSiteNews';
  }


}
