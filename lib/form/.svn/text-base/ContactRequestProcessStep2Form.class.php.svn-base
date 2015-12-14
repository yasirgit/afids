<?php

/**
 * Contact Request form.
 *
 * @package    angelflight
 * @subpackage form
 * @author     Ganbolor G
 * @version    SVN: $Id: sfPropelFormTemplate.php 10377 2008-07-21 07:10:32Z dwhittle $
 */
class ContactRequestProcessStep2Form extends BaseContactRequestForm
{
  public function configure()
  {
    $ref_sources = RefSourcePeer::getForSelectParent();
    $contact_types = ContactTypePeer::getForSelectParent();
    
    $this->setWidgets(array(
      'id'               => new sfWidgetFormInputHidden(),
      'ref_source_id'    => new sfWidgetFormSelect(array('choices' => $ref_sources)),
      'send_app_format'  => new sfWidgetFormInput(array(), array('class' => 'text')),
      'comment'          => new sfWidgetFormInput(array(), array('class' => 'text')),
      'contact_type_id'  => new sfWidgetFormSelect(array('choices' => $contact_types)),
      'letter_sent_date' => new widgetFormDate(array('change_year' => true, 'change_month' => true, 'format_date' => array('js' => 'mm/dd/yy', 'php' => 'm/d/Y')), array('class' => 'text narrow')),

    ));

    $this->widgetSchema->setLabels(array(
      'ref_source_id'        => 'Ref Source*',
      'send_app_format'      => 'Send Application Format',
      'comment'              => 'Comment',
      'contact_type_id'      => 'Contact Type*',
      'letter_sent_date'     => 'Letter Sent Date',
    ));

    $this->setValidators(array(
      'id'                       => new sfValidatorPropelChoice(array('model' => 'ContactRequest', 'column' => 'id', 'required' => false)),
      'ref_source_id'            => new sfValidatorChoice(array('choices' => array_keys($ref_sources), 'required' => false)),
      'send_app_format'          => new sfValidatorString(array('max_length' => 40)),
      'comment'                  => new sfValidatorString(array('max_length' => 40, 'required' => false)),
      'contact_type_id'          => new sfValidatorChoice(array('choices' => array_keys($contact_types), 'required' => false)),
      'letter_sent_date'         => new sfValidatorString(array('max_length' => 25, 'required' => false)),      
    ));
    
    $this->widgetSchema->setNameFormat('contact_request[%s]');

  }


  public function formatterRaw($widget, $inputs)
  {
    $rows = array();
    foreach ($inputs as $input){
      $rows[] = $input['input'].strtr($input['label'], array('<label' => '<label class="raw"'));
    }

    return implode($this->getOption('separator'), $rows);
  }

  protected function doSave($con = null)
  {
    $this->values['ip_address'] = $_SERVER["REMOTE_ADDR"];
    parent::doSave();
  }
}
