<?php
class MissionLegPeer extends BaseMissionLegPeer
{
  public static function getPager(
  $max = 10,
  $page = 1,
  $miss_ext_id = null,
  $miss_type = null,
  $miss_date1 = null,
  $miss_date2 = null,
  $pass_fname = null,
  $pass_lname = null,
  $mreq_fname = null,
  $mreq_lname = null,
  $orgin_airport = null,
  $orgin_city = null,
  $orgin_state = null,
  $dest_airport = null,
  $dest_city = null,
  $dest_state = null,
  $pilot_fname = null,
  $pilot_lname = null,
  $cancel = null,
  $notcoordinated = null
  )
  {
    $c = new Criteria();

    //airport
    $c->addJoin(self::FROM_AIRPORT_ID, AirportPeer::alias('c1', AirportPeer::ID), Criteria::LEFT_JOIN);
    $c->addJoin(self::TO_AIRPORT_ID, AirportPeer::alias('c2', AirportPeer::ID), Criteria::LEFT_JOIN);
    $c->addAlias('c1', AirportPeer::TABLE_NAME);
    $c->addAlias('c2', AirportPeer::TABLE_NAME);

    $c->addJoin(self::MISSION_ID,MissionPeer::ID,Criteria::LEFT_JOIN);
    $c->addJoin(MissionPeer::PASSENGER_ID,PassengerPeer::ID,Criteria::LEFT_JOIN);
    $c->addJoin(MissionPeer::REQUESTER_ID,RequesterPeer::ID,Criteria::LEFT_JOIN);

    $c->addJoin(self::PILOT_ID,PilotPeer::ID,Criteria::LEFT_JOIN);
    $c->addJoin(PilotPeer::MEMBER_ID,MemberPeer::ID,Criteria::LEFT_JOIN);

    //person
    $c->addJoin(PassengerPeer::PERSON_ID, PersonPeer::alias('p1', PersonPeer::ID), Criteria::LEFT_JOIN);
    $c->addJoin(RequesterPeer::PERSON_ID, PersonPeer::alias('p2', PersonPeer::ID), Criteria::LEFT_JOIN);
    $c->addJoin(MemberPeer::PERSON_ID, PersonPeer::alias('p3', PersonPeer::ID), Criteria::LEFT_JOIN);

    $c->addAlias('p1', PersonPeer::TABLE_NAME);
    $c->addAlias('p2', PersonPeer::TABLE_NAME);
    $c->addAlias('p3', PersonPeer::TABLE_NAME);

    $c->addJoin(MissionPeer::MISSION_TYPE_ID,MissionTypePeer::ID,Criteria::LEFT_JOIN);

    if ($miss_ext_id) $c->add(MissionPeer::EXTERNAL_ID, $miss_ext_id.'%', Criteria::LIKE);

    if ($miss_type) $c->add(MissionTypePeer::NAME, $miss_type.'%', Criteria::LIKE);

    if($miss_date1 !=null && $miss_date2!=null) {
      $miss_date1 = date('Y-m-d', strtotime($miss_date1)).' 00:00:00';
      $miss_date2 = date('Y-m-d', strtotime($miss_date2)).' 00:00:00';
      $criterion = $c->getNewCriterion(MissionPeer::MISSION_DATE, $miss_date1, Criteria::GREATER_EQUAL);
      $criterion->addAnd($c->getNewCriterion(MissionPeer::MISSION_DATE, $miss_date2, Criteria::LESS_EQUAL));
      $c->add($criterion);
    }elseif ($miss_date1){
      $miss_date1 = date('Y-m-d', strtotime($miss_date1)).' 00:00:00';
      $c->add(MissionPeer::MISSION_DATE, $miss_date1, Criteria::GREATER_EQUAL);
    }elseif ($miss_date2){
      $miss_date2 = date('Y-m-d', strtotime($miss_date2)).' 00:00:00';
      $c->add(MissionPeer::MISSION_DATE, $miss_date2, Criteria::LESS_EQUAL);
    }

    if($pass_fname) $c->add(PersonPeer::alias("p1", PersonPeer::FIRST_NAME), $pass_fname.'%', Criteria::LIKE);
    if($pass_lname) $c->add(PersonPeer::alias("p1", PersonPeer::LAST_NAME), $pass_lname.'%', Criteria::LIKE);

    if($mreq_fname) $c->add(PersonPeer::alias("p2", PersonPeer::FIRST_NAME), $mreq_fname.'%', Criteria::LIKE);
    if($mreq_lname) $c->add(PersonPeer::alias("p2", PersonPeer::LAST_NAME), $mreq_lname.'%', Criteria::LIKE);

    if($orgin_airport)$c->add(AirportPeer::alias("c1", AirportPeer::IDENT), $orgin_airport);
    if($orgin_city)$c->add(AirportPeer::alias("c1", AirportPeer::CITY), $orgin_city);
    if($orgin_state)$c->add(AirportPeer::alias("c1", AirportPeer::STATE), $orgin_state);

    if($dest_airport)$c->add(AirportPeer::alias("c2", AirportPeer::IDENT), $dest_airport);
    if($dest_city)$c->add(AirportPeer::alias("c2", AirportPeer::CITY), $dest_city);
    if($dest_state)$c->add(AirportPeer::alias("c2", AirportPeer::STATE), $dest_state);

    if($pilot_fname)$c->add(PersonPeer::alias("p3", PersonPeer::FIRST_NAME), $pilot_fname.'%' , Criteria::LIKE);
    if($pilot_lname)$c->add(PersonPeer::alias("p3", PersonPeer::LAST_NAME), $pilot_lname.'%', Criteria::LIKE);
    
    if($cancel === 1){
        $c->add(self::CANCELLED, NULL, Criteria::ISNOTNULL);
    }
    
    //$c->addAscendingOrderByColumn(self::LEG_NUMBER);
    self::addSelectColumns($c);
    $c->addAsColumn("sort_order", "ABS(DATEDIFF(COALESCE(".MissionPeer::MISSION_DATE.", \"1970-01-01\"), NOW()))");
    $c->addAscendingOrderByColumn('sort_order');
    
    if($notcoordinated){
      $c->add(MissionLegPeer::PILOT_ID, null, Criteria::ISNULL);
      $c->addJoin(MissionLegPeer::ID, PilotRequestPeer::LEG_ID,Criteria::LEFT_JOIN);
      $c->add(PilotRequestPeer::ACCEPTED, 1, Criteria::NOT_EQUAL);
      $c->add(MissionLegPeer::CANCELLED, null, Criteria::ISNULL);
      $c->add(MissionLegPeer::ID, "(DATEDIFF(".MissionPeer::MISSION_DATE.", CURDATE()) IN (0, 1, 2, 4, 5))", Criteria::CUSTOM);
    }

    //    return self::doSelect($c);    
   $pager = new sfPropelPager('MissionLeg', $max);
   $pager->setCriteria($c);
   $pager->setPage($page);
   $pager->init();
   return $pager;
  }

  public static function getbyMissId($miss_id){
    $c = new Criteria();

    $c->add(self::MISSION_ID,$miss_id);
    $c->addAscendingOrderByColumn(self::LEG_NUMBER);

    return self::doSelect($c);
  }

  /**
   * @param array $ids
   * @return array
   */
  public static function getByMissionIds($ids)
  {
    $c = new Criteria();
    $c->addJoin(self::MISSION_ID, MissionPeer::ID, Criteria::LEFT_JOIN);
    $c->add(self::MISSION_ID, $ids, Criteria::IN);
    $c->addDescendingOrderByColumn(MissionPeer::ID);
    $c->addAscendingOrderByColumn(self::LEG_NUMBER);

    return self::doSelectJoinMission($c);
  }

  /**
   * @param array $ids
   * @return array
   */
  public static function getByMissionLegIds($ids)
  {
    $c = new Criteria();
    $c->addJoin(self::MISSION_ID, MissionPeer::ID, Criteria::LEFT_JOIN);
    $c->add(self::ID, $ids, Criteria::IN);
    $c->addDescendingOrderByColumn(MissionPeer::ID);
    $c->addAscendingOrderByColumn(self::LEG_NUMBER);

    return self::doSelectJoinMission($c);
  }

  public static function getbyMissIdDown($miss_id){
    $c = new Criteria();

    $c->add(self::MISSION_ID,$miss_id);
    $c->addDescendingOrderByColumn(self::LEG_NUMBER);

    return self::doSelect($c);
  }

  public static function getbyMissIdFTA($miss_id,$from_airport,$to_airport){
    $c = new Criteria();

    $c->add(self::MISSION_ID,$miss_id);
    $c->add(self::FROM_AIRPORT_ID,$from_airport);
    $c->add(self::TO_AIRPORT_ID,$to_airport);

    return self::doSelect($c);
  }

  public static function getByCoorId($coor_id){
    $c = new Criteria();

    $c->add(self::COORDINATOR_ID,$coor_id);

    return self::doSelectOne($c);
  }

  public static function getByIdNumber($miss_id,$number){
    $c = new Criteria();

    $c->addJoin(self::MISSION_ID,MissionPeer::ID,Criteria::LEFT_JOIN);

    $c->add(MissionPeer::ID,$miss_id);
    $c->add(self::LEG_NUMBER,$number);

    return self::doSelectOne($c);
  }

  public static function getPilotNear($airport){

    $c = new Criteria();

    $c->addAscendingOrderByColumn(self::MISSION_ID);

    $c->addJoin(self::MISSION_ID, MissionPeer::ID);
    $c->add(MissionPeer::MISSION_DATE, date('Y-m-d'), Criteria::GREATER_EQUAL);

    if($airport !=null){
      $criterion = $c->getNewCriterion(self::FROM_AIRPORT_ID, $airport, Criteria::LIKE );
      $criterion->addOR($c->getNewCriterion(self::TO_AIRPORT_ID, $airport, Criteria::LIKE));
      $c->add($criterion);
    }

    return self::doSelect($c);
  }

  public static function getPilotNearWithCamp($airport){

    $c = new Criteria();

    if($airport !=null){
      $criterion = $c->getNewCriterion(self::FROM_AIRPORT_ID, $airport, Criteria::LIKE );
      $criterion->addOR($c->getNewCriterion(self::TO_AIRPORT_ID, $airport, Criteria::LIKE));
      $c->add($criterion);
    }

    $conn = Propel::getConnection(self::DATABASE_NAME);

    $query =  "SELECT mission_leg.id
              FROM mission_leg
              LEFT JOIN mission ON mission_leg.mission_id = mission.id
              WHERE 
              mission_leg.transportation = 'air_mission'
              AND mission.camp_id IS NOT NULL
              AND mission.mission_report_id IS NULL 
              GROUP BY (mission.camp_id)
              ";

    $statement = $conn->prepare($query);
    $statement->execute();

    $ids = array();

    while ($row = $statement->fetch())
    {
      $ids[] = $row['id'];
    }

    return self::retrieveByPKs($ids);
  }

  public static function getTest($max,$page){
    $c = new Criteria();
    $c->addAscendingOrderByColumn(self::MISSION_ID);
    $c->setLimit(10);

    $pager = new sfPropelPager('MissionLeg', $max);
    $pager->setCriteria($c);
    $pager->setPage($page);
    $pager->init();
    return $pager;
  }

  public static function getByFilter(
  $max = 10,
  $page = 1,
  $sort_by,
  $availability,
  $first_date,   //availability
  $last_date,    //availability
  $types,
  $no_weekday,    //availability
  $no_weekend,    //availability
  $as_ma,         //availability
  $orgin,
  $dest,
  $airport_id,
  $date_range1,
  $date_range2,
  $filled,
  $open,
  $pilot,
  $mission_assistant,
  $ifr_backup,
  $wing,
  $ident,
  $city,
  $state,
  $zip,
  $day_1 = '',
  $day_2 = '',
  $day_3 = '',
  $day_4 = '',
  $day_5 = '',
  $day_6 = '',
  $day_7 = '',
  $all_type,
  $max_pass,
  $max_wei,
  $max_dist,
  $max_eff,
  $home_base
  ){

    $c = new Criteria();


    $c->addAscendingOrderByColumn(self::MISSION_ID);
    $c->addJoin(self::MISSION_ID,MissionPeer::ID,Criteria::LEFT_JOIN);

    if($sort_by == '0'){
      $c->addDescendingOrderByColumn(MissionPeer::MISSION_DATE);
    }else{
      $c->addAscendingOrderByColumn(MissionPeer::MISSION_DATE);
    }

    $c->addJoin(MissionPeer::MISSION_TYPE_ID,MissionTypePeer::ID,Criteria::LEFT_JOIN);
    $c->addJoin(self::ID,PilotRequestPeer::LEG_ID,Criteria::LEFT_JOIN);

    //airport
    
    $c->addAlias('c1', AirportPeer::TABLE_NAME);
    $c->addAlias('c2', AirportPeer::TABLE_NAME);
    $c->addAlias('hb', AirportPeer::TABLE_NAME);

    $c->addJoin(self::FROM_AIRPORT_ID, AirportPeer::alias('c1', AirportPeer::ID), Criteria::LEFT_JOIN);
    $c->addJoin(self::TO_AIRPORT_ID, AirportPeer::alias('c2', AirportPeer::ID), Criteria::LEFT_JOIN);
    
    //if($home_base){
      //$c->addJoin(self::FROM_AIRPORT_ID, AirportPeer::alias('hb', $home_base), Criteria::LEFT_JOIN);
      //$c->addJoin(self::TO_AIRPORT_ID  , AirportPeer::alias('hb', $home_base), Criteria::LEFT_JOIN);
    //}
    
    if($airport_id !=null){
      $criterion = $c->getNewCriterion(self::FROM_AIRPORT_ID, $airport_id, Criteria::LIKE );
      $criterion->addOR($c->getNewCriterion(self::TO_AIRPORT_ID, $airport_id, Criteria::LIKE));
      $c->add($criterion);
    }

    //wing
    $c->addJoin(MissionPeer::PASSENGER_ID,PassengerPeer::ID,Criteria::LEFT_JOIN);
    $c->addJoin(PassengerPeer::PERSON_ID,PersonPeer::ID,Criteria::LEFT_JOIN);

    $c->addJoin(PersonPeer::ID,MemberPeer::PERSON_ID,Criteria::LEFT_JOIN);
    $c->addJoin(MemberPeer::WING_ID, WingPeer::ID,Criteria::LEFT_JOIN);

    $c->addJoin(MemberPeer::ID,AvailabilityPeer::MEMBER_ID,Criteria::LEFT_JOIN);


      if($availability == ''){
        if($first_date != null && $last_date != null){
          $criterion = $c->getNewCriterion(MissionPeer::MISSION_DATE, date('Y-m-d', strtotime($first_date)), Criteria::GREATER_EQUAL);
          $criterion->addAnd($c->getNewCriterion(MissionPeer::MISSION_DATE, date('Y-m-d', strtotime($last_date)), Criteria::LESS_EQUAL));
          $c->add($criterion);
        }
      }elseif($availability == 'on'){
        if($date_range1 !=null && $date_range2 !=null){
          $criterion = $c->getNewCriterion(MissionPeer::MISSION_DATE, date('Y-m-d', strtotime($date_range1)), Criteria::GREATER_EQUAL);
          $criterion->addAnd($c->getNewCriterion(MissionPeer::MISSION_DATE, date('Y-m-d', strtotime($date_range2)), Criteria::LESS_EQUAL));
          $c->add($criterion);
        }

        #max filters

        if($max_dist)$c->add(self::FROM_AIRPORT_ID, 'Round(ACos(Sin(Radians(c1.latitude)) * Sin(Radians(c2.latitude)) + Cos(Radians(c1.latitude)) * Cos(Radians(c2.latitude)) * Cos(Radians(c1.longitude)-Radians(c2.longitude))) * ((180*60)/3.1415),0) < '. (int)$max_dist , Criteria::CUSTOM);

        $c->addGroupByColumn(CompanionPeer::PASSENGER_ID);
        if($max_pass)$c->addHaving($c->getNewCriterion(CompanionPeer::PASSENGER_ID, 'COUNT('.CompanionPeer::PASSENGER_ID.') > '.$max_pass, Criteria::CUSTOM));

        $c->addGroupByColumn(CompanionPeer::WEIGHT);
        if($max_wei)$c->addHaving($c->getNewCriterion(CompanionPeer::WEIGHT, 'SUM('.CompanionPeer::WEIGHT.') > '.$max_wei, Criteria::CUSTOM));

        $c->addJoin(MissionPeer::PASSENGER_ID , CompanionPeer::PASSENGER_ID,Criteria::LEFT_JOIN );

        //    $c->addAsColumn('aaaa', 'Round(ACos(Sin(Radians(c1.latitude)) * Sin(Radians(c2.latitude)) + Cos(Radians(c1.latitude)) * Cos(Radians(c2.latitude)) * Cos(Radians(c1.longitude)-Radians(c2.longitude))) * ((180*60)/3.1415),0)');

        if($orgin == 'on' && $airport_id !=null)$c->add(self::FROM_AIRPORT_ID,$airport_id,Criteria::LIKE );
        if($dest == 'on' && $airport_id !=null)$c->add(self::TO_AIRPORT_ID,$airport_id,Criteria::LIKE );

        if($all_type == ''){
          if($filled == 'on')$c->add(MissionTypePeer::NAME ,'filled',Criteria::LIKE);
          if($open == 'on')$c->add(MissionTypePeer::NAME,'open',Criteria::LIKE);
        }

        if($pilot == 'on')$c->add(self::COPILOT_WANTED,'1',Criteria::LIKE);
        if($mission_assistant == 'on')$c->add(PilotRequestPeer::MISSION_ASSISTANT_WANTED,'1',Criteria::LIKE);
        if($ifr_backup == 'on')$c->add(PilotRequestPeer::IFR_BACKUP_WANTED,'1',Criteria::LIKE );

        if($as_ma)$c->add(PilotRequestPeer::MISSION_ASSISTANT_WANTED,'1',Criteria::LIKE);

        if(!$no_weekday){
          //DAYS
          if($day_1)
          $c->addOr(MissionPeer::MISSION_DATE, 'date_format('.MissionPeer::MISSION_DATE.', "%W")="'. date('l', strtotime($day_1)).'"', Criteria::CUSTOM);
          if($day_2)
          $c->addOr(MissionPeer::MISSION_DATE, 'date_format('.MissionPeer::MISSION_DATE.', "%W")="'. date('l', strtotime($day_2)).'"', Criteria::CUSTOM);
          if($day_3)
          $c->addOr(MissionPeer::MISSION_DATE, 'date_format('.MissionPeer::MISSION_DATE.', "%W")="'. date('l', strtotime($day_3)).'"', Criteria::CUSTOM);
          if($day_4)
          $c->addOr(MissionPeer::MISSION_DATE, 'date_format('.MissionPeer::MISSION_DATE.', "%W")="'. date('l', strtotime($day_4)).'"', Criteria::CUSTOM);
          if($day_5)
          $c->addOr(MissionPeer::MISSION_DATE, 'date_format('.MissionPeer::MISSION_DATE.', "%W")="'. date('l', strtotime($day_5)).'"', Criteria::CUSTOM);
        }

        if(!$no_weekend){
          if($day_6)
          $c->addOr(MissionPeer::MISSION_DATE, 'date_format('.MissionPeer::MISSION_DATE.', "%W")="'. date('l', strtotime($day_6)).'"', Criteria::CUSTOM);
          if($day_7)
          $c->addOr(MissionPeer::MISSION_DATE, 'date_format('.MissionPeer::MISSION_DATE.', "%W")="'. date('l', strtotime($day_7)).'"', Criteria::CUSTOM);
        }

        //    if($wing)$c->add(WingPeer::Name,'%'.$wing.'%',Criteria::LIKE);

        if($ident !=null ){
          $criterion = $c->getNewCriterion(AirportPeer::alias("c1", AirportPeer::IDENT),$ident);
          $criterion->addOr($c->getNewCriterion(AirportPeer::alias("c2", AirportPeer::IDENT),$ident));
          $c->add($criterion);
        }

        if($city !=null ){
          $criterion = $c->getNewCriterion(AirportPeer::alias("c1", AirportPeer::CITY),$city);
          $criterion->addOr($c->getNewCriterion(AirportPeer::alias("c2", AirportPeer::CITY), $city));
          $c->add($criterion);
        }

        if($state !=null ){
          $criterion = $c->getNewCriterion(AirportPeer::alias("c1", AirportPeer::STATE),$state);
          $criterion->addOr($c->getNewCriterion(AirportPeer::alias("c2", AirportPeer::STATE), $state));
          $c->add($criterion);
        }

        if($zip !=null ){
          $criterion = $c->getNewCriterion(AirportPeer::alias("c1", AirportPeer::ZIPCODE),$zip);
          $criterion->addOr($c->getNewCriterion(AirportPeer::alias("c2", AirportPeer::ZIPCODE), $zip));
          $c->add($criterion);
        }
      }

    MissionLegPeer::addSelectColumns($c);
     
    $c->addAsColumn('distance', 'Round(ACos(Sin(Radians(c1.latitude)) * Sin(Radians(c2.latitude)) + Cos(Radians(c1.latitude)) * Cos(Radians(c2.latitude)) * Cos(Radians(c1.longitude)-Radians(c2.longitude))) * ((180*60)/3.1415),0)');
   
    //EFFECIENCY
    if ($home_base && $hb_airport = AirportPeer::retrieveByPK($home_base))
    {
          $c->addAsColumn('efficiency', "
          CEILING(ROUND(ACOS(SIN(RADIANS(c1.latitude))
          *SIN(RADIANS(c2.latitude))+COS(RADIANS(c1.latitude))
          *COS(RADIANS(c2.latitude))*COS(RADIANS(c1.longitude)-RADIANS(c2.longitude))) 
          *((180*60)/PI()))/(ROUND(ACOS(SIN(RADIANS(c1.latitude))
          *SIN(RADIANS(c2.latitude))+COS(RADIANS(c1.latitude))
          *COS(RADIANS(c2.latitude))
          *     
          COS(RADIANS(c1.longitude)-RADIANS(c2.longitude))
            ) * ((180*60)/PI())
          )
          +
          ROUND(
            ACOS(
              SIN(RADIANS({$hb_airport->getLatitude()}))
              *
              SIN(RADIANS(c2.latitude))
              +
              COS(RADIANS({$hb_airport->getLatitude()}))
              *
              COS(RADIANS(c2.latitude))
              *
              COS(RADIANS({$hb_airport->getLongitude()})-RADIANS(c2.longitude))
            ) * ((180*60)/PI())
          )
          +
          ROUND(
            ACOS(
              SIN(RADIANS({$hb_airport->getLatitude()}))
              *
              SIN(RADIANS(c1.latitude))
              +
              COS(RADIANS({$hb_airport->getLatitude()}))
              *
              COS(RADIANS(c1.latitude))
              *
              COS(RADIANS({$hb_airport->getLongitude()})-RADIANS(c1.longitude))
            ) * ((180*60)/PI()))) * 200)");
          
      $c->addDescendingOrderByColumn('efficiency');
    }
    
    $c->addDescendingOrderByColumn('distance');


       //return self::doSelect($c);
    $pager = new sfPropelPager('MissionLeg', $max);
    $pager->setCriteria($c);
    $pager->setPage($page);
    $pager->init();
    return $pager;
  }

  public static function getByFilterCamp(
  $max = 10,
  $page = 1,
  $sort_by,
  $availability,
  $first_date,   //availability
  $last_date,    //availability
  $not_available, //availability
  $no_weekday,    //availability
  $no_weekend,    //availability
  $as_ma,         //availability
  $orgin,
  $dest,
  $airport_id,
  $date_range1,
  $date_range2,
  $filled,
  $open,
  $pilot,
  $mission_assistant,
  $ifr_backup,
  $wing,
  $ident,
  $city,
  $state,
  $zip,
  $day_1 = '',
  $day_2 = '',
  $day_3 = '',
  $day_4 = '',
  $day_5 = '',
  $day_6 = '',
  $day_7 = '',
  $all_type,
  $max_pass,
  $max_wei,
  $max_dist,
  $max_eff
  ){

    $c = new Criteria();

    $c->addAscendingOrderByColumn(self::MISSION_ID);
    $c->addJoin(self::MISSION_ID,MissionPeer::ID,Criteria::LEFT_JOIN);

    $c->add(MissionPeer::CAMP_ID,null,Criteria::ISNOTNULL);
    $c->add(self::TRANSPORTATION ,'air_mission',Criteria::LIKE);

    $c->addGroupByColumn(MissionPeer::CAMP_ID);

    $c->addJoin(MissionPeer::MISSION_TYPE_ID,MissionTypePeer::ID,Criteria::LEFT_JOIN);
    $c->addJoin(self::ID,PilotRequestPeer::LEG_ID,Criteria::LEFT_JOIN);

    //wing
    $c->addJoin(MissionPeer::PASSENGER_ID,PassengerPeer::ID,Criteria::LEFT_JOIN);
    $c->addJoin(PassengerPeer::PERSON_ID,PersonPeer::ID,Criteria::LEFT_JOIN);

    $c->addJoin(PersonPeer::ID,MemberPeer::PERSON_ID,Criteria::LEFT_JOIN);
    $c->addJoin(MemberPeer::WING_ID, WingPeer::ID,Criteria::LEFT_JOIN);

    $c->addJoin(MemberPeer::ID,AvailabilityPeer::MEMBER_ID,Criteria::LEFT_JOIN);


    if($airport_id !=null){
      $criterion = $c->getNewCriterion(self::FROM_AIRPORT_ID, $airport_id, Criteria::LIKE );
      $criterion->addOR($c->getNewCriterion(self::TO_AIRPORT_ID, $airport_id, Criteria::LIKE));
      $c->add($criterion);
    }

    if($sort_by == '0'){
      $c->addDescendingOrderByColumn(MissionPeer::MISSION_DATE);
    }else{
      $c->addAscendingOrderByColumn(MissionPeer::MISSION_DATE);
    }

    if($not_available == 1){
      return 'You have checked "Not Available" in Availablity form!';
    }else{
      if($availability == ''){
        if($first_date != null && $last_date != null){
          $criterion = $c->getNewCriterion(MissionPeer::MISSION_DATE, date('Y-m-d', strtotime($first_date)), Criteria::GREATER_EQUAL);
          $criterion->addAnd($c->getNewCriterion(MissionPeer::MISSION_DATE, date('Y-m-d', strtotime($last_date)), Criteria::LESS_EQUAL));
          $c->add($criterion);
        }

      }elseif($availability == 'on'){
        if($date_range1 !=null && $date_range2 !=null){
          $criterion = $c->getNewCriterion(MissionPeer::MISSION_DATE, date('Y-m-d', strtotime($date_range1)), Criteria::GREATER_EQUAL);
          $criterion->addAnd($c->getNewCriterion(MissionPeer::MISSION_DATE, date('Y-m-d', strtotime($date_range2)), Criteria::LESS_EQUAL));
          $c->add($criterion);
        }

        #max filters
        if($max_dist)$c->add(self::FROM_AIRPORT_ID, 'Round(ACos(Sin(Radians(c1.latitude)) * Sin(Radians(c2.latitude)) + Cos(Radians(c1.latitude)) * Cos(Radians(c2.latitude)) * Cos(Radians(c1.longitude)-Radians(c2.longitude))) * ((180*60)/3.1415),0) < '. (int)$max_dist , Criteria::CUSTOM);

        $c->addGroupByColumn(CompanionPeer::PASSENGER_ID);
        if($max_pass)$c->addHaving($c->getNewCriterion(CompanionPeer::PASSENGER_ID, 'COUNT('.CompanionPeer::PASSENGER_ID.') > '.$max_pass, Criteria::CUSTOM));

        $c->addGroupByColumn(CompanionPeer::WEIGHT);
        if($max_wei)$c->addHaving($c->getNewCriterion(CompanionPeer::WEIGHT, 'SUM('.CompanionPeer::WEIGHT.') > '.$max_wei, Criteria::CUSTOM));

        $c->addJoin(MissionPeer::PASSENGER_ID , CompanionPeer::PASSENGER_ID,Criteria::LEFT_JOIN );



        #max efficiency

        if($orgin == 'on' && $airport_id !=null)$c->add(self::FROM_AIRPORT_ID,$airport_id,Criteria::LIKE );
        if($dest == 'on' && $airport_id !=null)$c->add(self::TO_AIRPORT_ID,$airport_id,Criteria::LIKE );

        if($all_type == ''){
          if($filled == 'on')$c->add(MissionTypePeer::NAME ,'filled',Criteria::LIKE);
          if($open == 'on')$c->add(MissionTypePeer::NAME,'open',Criteria::LIKE);
        }

        if($pilot == 'on')$c->add(self::COPILOT_WANTED,'1',Criteria::LIKE);
        if($mission_assistant == 'on')$c->add(PilotRequestPeer::MISSION_ASSISTANT_WANTED,'1',Criteria::LIKE);
        if($ifr_backup == 'on')$c->add(PilotRequestPeer::IFR_BACKUP_WANTED,'1',Criteria::LIKE );

        if($as_ma)$c->add(PilotRequestPeer::MISSION_ASSISTANT_WANTED,'1',Criteria::LIKE);

        if(!$no_weekday){
          //DAYS
          if($day_1)
          $c->addOr(MissionPeer::MISSION_DATE, 'date_format('.MissionPeer::MISSION_DATE.', "%W")="'. date('l', strtotime($day_1)).'"', Criteria::CUSTOM);
          if($day_2)
          $c->addOr(MissionPeer::MISSION_DATE, 'date_format('.MissionPeer::MISSION_DATE.', "%W")="'. date('l', strtotime($day_2)).'"', Criteria::CUSTOM);
          if($day_3)
          $c->addOr(MissionPeer::MISSION_DATE, 'date_format('.MissionPeer::MISSION_DATE.', "%W")="'. date('l', strtotime($day_3)).'"', Criteria::CUSTOM);
          if($day_4)
          $c->addOr(MissionPeer::MISSION_DATE, 'date_format('.MissionPeer::MISSION_DATE.', "%W")="'. date('l', strtotime($day_4)).'"', Criteria::CUSTOM);
          if($day_5)
          $c->addOr(MissionPeer::MISSION_DATE, 'date_format('.MissionPeer::MISSION_DATE.', "%W")="'. date('l', strtotime($day_5)).'"', Criteria::CUSTOM);
        }

        if(!$no_weekend){
          if($day_6)
          $c->addOr(MissionPeer::MISSION_DATE, 'date_format('.MissionPeer::MISSION_DATE.', "%W")="'. date('l', strtotime($day_6)).'"', Criteria::CUSTOM);
          if($day_7)
          $c->addOr(MissionPeer::MISSION_DATE, 'date_format('.MissionPeer::MISSION_DATE.', "%W")="'. date('l', strtotime($day_7)).'"', Criteria::CUSTOM);
        }

        //if($wing)$c->add(WingPeer::Name,'%'.$wing.'%',Criteria::LIKE);

        if($ident !=null ){
          $criterion = $c->getNewCriterion(AirportPeer::alias("c1", AirportPeer::IDENT),$ident);
          $criterion->addOr($c->getNewCriterion(AirportPeer::alias("c2", AirportPeer::IDENT),$ident));
          $c->add($criterion);
        }

        if($city !=null ){
          $criterion = $c->getNewCriterion(AirportPeer::alias("c1", AirportPeer::CITY),$city);
          $criterion->addOr($c->getNewCriterion(AirportPeer::alias("c2", AirportPeer::CITY), $city));
          $c->add($criterion);
        }

        if($state !=null ){
          $criterion = $c->getNewCriterion(AirportPeer::alias("c1", AirportPeer::STATE),$state);
          $criterion->addOr($c->getNewCriterion(AirportPeer::alias("c2", AirportPeer::STATE), $state));
          $c->add($criterion);
        }

        if($zip !=null ){
          $criterion = $c->getNewCriterion(AirportPeer::alias("c1", AirportPeer::ZIPCODE),$zip);
          $criterion->addOr($c->getNewCriterion(AirportPeer::alias("c2", AirportPeer::ZIPCODE), $zip));
          $c->add($criterion);
        }
      }
    }

    #max distance

    //$c->addAsColumn('aaaa', 'Round(ACos(Sin(Radians(c1.latitude)) * Sin(Radians(c2.latitude)) + Cos(Radians(c1.latitude)) * Cos(Radians(c2.latitude)) * Cos(Radians(c1.longitude)-Radians(c2.longitude))) * ((180*60)/3.1415),0)');
    //$c->addAsColumn('aaaa', 1);
    //$c->addAsColumn('aaaa', 'Round(ACos(Sin(Radians(c1.latitude)) * Sin(Radians(c2.latitude)) + Cos(Radians(c1.latitude)) * Cos(Radians(c2.latitude)) * Cos(Radians(c1.longitude)-Radians(c2.longitude))) * ((180*60)/3.1415),0)');

    //return self::doSelectStmt($c);

    return self::doSelect($c);
  }

  public static function getMaxLegNumber($mission_id)
  {
    $mission_id = (int)$mission_id;

    $conn = Propel::getConnection(self::DATABASE_NAME);
    $query = 'SELECT max(leg_number) FROM `mission_leg` WHERE mission_id='.$mission_id;

    $statement = $conn->prepare($query);
    $statement->execute();

    while ($row = $statement->fetch(PDO::FETCH_NUM)){
      return $row[0];
    }

    return 0;
  }

  public static function getMappable(
    $from_airport = null,
    $to_airport = null,
    $type = null,
    $miss_date1 = null,
    $miss_date2 = null
    
  )
  {
    $c = new Criteria();
    $c->add(self::TRANSPORTATION, 'air_mission');

    $c->addAlias('from_air','airport');
    $c->addAlias('to_air','airport');
    $c->addJoin(self::FROM_AIRPORT_ID, 'from_air.id', Criteria::LEFT_JOIN);
    $c->addJoin(self::TO_AIRPORT_ID, 'to_air.id', Criteria::LEFT_JOIN);
    $c->addJoin(self::MISSION_ID, MissionPeer::ID);

    $c->add('from_air.latitude', 0, Criteria::NOT_EQUAL);
    $c->add('from_air.longitude', 0, Criteria::NOT_EQUAL);
    $c->add('to_air.latitude', 0, Criteria::NOT_EQUAL);
    $c->add('to_air.longitude', 0, Criteria::NOT_EQUAL);

    if($type){
      $c->addJoin(MissionPeer::MISSION_TYPE_ID, MissionTypePeer::ID);
      $c->add(MissionTypePeer::NAME, '%'.$type.'%', Criteria::LIKE);
    }

    if($from_airport) $c->add('from_air.ident', $from_airport);
    if($to_airport)   $c->add('to_air.ident', $to_airport);
    
    if(!empty($miss_date1) && !empty($miss_date2)) {
      $miss_date1 = date('Y-m-d', strtotime($miss_date1)).' 00:00:00';
      $miss_date2 = date('Y-m-d', strtotime($miss_date2)).' 00:00:00';
      $criterion = $c->getNewCriterion(MissionPeer::MISSION_DATE, $miss_date1, Criteria::GREATER_EQUAL);
      $criterion->addAnd($c->getNewCriterion(MissionPeer::MISSION_DATE, $miss_date2, Criteria::LESS_EQUAL));
      $c->add($criterion);
    }elseif ($miss_date1){
      $miss_date1 = date('Y-m-d', strtotime($miss_date1)).' 00:00:00';
      $c->add(MissionPeer::MISSION_DATE, $miss_date1, Criteria::GREATER_EQUAL);
    }elseif ($miss_date2){
      $miss_date2 = date('Y-m-d', strtotime($miss_date2)).' 00:00:00';
      $c->add(MissionPeer::MISSION_DATE, $miss_date2, Criteria::GREATER_EQUAL);
    }
    
    $c->addDescendingOrderByColumn(MissionPeer::ID);
    $c->addAscendingOrderByColumn(self::LEG_NUMBER);
    $c->setLimit(50);
    
    return self::doSelect($c);
  }

  public static function getDistance($o_airport,$d_airport){

    $c = new Criteria();

    $c->addJoin(self::FROM_AIRPORT_ID, AirportPeer::alias('from_air', AirportPeer::ID), Criteria::LEFT_JOIN);
    $c->addJoin(self::TO_AIRPORT_ID, AirportPeer::alias('to_air', AirportPeer::ID), Criteria::LEFT_JOIN);

    $c->addAlias('from_air', AirportPeer::TABLE_NAME);
    $c->addAlias('to_air', AirportPeer::TABLE_NAME);

    if($o_airport)$c->add(AirportPeer::alias("from_air", AirportPeer::ID), $o_airport);
    if($d_airport)$c->add(AirportPeer::alias("to_air", AirportPeer::ID), $d_airport);

    $conn = Propel::getConnection(self::DATABASE_NAME);

    $query =
    "SELECT
                ROUND(
                ACOS(
                SIN(RADIANS(from_air.latitude))
                *
                SIN(RADIANS(to_air.latitude))
                +
                COS(RADIANS(from_air.latitude))
                *
                COS(RADIANS(to_air.latitude))
                *
                COS(RADIANS(from_air.longitude)-RADIANS(to_air.longitude))
                ) * ((180*60)/PI())
                ) as distance
                          FROM mission_leg
                          LEFT JOIN airport from_air ON mission_leg.from_airport_id=from_air.id
                          LEFT JOIN airport to_air ON mission_leg.to_airport_id=to_air.id
                          WHERE
                          mission_leg.transportation = 'air_mission'
                          AND from_air.latitude <> 0 AND to_air.longitude <> 0 AND to_air.latitude <> 0 AND to_air.longitude <> 0
                          ";

    $statement = $conn->prepare($query);
    $statement->execute();

    $ids = array();

    if ($row = $statement->fetch())
    {
      $ids = $row['distance'];
    }

    return self::retrieveByPKs($ids);
    //    return self::doSelect($c);
  }

  public static function getByToAirport($id){
    $c= new Criteria();

    $c->addJoin(self::MISSION_ID,MissionPeer::ID,Criteria::LEFT_JOIN);
    $c->add(MissionPeer::CAMP_ID,NULL,Criteria::ISNOTNULL);

    $c->addDescendingOrderByColumn(MissionPeer::MISSION_DATE);
    $c->addDescendingOrderByColumn(MissionPeer::APPT_DATE);
    $c->add(self::TO_AIRPORT_ID,$id,Criteria::LIKE);

    return self::doSelect($c);
  }

  public static function getPilotMatching($airport)
  {
    $c = new Criteria();
    $c->add(self::TRANSPORTATION, 'air_mission');
    $c->addAscendingOrderByColumn(self::MISSION_ID);

    if($airport !=null){
      $criterion = $c->getNewCriterion(self::FROM_AIRPORT_ID, $airport);
      $criterion->addOr($c->getNewCriterion(self::TO_AIRPORT_ID, $airport));
      $c->add($criterion);
    }

    return self::doSelect($c);
  }

  public static function getPendingPager($max, $page = 1, $wing_id = null, $ident = null)
  {
    $c = new Criteria();
    $c->addJoin(self::MISSION_ID, MissionPeer::ID, Criteria::LEFT_JOIN);
    $c->addJoin(self::FROM_AIRPORT_ID, AirportPeer::alias('from_air', AirportPeer::ID), Criteria::LEFT_JOIN);
    $c->addJoin(self::TO_AIRPORT_ID, AirportPeer::alias('to_air', AirportPeer::ID), Criteria::LEFT_JOIN);
    $c->addAlias('from_air', AirportPeer::TABLE_NAME);
    $c->addAlias('to_air', AirportPeer::TABLE_NAME);
    if ($ident) {
      $c1 = $c->getNewCriterion(AirportPeer::alias("from_air", AirportPeer::IDENT), "%$ident%", Criteria::LIKE);
      $c2 = $c->getNewCriterion(AirportPeer::alias("to_air", AirportPeer::IDENT), "%$ident%", Criteria::LIKE);
      $c->add($c1->addOr($c2));
    }
    if ($wing_id) {
      $c1 = $c->getNewCriterion(AirportPeer::alias("from_air", AirportPeer::WING_ID), $wing_id);
      $c2 = $c->getNewCriterion(AirportPeer::alias("to_air", AirportPeer::WING_ID), $wing_id);
      $c->add($c1->addOr($c2));
    }
    $c->add(MissionPeer::MISSION_DATE, date('Y-m-d').' 00:00:00', Criteria::GREATER_EQUAL);
    $c->add(self::CANCELLED, null, Criteria::ISNULL);

    self::addSelectColumns($c);
    $c->addAsColumn("sort_order", "ABS(DATEDIFF(".MissionPeer::MISSION_DATE.", NOW()))");
    $c->addAscendingOrderByColumn('sort_order');

    $pager = new sfPropelPager('MissionLeg', $max);
    $pager->setCriteria($c);
    $pager->setPage($page);
    $pager->init();
    return $pager;
  }
  
  public static function getMissionLegByReportId($report_id) {
  	$c = new Criteria();
  	$c->add(self::MISSION_REPORT_ID, $report_id);
  	return self::doSelectOne($c);
  }

  public static function countCancelled()
  {
    $c = new Criteria();
    $c->add(MissionLegPeer::CANCELLED, null, Criteria::ISNOTNULL);
    //$c->add(MissionLegPeer::CANCEL_COMMENT, null, Criteria::ISNULL);
    return MissionLegPeer::doCount($c);
  }

  public static function getRsAvailable(&$count, $limit = 100)
  {
    $limit = (int)$limit;
    $limit = $limit ? $limit : 100;

    $stmt = self::queryAvailable("COUNT(DISTINCT(ml.id)) ");
    $row = $stmt->fetch(PDO::FETCH_NUM);
    $count = $row[0];

    $q = "ml.mission_id";
    $q .= ", mt.name as mission_type";
    $q .= ", pt.name as passenger_type";
    $q .= ", m.mission_date";
    $q .= ", ml.transportation";
    $q .= ", ml.ground_origin";
    $q .= ", ml.ground_destination";
    $q .= ", ml.comm_origin";
    $q .= ", ml.comm_dest as comm_destination";
    $q .= ", CONCAT(person.city, ', ', person.state) as person_location";
    $q .= ", CONCAT(i.orgin_city, ', ', i.orgin_state) as origin";
    $q .= ", CONCAT(i.dest_city, ', ', i.dest_state) as destination";
    $q .= ", CONCAT(fa.city, ', ', fa.state) as from_airport";
    $q .= ", CONCAT(ta.city, ', ', ta.state) as to_airport";
    $q .= ", m.date_requested";
    return self::queryAvailable($q, $limit);
  }

  private static function queryAvailable($select, $limit = null)
  {
    $q = "SELECT $select";
    $q .= " FROM mission_leg ml";
    $q .= " LEFT JOIN mission m ON ml.mission_id=m.id";
    $q .= " LEFT JOIN mission_type mt ON m.mission_type_id=mt.id";
    $q .= " LEFT JOIN itinerary i ON m.itinerary_id=i.id";
    $q .= " LEFT JOIN passenger p ON i.passenger_id=p.id";
    $q .= " LEFT JOIN person ON p.person_id=person.id";
    $q .= " LEFT JOIN passenger_type pt ON p.passenger_type_id=pt.id";
    $q .= " LEFT JOIN airport fa ON ml.from_airport_id=fa.id";
    $q .= " LEFT JOIN airport ta ON ml.to_airport_id=ta.id";
    $q .= " LEFT JOIN pilot_request pr ON ml.id=pr.leg_id";
    $q .= " WHERE ml.mission_report_id IS NULL ";
    $q .= " AND (pr.pilot_type<>'Command Pilot' AND pr.accepted=0 AND pr.processed=0 OR pr.id IS NULL) ";
    $q .= " AND m.mission_date>='".date('Y-m-d')." 00:00:00' ";
    $q .= " ORDER BY m.mission_date DESC";
    if ($limit) $q .= " LIMIT $limit";
    $con = Propel::getConnection(self::DATABASE_NAME);
    $stmt = $con->prepare($q);
    $stmt->execute();

    return $stmt;
  }

  public static function getRsCoordinated(&$count, $limit = 100)
  {
    $limit = (int)$limit;
    $limit = $limit ? $limit : 100;

    $stmt = self::queryCoordinated("COUNT(DISTINCT(ml.id))");
    $row = $stmt->fetch(PDO::FETCH_NUM);
    $count = $row[0];

    $q = "ml.mission_id";
    $q .= ", mt.name as mission_type";
    $q .= ", pt.name as passenger_type";
    $q .= ", m.mission_date";
    $q .= ", ml.transportation";
    $q .= ", ml.ground_origin";
    $q .= ", ml.ground_destination";
    $q .= ", ml.comm_origin";
    $q .= ", ml.comm_dest as comm_destination";
    $q .= ", CONCAT(fa.city, ', ', fa.state) as from_airport";
    $q .= ", CONCAT(ta.city, ', ', ta.state) as to_airport";
    $q .= ", CONCAT(person.city, ', ', person.state) as person_location";
    $q .= ", CONCAT(i.orgin_city, ', ', i.orgin_state) as origin";
    $q .= ", CONCAT(i.dest_city, ', ', i.dest_state) as destination";
    return self::queryCoordinated($q, $limit);
  }

  private static function queryCoordinated($select, $limit = null)
  {
    $q = "SELECT $select";
    $q .= " FROM mission_leg ml";
    $q .= " LEFT JOIN pilot_request pr ON ml.id=pr.leg_id";
    $q .= " LEFT JOIN mission m ON ml.mission_id=m.id";
    $q .= " LEFT JOIN mission_type mt ON m.mission_type_id=mt.id";
    $q .= " LEFT JOIN itinerary i ON m.itinerary_id=i.id";
    $q .= " LEFT JOIN passenger p ON i.passenger_id=p.id";
    $q .= " LEFT JOIN person ON p.person_id=person.id";
    $q .= " LEFT JOIN passenger_type pt ON p.passenger_type_id=pt.id";
    $q .= " LEFT JOIN airport fa ON ml.from_airport_id=fa.id";
    $q .= " LEFT JOIN airport ta ON ml.to_airport_id=ta.id";
    $q .= " WHERE pr.accepted=1";
    if ($limit) $q .= " LIMIT $limit";
    $con = Propel::getConnection(self::DATABASE_NAME);
    $stmt = $con->prepare($q);
    $stmt->execute();

    return $stmt;
  }

  /**
   * Match according to personal flights of pilot
   * @param <type> $id
   * @param <type> $max
   * @param <type> $page
   * @return sfPropelPager
   */
  public static function getByFilterPF(
    $id, $max=10, $page=1
  ){
    $personal_flight = PersonalFlightPeer::retrieveByPK($id);
    if(!$id or !isset($personal_flight)) return null;

    $c = new Criteria();
    $c->addAscendingOrderByColumn(self::MISSION_ID);
    $c->addJoin(self::MISSION_ID,MissionPeer::ID,Criteria::LEFT_JOIN);

    $c->addJoin(MissionPeer::MISSION_TYPE_ID,MissionTypePeer::ID,Criteria::LEFT_JOIN);
    $c->addJoin(self::ID,PilotRequestPeer::LEG_ID,Criteria::LEFT_JOIN);

    //airport
    $c->addAlias('c1',AirportPeer::TABLE_NAME);
    $c->addAlias('c2',AirportPeer::TABLE_NAME);
    $c->addJoin(self::FROM_AIRPORT_ID, AirportPeer::alias('c1', AirportPeer::ID), Criteria::LEFT_JOIN);
    $c->addJoin(self::TO_AIRPORT_ID, AirportPeer::alias('c2', AirportPeer::ID), Criteria::LEFT_JOIN);

    $criterion = $c->getNewCriterion(MissionPeer::MISSION_DATE,date('Y-m-d', strtotime($personal_flight->getDepartureDate())).'%', Criteria::LIKE);
    $criterion ->addAnd($c->getNewCriterion(AirportPeer::alias('c1', AirportPeer::CITY),'%'.$personal_flight->getOriginCity().'%', Criteria::LIKE));
    $criterion->addAnd($c->getNewCriterion(AirportPeer::alias('c2', AirportPeer::CITY), '%'.$personal_flight->getDestinationCity().'%', Criteria::LIKE));
    $criterion ->addAnd($c->getNewCriterion(AirportPeer::alias('c1', AirportPeer::ZIPCODE),'%'.$personal_flight->getOriginZipcode().'%', Criteria::LIKE));
    $criterion->addAnd($c->getNewCriterion(AirportPeer::alias('c2', AirportPeer::ZIPCODE), '%'.$personal_flight->getDestinationZipcode().'%', Criteria::LIKE));

    $criterion2 = $c->getNewCriterion(AirportPeer::alias('c2', AirportPeer::CITY),$personal_flight->getOriginCity());
    $criterion2->addAnd($c->getNewCriterion(AirportPeer::alias('c1', AirportPeer::CITY), $personal_flight->getDestinationCity()));
    $criterion2->addAnd($c->getNewCriterion(MissionPeer::MISSION_DATE,date('Y-m-d', strtotime($personal_flight->getReturnDate())).'%', Criteria::LIKE));
    $criterion2->addAnd($c->getNewCriterion(AirportPeer::alias('c2', AirportPeer::ZIPCODE),'%'.$personal_flight->getOriginZipcode().'%', Criteria::LIKE));
    $criterion2->addAnd($c->getNewCriterion(AirportPeer::alias('c1', AirportPeer::ZIPCODE), '%'.$personal_flight->getDestinationZipcode().'%', Criteria::LIKE));
    $criterion->addOr($criterion2);
    $c->add($criterion);

    $c->add(self::MISSION_REPORT_ID, null, Criteria::ISNULL);
    $c->add(PilotRequestPeer::PILOT_TYPE, 'Command Pilot', Criteria::NOT_EQUAL);

    $criterion = $c->getNewCriterion(PilotRequestPeer::PROCESSED, 0, Criteria::EQUAL);
    $criterion->addOr($c->getNewCriterion(PilotRequestPeer::ID, null, Criteria::ISNULL));
    $c->add($criterion);
    MissionLegPeer::addSelectColumns($c);
/*
    $c->addAsColumn('distance', 'Round(ACos(Sin(Radians(c1.latitude)) * Sin(Radians(c2.latitude)) + Cos(Radians(c1.latitude)) * Cos(Radians(c2.latitude)) * Cos(Radians(c1.longitude)-Radians(c2.longitude))) * ((180*60)/3.1415),0)');

    //EFFECIENCY
    if ($home_base && $hb_airport = AirportPeer::retrieveByPK($home_base))
    {
          $c->addAsColumn('efficiency', "
          CEILING(ROUND(ACOS(SIN(RADIANS(c1.latitude))
          *SIN(RADIANS(c2.latitude))+COS(RADIANS(c1.latitude))
          *COS(RADIANS(c2.latitude))*COS(RADIANS(c1.longitude)-RADIANS(c2.longitude)))
          *((180*60)/PI()))/(ROUND(ACOS(SIN(RADIANS(c1.latitude))
          *SIN(RADIANS(c2.latitude))+COS(RADIANS(c1.latitude))
          *COS(RADIANS(c2.latitude))
          *
          COS(RADIANS(c1.longitude)-RADIANS(c2.longitude))
            ) * ((180*60)/PI())
          )
          +
          ROUND(
            ACOS(
              SIN(RADIANS({$hb_airport->getLatitude()}))
              *
              SIN(RADIANS(c2.latitude))
              +
              COS(RADIANS({$hb_airport->getLatitude()}))
              *
              COS(RADIANS(c2.latitude))
              *
              COS(RADIANS({$hb_airport->getLongitude()})-RADIANS(c2.longitude))
            ) * ((180*60)/PI())
          )
          +
          ROUND(
            ACOS(
              SIN(RADIANS({$hb_airport->getLatitude()}))
              *
              SIN(RADIANS(c1.latitude))
              +
              COS(RADIANS({$hb_airport->getLatitude()}))
              *
              COS(RADIANS(c1.latitude))
              *
              COS(RADIANS({$hb_airport->getLongitude()})-RADIANS(c1.longitude))
            ) * ((180*60)/PI()))) * 200)");

      $c->addDescendingOrderByColumn('efficiency');
    }

    $c->addDescendingOrderByColumn('distance');
*/

    //    return self::doSelect($c);
    $pager = new sfPropelPager('MissionLeg', $max);
    $pager->setCriteria($c);
    $pager->setPage($page);
    $pager->init();
    return $pager;
  }

  public static function getMissingWaiversPager(
  $max = 10,
  $page = 1,
  $miss_date1 = null,
  $miss_date2 = null,
  $pass_name = null,
  $pilot_name = null,
  $wing = null
  )
  {

    $c = new Criteria();

    $c->addJoin(self::MISSION_ID,MissionPeer::ID,Criteria::LEFT_JOIN);
    $c->addJoin(MissionPeer::PASSENGER_ID,PassengerPeer::ID,Criteria::LEFT_JOIN);

    $c->addJoin(self::PILOT_ID,PilotPeer::ID,Criteria::LEFT_JOIN);
    $c->addJoin(PilotPeer::MEMBER_ID,MemberPeer::alias('m2',MemberPeer::ID),Criteria::LEFT_JOIN);

    //person
    $c->addJoin(PassengerPeer::PERSON_ID, PersonPeer::alias('p1', PersonPeer::ID), Criteria::LEFT_JOIN);
    $c->addJoin(MemberPeer::alias('m2',MemberPeer::PERSON_ID), PersonPeer::alias('p2', PersonPeer::ID), Criteria::LEFT_JOIN);

    $c->addAlias('p1', PersonPeer::TABLE_NAME);
    $c->addAlias('p2', PersonPeer::TABLE_NAME);

    $c->addAlias('m1', MemberPeer::TABLE_NAME);
    $c->addAlias('m2', MemberPeer::TABLE_NAME);

    //member
    $c->addJoin(PersonPeer::alias('p1', PersonPeer::ID),MemberPeer::alias('m1',MemberPeer::PERSON_ID),Criteria::LEFT_JOIN);

    if(!empty($miss_date1) && !empty($miss_date2)) {
      $miss_date1 = date('Y-m-d', strtotime($miss_date1)).' 00:00:00';
      $miss_date2 = date('Y-m-d', strtotime($miss_date2)).' 00:00:00';
      $criterion = $c->getNewCriterion(MissionPeer::MISSION_DATE, $miss_date1, Criteria::GREATER_EQUAL);
      $criterion->addAnd($c->getNewCriterion(MissionPeer::MISSION_DATE, $miss_date2, Criteria::LESS_EQUAL));
      $c->add($criterion);
    }elseif ($miss_date1){
      $miss_date1 = date('Y-m-d', strtotime($miss_date1)).' 00:00:00';
      $c->add(MissionPeer::MISSION_DATE, $miss_date1, Criteria::GREATER_EQUAL);
    }elseif ($miss_date2){
      $miss_date2 = date('Y-m-d', strtotime($miss_date2)).' 00:00:00';
      $c->add(MissionPeer::MISSION_DATE, $miss_date2, Criteria::GREATER_EQUAL);
    }

    if($pass_name) {
      $criterion = $c->getNewCriterion(PersonPeer::alias("p1", PersonPeer::FIRST_NAME), $pass_name.'%', Criteria::LIKE);
      $criterion->addOr($c->getNewCriterion(PersonPeer::alias("p1", PersonPeer::LAST_NAME), $pass_name.'%', Criteria::LIKE));
      $c->add($criterion);
    }

    if($pilot_name){
      $criterion = $c->getNewCriterion(PersonPeer::alias("p2", PersonPeer::FIRST_NAME), $pilot_name.'%', Criteria::LIKE);
      $criterion->addOr($c->getNewCriterion(PersonPeer::alias("p2", PersonPeer::LAST_NAME), $pilot_name.'%', Criteria::LIKE));
      $c->add($criterion);
    }

    if($wing)$c->add(MemberPeer::alias('m1',MemberPeer::WING_ID), $wing);

    $c->add(self::WAIVER_RECEIVED, null, Criteria::ISNULL);
    $c->addAscendingOrderByColumn(self::ID);

    //    return self::doSelect($c);
    $pager = new sfPropelPager('MissionLeg', $max);
    $pager->setCriteria($c);
    $pager->setPage($page);
    $pager->init();
    return $pager;
  }

  public static function getbyMissIdNoPilotId($miss_id){
    $c = new Criteria();

    $c->add(self::MISSION_ID,$miss_id);
    $c->add(self::PILOT_ID,null, Criteria::ISNULL);
    $c->addAscendingOrderByColumn(self::LEG_NUMBER);

    return self::doSelect($c);
  }

  /**
   * @param $camp_id, $pass_id
   * @return array
   */
  public static function getByCampIdPassengerId($camp_id, $pass_id)
  {
    $c = new Criteria();
    $c->addJoin(self::MISSION_ID, MissionPeer::ID);
    $c->add(MissionPeer::CAMP_ID, $camp_id);
    $c->add(MissionPeer::PASSENGER_ID, $pass_id);

    return self::doSelect($c);
  }

  public static function getSummaryPagerPending( $pilot_id, $max = 10, $page = 1, $past = false )
  {
    $c = new Criteria();
    $c->addJoin(MissionLegPeer::ID, PilotRequestPeer::LEG_ID, Criteria::LEFT_JOIN);
    $c->addJoin(MissionLegPeer::MISSION_ID, MissionPeer::ID);        
    $c->add(MissionLegPeer::TRANSPORTATION, 'air_mission');
    if ($past) {     
      //$c->add(PilotRequestPeer::ACCEPTED, 1);
      $c->add(MissionPeer::MISSION_DATE, date('Y-m-d H:i:s'), Criteria::LESS_THAN);    
    }else{
      //$c->add(PilotRequestPeer::ACCEPTED, 1, Criteria::NOT_EQUAL);
      $c->add(MissionPeer::MISSION_DATE, date('Y-m-d H:i:s'), Criteria::GREATER_EQUAL );          
    }
    //$this->pending_legs = MissionLegPeer::doSelectJoinMission($c);
    $c->setDistinct(MissionLegPeer::ID);    
    $c->addAnd(MissionLegPeer::PILOT_ID, $pilot_id);
    $c->add(MissionLegPeer::CANCEL_MISSION_LEG, 1, Criteria::EQUAL);
    $c->addDescendingOrderByColumn(MissionPeer::MISSION_DATE);
    $pager = new sfPropelPager('MissionLeg', $max);
    $pager->setCriteria($c);
    $pager->setPage($page);
    $pager->init();
    return $pager;
  }

  public static function getMigaPager($max = 10, $page = 1){
    $c = new Criteria();
        $c->add(self::TRANSPORTATION, 'air_mission');
        //$c->add(MissionLegPeer::PILOT_ID, $pilot_id);
        $c->addJoin(self::MISSION_ID, MissionPeer::ID, Criteria::RIGHT_JOIN);
        $c->add(MissionPeer::MISSION_DATE, date('Y-m-d H:i:s'), Criteria::LESS_THAN);
        //$c->addJoin(MissionLegPeer::MISSION_REPORT_ID, MissionReportPeer::ID, Criteria::LEFT_JOIN);
        $c->add(MissionReportPeer::APPROVED, null, Criteria::ISNULL);
        $c->add(self::MISSION_REPORT_ID, null);
        //MissionLegPeer::doSelectJoinMission($c, null, Criteria::RIGHT_JOIN);
        $c->addDescendingOrderByColumn(MissionPeer::MISSION_DATE);
        $pager = new sfPropelPager('MissionLeg', $max);
        $pager->setCriteria($c);
        $pager->setPage($page);
        $pager->init();
        return $pager;
  }

  public static function getPendingMissions($pilot_id)
  {
    $c = new Criteria();
    $c->addJoin(self::MISSION_ID, MissionPeer::ID, Criteria::LEFT_JOIN);
    $c->add(self::PILOT_ID, $pilot_id);
    $c->add(MissionPeer::MISSION_DATE, date('Y-m-d').' 00:00:00', Criteria::GREATER_EQUAL);
    $c->add(self::CANCELLED, null, Criteria::ISNULL);

    //self::addSelectColumns($c);
    //$c->addAsColumn("sort_order", "ABS(DATEDIFF(".MissionPeer::MISSION_DATE.", NOW()))");
    //$c->addAscendingOrderByColumn('sort_order');

    return self::doCount($c);
  }

  public static function getPendingPagerPilot($max, $page = 1, $pilot_id, $wing_id = null, $ident = null)
  {
    $c = new Criteria();
    $c->addJoin(self::MISSION_ID, MissionPeer::ID, Criteria::LEFT_JOIN);
    $c->add(self::PILOT_ID, $pilot_id);
    $c->addJoin(self::FROM_AIRPORT_ID, AirportPeer::alias('from_air', AirportPeer::ID), Criteria::LEFT_JOIN);
    $c->addJoin(self::TO_AIRPORT_ID, AirportPeer::alias('to_air', AirportPeer::ID), Criteria::LEFT_JOIN);
    $c->addAlias('from_air', AirportPeer::TABLE_NAME);
    $c->addAlias('to_air', AirportPeer::TABLE_NAME);
    if ($ident) {
      $c1 = $c->getNewCriterion(AirportPeer::alias("from_air", AirportPeer::IDENT), "%$ident%", Criteria::LIKE);
      $c2 = $c->getNewCriterion(AirportPeer::alias("to_air", AirportPeer::IDENT), "%$ident%", Criteria::LIKE);
      $c->add($c1->addOr($c2));
    }
    if ($wing_id) {
      $c1 = $c->getNewCriterion(AirportPeer::alias("from_air", AirportPeer::WING_ID), $wing_id);
      $c2 = $c->getNewCriterion(AirportPeer::alias("to_air", AirportPeer::WING_ID), $wing_id);
      $c->add($c1->addOr($c2));
    }
    $c->add(MissionPeer::MISSION_DATE, date('Y-m-d').' 00:00:00', Criteria::GREATER_EQUAL);
    $c->add(self::CANCELLED, null, Criteria::ISNULL);

    self::addSelectColumns($c);
    $c->addAsColumn("sort_order", "ABS(DATEDIFF(".MissionPeer::MISSION_DATE.", NOW()))");
    $c->addAscendingOrderByColumn('sort_order');

    $pager = new sfPropelPager('MissionLeg', $max);
    $pager->setCriteria($c);
    $pager->setPage($page);
    $pager->init();
    return $pager;
  }

  public static function getCountbyMissIdAndType($miss_id, $type=null){
    $c = new Criteria();

    $c->add(self::MISSION_ID,$miss_id);
    $c->addAscendingOrderByColumn(self::LEG_NUMBER);
    if($type){$c->add(self::TRANSPORTATION, $type);}

    return self::doCount($c);
  }

    public static function getbyDesOrderMissId($miss_id){
    $c = new Criteria();

    $c->add(self::MISSION_ID,$miss_id);
    $c->addDescendingOrderByColumn(self::LEG_NUMBER);

    return self::doSelect($c);
  }

  public static function getAllMissionLegByMissionId($mission_id){
    $c = new Criteria();
    $c->add(self::MISSION_ID, $mission_id);

    return self::doSelect($c);
  }

  public static function getMissionLegByMissionIdCount($mission_id){
    $c = new Criteria();
    $c->add(self::MISSION_ID, $mission_id);

    return self::doCount($c);
  }
  public static function getNotCoordinatedMissionLegs($max = 10, $page = 1){


   $q  = "SELECT COUNT(DISTINCT(ml.id))";
    $q .= " FROM mission_leg ml";
    $q .= " LEFT JOIN pilot_request pr ON ml.id = pr.leg_id";
    $q .= " LEFT JOIN mission m ON ml.mission_id=m.id";
    $q .= " LEFT JOIN mission_type mt ON m.mission_type_id=mt.id";
    $q .= " LEFT JOIN itinerary i ON m.itinerary_id=i.id";
    $q .= " LEFT JOIN passenger p ON i.passenger_id=p.id";
    $q .= " LEFT JOIN person ON p.person_id=person.id";
    $q .= " LEFT JOIN passenger_type pt ON p.passenger_type_id=pt.id";
    $q .= " LEFT JOIN airport fa ON ml.from_airport_id=fa.id";
    $q .= " LEFT JOIN airport ta ON ml.to_airport_id = ta.id";
    $q .= " WHERE pr.accepted <> 1 AND ml.cancelled IS NULL";
    $q .= " AND ml.pilot_id IS NULL AND DATEDIFF(m.mission_date, CURDATE()) IN (0,1,2,3,4,5)";
    
    $con = Propel::getConnection(self::DATABASE_NAME);
    $stmt = $con->prepare($q);
    $stmt->execute();
    while ($row = $stmt->fetch(PDO::FETCH_NUM)){
      return $row[0];
    }
  /*  $c = new Criteria();
    $c->addJoin(MissionLegPeer::ID, PilotRequestPeer::LEG_ID,Criteria::LEFT_JOIN);
    $c->addJoin(MissionLegPeer::MISSION_ID, MissionPeer::ID, Criteria::LEFT_JOIN);
    $c->addJoin(MissionTypePeer::ID, MissionPeer::MISSION_TYPE_ID, Criteria::LEFT_JOIN);
    $c->addJoin(ItineraryPeer::ID, MissionPeer::ITINERARY_ID, Criteria::LEFT_JOIN);
    $c->addJoin(PassengerPeer::ID, ItineraryPeer::PASSENGER_ID, Criteria::LEFT_JOIN);
    $c->addJoin(PersonPeer::ID, PassengerPeer::PERSON_ID, Criteria::LEFT_JOIN);
    $c->addJoin(PassengerTypePeer::ID, PassengerPeer::PASSENGER_TYPE_ID, Criteria::LEFT_JOIN);


    $c->addAlias('from_air', AirportPeer::TABLE_NAME);
    $c->addAlias('to_air', AirportPeer::TABLE_NAME);
    $c->addJoin(MissionLegPeer::FROM_AIRPORT_ID, AirportPeer::alias('from_air', AirportPeer::ID), Criteria::LEFT_JOIN);
    $c->addJoin(MissionLegPeer::TO_AIRPORT_ID, AirportPeer::alias('to_air', AirportPeer::ID), Criteria::LEFT_JOIN);
    $c->addAnd(PilotRequestPeer::ACCEPTED, 1, Criteria::NOT_EQUAL);
    $c->addAnd(MissionLegPeer::CANCELLED, null, Criteria::ISNULL);
    $c->addAnd(MissionLegPeer::PILOT_ID, null, Criteria::ISNULL);
    $c->addAnd(null,'DATEDIFF(mission.mission_date, CURDATE()) IN (0,1,2,3,4,5)', Criteria::CUSTOM);
    //$c->setDistinct();
    
    
    
    $pager = new sfPropelPager('MissionLeg', $max);
    $pager->setCriteria($c);
    $pager->setPeerMethod('doSelectJoinAll');
    $pager->setPage($page);
    $pager->init();
    return $pager;*/
  }
}