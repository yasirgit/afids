<?php

/**
 * public_pages actions.
 *
 * @package    angelflight
 * @subpackage public_pages
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 12479 2008-10-31 10:54:40Z fabien $
 */
class public_pagesActions extends sfActions
{
 /**
  * Executes index action
  *
  * @param sfRequest $request A request object
  */
  public function executeIndex(sfWebRequest $request)
  {
    //$this->forward('default', 'module');
    $form = new sfForm();
    $this->csrf_tag = $form['_csrf_token'];
    
    /*if ($request->hasParameter('referer'))
      $this->referer = $request->getParameter('referer');
    else
      $this->referer = $request->getUri();*/
    $this->referer = '/dashboard/index';
      
    return sfView::SUCCESS;
  }
}
