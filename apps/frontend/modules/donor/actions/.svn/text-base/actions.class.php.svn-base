<?php

/**
 * donor actions.
 *
 * @package    angelflight
 * @subpackage donor
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 12474 2008-10-31 10:41:27Z fabien $
 */
class donorActions extends sfActions
{
  /**
   * Searches for donors
   * CODE: donor_index
   */
  public function executeIndex(sfWebRequest $request)
  {
    
    if( !$this->getUser()->hasCredential(array('Administrator'), false)){
        $this->getUser()->setFlash("warning", 'You don\'t have permission to access this url '.$request->getReferer());
        $this->redirect('dashboard/index');
    }
    $this->donor_list = DonorPeer::doSelect(new Criteria());
  }
  /**
   * Add or edit donor
   * CODE: donor_create
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
      $donor = DonorPeer::retrieveByPK($request->getParameter('id'));
      $this->forward404Unless($donor);

      $this->title = 'Edit donor';
      $success = 'Donor information has been successfully changed!';
    }
    else
    {
      $donor = new Donor();
      $this->title = 'Add new donor';
      $success = 'Donor information has been successfully created!';
    }

    $this->back =$request->getReferer();

    $this->form = new DonorForm($donor);

    if ($request->isMethod('post'))
    {
      $this->referer = $request->getReferer();

      $this->form->bind($request->getParameter('donor'));

      if ($this->form->isValid())
      {
        $donor->setCoDonorId($this->form->getValue('co_donor_id'));

        if($this->form->getValue('affiliation_id') == 0){
          $donor->setAffiliationId(null);
        }else{
          $donor->setAffiliationId($this->form->getValue('affiliation_id'));
        }

        if($this->form->getValue('block_mailings') == null){
          $donor->setBlockMailings(0);
        }else{
          $donor->setBlockMailings($this->form->getValue('block_mailings'));
        }

        $donor->setProspectComment($this->form->getValue('prospect_comment'));
        $donor->setSalutation($this->form->getValue('salutation'));

        if($this->form->getValue('company_id') == 0){
          $donor->setCompanyId(null);
        }else{
          $donor->setCompanyId($this->form->getValue('company_id'));
        }

        $donor->setPosition($this->form->getValue('position'));
        $donor->setDonorPotential($this->form->getValue('donor_potential'));

        if($this->form->getValue('person_id') == 0){
          $donor->setPersonId(null);
        }else{
          $donor->setPersonId($this->form->getValue('person_id'));
        }

        if($this->form->isNew()){
          $donor->setDateAdded(date());
        }
        $donor->setDateUpdated(date());
        $donor->save();

        $this->getUser()->setFlash('success', $success);

        $last = $request->getParameter('back');


        if(strstr($last,'donation/create')){

          $back_url = $last;

        }else{

          $back_url = 'donor';

        }

        $this->redirect($back_url);

      }else{
        $this->getUser()->setFlash('success', 'Please select Person, Company or Affiliation!');
      }
    }
    else
    {
      # Set referer URL
      $this->referer = $request->getReferer() ? $request->getReferer() : '@donor';
    }
    $this->donor = $donor;
  }
  /**
   * TODO: Check related records.
   * CODE:donor_delete
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
      $donor = DonorPeer::retrieveByPK($request->getParameter('id'));

      $this->forward404Unless($donor);

      $this->getUser()->setFlash('success', 'Donor information has been successfully deleted!');

      $donor->delete();

    }

    return $this->redirect('@donor');
  }
}
