<?php

/**
 * campaign actions.
 *
 * @package    angelflight
 * @subpackage campaign
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 12474 2008-10-31 10:41:27Z fabien $
 */
class campaignActions extends sfActions
{
  /**
   * Searches campaigns
   * CODE:campaign_index
   */
  public function executeIndex(sfWebRequest $request)
  {
    # security
    if( !$this->getUser()->hasCredential(array('Administrator'), false)){
        $this->getUser()->setFlash("warning", 'You don\'t have permission to access this url '.$request->getReferer());
        $this->redirect('dashboard/index');
    }

    $this->campaign_list = CampaignPeer::doSelect(new Criteria());
  }

  /**
   * Add or edit campaigns
   * CODE: campaign_create
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
      $campaign = CampaignPeer::retrieveByPK($request->getParameter('id'));
      $this->forward404Unless($campaign);

      $this->title = 'Edit campaign';
      $success = 'Campaign information has been successfully changed!';
    }
    else
    {
      $campaign = new Campaign();
      $this->title = 'Add new campaign';
      $success = 'Campaign information has been successfully created!';
    }

    $this->back = $request->getReferer();
    $this->form = new CampaignForm($campaign);

    if ($request->isMethod('post'))
    {
      $this->referer = $request->getReferer();

      $this->form->bind($request->getParameter('campaign'));

      if ($this->form->isValid())
      {
        $campaign->setCampaignDecs($this->form->getValue('campaign_decs'));
        $campaign->setPremiumSku($this->form->getValue('premium_sku'));
        $campaign->setPremiumMin($this->form->getValue('premium_min'));
        $campaign->save();

        $this->getUser()->setFlash('success', $success);

        $last = $request->getParameter('back');
        if(strstr($last,'donation/create')){
          $back_url = $last;
        }else{
          $back_url = 'campaign';
        }
        $this->redirect($back_url);
      }
    }
    else
    {
      # Set referer URL
      $this->referer = $request->getReferer() ? $request->getReferer() : '@campaign';
    }
    $this->campaign = $campaign;
  }
  /**
   * TODO: Check related records.
   * CODE:campaign_delete
   */
  public function executeDelete(sfWebRequest $request)
  {
    # security
    if( !$this->getUser()->hasCredential(array('Administrator'), false)){
        $this->getUser()->setFlash("warning", 'You don\'t have permission to access this url '.$request->getReferer());
        $this->redirect('dashboard/index');
    }
    
    $this->getUser()->setFlash('success','...');
    $this->redirect('campaign');
    if ($request->isMethod('post'))
    {
      $campaign = CampaignPeer::retrieveByPK($request->getParameter('id'));

      $this->forward404Unless($campaign);

      $this->getUser()->setFlash('success', 'Campaign information has been successfully deleted!');

      $campaign->delete();

    }

    return $this->redirect('@campaign');
  }
}
