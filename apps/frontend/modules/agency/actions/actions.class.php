<?php
/**
 * requester actions.
 *
 * @package    angelflight
 * @subpackage agency
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 12474 2008-10-31 10:41:27Z fabien $
 */
class agencyActions extends sfActions
{
  /**
   * Searches for agencies
   * CODE: agency_index
   */
  public function executeIndex(sfWebRequest $request)
  {
    # security
    if( !$this->getUser()->hasCredential(array('Administrator','Staff','Pilot','Coordinator','Volunteer'), false)){
        $this->getUser()->setFlash("warning", 'You don\'t have permission to access this url '.$request->getReferer());
        $this->redirect('dashboard/index');
    }

    # for navigation menu
    sfContext::getInstance()->getConfiguration()->loadHelpers('Partial');
    slot('nav_menu', array('mission_coord', 'find-agency'));

    # filter
    $this->processFilter($request);
    if($request->isMethod('post') || $request->getParameter('page')){
        $this->pager =AgencyPeer::getPager(
          $this->max,
          $this->page,
          $this->name,
          $this->city,
          $this->state,
          $this->country
        );
        $this->agencies = $this->pager->getResults();
    }
    $this->getUser()->addRecentItem('Agency', 'agency', 'agency/index');
  }

  /**
   * Searches for agencies vy filter
   */
  private function processFilter(sfWebRequest $request)
  {
    $params = $this->getUser()->getAttribute('agency', array(), 'agency');

    if (!isset($params['name'])) $params['name'] = null;
    if (!isset($params['city'])) $params['city'] = null;
    if (!isset($params['state'])) $params['state'] = null;
    if (!isset($params['country'])) $params['country'] = null;

    $this->max_array = array(5, 10, 20, 30);
    $this->countries = sfConfig::get('app_countries');

    if (in_array($request->getParameter('max'), $this->max_array)) {
      $params['max'] = $request->getParameter('max');
    }else{
      if (!isset($params['max'])) $params['max'] = sfConfig::get('app_max_person_per_page', 10);
    }

    if ($request->hasParameter('filter')) {
      $params['name']      = $request->getParameter('name');
      $params['city']       = $request->getParameter('city');
      $params['state']       = $request->getParameter('state');
      $params['country']        = (in_array($request->getParameter('country'), array_keys($this->countries)) ? $request->getParameter('country') : '');
    }

    $this->page           = $page = $request->getParameter('page', 1);
    $this->max            = $params['max'];
    $this->name           = $params['name'];
    $this->city           = $params['city'];
    $this->state          = $params['state'];
    $this->country        = $params['country'];

    $this->getUser()->setAttribute('agency', $params, 'agency');
  }


  /**
   * Add or create agency
   * CODE: agency_create
   */
  public function executeUpdate(sfWebRequest $request)
  {
    #security
    if( !$this->getUser()->hasCredential(array('Administrator','Staff','Coordinator','Volunteer'), false)){
        $this->getUser()->setFlash("warning", 'You don\'t have permission to access this url '.$request->getReferer());
        $this->redirect('dashboard/index');
    }
    
    sfContext::getInstance()->getConfiguration()->loadHelpers('Partial');
    $this->requesters = null;
    if($request->getParameter('id')){
      $agency_id = $request->getParameter('id');
      $agency = AgencyPeer::retrieveByPK($agency_id);
      $this->title = 'Edit Agency';
      $this->requesters = RequesterPeer::getByAgency($agency_id);
      slot('nav_menu', array('mission_coord', ''));
    }else{
      $agency = new Agency();
      $this->title = 'Add Agency';
      slot('nav_menu', array('mission_coord', 'add-agency'));
    }

    $this->form = new AgencyForm($agency);

    $this->back = $request->getReferer();

    if ($request->isMethod('post'))
    {
      $this->referer = $request->getReferer();
      $this->processForm($request, $this->form);
    }else{
      # Set referer URL
      $this->referer = $request->getReferer() ? $request->getReferer() : '@agency';
    }
    $this->agency = $agency;
  }

  /**
   * Get agency by ajax in popup
   * CODE: agency_create
   */
  public function executeUpdateAjax(sfWebRequest $request)
  {
    #security
    if( !$this->getUser()->hasCredential(array('Administrator','Staff','Coordinator','Volunteer'), false)){
        $this->getUser()->setFlash("warning", 'You don\'t have permission to access this url '.$request->getReferer());
        $this->redirect('dashboard/index');
    }

    $this->setLayout(false);

    $agency = new Agency();

    $this->form = new AgencyForm($agency);

    $this->back = $request->getReferer();

    $this->backurl = "";
    $this->is_camp = 0;
    $this->person_ids = 1;
    if($request->getParameter('camp')==1){
      $this->backurl = '/camp/create';
      $this->is_camp = 1;
    }elseif($request->getParameter('req')==1){
      $this->backurl = '/requester/create?person_id='.$request->getParameter('person_id');
      $this->person_ids = $request->getParameter('person_id');
    }

    if ($request->isMethod('post'))
    {
      $this->referer = $request->getReferer();
      $this->form->bind($request->getParameter('agency'));

      if ($this->form->isValid())
      {
        $agency->setName($this->form->getValue('name'));
        $agency->setAddress1($this->form->getValue('address1'));
        $agency->setAddress2($this->form->getValue('address2'));
        $agency->setCity($this->form->getValue('city'));
        $agency->setCounty($this->form->getValue('county'));
        $agency->setState($this->form->getValue('state'));
        $agency->setCountry($this->form->getValue('country'));
        $agency->setZipcode($this->form->getValue('zipcode'));
        $agency->setPhone($this->form->getValue('phone'));
        $agency->setComment($this->form->getValue('comment'));
        $agency->setFaxPhone($this->form->getValue('fax_phone'));
        $agency->setFaxComment($this->form->getValue('fax_comment'));
        $agency->setEmail($this->form->getValue('email'));

        if ($agency->isNew()) {
          $content = $this->getUser()->getName().' added new Agency: '.$agency->getName();
          ActivityPeer::log($content);
        }

        $agency->save();

        $this->getUser()->setFlash('new_agency', $this->form->getValue('name'));

        $b_u =  $request->getParameter('backurl');
        //        if($request->getReferer()){
        //          $back = $request->getReferer();
        //          if(isset($back)){
        //            if(strstr($back,'requester/edit')){
        //              $req =1;
        //            }elseif(strstr($back,'camp/create')){
        //              $camp =1;
        //            }
        //          }
        //        }
        $id = $agency->getId();
        $str = <<<XYZ
        <script type="text/javascript">
          var a = $id;
           if(window.jQuery('#back_agency_id')){
             window.jQuery('#back_agency_id').val('');
           }
           if(window.jQuery('#back_agency_id')){
             window.jQuery('#back_agency_id').val(a);
           }
           if(window.jQuery('#pre_agency_id')){
             window.jQuery('#pre_agency_id').val('');
           }
           if(window.jQuery('#pre_agency_id')){
             window.jQuery('#pre_agency_id').val(a);
           }
           location.href='$b_u?agency_id=$id';
        </script>
XYZ;
        $this->getUser()->setFlash('success','New Agency has added!');
        return $this->renderText($str);
      }
    }else{
      # Set referer URL
      $this->referer = $request->getReferer() ? $request->getReferer() : '@agency';
    }
    $this->agency = $agency;
  }

  /**
   * Agency form
   * it handles form from update and update_ajax
   */
  protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $this->form->bind($request->getParameter('agency'));

    if ($this->form->isValid())
    {
      if($this->form->isNew()){
        $agency =  new Agency();
        $success = 'Agency information has been successfully created!';
      }else{
        $agency = AgencyPeer::retrieveByPK($request->getParameter('id'));
        $success = 'Agency information has been successfully changed!';
      }

      if($this->form->getValue('name') && $request->getParameter('id')){//old
        $is_used = AgencyPeer::retrieveByPK($request->getParameter('id'));

        if($this->form->getValue('name') != $is_used->getName()){
          $agency->setName($this->form->getValue('name'));
        }else{
          $agency->setName($is_used->getName());
        }

      }elseif($this->form->getValue('name') && !$request->getParameter('id')){//new

        $is_used = AgencyPeer::getByName($this->form->getValue('name'));

        if(isset($is_used)){
          if($is_used->getName() == $this->form->getValue('name')){

            if($request->getParameter('back') == null){
              $last = $request->getReferer();
            }else{
              $last = $request->getParameter('back');
            }

            if(strstr($last,'camp/create')){
              $back_url = $last;
            }elseif(strstr($last,'fbo/create')){
              $back_url = $last;
            }else{
              $back_url = 'agency';
            }
            $this->getUser()->setFlash('success','This Agency Ident has already used. Please confirm else !');

            $this->redirect($back_url);
          }
        }elseif($this->form->getValue('name') == 'null'){
          $agency->setName(null);
        }
        else{
          $agency->setName($this->form->getValue('name'));
        }
      }
      $agency->setAddress1($this->form->getValue('address1'));
      $agency->setAddress2($this->form->getValue('address2'));
      $agency->setCity($this->form->getValue('city'));
      $agency->setCounty($this->form->getValue('county'));
      $agency->setState($this->form->getValue('state'));
      $agency->setCountry($this->form->getValue('country'));
      $agency->setZipcode($this->form->getValue('zipcode'));
      $agency->setPhone($this->form->getValue('phone'));
      $agency->setComment($this->form->getValue('comment'));
      $agency->setFaxPhone($this->form->getValue('fax_phone'));
      $agency->setFaxComment($this->form->getValue('fax_comment'));
      $agency->setEmail($this->form->getValue('email'));

      if ($agency->isNew()) {
        $content = $this->getUser()->getName().' added new Agency: '.$agency->getName();
        ActivityPeer::log($content);
      }

      $agency->save();

      $this->getUser()->setFlash('success', $success);

      if($request->getParameter('back') == null){
        $last = $request->getReferer();
      }else{
        $last = $request->getParameter('back');
      }

      if(strstr($last,'camp/create')){
        $back_url = $last;
      }elseif(strstr($last,'requester/create')){
        $back_url = $last;
      }else{
        $back_url = 'agency';
      }

      $this->redirect($back_url);

    }else{
      $last = $request->getReferer();
      if(strstr($last,'camp/create')){
        $this->redirect('camp/create');
      }
    }
  }
  
  /**
   * TODO: Check related records.
   * CODE:agency_delete
   */
  public function executeDelete(sfWebRequest $request)
  {
    # security
    if( !$this->getUser()->hasCredential(array('Administrator','Staff'), false)){
        $this->getUser()->setFlash("warning", 'You don\'t have permission to access this url '.$request->getReferer());
        $this->redirect('dashboard/index');
    }

    try{
      
      $agency = AgencyPeer::retrieveByPK($request->getParameter('id'));

      $this->forward404Unless($agency);

      $agency->delete();
      $this->getUser()->setFlash('success', 'Agency information has been successfully deleted!');
    }catch(Exception $e){
      $this->getUser()->setFlash('warning', "There are related persons to this agency. Please remove them first.");
    }

    return $this->redirect('@agency');
  }

  public function executeAutoComplete()
  {
    $this->keyword = $this->getRequestParameter('agency');
    $this->agencies = AgencyPeer::getByFirstLetter($this->keyword);
  }
}
