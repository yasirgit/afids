<?php

require_once(sfConfig::get('sf_lib_dir').'/filter/base/BaseFormFilterPropel.class.php');

/**
 * WebSiteNews filter form base class.
 *
 * @package    angelflight
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfPropelFormFilterGeneratedTemplate.php 16976 2009-04-04 12:47:44Z fabien $
 */
class BaseWebSiteNewsFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'news_item'         => new sfWidgetFormFilterInput(),
      'item_date'         => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => true)),
      'expire_date'       => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => true)),
      'archive_date'      => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => true)),
      'headline'          => new sfWidgetFormFilterInput(),
      'author'            => new sfWidgetFormFilterInput(),
      'wing_list'         => new sfWidgetFormFilterInput(),
      'contact_name'      => new sfWidgetFormFilterInput(),
      'contact_email'     => new sfWidgetFormFilterInput(),
      'news_body'         => new sfWidgetFormFilterInput(),
      'short_description' => new sfWidgetFormFilterInput(),
      'priority'          => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'news_item'         => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'item_date'         => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
      'expire_date'       => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
      'archive_date'      => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
      'headline'          => new sfValidatorPass(array('required' => false)),
      'author'            => new sfValidatorPass(array('required' => false)),
      'wing_list'         => new sfValidatorPass(array('required' => false)),
      'contact_name'      => new sfValidatorPass(array('required' => false)),
      'contact_email'     => new sfValidatorPass(array('required' => false)),
      'news_body'         => new sfValidatorPass(array('required' => false)),
      'short_description' => new sfValidatorPass(array('required' => false)),
      'priority'          => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
    ));

    $this->widgetSchema->setNameFormat('web_site_news_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'WebSiteNews';
  }

  public function getFields()
  {
    return array(
      'id'                => 'Number',
      'news_item'         => 'Number',
      'item_date'         => 'Date',
      'expire_date'       => 'Date',
      'archive_date'      => 'Date',
      'headline'          => 'Text',
      'author'            => 'Text',
      'wing_list'         => 'Text',
      'contact_name'      => 'Text',
      'contact_email'     => 'Text',
      'news_body'         => 'Text',
      'short_description' => 'Text',
      'priority'          => 'Number',
    );
  }
}
