<?php

/**
 * test actions.
 *
 * @package    angelflight
 * @subpackage test
 * @author     Ariunbayar, Javzaa
 * @version    SVN: $Id: actions.class.php 12479 2008-10-31 10:54:40Z fabien $
 */
class testActions extends sfActions
{
  /**
  * Executes index action
  *
  * @param sfRequest $request A request object
  */
  public function executeIndex(sfWebRequest $request)
  {
    //removing used session like person id
    $id = $this->getUser()->getAttribute('person_id');
    unset($id);
    
    sfContext::getInstance()->getConfiguration()->loadHelpers('Partial');
    slot('nav_menu', array('instrument')); # for navigation menu
  }
}
