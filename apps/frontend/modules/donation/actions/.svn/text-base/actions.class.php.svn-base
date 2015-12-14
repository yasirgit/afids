<?php

/**
 * donation actions.
 *
 * @package    angelflight
 * @subpackage donation
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 12474 2008-10-31 10:41:27Z fabien $
 */
class donationActions extends sfActions
{
  /**
   * Searches for donations
   * CODE: donation_index
   */
  public function executeIndex(sfWebRequest $request)
  {
    # security
    if( !$this->getUser()->hasCredential(array('Administrator'), false)){
        $this->getUser()->setFlash("warning", 'You don\'t have permission to access this url '.$request->getReferer());
        $this->redirect('dashboard/index');
    }


    $this->donation_list = DonationPeer::doSelect(new Criteria());
  }
  /**
   * Add or edit donation
   * CODE: donation_create
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
      $dona = DonationPeer::retrieveByPK($request->getParameter('id'));
      $this->forward404Unless($dona);

      $this->title = 'Edit donation';
      $success ='Donation information has been successfully changed!';
    }
    else
    {
      $dona = new Donation();
      $this->title = 'Add new donation';
      $success ='Donation information has been successfully created!';
    }

    $this->form = new DonationForm($dona);

    if ($request->isMethod('post'))
    {
      $this->referer = $request->getParameter('referer');

      $this->form->bind($request->getParameter('dona'));

      if ($this->form->isValid() && $this->form->getValue('campain_id') && $this->form->getValue('donor_id') && $this->form->getValue('fund_id')&& $this->form->getValue('gift_type'))
      {
        $donor = DonorPeer::getByPersonId($this->form->getValue('donor_id'));

        if($donor)
        {
          $id = $donor->getId();
        }

        $dona->setDonorId($id);
        $dona->setGiftDate($this->form->getValue('gift_date'));
        $dona->setGiftAmount($this->form->getValue('gift_amount'));
        $dona->setDeductibleAmount($this->form->getValue('deductible_amount'));
        $dona->setGiftType($this->form->getValue('gift_type'));
        $dona->setCheckNumber($this->form->getValue('check_number'));
        $dona->setCampainId($this->form->getValue('campain_id'));
        $dona->setFundId($this->form->getValue('fund_id'));
        $dona->setGiftNote($this->form->getValue('gift_note'));
        $dona->setPrintedNote($this->form->getValue('printed_note'));
        $dona->setReceiptGeneratedDate($this->form->getValue('receipt_generated_date'));

        if($this->form->getValue('follow_up') == null){
          $dona->setFollowUp(0);
        }else{
          $dona->setFollowUp($this->form->getValue('follow_up'));
        }

        $dona->setPremiumOrderDate($this->form->getValue('premium_order_date'));
        $dona->save();

        $this->getUser()->setFlash('success', $success);

        $this->redirect('@donation');
      }else{
        $this->getUser()->setFlash('success', 'Please choice Donor, Gift Type, Campaign or Fund!');
      }
    }
    else
    {
      # Set referer URL
      $this->referer = $request->getReferer() ? $request->getReferer() : '@danation';
    }
    $this->dona = $dona;
  }
  /**
   * TODO: Check related records.
   * CODE: donation_delete
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
      $dona = DonationPeer::retrieveByPK($request->getParameter('id'));

      $this->forward404Unless($dona);

      $this->getUser()->setFlash('success', 'Donation information has been successfully deleted!');

      $dona->delete();

    }

    return $this->redirect('@donation');
  }
  /**
   * Searches gifts
   * CODE: gift_index
   */
  public function executeIndexGift(sfWebRequest $request)
  {
    # security
   if( !$this->getUser()->hasCredential(array('Administrator'), false)){
        $this->getUser()->setFlash("warning", 'You don\'t have permission to access this url '.$request->getReferer());
        $this->redirect('dashboard/index');
    }
    $this->gift_type_list =GiftTypePeer::doSelect(new Criteria());
  }

  /**
   * Add or edit gifts
   * CODE: gift_create
   */
  public function executeUpdateGift(sfWebRequest $request)
  {
    # security
   if( !$this->getUser()->hasCredential(array('Administrator'), false)){
        $this->getUser()->setFlash("warning", 'You don\'t have permission to access this url '.$request->getReferer());
        $this->redirect('dashboard/index');
    }

    if ($request->getParameter('id'))
    {
      $gift_type =GiftTypePeer::retrieveByPK($request->getParameter('id'));
      $this->forward404Unless($gift_type);

      $this->title = 'Edit gift type';
      $success = 'Gift type information has been successfully changed!';
    }
    else
    {
      $gift_type = new GiftType();
      $this->title = 'Add new gift type';
      $success = 'Gift type information has been successfully created!';
    }

    $this->back = $request->getReferer();
    $this->form = new GiftTypeForm($gift_type);

    if ($request->isMethod('post'))
    {
      $this->referer = $request->getReferer();

      $this->form->bind($request->getParameter('gType'));

      if ($this->form->isValid())
      {
        $gift_type->setGiftTypeDesc($this->form->getValue('gift_type_desc'));
        $gift_type->save();

        $this->getUser()->setFlash('success', $success);

        $last = $request->getParameter('back');
        if(strstr($last,'donation/create')){
          $back_url = $last;
        }else{
          $back_url = 'gift';
        }
        $this->redirect($back_url);
      }
    }
    else
    {
      # Set referer URL
      $this->referer = $request->getReferer() ? $request->getReferer() : '@gift';
    }
    $this->gift_type = $gift_type;
  }
  /**
   * Delete gift
   * CODE: gift_delete
   * TODO: Check related records
   */
  public function executeDeleteGift(sfWebRequest $request)
  {
    # security
    if( !$this->getUser()->hasCredential(array('Administrator'), false)){
        $this->getUser()->setFlash("warning", 'You don\'t have permission to access this url '.$request->getReferer());
        $this->redirect('dashboard/index');
    }
    
    if ($request->isMethod('post'))
    {
      $gift_type =GiftTypePeer::retrieveByPK($request->getParameter('id'));

      $this->forward404Unless($gift_type);

      $this->getUser()->setFlash('success', 'Gift type information has been successfully deleted!');

      $gift_type->delete();

    }

    return $this->redirect('@gift');
  }

}
