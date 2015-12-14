<?php

require_once(sfConfig::get('sf_lib_dir').'/filter/base/BaseFormFilterPropel.class.php');

/**
 * Renewal filter form base class.
 *
 * @package    angelflight
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfPropelFormFilterGeneratedTemplate.php 16976 2009-04-04 12:47:44Z fabien $
 */
class BaseRenewalFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'renewal_date'                => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => true)),
      'renewal_desc'                => new sfWidgetFormFilterInput(),
      'renewal_month'               => new sfWidgetFormFilterInput(),
      'renewal_year'                => new sfWidgetFormFilterInput(),
      'letter_count'                => new sfWidgetFormFilterInput(),
      'invoice_total'               => new sfWidgetFormFilterInput(),
      'product_price'               => new sfWidgetFormFilterInput(),
      'printing_cost_total'         => new sfWidgetFormFilterInput(),
      'verified_postage_count'      => new sfWidgetFormFilterInput(),
      'verified_postage_cost'       => new sfWidgetFormFilterInput(),
      'unverified_postage_count'    => new sfWidgetFormFilterInput(),
      'unverified_postage_cost'     => new sfWidgetFormFilterInput(),
      'undeliverable_postage_count' => new sfWidgetFormFilterInput(),
      'undeliverable_postage_cost'  => new sfWidgetFormFilterInput(),
      'international_postage_count' => new sfWidgetFormFilterInput(),
      'international_postage_cost'  => new sfWidgetFormFilterInput(),
      'postage_cost_total'          => new sfWidgetFormFilterInput(),
      'mailers_club_order_number'   => new sfWidgetFormFilterInput(),
      'mailers_club_order_date'     => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => true)),
      'mailers_club_completed_date' => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => true)),
      'mailers_club_mailing_name'   => new sfWidgetFormFilterInput(),
      'processing_log_text'         => new sfWidgetFormFilterInput(),
      'data_file_name'              => new sfWidgetFormFilterInput(),
      'data_file_size'              => new sfWidgetFormFilterInput(),
      'proof_url'                   => new sfWidgetFormFilterInput(),
      'proof_approved_date'         => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => true)),
    ));

    $this->setValidators(array(
      'renewal_date'                => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
      'renewal_desc'                => new sfValidatorPass(array('required' => false)),
      'renewal_month'               => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'renewal_year'                => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'letter_count'                => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'invoice_total'               => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'product_price'               => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'printing_cost_total'         => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'verified_postage_count'      => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'verified_postage_cost'       => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'unverified_postage_count'    => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'unverified_postage_cost'     => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'undeliverable_postage_count' => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'undeliverable_postage_cost'  => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'international_postage_count' => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'international_postage_cost'  => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'postage_cost_total'          => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'mailers_club_order_number'   => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'mailers_club_order_date'     => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
      'mailers_club_completed_date' => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
      'mailers_club_mailing_name'   => new sfValidatorPass(array('required' => false)),
      'processing_log_text'         => new sfValidatorPass(array('required' => false)),
      'data_file_name'              => new sfValidatorPass(array('required' => false)),
      'data_file_size'              => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'proof_url'                   => new sfValidatorPass(array('required' => false)),
      'proof_approved_date'         => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
    ));

    $this->widgetSchema->setNameFormat('renewal_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Renewal';
  }

  public function getFields()
  {
    return array(
      'id'                          => 'Number',
      'renewal_date'                => 'Date',
      'renewal_desc'                => 'Text',
      'renewal_month'               => 'Number',
      'renewal_year'                => 'Number',
      'letter_count'                => 'Number',
      'invoice_total'               => 'Number',
      'product_price'               => 'Number',
      'printing_cost_total'         => 'Number',
      'verified_postage_count'      => 'Number',
      'verified_postage_cost'       => 'Number',
      'unverified_postage_count'    => 'Number',
      'unverified_postage_cost'     => 'Number',
      'undeliverable_postage_count' => 'Number',
      'undeliverable_postage_cost'  => 'Number',
      'international_postage_count' => 'Number',
      'international_postage_cost'  => 'Number',
      'postage_cost_total'          => 'Number',
      'mailers_club_order_number'   => 'Number',
      'mailers_club_order_date'     => 'Date',
      'mailers_club_completed_date' => 'Date',
      'mailers_club_mailing_name'   => 'Text',
      'processing_log_text'         => 'Text',
      'data_file_name'              => 'Text',
      'data_file_size'              => 'Number',
      'proof_url'                   => 'Text',
      'proof_approved_date'         => 'Date',
    );
  }
}
