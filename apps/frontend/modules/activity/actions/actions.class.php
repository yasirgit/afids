<?php

/**
 * activity actions.
 *
 * @package    angelflight
 * @subpackage activity
 * @author     Ariunbayar
 * @version    SVN: $Id: actions.class.php 12479 2008-10-31 10:54:40Z fabien $
 */
class activityActions extends sfActions
{
  public function executeAjaxIndex(sfWebRequest $request)
  {
    $exclude_ids = $this->getUser()->getAttribute('hidden_activity', array(), 'person');

    $c = new Criteria();
    $c->add(ActivityPeer::ID, $exclude_ids, Criteria::NOT_IN);
    $c->addDescendingOrderByColumn(ActivityPeer::CREATED_AT);
    $c->setLimit(sfConfig::get('app_max_recent_activity', 10));
    $this->activities = ActivityPeer::doSelect($c);
  }

  public function executeAjaxHide(sfWebRequest $request)
  {
    $id = (int)$request->getParameter('id');

    $ids = $this->getUser()->getAttribute('hidden_activity', array(), 'person');
    if (($id > 0) && (!in_array($id, $ids))) $ids[] = $id;
    $this->getUser()->setAttribute('hidden_activity', $ids, 'person');

    return sfView::NONE;
  }
}
