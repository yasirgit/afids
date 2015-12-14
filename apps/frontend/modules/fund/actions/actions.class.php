<?php

/**
 * fund actions.
 *
 * @package    angelflight
 * @subpackage fund
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 12474 2008-10-31 10:41:27Z fabien $
 */
class fundActions extends sfActions
{
  /**
   * Searches for funds
   * CODE: fund_index
   */
  public function executeIndex(sfWebRequest $request)
  {
    # security
    if( !$this->getUser()->hasCredential(array('Administrator'), false)){
        $this->getUser()->setFlash("warning", 'You don\'t have permission to access this url '.$request->getReferer());
        $this->redirect('dashboard/index');
    }

    $this->fund_list = FundPeer::doSelect(new Criteria());
  }

  /**
   * Add or edit fund
   * CODE: fund_create
   */
  public function executeUpdate(sfWebRequest $request)
  {
    # security
    if( !$this->getUser()->hasCredential(array('Administrator'), false)){
        $this->getUser()->setFlash("warning", 'You don\'t have permission to access this url '.$request->getReferer());
        $this->redirect('dashboard/index');
    }


    if ($request->getParameter('id'))
    {
      $fund = FundPeer::retrieveByPK($request->getParameter('id'));
      $this->forward404Unless($fund);

      $this->title = 'Edit fund';
      $success = 'Fund information has been successfully changed!';
    }
    else
    {
      $fund = new Fund();
      $this->title = 'Add new fund';
      $success = 'Fund information has been successfully created!';
    }

    $this->back = $request->getReferer();
    $this->form = new FundForm($fund);

    if ($request->isMethod('post'))
    {
      $this->referer = $request->getParameter('referer');

      $this->form->bind($request->getParameter('fund'));

      if ($this->form->isValid())
      {
        $fund->setFundDesc($this->form->getValue('fund_desc'));
        $fund->save();

        $this->getUser()->setFlash('success', $success);

        $last = $request->getParameter('back');
        if(strstr($last,'donation/create')){
          $back_url = $last;
        }else{
          $back_url = 'fund';
        }
        $this->redirect($back_url);
      }
    }
    else
    {
      # Set referer URL
      $this->referer = $request->getReferer() ? $request->getReferer() : '@fund';
    }
    $this->fund = $fund;
  }
  /**
   * TODO: Check related records.
   * CODE:fund_delete
   */
  public function executeDelete(sfWebRequest $request)
  {
    # security
   if( !$this->getUser()->hasCredential(array('Administrator'), false)){
        $this->getUser()->setFlash("warning", 'You don\'t have permission to access this url '.$request->getReferer());
        $this->redirect('dashboard/index');
    }

    
    if ($request->isMethod('post'))
    {
      $fund = FundPeer::retrieveByPK($request->getParameter('id'));

      $this->forward404Unless($fund);

      $this->getUser()->setFlash('success', 'Fund information has been successfully deleted!');

      $fund->delete();

    }

    return $this->redirect('@fund');
  }
}
