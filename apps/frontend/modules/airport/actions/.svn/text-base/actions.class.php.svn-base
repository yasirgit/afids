<?php
/**
 * airport actions.
 *
 * @package    angelflight
 * @subpackage airport
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 12474 2008-10-31 10:41:27Z fabien $
 */
class airportActions extends sfActions
{
  /**
   * Searches for airports
   * CODE:airport_index
   */
  public function executeIndex(sfWebRequest $request)
  {
    # security
    if( !$this->getUser()->hasCredential(array('Administrator','Staff','Pilot','Coordinator','Volunteer'), false)){
        $this->getUser()->setFlash("warning", 'You don\'t have permission to access this url '.$request->getReferer());
        $this->redirect('dashboard/index');
    }
    
    $this->getUser()->addRecentItem('Airport', 'airport', 'airport/index');
    if($request->hasParameter('pilot_for')){
      $this->pilot_for = PilotPeer::retrieveByPK($request->getParameter('pilot_for'));
      $this->can_use = 1;
    }else{
      $this->change_id = null;
    }

    $exclude_ids = array();
    if ($this->pilot_for){
        $exclude_ids[] = $this->pilot_for->getId();
    }

    # for navigation menu
    sfContext::getInstance()->getConfiguration()->loadHelpers('Partial');
    slot('nav_menu', array('mission_coord', 'find-airport'));

    # filter
    $this->processFilter($request);
    if($request->isMethod('post') || $request->getParameter('page')){
        $this->pager = AirportPeer::getPager(
          $this->max,
          $this->page,
          $this->ident,
          $this->name,
          $this->city,
          $this->state,
          $this->wing_name,
          $this->closed,
          $exclude_ids
        );
        $this->airports = $this->pager->getResults();
    }

    # one result with member_id search will go to member view
    if (count($this->airports) == 1) {
      if($request->getParameter('change_id')){
        if ($this->pilot_for) $url_add = '&change_id='.$this->pilot_for->getId(); else $url_add = '';
        $this->redirect('@pilot_view?id='.$request->getParameter('change_id').$url_add);
      }
    }
  }

  /**
   * Searches for airports by filter
   */
  private function processFilter(sfWebRequest $request)
  {
    $params = $this->getUser()->getAttribute('airport', array(), 'airport');

    if (!isset($params['ident'])) $params['ident'] = null;
    if (!isset($params['name'])) $params['name'] = null;
    if (!isset($params['city'])) $params['city'] = null;
    if (!isset($params['state'])) $params['state'] = null;
    if (!isset($params['wing_name'])) $params['wing_name'] = null;
    if (!isset($params['closed'])) $params['closed'] = null;

    $this->max_array = array(5, 10, 20, 30);
    $this->wings = WingPeer::getOnlyNames();

    if (in_array($request->getParameter('max'), $this->max_array)) {
      $params['max'] = $request->getParameter('max');
    }else{
      if (!isset($params['max'])) $params['max'] = sfConfig::get('app_max_person_per_page', 10);
    }

    if ($request->hasParameter('filter')) {
      $params['ident']      = $request->getParameter('ident');
      $params['name']       = $request->getParameter('name');
      $params['city']       = $request->getParameter('city');
      $params['state']       = $request->getParameter('state');
      $params['wing_name']        = (in_array($request->getParameter('wing_name'), array_keys($this->wings)) ? $request->getParameter('wing_name') : '');
      $params['closed']       = $request->getParameter('closed');
    }

    $this->page             = $page = $request->getParameter('page', 1);
    $this->max              = $params['max'];
    $this->ident            = $params['ident'];
    $this->name             = $params['name'];
    $this->city             = $params['city'];
    $this->state            = $params['state'];
    $this->wing_name        = $params['wing_name'];
    $this->closed           = $params['closed'];

    $this->getUser()->setAttribute('airport', $params, 'airport');
  }

  /**
   * Add or edit airport
   * CODE: airport_create
   */
  public function executeUpdate(sfWebRequest $request)
  {
    # security
    if( !$this->getUser()->hasCredential(array('Administrator'), false)){
        $this->getUser()->setFlash("warning", 'You don\'t have permission to access this url '.$request->getReferer());
        $this->redirect('dashboard/index');
    }

    sfContext::getInstance()->getConfiguration()->loadHelpers('Partial');
    slot('nav_menu', array('mission_coord', ''));

    $this->names = AirportPeer::getNames();

    if ($request->getParameter('id'))
    {
      $this->airport = AirportPeer::retrieveByPK($request->getParameter('id'));
      $this->forward404Unless($this->airport);

      $this->title = 'Edit airport';
      $success = 'Airport information has been successfully changed!';
      $this->can_edit = 1;
      $this->fbos = FboPeer::getByAirportIdSelectAll($request->getParameter('id'));
      //echo count($this->fbos); die();
    }
    else
    {
      $this->airport = new Airport();
      $this->title = 'Add new airport';
      $success = 'Airport information has been successfully created!';
    }

    $this->form = new AirportForm($this->airport);

    $this->back = $request->getReferer();

    if($request->getParameter('leg')){
      $this->leg_id = $request->getParameter('leg');
    }

    if ($request->isMethod('post'))
    {
      $this->referer = $request->getReferer();

      $this->form->bind($request->getParameter('airp'));

      if ($this->form->isValid())
      {
        if($this->form->getValue('ident') && $request->getParameter('id') != null){//old
          $is_used = AirportPeer::retrieveByPK($request->getParameter('id'));

          if($this->form->getValue('ident') != $is_used->getIdent()){
            $this->airport->setIdent($this->form->getValue('ident'));
          }else{
            $this->airport->setIdent($is_used->getIdent());
          }

        }
        elseif($this->form->getValue('ident') && !$request->getParameter('id')){//new

          $is_used = AirportPeer::getByIdent($this->form->getValue('ident'));

          if(isset($is_used)){
            if($is_used->getIdent() == $this->form->getValue('ident')){

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
                $back_url = 'airport';
              }
              $this->getUser()->setFlash('success','This Airport Ident has already used. Please confirm else!');

              $this->redirect($back_url);
            }
          }
          elseif($this->form->getValue('ident') == 'null'){
            $this->airport->setIdent(null);
          }
          else{
            $this->airport->setIdent($this->form->getValue('ident'));
          }
        }
        $this->airport->setIdent($this->form->getValue('ident'));
        $this->airport->setName($this->form->getValue('name'));
        if ($this->airport->isNew()) {
        $this->airport->setCity($this->form->getValue('city'));
        $this->airport->setState($this->form->getValue('state'));
        $this->airport->setLatitude($this->form->getValue('latitude'));
        $this->airport->setLongitude($this->form->getValue('longitude'));
        $this->airport->setRunwayLength($this->form->getValue('runway_length'));

        if($this->form->getValue('wing_id') == 0){
          $this->airport->setWingId(null);
        }else{
          $this->airport->setWingId($this->form->getValue('wing_id'));
        }
        $this->airport->setGmtOffset($this->form->getValue('gmt_offset'));
        $this->airport->setDstOffset($this->form->getValue('dst_offset'));
        $this->airport->setZipcode($this->form->getValue('zipcode'));

        if($this->form->getValue('closed') == null){
          $this->airport->setClosed(0);
        }else{
          $this->airport->setClosed($this->form->getValue('closed'));
        }
          $content = $this->getUser()->getName().' added new Airport: '.$this->airport->getName().' ('.$this->airport->getIdent().')';
          ActivityPeer::log($content);
        }

        $this->airport->save();

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
          $back_url = 'airport';
        }

        $this->getUser()->setFlash('success', $success);

        if($request->getParameter('leg_id')){
          $back_url = '@leg_edit?id='.$request->getParameter('leg_id');
        }

        $this->redirect($back_url);
      }
    }
    else
    {
      # Set referer URL
      $this->referer = $request->getReferer() ? $request->getReferer() : '@airport';
    }
    $this->airport = $this->airport;

  }

  /**
   * Refresh Agency
   * airport refresh
   */
  public function executeRefreshAgency()
  {
    $this->airports =AirportPeer::getForSelectParent();
  }

  /**
   * Add new airport from pop up by ajax
   * CODE:airport_create
   */
  public function executeUpdateAjax(sfWebRequest $request)
  { 
    # security
    if( !$this->getUser()->hasCredential(array('Administrator'), false)){
        $this->getUser()->setFlash("warning", 'You don\'t have permission to access this url '.$request->getReferer());
        $this->redirect('dashboard/index');
    }

//    $this->setLayout(false);

    $airport = new Airport();

    $this->airport = $airport;

    $this->form = new AirportForm($airport);

    $this->back = $request->getReferer();

    if ($request->isMethod('post'))
    {
      $this->referer = $request->getReferer();
      $this->form->bind($request->getParameter('airp'));

      if ($this->form->isValid() && $this->form->getValue('ident'))
      {
        if($this->form->getValue('ident') && $request->getParameter('id')){
          $is_used = AirportPeer::getByIdent($this->form->getValue('ident'));
          $airport->setIdent($is_used->getIdent());

        }elseif($this->form->getValue('ident') && !$request->getParameter('id')){//new
          $is_used = AirportPeer::getByIdent($this->form->getValue('ident'));

          if(isset($is_used)){
            if($is_used->getIdent() == $this->form->getValue('ident')){

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
                $back_url = 'airport';
              }
              $this->getUser()->setFlash('success','This Airport Ident has already used. Please confirm else!');

              $this->redirect($back_url);
            }
          }elseif($this->form->getValue('ident') == 'null'){
            $airport->setIdent(null);
          }
          else{
            $airport->setIdent($this->form->getValue('ident'));
          }
        }

        $airport->setName($this->form->getValue('name'));
        $airport->setCity($this->form->getValue('city'));
        $airport->setState($this->form->getValue('state'));
        $airport->setLatitude($this->form->getValue('latitude'));
        $airport->setLongitude($this->form->getValue('longitude'));
        $airport->setRunwayLength($this->form->getValue('runway_length'));

        if($this->form->getValue('wing_id') == 0){
          $airport->setWingId(null);
        }else{
          $airport->setWingId($this->form->getValue('wing_id'));
        }
        $airport->setGmtOffset($this->form->getValue('gmt_offset'));
        $airport->setDstOffset($this->form->getValue('dst_offset'));
        $airport->setZipcode($this->form->getValue('zipcode'));

        if($this->form->getValue('closed') == null){
          $airport->setClosed(0);
        }else{
          $airport->setClosed($this->form->getValue('closed'));
        }

        if ($airport->isNew()) {
          $content = $this->getUser()->getName().' added new Airport: '.$airport->getName().' ('.$airport->getIdent().')';
          ActivityPeer::log($content);
        }

        $airport->save();

        $str = '<script type="text/javascript">'
              .'var a = $id;'
              ."window.$('#back_airport_id').val('');"
              ."window.$('#back_airport_id').val(a);"
              ."window.$('#back1').val($('#camp_agency_id').val());"
              ."window.location.reload();"
              .'</script>';
        $this->getUser()->setFlash('success', 'New Airport created successfully!');
        $this->formValid = true;
        $this->airportName = $airport->getName();
        //return $this->renderText($str);
      }else{
        $str = '<script type="text/javascript">'
              ."//window.setTimeout(\'window.location.reload()\', 1500);"
              .'window.location.reload();'
              .'</script>';
        $this->getUser()->setFlash('success', 'Can not create new Airport without datas!');
        $this->formNotValid = true;
       //return $this->renderText($str);
      }
    }else{
      # Set referer URL
      $this->referer = $request->getReferer() ? $request->getReferer() : '@airport';
    }
    $this->airport = $airport;
  }

  /**
   * Agency delete 
   * Check related records and if noting has related it will deleted
   * CODE:airport_delete
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
      $this->airport = AirportPeer::retrieveByPK($request->getParameter('id'));

      $is_in_camp = CampPeer::getByAirportId($this->airport->getId());

      $is_in_fbo = FboPeer::getByAirportId($this->airport->getId());

      $is_in_pilot = PilotPeer::getByAirportId($this->airport->getId());

      if($this->airport->getWingId() || $is_in_camp || $is_in_fbo ||  $is_in_pilot){

        if($is_in_camp){
          $reason = 'Camp';
        }elseif($is_in_fbo){
          $reason = 'FBO';
        }elseif($is_in_pilot){
          $reason = 'Pilot';
        }

        $this->getUser()->setFlash('success', 'Can not delete the airport! There is using data in the  '. $reason .'.');

      }else{

        $this->forward404Unless($this->airport);

        $this->getUser()->setFlash('success', 'Airport information has been successfully deleted!');

        $this->airport->delete();
      }
    }

    return $this->redirect('@airport');
  }

  /**
   * FBO index
   * Search fbos
   * CODE:fbo_index
   */
  public function executeFboIndex(sfWebRequest $request)
  {
    # security
    if( !$this->getUser()->hasCredential(array('Administrator','Staff','Pilot','Coordinator','Volunteer'), false)){
        $this->getUser()->setFlash("warning", 'You don\'t have permission to access this url '.$request->getReferer());
        $this->redirect('dashboard/index');
    }
    $this->getUser()->addRecentItem('FBO', 'fbo', 'airport/fboIndex');
    # for navigation menu
    sfContext::getInstance()->getConfiguration()->loadHelpers('Partial');
    slot('nav_menu', array('reference', 'find-fbo'));

    if($request->getParameter('aport')){
      $this->max = 10;
      $this->page = 1;
      $this->fbo_name = null;
      $this->discount = null;
      $this->default = null;
      $this->ident = $request->getParameter('aport');
      $this->name = null;
      $this->city = null;
      $this->state = null;
      $this->max_array = array(5, 10, 20, 30);
    }else{
      $this->processFilter2($request);
    }
    # filter
    if($request->isMethod('post') || $request->getParameter('page')){
        $this->pager = FboPeer::getPager(
          $this->max,
          $this->page,
          $this->fbo_name,
          $this->discount,
          $this->default,
          $this->ident,
          $this->name,
          $this->city,
          $this->state
        );
        $this->fbos = $this->pager->getResults();
    }
  }

  /**
   * Search fbos by filter
   */
  private function processFilter2(sfWebRequest $request)
  {
    $params = $this->getUser()->getAttribute('fbo', array(), 'fbo');

    if (!isset($params['fbo_name'])) $params['fbo_name'] = null;
    if (!isset($params['discount'])) $params['discount'] = null;
    if (!isset($params['default'])) $params['default'] = null;
    if (!isset($params['ident'])) $params['ident'] = null;
    if (!isset($params['name'])) $params['name'] = null;
    if (!isset($params['city'])) $params['city'] = null;
    if (!isset($params['state'])) $params['state'] = null;

    $this->max_array = array(5, 10, 20, 30);

    if (in_array($request->getParameter('max'), $this->max_array)) {
      $params['max'] = $request->getParameter('max');
    }else{
      if (!isset($params['max'])) $params['max'] = sfConfig::get('app_max_person_per_page', 10);
    }

    if ($request->hasParameter('filter')) {
      $params['fbo_name']        = $request->getParameter('fbo_name');
      $params['discount']        = $request->getParameter('discount');
      $params['default']         = $request->getParameter('default');
      $params['ident']           = $request->getParameter('ident');
      $params['name']            = $request->getParameter('name');
      $params['city']            = $request->getParameter('city');
      $params['state']           = $request->getParameter('state');
    }

    $this->page                 = $page = $request->getParameter('page', 1);
    $this->max                  = $params['max'];
    $this->fbo_name             = $params['fbo_name'];
    $this->discount             = $params['discount'];
    $this->default              = $params['default'];
    $this->ident                = $params['ident'];
    $this->name                 = $params['name'];
    $this->city                 = $params['city'];
    $this->state                = $params['state'];

    $this->getUser()->setAttribute('fbo', $params, 'fbo');
  }

  /**
   * Add or edit fbo 
   * CODE:fbo_create
   */
  public function executeFboUpdate(sfWebRequest $request)
  {
    # security
    if( !$this->getUser()->hasCredential(array('Administrator','Staff','Coordinator','Volunteer'), false)){
        $this->getUser()->setFlash("warning", 'You don\'t have permission to access this url '.$request->getReferer());
        $this->redirect('dashboard/index');
    }
    //$this->airports="";
    sfContext::getInstance()->getConfiguration()->loadHelpers('Partial');

    $this->airport = trim($this->getRequestParameter('airport', '*')) == '' ? '*' : trim($this->getRequestParameter('airport', '*'));

    if($request->getParameter('leg')){
      $this->leg_id = $request->getParameter('leg');
    }

    if($request->getParameter('id')){
      $this->fbo = FboPeer::retrieveByPK($request->getParameter('id'));
      $this->forward404Unless($this->fbo);

      $this->title = 'Edit Fbo';
      $success = 'FBO information has successfully edited!';
      slot('nav_menu', array('reference', ''));

      if($this->fbo->getAirportId()){
        $this->airport_id = $this->fbo->getAirportId();
      }
      $this->airports = AirportPeer::doSelect(new Criteria());
      
    }else{
      $this->fbo = new Fbo();
      $this->title = 'Add Fbo';
      $success = 'FBO information has successfully created!';
      slot('nav_menu', array('reference', 'add-fbo'));
    }

    //Aiport PopUp Form
    $airport = new Airport();
    $this->form_airport = new AirportForm($airport);
    $this->airport_referer = $request->getReferer();

    $this->form = new FboForm($this->fbo);

    if($request->isMethod('post')){

      $this->referer = $request->getParameter('referer');

      $this->form->bind($request->getParameter('fbo'));

      if($this->form->isValid() && $request->getParameter('airport') && $this->form->getValue('name')){

        if($request->getParameter('airport')){
          $airport = AirportPeer::getByIdent($request->getParameter('airport'));
        }

        if(isset($airport) && $airport instanceof Airport){
          $this->fbo->setAirportId($airport->getId());          
        }
        $this->fbo->setName($this->form->getValue('name'));
        $this->fbo->setAddress($this->form->getValue('address'));
        $this->fbo->setVoicePhone($this->form->getValue('voice_phone'));
        $this->fbo->setFaxPhone($this->form->getValue('fax_phone'));
        $this->fbo->setDiscountAmount($this->form->getValue('discount_amount'));
        
        if( $this->form->getValue('fuel_discount') == null || $this->form->getValue('discount_amount') == 0 ){
          $this->fbo->setFuelDiscount(0);
        }else{
          $this->fbo->setFuelDiscount($this->form->getValue('fuel_discount'));
        }

        
        if ($this->fbo->isNew()){
          $ext = '';
          if(isset($airport) && $airport instanceof Airport) $ext = ' for '.$airport->getIdent();
          $content = $this->getUser()->getName().' added new FBO'.$ext.': '.$this->fbo->getName();
          ActivityPeer::log($content);
        }

        $this->fbo->save();
        $this->getUser()->setFlash('success', $success);
        $back = '@fbo';

        if($request->getParameter('leg_id')){
          $set_leg = MissionLegPeer::retrieveByPK($request->getParameter('leg_id'));
          if(isset($set_leg) && $set_leg instanceof MissionLeg){
            $set_leg->setFboId($this->fbo->getId());
            $set_leg->save();
          }
          $back = '@leg_edit?id='.$request->getParameter('leg_id');
        }

        $this->redirect($back);

      }
      else{
        
        if( $request->getParameter('airport') == NULL )
                $this->errairport = 1;

        if( ( $request->getParameter('airport') == NULL ) && ($this->form->getValue('name')) ){
            $this->getUser()->setFlash('error','Please Provide An Airport Name!');
        }
        else if(( $request->getParameter('airport')) && ( $this->form->getValue('name') == NULL)){
            $this->getUser()->setFlash('error','Please Provide A Name!');
        }
        else{
            $this->getUser()->setFlash('error','Please Provide Airport and Name!');
        }

      }
    }
    else
    {
      # Set referer URL
      $this->referer = $request->getReferer() ? $request->getReferer() : '@fbo';
    }
    $this->fbo = $this->fbo;
  }

  /**
   * TODO: Check related records.
   * CODE: fbo_delete
   */
  public function executeFboDelete(sfWebRequest $request)
  {
    # security
    if( !$this->getUser()->hasCredential(array('Administrator','Staff'), false)){
        $this->getUser()->setFlash("warning", 'You don\'t have permission to access this url '.$request->getReferer());
        $this->redirect('dashboard/index');
    }


    if ($request->isMethod('delete'))
    {
      $request->checkCSRFProtection();
      $this->fbo = FboPeer::retrieveByPK($request->getParameter('id'));

      $this->forward404Unless($this->fbo);

      $this->getUser()->setFlash('success', 'FBO information has been successfully deleted!');

      $this->fbo->delete();

    }

    return $this->redirect('@fbo');
  }

  /**
   * Specifies the related airport.
   * CODE: airport_create
   */
  public function executeChangeAirport(sfWebRequest $request)
  {
    # security
    if( !$this->getUser()->hasCredential(array('Administrator'), false)){
        $this->getUser()->setFlash("warning", 'You don\'t have permission to access this url '.$request->getReferer());
        $this->redirect('dashboard/index');
    }

    if ($request->hasParameter('use_id')) {
      $pilot =PilotPeer::retrieveByPK($request->getParameter('for'));
      $this->forward404Unless($pilot);
      $change_airport = AirportPeer::retrieveByPK($request->getParameter('use_id'));
      $this->forward404Unless($change_airport);

      $pilot->setPrimaryAirportId($change_airport->getId());
      $pilot->save();

      $this->getUser()->setFlash('success', 'Change Airport have successfully changed!');

      $this->redirect('@pilot_view?id='.$pilot->getId());
    }else{
      $this->redirect('@default_index?module=airport&pilot_for='.$request->getParameter('for'));
    }
  }

  /**
   * Removes the related airport.
   * CODE: airport_create
   */
  public function executeUnlinkAirport(sfWebRequest $request)
  {
    
    # security
    if( !$this->getUser()->hasCredential(array('Administrator'), false)){
        $this->getUser()->setFlash("warning", 'You don\'t have permission to access this url '.$request->getReferer());
        $this->redirect('dashboard/index');
    }

    $pilot = PilotPeer::retrieveByPK($request->getParameter('id'));
    $this->forward404Unless($pilot);

    $pilot->setPrimaryAirportId(null);
    $pilot->save();

    $this->getUser()->setFlash('success', 'Primary Airport information have successfully removed!');

    $this->redirect('@pilot_view?id='.$pilot->getId());
  }

  public function executeAutoComplete()
  {
    $this->keyword = $this->getRequestParameter('airport');
    $this->airports = AirportPeer::getByFirstLetter($this->keyword);
  }

  public function executeAutoCompleteName()
  {
    $this->keyword = $this->getRequestParameter('airport_name');
    $this->airport_names = AirportPeer::getByAirportName($this->keyword);    
  }
  public function executeAutoCompleteAirSourceName(  sfWebRequest $request)
  {
    $params = $request->getPostParameters();
    foreach($params as $key => $param) {
        if(substr ( $key, 0, 13) == 'airport_name_'){
          $this->keyword = $this->getRequestParameter($key);
          break;
        }
    }
    $this->airport_names = AirportPeer::getByAirportName($this->keyword);
  }
}
