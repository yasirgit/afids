<?php
class MissionPhotoPeer extends BaseMissionPhotoPeer {

   public static function getMissionPhotos($max, $page) {
      $c = new Criteria();
      $c->add(self::APPROVED, 0);
      $c->addDescendingOrderByColumn(self::SUBMISSION_DATE);
      $pager = new sfPropelPager('MissionPhoto', $max);
      $pager->setCriteria($c);
      $pager->setPage($page);
      $pager->init();
      return $pager;
   }

   public static function getPager(
      $max = 10,
      $page = 1,
      $miss_photo_id,
      $pilot_name,
      $submission_date,
      $mission_date
   )
  {
    //echo $submission_date.'<br>'; echo date('Y-m-d', strtotime($submission_date));exit;
    $c = new Criteria();
    $c->add(self::APPROVED, 0);
    $c->addDescendingOrderByColumn(self::SUBMISSION_DATE);
    if ($miss_photo_id) $c->add(self::ID, $miss_photo_id);
    if ($submission_date) $c->add(self::SUBMISSION_DATE, date('Y-m-d', strtotime($submission_date)), Criteria::EQUAL);
    if ($mission_date) $c->add(self::MISSION_DATE, date('Y-m-d', strtotime($mission_date)), Criteria::EQUAL);
    if ($pilot_name) $c->add(self::PILOT_NAME, $pilot_name.'%' , Criteria::LIKE);

    $pager = new sfPropelPager('MissionPhoto', $max);
    $pager->setCriteria($c);
    $pager->setPage($page);
    $pager->init();
    return $pager;
  }

  public static function getMissionPhotoApproved(
      $max = 10,
      $page = 1,
      $sort_by,
      $pilot_name,
      $passenger_name
    )
  {
    //echo $sort_by;    exit ();
    $c = new Criteria();
    $c->add(self::APPROVED, 1);
    if($sort_by == 'submission_date') $c->addAscendingOrderByColumn(self::SUBMISSION_DATE);
    if($sort_by == 'mission_date') $c->addAscendingOrderByColumn(self::MISSION_DATE);
    if($sort_by == 'pilot_name') $c->addAscendingOrderByColumn(self::PILOT_NAME);
    if($sort_by == 'passenger_name') $c->addAscendingOrderByColumn(self::PASSENGER_NAME);
    if($sort_by == 'photo_quality') $c->addAscendingOrderByColumn(self::PHOTO_QUALITY);
    if ($pilot_name) $c->add(self::PILOT_NAME, $pilot_name.'%' , Criteria::LIKE);
    if ($passenger_name) $c->add(self::PASSENGER_NAME, $passenger_name.'%' , Criteria::LIKE);
   
    $pager = new sfPropelPager('MissionPhoto', $max);
    $pager->setCriteria($c);
    $pager->setPage($page);
    $pager->init();
    return $pager;
  }

  /*  public static function getMissionPhotoApproved($max, $page) {
      $c = new Criteria();
      $c->add(self::APPROVED, 1);
      $pager = new sfPropelPager('MissionPhoto', $max);
      $pager->setCriteria($c);
      $pager->setPage($page);
      $pager->init();
      return $pager;
   }*/

   public static function getMissionPhotoGallry($max, $page) {
      $c = new Criteria();
      $c->add(MissionPhotoPeer::PHOTO_FILENAME, NULL, Criteria::ISNOTNULL);
      $c->addAscendingOrderByColumn(MissionPhotoPeer::MISSION_DATE);
      $pager = new sfPropelPager('MissionPhoto', $max);
      $pager->setCriteria($c);
      $pager->setPage($page);
      $pager->init();
      return $pager;
   }
   
   public static function getMissionCategoryById($id) {
      $c = new Criteria();
      $c->add(self::ID, $id);
      return self::doSelectOne($c);
   }

}
