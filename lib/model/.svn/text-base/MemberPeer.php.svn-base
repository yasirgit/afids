<?php

class MemberPeer extends BaseMemberPeer
{
  public static function getByPersonId($person_id)
  {
    $c =  new Criteria();

    $c->add(self::PERSON_ID,$person_id);

    return self::doSelectOne($c);
  }
  public static function getByExternalId($member_Extar_id)
  {
    $c =  new Criteria();
    
    $c->add(self::EXTERNAL_ID,$member_Extar_id);

    return self::doSelectOne($c);
  }

  public static function getPager(
    $max = 10,
    $page = 1,
    $member_Ex_id = null,
    $firstname = null,
    $lastname = null,
    $city = null,
    $state = null,
    $country = null,
    $wing_name = null,
    $active = null,
    $flight_status = null,
    $exclude_ids = array(),
    $co = null
  )
  { 
  	
  	echo $state;
  	
    $c = new Criteria();

    $c->addJoin(self::PERSON_ID,PersonPeer::ID,Criteria::LEFT_JOIN);
    $c->addJoin(self::WING_ID, WingPeer::ID,Criteria::LEFT_JOIN);

    if ($member_Ex_id) {
      $c->add(self::EXTERNAL_ID, $member_Ex_id);
    }else{
      if ($firstname)     $c->add(PersonPeer::FIRST_NAME, $firstname.'%', Criteria::LIKE);
      if ($lastname)      $c->add(PersonPeer::LAST_NAME, $lastname.'%', Criteria::LIKE);
      if ($city)          $c->add(PersonPeer::CITY, $city.'%', Criteria::LIKE);
	    if ($state)         $c->add(PersonPeer::STATE, $state.'%', Criteria::LIKE);
	    if ($country)       $c->add(PersonPeer::COUNTRY, $country.'%', Criteria::LIKE);
	    if ($wing_name)     $c->add(WingPeer::ID, $wing_name);
	    if ($active)        $c->add(self::ACTIVE, $active.'%', Criteria::LIKE);
	    if ($flight_status) $c->add(self::FLIGHT_STATUS , $flight_status.'%', Criteria::LIKE);

      if (!empty($exclude_ids)) $c->add(self::ID, $exclude_ids, Criteria::NOT_IN);
    }

    $c->addAscendingOrderByColumn(PersonPeer::FIRST_NAME);

    $pager = new sfPropelPager('Member', $max);
    $pager->setCriteria($c);
    $pager->setPage($page);
    $pager->init();

    return $pager;
  }

  /**
   * Pager for member List
   * @param int $max
   * @param int $page
   * @param string $pilot_status
   * @param int $wing_id
   * @param int $ifr
   * @param int $multi
   * @param int $instructor
   * @param int $board_member
   * @param int $coordinator
   * @param int $orientation_pilot
   * @param int $exec_comm_member
   * @param int $mentor_pilot
   * @param int $new_member_coord
   * @param int $wing_leader
   * @param string $state
   * @param string $home_base
   * @param string $area_code
   * @param string $email
   * @return sfPropelPager
   */
  public static function getRosterPager(
    $max = 10,
    $page = 1,
    $pilot_status = null,
    $wing_id = 0,
    $ifr = null,
    $multi = null,
    $instructor = null,
    $board_member = null,
    $coordinator = null,
    $orientation_pilot = null,
    $state = '',
    $home_base = '',
    $area_code = '',
    $email = '',
    $wing_job = null 
  )
  { 
    $c = new Criteria();
    $c->addJoin(self::ID, PilotPeer::MEMBER_ID, Criteria::LEFT_JOIN);
    $c->addJoin(PilotPeer::PRIMARY_AIRPORT_ID, AirportPeer::ID, Criteria::LEFT_JOIN);
    $c->addJoin(self::PERSON_ID, PersonPeer::ID, Criteria::LEFT_JOIN);
    $c->addJoin(self::PERSON_ID, BoardMemberPeer::PERSON_ID, Criteria::LEFT_JOIN);
    $c->addJoin(self::ID, CoordinatorPeer::MEMBER_ID, Criteria::LEFT_JOIN);

    //$c->addJoin(self::ID, MemberWingJobPeer::MEMBER_ID, Criteria::LEFT_JOIN);
    //$c->addAlias('wing_job1', MemberWingJobPeer::TABLE_NAME);
    //$c->addJoin(self::ID, MemberWingJobPeer::alias('wing_job1', MemberWingJobPeer::MEMBER_ID), Criteria::LEFT_JOIN);

    if ($pilot_status)  $c->add(self::FLIGHT_STATUS, '%'.$pilot_status.'%', Criteria::LIKE);
    if ($wing_id) $c->add(self::WING_ID, $wing_id);
    if ($ifr) $c->add(PilotPeer::IFR, 1);
    if ($multi) $c->add(PilotPeer::MULTI_ENGINE, 1);
    if ($instructor) {
      $c1 = $c->getNewCriterion(PilotPeer::SE_INSTRUCTOR, 'CFI');
      $c2 = $c->getNewCriterion(PilotPeer::SE_INSTRUCTOR, 'CFII');
      $c3 = $c->getNewCriterion(PilotPeer::ME_INSTRUCTOR, 'CFI');
      $c4 = $c->getNewCriterion(PilotPeer::ME_INSTRUCTOR, 'CFII');
      $c->add($c1->addOr($c2)->addOr($c3)->addOr($c4));
    }
    if ($state)         $c->add(PersonPeer::STATE, $state.'%', Criteria::LIKE);
    if ($home_base)    {
       $c1 = $c->getNewCriterion(AirportPeer::NAME, '%'.$home_base.'%', Criteria::LIKE);
       $c2 = $c->getNewCriterion(AirportPeer::IDENT, '%'.$home_base.'%', Criteria::LIKE);
       $c->add($c1->addOr($c2));
    }
    if ($area_code)    {
       $c1 = $c->getNewCriterion(PersonPeer::DAY_PHONE, '('.$area_code.')%', Criteria::LIKE);
       $c2 = $c->getNewCriterion(PersonPeer::MOBILE_PHONE, '('.$area_code.')%', Criteria::LIKE);
       $c3 = $c->getNewCriterion(PersonPeer::PAGER_PHONE, '('.$area_code.')%', Criteria::LIKE);
       $c4 = $c->getNewCriterion(PersonPeer::OTHER_PHONE, '('.$area_code.')%', Criteria::LIKE);
       $c5 = $c->getNewCriterion(PersonPeer::FAX_PHONE1, '('.$area_code.')%', Criteria::LIKE);
       $c6 = $c->getNewCriterion(PersonPeer::FAX_PHONE2, '('.$area_code.')%', Criteria::LIKE);
       $c7 = $c->getNewCriterion(PersonPeer::EVENING_PHONE, '('.$area_code.')%', Criteria::LIKE);
       $c->add($c1->addOr($c2)->addOr($c3)->addOr($c4)->addOr($c5)->addOr($c6)->addOr($c7));
    }
    if ($email)        $c->add(PersonPeer::EMAIL, $email.'%', Criteria::LIKE);
    
    if ($board_member) $c->add(BoardMemberPeer::ID, null, Criteria::ISNOTNULL);
    if ($coordinator) $c->add(CoordinatorPeer::ID, null, Criteria::ISNOTNULL);
    if ($orientation_pilot) $c->add(PilotPeer::MOP_REGIONS_SERVED, null, Criteria::ISNOTNULL);
    
    if ($wing_job) {
    	$c->addJoin(self::ID, MemberWingJobPeer::MEMBER_ID, Criteria::LEFT_JOIN);
    	$c->addJoin(MemberWingJobPeer::WING_JOB_ID, WingJobPeer::ID, Criteria::LEFT_JOIN);
    	$c->add(WingJobPeer::SHORT_NAME, $wing_job, Criteria::IN);
    }

    $c->setDistinct();
    $c->addAscendingOrderByColumn(PersonPeer::FIRST_NAME);
    $pager = new sfPropelPager('Member', $max);
    $pager->setCriteria($c);
    $pager->setPage($page);
    $pager->init();
    return $pager;
  }

  //not in Coordinator Member
  public static function getNotInCoordinator()
  {
    $c = new Criteria();

    $coordinators = CoordinatorPeer::doSelect($c);

    if($coordinators){
      foreach ($coordinators as $coordinator){
        $c->addJoin(self::ID, CoordinatorPeer::MEMBER_ID, Criteria::LEFT_JOIN);
        $c->addJoin(self::PERSON_ID, PersonPeer::ID);

        $c->add($coordinator->getMemberId(), null, Criteria::ISNULL);
        $not_in_coordinator_persons = PersonPeer::doSelect($c);
      }
    }else{
      $not_in_coordinator_persons = PersonPeer::doSelect($c);
    }

    $arr = array();
    $arr[0] = '-- select --';

    foreach ($not_in_coordinator_persons as $not_in_coordinator_person)
    {
      $arr[$not_in_coordinator_person->getId()] = $not_in_coordinator_person->getLastName();
    }
    return $arr;
  }

  //not in Pilot Member
  public static function getNotInPilot()
  {
    $c = new Criteria();

    $pliots = PilotPeer::doSelect($c);

    if($pliots){
      foreach ($pliots as $pliot){
        $c->addJoin(self::ID, PilotPeer::MEMBER_ID, Criteria::LEFT_JOIN);
        $c->addJoin(self::PERSON_ID, PersonPeer::ID);

        $c->add(PilotPeer::MEMBER_ID, null, Criteria::ISNULL);
        $not_in_pilot_persons = PersonPeer::doSelect($c);
      }
    }else{
      $not_in_pilot_persons = PersonPeer::doSelect($c);
    }

    $arr = array();
    $arr[0] = '-- select --';

    foreach ($not_in_pilot_persons as $not_in_pilot_person)
    {
      $arr[$not_in_pilot_person->getId()] = $not_in_pilot_person->getLastName();
    }
    return $arr;
  }

  /*
   * Pager for members who needs badge and notebooks
   */
  
  public static function getNeedsBNPager(
    $max = 10,
    $page = 1
  )
  {
    $c = new Criteria();

    $c1 = $c->getNewCriterion(self::BADGE_MADE, null, Criteria::ISNULL);
    $c2 = $c->getNewCriterion(self::NOTEBOOK_SENT, null, Criteria::ISNULL);
    
    $c->add($c1->addOr($c2));

    $c->addAscendingOrderByColumn(self::EXTERNAL_ID);

    $pager = new sfPropelPager('Member', $max);
    $pager->setCriteria($c);
    $pager->setPage($page);
    $pager->init();

    return $pager;
  }

  public static function getPagers(
    $max = 10,
    $page = 1,
    $member_id = null,
    $firstname = null,
    $lastname = null,
    $city = null,
    $state = null,
    $country = null,
    $wing_name = null,
    $active = null,
    $flight_status = null,
    $exclude_ids = array(),
    $co = null
  )
  {

  	echo $state;

    $c = new Criteria();

    $c->addJoin(self::PERSON_ID,PersonPeer::ID,Criteria::LEFT_JOIN);
    $c->addJoin(self::WING_ID, WingPeer::ID,Criteria::LEFT_JOIN);

    if ($member_id) {
      $c->add(self::ID, $member_id);
    }else{
      if ($firstname)     $c->add(PersonPeer::FIRST_NAME, $firstname.'%', Criteria::LIKE);
      if ($lastname)      $c->add(PersonPeer::LAST_NAME, $lastname.'%', Criteria::LIKE);
      if ($city)          $c->add(PersonPeer::CITY, $city.'%', Criteria::LIKE);
	    if ($state)         $c->add(PersonPeer::STATE, $state.'%', Criteria::LIKE);
	    if ($country)       $c->add(PersonPeer::COUNTRY, $country.'%', Criteria::LIKE);
	    if ($wing_name)     $c->add(WingPeer::ID, $wing_name);
	    if ($active)        $c->add(self::ACTIVE, $active.'%', Criteria::LIKE);
	    if ($flight_status) $c->add(self::FLIGHT_STATUS , $flight_status.'%', Criteria::LIKE);

      if (!empty($exclude_ids)) $c->add(self::ID, $exclude_ids, Criteria::NOT_IN);
    }

    $c->addAscendingOrderByColumn(PersonPeer::FIRST_NAME);

    $pager = new sfPropelPager('Member', $max);
    $pager->setCriteria($c);
    $pager->setPage($page);
    $pager->init();

    return $pager;
  }
}
