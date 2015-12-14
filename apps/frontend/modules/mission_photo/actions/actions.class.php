<?php
/**
 * mission_photo actions.
 *
 * @package    angelflight
 * @subpackage mission_photo
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 12474 2008-10-31 10:41:27Z fabien $
 * @var $mission_photo MissionPhoto
 */
class mission_photoActions extends sfActions
{
  public function executeIndex(sfWebRequest $request)
  {
    #Security
    if( !$this->getUser()->hasCredential(array('Administrator','Staff'), false)){
        $this->getUser()->setFlash("warning", 'You don\'t have permission to access this url '.$request->getReferer());
        $this->redirect('dashboard/index');
    }
    
    $this->processFilter1($request);
    //$this->pager = MissionPhotoPeer::getMissionPhotos($this->max, $this->page);
    if($request->isMethod('post') || $request->getParameter('page')){
        $this->pager = MissionPhotoPeer::getPager(
                $this->max,
                $this->page,
                $this->miss_photo_id,
                $this->pilot_name,
                $this->submission_date,
                $this->mission_date
        );
        $this->mission_photo_list = $this->pager->getResults();
    }
    $this->date_widget = new widgetFormDate(array('format_date' => array('js' => 'mm/dd/yy', 'php' => 'm/d/Y')), array('class' => 'text'));
  }

   public function executePhotoApproved(sfWebRequest $request)
  {
    #Security
    if( !$this->getUser()->hasCredential(array('Administrator','Staff'), false)){
        $this->getUser()->setFlash("warning", 'You don\'t have permission to access this url '.$request->getReferer());
        $this->redirect('dashboard/index');
    }
 
    $this->processFilter2($request);
    $this->pager = MissionPhotoPeer::getMissionPhotoApproved(
                $this->max,
                $this->page,
                $this->sort_by,
                $this->pilot_name,
                $this->passenger_name
    );
    $this->mission_photo_approved = $this->pager->getResults();
  }


  private function processFilter2(sfWebRequest $request)
  { 
     $params = $this->getUser()->getAttribute('mission_photo', array(), 'person');

     $this->max_array = array(5, 10, 20, 30);

    if (in_array($request->getParameter('max'), $this->max_array)) {
      $params['max'] = $request->getParameter('max');
    }else{
      if (!isset($params['max'])) $params['max'] = sfConfig::get('app_max_person_per_page', 10);
    }

    if ($request->hasParameter('filter')) {
          $params['sort_by']  = $request->getParameter('sort_by');
          $params['pilot_name']  = $request->getParameter('pilot_name');
          $params['passenger_name']  = $request->getParameter('passenger_name');
    }
    
    if (!isset($params['pilot_name'])) $params['pilot_name'] = null;
    if (!isset($params['passenger_name'])) $params['passenger_name'] = null;
    if (!isset($params['sort_by'])) $params['sort_by'] = null;

    $this->page       = $page = $request->getParameter('page', 1);
    $this->max        = $params['max'];
    $this->pilot_name  = $params['pilot_name'];
    $this->passenger_name = $params['passenger_name'];
    $this->sort_by = $params['sort_by'];
  }

  private function processFilter1(sfWebRequest $request)
  {
     $params = $this->getUser()->getAttribute('mission_photo', array(), 'person');

     $this->max_array = array(5, 10, 20, 30);

    if (in_array($request->getParameter('max'), $this->max_array)) {
      $params['max'] = $request->getParameter('max');
    }else{
      if (!isset($params['max'])) $params['max'] = sfConfig::get('app_max_person_per_page', 10);
    }

    if ($request->hasParameter('filter')) {
      $params['miss_photo_id']     = $request->getParameter('miss_photo_id');
      $params['pilot_name']       = $request->getParameter('pilot_name');
      $params['submission_date']       = $request->getParameter('submission_date');
      $params['mission_date']       = $request->getParameter('mission_date');
    }

     if (!isset($params['miss_photo_id'])) $params['miss_photo_id'] = null;
    if (!isset($params['pilot_name'])) $params['pilot_name'] = null;
    if (!isset($params['submission_date'])) $params['submission_date'] = null;
    if (!isset($params['mission_date'])) $params['mission_date'] = null;
    
    $this->page       = $page = $request->getParameter('page', 1);
    $this->max        = $params['max'];
    $this->miss_photo_id    = $params['miss_photo_id'];
    $this->pilot_name  = $params['pilot_name'];
    $this->submission_date = $params['submission_date'];
    $this->mission_date = $params['mission_date'];
  }  
  
  public function executeShowPhoto(sfWebRequest $request) {
    $this->mission_photo = MissionPhotoPeer::retrieveByPK($request->getParameter('id'));
    $this->forward404Unless($this->mission_photo);
    $this->setLayout(false);
  }
  
  public function executeShow(sfWebRequest $request)
  {
    #Security
    if( !$this->getUser()->hasCredential(array('Administrator','Staff'), false)){
        $this->getUser()->setFlash("warning", 'You don\'t have permission to access this url '.$request->getReferer());
        $this->redirect('dashboard/index');
    }
  	
    $this->mission_photo = MissionPhotoPeer::retrieveByPK($request->getParameter('id'));
    $this->forward404Unless($this->mission_photo);
    //mission
    # for navigation menu
    sfContext::getInstance()->getConfiguration()->loadHelpers('Partial');
    slot('nav_menu', array('mission_coord', 'find-camp'));

    # recent item
    $this->getUser()->addRecentItem('Missions', 'missions', 'mission/index');

    # filter
    $this->processFilter($request);
    $this->pager = MissionPeer::getPager(
    $this->max,
    $this->page,
    $this->miss_id,
    $this->miss_type,
    $this->miss_date1,
    $this->miss_date2,
    $this->pass_fname,
    $this->pass_lname,
    $this->mreq_fname,
    $this->mreq_lname
    );
    $this->mission_list = $this->pager->getResults();
    $this->date_widget = new widgetFormDate(array('format_date' => array('js' => 'mm/dd/yy', 'php' => 'm/d/Y')), array('class' => 'text'));
  }
  
  /**
   * Searches for missions by filter
   */
  private function processFilter(sfWebRequest $request)
  {
    $params = $this->getUser()->getAttribute('mission', array(), 'person');

    if (!isset($params['miss_id'])) $params['miss_id'] = null;
    if (!isset($params['miss_type'])) $params['miss_type'] = null;
    if (!isset($params['miss_date1'])) $params['miss_date1'] = null;
    if (!isset($params['miss_date2'])) $params['miss_date2'] = null;
    if (!isset($params['pass_fname'])) $params['pass_fname'] = null;
    if (!isset($params['pass_lname'])) $params['pass_lname'] = null;
    if (!isset($params['mreq_fname'])) $params['mreq_fname'] = null;
    if (!isset($params['mreq_lname'])) $params['mreq_lname'] = null;

    $this->max_array = array(5, 10, 20, 30);

    $this->types = MissionTypePeer::getOnlyNames();

    if (in_array($request->getParameter('max'), $this->max_array)){
      $params['max'] = $request->getParameter('max');
    }else{
      if (!isset($params['max'])) $params['max'] = sfConfig::get('app_max_person_per_page', 10);
    }

    if ($request->hasParameter('filter')) {
      $params['miss_id']          = $request->getParameter('miss_id');
      $params['miss_type']        = (in_array($request->getParameter('miss_type'), array_keys($this->types)) ? $request->getParameter('miss_type') : '');
      $params['miss_date1']       = $request->getParameter('miss_date1');
      $params['miss_date2']       = $request->getParameter('miss_date2');
      $params['pass_fname']       = $request->getParameter('pass_fname');
      $params['pass_lname']       = $request->getParameter('pass_lname');
      $params['mreq_fname']       = $request->getParameter('mreq_fname');
      $params['mreq_lname']       = $request->getParameter('mreq_lname');
    }

    $this->page       = $page = $request->getParameter('page', 1);
    $this->max        = $params['max'];
    $this->miss_id    = $params['miss_id'];
    $this->miss_type  = $params['miss_type'];
    $this->miss_date1 = $params['miss_date1'];
    $this->miss_date2 = $params['miss_date2'];
    $this->pass_fname = $params['pass_fname'];
    $this->pass_lname = $params['pass_lname'];
    $this->mreq_fname = $params['mreq_fname'];
    $this->mreq_lname = $params['mreq_lname'];

    $this->getUser()->setAttribute('mission', $params, 'person');
  }
  
  public function executeNew(sfWebRequest $request)
  {
    $this->allEvents = $this->getAllEvents();
    $this->form = new MissionPhotoForm();
  }

  public function executeCreate(sfWebRequest $request)
  { 
    $this->forward404Unless($request->isMethod('post'));
    $this->form = new MissionPhotoForm();
    $this->processForm($request, $this->form);
    $this->setTemplate('new');
  }

  public function executeEdit(sfWebRequest $request) 
  {
   #Security
    if( !$this->getUser()->hasCredential(array('Administrator','Staff'), false)){
        $this->getUser()->setFlash("warning", 'You don\'t have permission to access this url '.$request->getReferer());
        $this->redirect('dashboard/index');
    }
    $this->forward404Unless($mission_photo = MissionPhotoPeer::retrieveByPk($request->getParameter('id')), sprintf('Object mission_photo does not exist (%s).', $request->getParameter('id')));
    $this->form = new MissionPhotoForm($mission_photo);
    if($request->getParameter('id'))
    {
        $category = MissionPhotoPeer::getMissionCategoryById($request->getParameter('id'));           
        if(strtolower($category->getCategory()) == "event"){
            $this->allEvents = $this->getAllEvents();            
        }
    }
  }

  public function executeUpMissionPhoto(sfWebRequest $request)
  {
       $this->form = new MissionPhotoForm();
       $this->form->setDefault('first_name', $request->getParameter('first_name'));
       $this->form->setDefault('last_name', $request->getParameter('last_name'));
       $this->form->setDefault('mission_date', $request->getParameter('mission_date'));
       $this->form->setDefault('passenger_name', $request->getParameter('passenger_name'));
       $this->form->setDefault('origin', $request->getParameter('origin'));
       $this->form->setDefault('destination', $request->getParameter('destination'));
       if($request->isMethod('post') ){
            $this->processPhoto($request, $this->form);
        }
  }

  public function executeUploadMissionPhoto(sfWebRequest $request)
  { 
        $this->form = new MissionPhotoForm();
  }

  protected function processPhoto(sfWebRequest $request, MissionPhotoForm $form)
  { 
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    
    if($form->isValid())
    {
        $form->getObject()->setSubmissionDate(date('Y-m-d H:i:s'));
        $mission_photo = $form->save();

        $first_name =$request->getParameter('mission_photo[first_name]');
        $last_name = $request->getParameter('mission_photo[last_name]');
        $mission_date = $request->getParameter('mission_photo[mission_date][date]');
        $passenger_name = $request->getParameter('mission_photo[passenger_name]');
        $origin = $request->getParameter('mission_photo[origin]');
        $destination = $request->getParameter('mission_photo[destination]');
      
      
      $uploadDir = sfConfig::get('sf_upload_dir').'/mission_photo/display/';
      $thumbDir = sfConfig::get('sf_upload_dir').'/mission_photo/thumbnails/';
      $temp_dir = sfConfig::get('sf_upload_dir').'/mission_photo/temp_dir/';

      $stat = copy($uploadDir.$mission_photo->getPhotoFileName(), $temp_dir.$mission_photo->getPhotoFileName());

      @unlink($uploadDir.$mission_photo->getPhotoFileName());

      $this->createThumbs($temp_dir, $uploadDir, $mission_photo->getPhotoFileName(), 224, 168);
      $this->createThumbs($temp_dir, $thumbDir, $mission_photo->getPhotoFileName(), 112, 84);

      @unlink($temp_dir.$mission_photo->getPhotoFileName());
      $params = array(
        'first_name'    => $request->getParameter('mission_photo[first_name]'),
        'last_name'   => $request->getParameter('mission_photo[last_name]'),
        'mission_date' => $request->getParameter('mission_photo[mission_date][date]'),
        'passenger_name' => $request->getParameter('mission_photo[passenger_name]'),
        'origin' => $request->getParameter('mission_photo[origin]'),
        'destination' => $request->getParameter('mission_photo[destination]')
  );
      //$params = 'first_name='.$first_name.'&last_name='.$last_name.'&mission_date='.$mission_date.'&passenger_name='.$passenger_name.'&origin='.$origin.'&destination='.$destination;
      //$this->redirect('mission_photo/uploadMissionPhoto/index/first_name/'.$first_name.'/last_name/'.$last_name.'/mission_date/'.$mission_date.'/passenger_name/'.$passenger_name.'/origin/'.$origin.'/destination/'.$destination);
      $this->redirect('@upload_mission_photo?'.  http_build_query($params));
    }
  }

  public function executeUseMission(sfWebRequest $request)
  { 
    #Security
    if( !$this->getUser()->hasCredential(array('Administrator','Staff'), false)){
        $this->getUser()->setFlash("warning", 'You don\'t have permission to access this url '.$request->getReferer());
        $this->redirect('dashboard/index');
    }
  
      $this->forward404Unless($mission_photo = MissionPhotoPeer::retrieveByPk($request->getParameter('id')), sprintf('Object mission_photo does not exist (%s).', $request->getParameter('id')));
      $this->form = new MissionPhotoForm($mission_photo);
      if($request->getParameter('id'))
      {
            $category = MissionPhotoPeer::getMissionCategoryById($request->getParameter('id'));
            if(strtolower($category->getCategory()) == "event"){
                $this->allEvents = $this->getAllEvents();
            }
      }
      if($request->isMethod('post') || $request->isMethod('put')){
         $this->form->getObject()->setCaption($request->getParameter("mission_photo[caption]"));
         $this->form->getObject()->setComment($request->getParameter("mission_photo[comment]"));
         $this->form->getObject()->setPhotoQuality($request->getParameter("mission_photo[photo_quality]"));
         $this->form->getObject()->setCategory($request->getParameter("mission_photo[category]"));
         $this->form->getObject()->setPhotoUse($request->getParameter("mission_photo[photo_use]"));
         $this->form->getObject()->setApproved($request->getParameter("approved"));
         $this->form->getObject()->setEventId($request->getParameter("event_id"));
         $this->form->getObject()->save();
         $this->redirect("mission_photo/show?id=".$request->getParameter('id'));
      }
  }

  public function executeUpdate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod('post') || $request->isMethod('put'));
    $this->forward404Unless($mission_photo = MissionPhotoPeer::retrieveByPk($request->getParameter('id')), sprintf('Object mission_photo does not exist (%s).', $request->getParameter('id')));
    
    $this->form = new MissionPhotoForm($mission_photo);
    
    $this->processForm($request, $this->form);
    $this->setTemplate('edit');
  }

  public function executeUpdateMission(sfWebRequest $request)
  { 
    $this->forward404Unless($request->isMethod('post') || $request->isMethod('put'));
    $this->forward404Unless($mission_photo = MissionPhotoPeer::retrieveByPk($request->getParameter('id')), sprintf('Object mission_photo does not exist (%s).', $request->getParameter('id')));    
    $this->form = new MissionPhotoForm($mission_photo);        
    $this->mission_photo = $mission_photo;
    $this->processForm($request, $this->form);
    $this->setTemplate('index');
  }

  public function executeGallery(sfWebRequest $request)
  {
    #Security
    if( !$this->getUser()->hasCredential(array('Administrator','Staff'), false)){
        $this->getUser()->setFlash("warning", 'You don\'t have permission to access this url '.$request->getReferer());
        $this->redirect('dashboard/index');
    }
    
    $this->max = $request->getParameter('max', 10);
    $this->page = $request->getParameter('page', 1);
    $this->pager = MissionPhotoPeer::getMissionPhotoGallry($this->max, $this->page);
    $this->mission_photo_gallery = $this->pager->getResults();
   
    $this->setTemplate('gallery');
  }

  public function executeDelete(sfWebRequest $request)  
  {
    #Security
    if( !$this->getUser()->hasCredential(array('Administrator'), false)){
        $this->getUser()->setFlash("warning", 'You don\'t have permission to access this url '.$request->getReferer());
        $this->redirect('dashboard/index');
    }
  	
    $request->checkCSRFProtection();
    $this->forward404Unless($mission_photo = MissionPhotoPeer::retrieveByPk($request->getParameter('id')), sprintf('Object mission_photo does not exist (%s).', $request->getParameter('id')));
    $mission_photo->delete();
    
    $dir = sfConfig::get('sf_upload_dir');
    @unlink($dir.'/mission_photo/'.$mission_photo->getPhotoFilename());
    $this->redirect('mission_photo/index');
  }

  public function executeApproved(sfWebRequest $request)
  {
      if (!$this->getUser()->hasCredential(array('Administrator'), false)) {
         $this->getUser()->setFlash("warning", 'You don\'t have permission to access this url ' . $request->getReferer());
         $this->redirect('dashboard/index');
      }

      //$request->checkCSRFProtection();
      $this->forward404Unless($mission_photo = MissionPhotoPeer::retrieveByPk($request->getParameter('id')), sprintf('Object itinerary does not exist (%s).', $request->getParameter('id')));

      $mission_photo = MissionPhotoPeer::retrieveByPk($request->getParameter('id'));

      if (isset($mission_photo)) {
         $mission_photo->setApproved(1);
         $mission_photo->save();
      }
      $this->getUser()->setFlash('success', 'mission photo has been approved successfully.');
      $this->redirect('mission_photo/index');
   }

  public function executeGetEvent(sfWebRequest $request)
  {
    $events = $this->getAllEvents();
    echo $events;
    return sfView::NONE;
  }

  private function getAllEvents(){
    $id = $this->getRequestParameter('id');
    $c1 = new Criteria();
    $c1->add(MissionPhotoPeer::ID, $id);
    $eId = MissionPhotoPeer::doSelect($c1);

    $c = new Criteria();
    $events = EventPeer::doSelect($c);
    
    $str = '';
    $str .= '<th>Events</th><td><select name="event_id">';
    foreach($events as $event){
        if(!empty ($eId)){
            if($eId[0]->getEventId() == $event->getId()){
                $str .= '<option value="'.$event->getId().'" selected="selected">'.$event->getEventName().'</option>';
            }
            else{
                $str .= '<option value="'.$event->getId().'">'.$event->getEventName().'</option>';
            }
        }
        else
        {
            $str .= '<option value="'.$event->getId().'">'.$event->getEventName().'</option>';
        }
    }
    $str .= '</select></td>';
    return  $str;
  }

  public function executeRemovePhoto(sfWebRequest $request){
        $c = new Criteria();
        $c->add(MissionPhotoPeer::ID, $request->getParameter('id'));
        $photos = MissionPhotoPeer::doSelect($c);
        $ad_photo = $photos[0]->getPhotoFilename();

        $img_dir = sfConfig::get('sf_upload_dir').'/mission_photo/display/';
        $img_thmb = sfConfig::get('sf_upload_dir').'/mission_photo/thumbnails/';

        //unlink function return bool so you can use it as conditon
        if(@unlink($img_dir.$ad_photo) && @unlink($img_thmb.$ad_photo)){
            $c->add(MissionPhotoPeer::PHOTO_FILENAME, '');
            MissionPhotoPeer::doUpdate($c);
        }
        $this->redirect("mission_photo/show?id=".$request->getParameter('id'));
    }

    public function createThumbs( $pathToImages, $pathToThumbs, $fname, $thumbWidth, $thumbHeight )
    {
      $dir = opendir($pathToImages);
      
        while(false !== ($fname = readdir($dir))){
        
        $info = pathinfo($pathToImages . $fname);
          if ( strtolower($info['extension']) == 'jpg')
          {
              $img = imagecreatefromjpeg( "{$pathToImages}{$fname}" );
          }
          else if( strtolower($info['extension']) == 'png')
          {
               $img = imagecreatefrompng( "{$pathToImages}{$fname}" );
          }
          else if( strtolower($info['extension']) == 'gif')
          {
               $img = imagecreatefromgif( "{$pathToImages}{$fname}" );
          }
          
          $width = imagesx( $img );
          $height = imagesy( $img );

          $new_width = $thumbWidth;
          //$new_height = floor( $height * ( $thumbWidth / $width ) );
          $new_height = $thumbHeight;

          $tmp_img = imagecreatetruecolor( $new_width, $new_height );

          imagecopyresized( $tmp_img, $img, 0, 0, 0, 0, $new_width, $new_height, $width, $height );

         if(strtolower($info['extension']) == 'jpg')
         {
              imagejpeg( $tmp_img, "{$pathToThumbs}{$fname}" );
         }
         else if( strtolower($info['extension']) == 'png')
         {
              imagepng( $tmp_img, "{$pathToThumbs}{$fname}" );
         }
         else if( strtolower($info['extension']) == 'gif')
         {
              imagegif( $tmp_img, "{$pathToThumbs}{$fname}" );
         }
      }
      closedir($dir);
    }

  protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    
    if($form->isValid())
    {
      $mission_photo = $form->save();
      
      $uploadDir = sfConfig::get('sf_upload_dir').'/mission_photo/display/';
      $thumbDir = sfConfig::get('sf_upload_dir').'/mission_photo/thumbnails/';
      $temp_dir = sfConfig::get('sf_upload_dir').'/mission_photo/temp_dir/';
      
      $stat = copy($uploadDir.$mission_photo->getPhotoFileName(), $temp_dir.$mission_photo->getPhotoFileName());
      
      @unlink($uploadDir.$mission_photo->getPhotoFileName());
      
      $this->createThumbs($temp_dir, $uploadDir, $mission_photo->getPhotoFileName(), 224, 168);
      $this->createThumbs($temp_dir, $thumbDir, $mission_photo->getPhotoFileName(), 112, 84);
     
      @unlink($temp_dir.$mission_photo->getPhotoFileName());

      if ($request->getParameter('admin_staff', -1) != -1) { 
              $form->getObject()->setReviewDate(time());
	      $form->getObject()->setReviewBy($this->getUser()->getId());	
	      $form->getObject()->setPhotoQuality($request->getParameter('photo_quality'));	
	      $form->getObject()->setCategory($request->getParameter('photo_type'));
              $form->getObject()->setPhotoUse($request->getParameter('photo_use'));
              if(strtolower($request->getParameter('photo_type')) == 'event'){
                  $form->getObject()->setEventId($request->getParameter('event_id'));
              }
        if($request->getParameter('approved') == 1){
              $form->getObject()->setApproved($request->getParameter('approved'));
        }else{
	      $form->getObject()->setApproved(0);
        }
      }
        $form->getObject()->setFirstName($request->getParameter('first_name'));
        $form->getObject()->setLastName($request->getParameter('last_name'));
        $form->getObject()->setSubmissionDate(date('Y-m-d'));
        $form->getObject()->save();
        $this->redirect('mission_photo/index');
    }
  }
}
