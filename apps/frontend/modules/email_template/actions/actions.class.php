<?php

/**
 * email_template actions.
 *
 * @package    angelflight
 * @subpackage email_template
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 12479 2008-10-31 10:54:40Z fabien $
 */
class email_templateActions extends sfActions
{
  public function executeAjaxSave(sfWebRequest $request)
  {
    $template = trim($request->getParameter('template'));
    if (empty($template)) return $this->renderText('Please specify template name');

    $email_template = new EmailTemplate();
    $email_template->setName($template);
    $email_template->setSubject($request->getParameter('subject'));
    $email_template->setSenderEmail($request->getParameter('email'));
    $email_template->setSenderName($request->getParameter('name'));
    $email_template->setBody($request->getParameter('body'));
    $email_template->setPersonId($this->getUser()->getId());
    $email_template->save();

    return $this->renderText('#New template have successfully saved!');
  }

  public function executeAjaxGetTemplate(sfWebRequest $request)
  {
    $email_template = EmailTemplatePeer::retrieveByPK($request->getParameter('id'));
    $this->forward404Unless($email_template);
    $this->forward404Unless($email_template->getPersonId() == $this->getUser()->getId());
    
    $values = array();
    $values['subject'] = $email_template->getSubject();
    $values['name'] = $email_template->getSenderName();
    $values['email'] = $email_template->getSenderEmail();
    $values['message'] = $email_template->getBody();
    
    return $this->renderText(json_encode($values));
  }
}
