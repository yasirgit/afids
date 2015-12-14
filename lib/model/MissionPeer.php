<?php
class MissionPeer extends BaseMissionPeer
{
  public static function getPilotAvailablePager(
          $max,
          $airport = null,
          $page = 1,
          $sort = 0,
          $from_date = null,
          $to_date = null,
          $weekdays = array(1,1,1,1,1,1,1),
          $wing_id = null,
          $ident = null,
          $city = null,
          $state = null,
          $zip = null,
          $origin = null,
          $dest = null,
          $pilot = null,
          $co_pilot = null,
          $ifr = null,
          $mission_types = array(),
          $filled = null,
          $open = null,
          $max_passenger = null,
          $max_weight = null,
          $max_distance = null,
          $min_efficiency = null,
          $is_camp = false,
          $ignore_availability = null
          )
  {
    if (!empty($from_date)) $from_date = date('Y-m-d', strtotime($from_date));
    if (!empty($to_date)) $to_date = date('Y-m-d', strtotime($to_date));
    for($i=0;$i < 7;$i++) $weekdays[$i] = $weekdays[$i] ? 1 : 0;
    $origin = $origin ? 1 : 0;
    $dest = $dest ? 1 : 0;
    $pilot = $pilot ? 1 : 0;
    $co_pilot = $co_pilot ? 1 : 0;
    $ifr = $ifr ? 1 : 0;
    $filled = $filled ? 1 : 0;
    $open = $open ? 1 : 0;
    $max_passenger = (int)$max_passenger;
    $max_weight = (int)$max_weight;
    $max_distance = (int)$max_distance;
    if(!$min_efficiency) $min_efficiency = 85; // Minimum efficiency for by default
    else {
      if (intval($min_efficiency) <= 0) $min_efficiency = 0;
      if ($min_efficiency > 100) $min_efficiency = 0;
    }

    $c = new Criteria();
    // default
    $c->addJoin(self::ID, MissionLegPeer::MISSION_ID, Criteria::INNER_JOIN);
    $c->addJoin(MissionLegPeer::ID, PilotRequestPeer::LEG_ID, Criteria::LEFT_JOIN);
    $c->addJoin(MissionPeer::ITINERARY_ID, ItineraryPeer::ID, Criteria::INNER_JOIN);
    $c->add(MissionLegPeer::MISSION_REPORT_ID, null, Criteria::ISNULL);    
//    $c1 = $c->getNewCriterion(PilotRequestPeer::PILOT_TYPE, 'Command Pilot', Criteria::NOT_LIKE);
//    $c2 = $c->getNewCriterion(PilotRequestPeer::ACCEPTED, 1, Criteria::NOT_EQUAL);
//    $c3 = $c->getNewCriterion(PilotRequestPeer::PROCESSED, 1, Criteria::NOT_EQUAL);
//    $c4 = $c->getNewCriterion(PilotRequestPeer::ID, null, Criteria::ISNULL);
//    $c->add($c1->addAnd($c2)->addAnd($c3)->addOr($c4));
    $c->addAlias('from_air', AirportPeer::TABLE_NAME);
    $c->addAlias('to_air', AirportPeer::TABLE_NAME);
    //$c->addJoin(self::ID, MissionLegPeer::MISSION_ID, Criteria::LEFT_JOIN);
    $c->addJoin(MissionLegPeer::FROM_AIRPORT_ID, AirportPeer::alias('from_air', AirportPeer::ID), Criteria::INNER_JOIN);
    $c->addJoin(MissionLegPeer::TO_AIRPORT_ID, AirportPeer::alias('to_air', AirportPeer::ID), Criteria::INNER_JOIN);

    // weekdays
    /*
    $c0 = null;
    foreach ($weekdays as $day => $v) {
      if ($v != 1) continue;
      if ($c0) {
        $c0->addOr($c->getNewCriterion(self::MISSION_DATE, 'WEEKDAY('.self::MISSION_DATE.')='.$day, Criteria::CUSTOM));
      }else{
        $c0 = $c->getNewCriterion(self::MISSION_DATE, 'WEEKDAY('.self::MISSION_DATE.')='.$day, Criteria::CUSTOM);
      }
    }
    if ($c0) $c->add($c0);
    */
    $arr = '(';
    foreach ($weekdays as $day => $v) {
      if ($v != 1) continue;
      $arr .= $day.', ';
    }
    $arr .= '-1)';
    $c->add(self::ID, 'WEEKDAY('.self::MISSION_DATE.') in '.$arr, Criteria::CUSTOM);

    if ($max_distance) {    
    //$c->addAnd(MissionPeer::ID, 'Round((ACos(
    $c->addAnd(MissionPeer::ID, 'Round((ACos(
            Sin(Radians(from_air.latitude))
            *
            Sin(Radians(to_air.latitude))
            +
            Cos(Radians(from_air.latitude))
            *
            Cos(Radians(to_air.latitude))
            *
            Cos(Radians(from_air.longitude)-Radians(to_air.longitude)))
            *'.
            //180/pi())*60*1.1515) <= '.$max_distance, Criteria::CUSTOM);
            '180/pi())*60) <= '.$max_distance, Criteria::CUSTOM);
    }

    if ($min_efficiency && $airport)
    {
      $c->addAnd(MissionPeer::ID, "
      CEILING(ROUND(ACOS(SIN(RADIANS(from_air.latitude))
      *SIN(RADIANS(to_air.latitude))+COS(RADIANS(from_air.latitude))
      *COS(RADIANS(to_air.latitude))*COS(RADIANS(from_air.longitude)-RADIANS(to_air.longitude)))
      *((180*60)/PI()))/(ROUND(ACOS(SIN(RADIANS(from_air.latitude))
      *SIN(RADIANS(to_air.latitude))+COS(RADIANS(from_air.latitude))
      *COS(RADIANS(to_air.latitude))
      *
      COS(RADIANS(from_air.longitude)-RADIANS(to_air.longitude))
        ) * ((180*60)/PI())
      )
      +
      ROUND(
        ACOS(
          SIN(RADIANS({$airport->getLatitude()}))
          *
          SIN(RADIANS(to_air.latitude))
          +
          COS(RADIANS({$airport->getLatitude()}))
          *
          COS(RADIANS(to_air.latitude))
          *
          COS(RADIANS({$airport->getLongitude()})-RADIANS(to_air.longitude))
        ) * ((180*60)/PI())
      )
      +
      ROUND(
        ACOS(
          SIN(RADIANS({$airport->getLatitude()}))
          *
          SIN(RADIANS(from_air.latitude))
          +
          COS(RADIANS({$airport->getLatitude()}))
          *
          COS(RADIANS(from_air.latitude))
          *
          COS(RADIANS({$airport->getLongitude()})-RADIANS(from_air.longitude))
        ) * ((180*60)/PI()))) * 200) >= ".$min_efficiency, Criteria::CUSTOM);
    }

    if ($max_passenger) {
        //xuuchin
//      $c->addAlias('cp', '(SELECT camp_id, COUNT(passenger_id) as pass_count FROM camp_passenger GROUP BY camp_id)');
//      $c->addJoin(MissionPeer::CAMP_ID, CampPassengerPeer::alias('cp', CampPassengerPeer::CAMP_ID), Criteria::LEFT_JOIN);
//      $c1 = $c->getNewCriterion(MissionPeer::CAMP_ID, null, Criteria::ISNULL);
//      $c2 = $c->getNewCriterion(CampPassengerPeer::CAMP_ID, 'cp.pass_count<='.$max_passenger, Criteria::CUSTOM); // tricking the count
//      $c3 = $c->getNewCriterion(MissionPeer::CAMP_ID, null, Criteria::ISNOTNULL);
//      $c->add($c1->addOr($c2->addAnd($c3)));
        //shine
        $c->addAlias('pass1', PassengerPeer::TABLE_NAME);
        $c->addAlias('pass2', PassengerPeer::TABLE_NAME);
        $c->addJoin(MissionPeer::PASSENGER_ID, PassengerPeer::alias('pass1', PassengerPeer::ID), Criteria::INNER_JOIN);
        $c->addJoin(ItineraryPeer::PASSENGER_ID, PassengerPeer::alias('pass2', PassengerPeer::ID), Criteria::INNER_JOIN);
        $c1 = $c->getNewCriterion(PassengerPeer::alias('pass1', PassengerPeer::ID), '((SELECT COUNT(COALESCE(c.id, 0)) FROM companion c WHERE c.passenger_id = pass1.id) + 1) <= ' . $max_passenger, Criteria::CUSTOM);
        $c2 = $c->getNewCriterion(PassengerPeer::alias('pass2', PassengerPeer::ID),  '((SELECT COUNT(COALESCE(c.id, 0)) FROM companion c WHERE c.passenger_id = pass2.id)+ 1) <= ' . $max_passenger, Criteria::CUSTOM);
        $c->add($c1->addAnd($c2));
    }

    if ($max_weight) {
      $c->addAlias('pass1', PassengerPeer::TABLE_NAME);
      $c->addAlias('pass2', PassengerPeer::TABLE_NAME);     
      $c->addJoin(MissionPeer::PASSENGER_ID, PassengerPeer::alias('pass1', PassengerPeer::ID), Criteria::INNER_JOIN);
      $c->addJoin(ItineraryPeer::PASSENGER_ID, PassengerPeer::alias('pass2', PassengerPeer::ID), Criteria::INNER_JOIN);

      //MissionPeer::addSelectColumns($c);
      //$c->addAsColumn('wsum1', '((SELECT SUM(c.weight) FROM companion c WHERE c.passenger_id = pass1.id) + pass1.weight)');
      //$c->addAsColumn('wsum2', '((SELECT SUM(c.weight) FROM companion c WHERE c.passenger_id = pass2.id)+ pass2.weight)');

      //$c1 = $c->getNewCriterion(PassengerPeer::alias('pass1', PassengerPeer::WEIGHT), $max_weight, Criteria::LESS_EQUAL);
      //$c2 = $c->getNewCriterion(PassengerPeer::alias('pass2', PassengerPeer::WEIGHT), $max_weight, Criteria::LESS_EQUAL);
      $c1 = $c->getNewCriterion(PassengerPeer::alias('pass1', PassengerPeer::WEIGHT), '((SELECT SUM(COALESCE(c.weight, 0)) FROM companion c WHERE c.passenger_id = pass1.id) + COALESCE(pass1.weight,0)) <= ' . $max_weight, Criteria::CUSTOM);
      $c2 = $c->getNewCriterion(PassengerPeer::alias('pass2', PassengerPeer::WEIGHT),  '((SELECT SUM(COALESCE(c.weight, 0)) FROM companion c WHERE c.passenger_id = pass2.id)+ COALESCE(pass2.weight,0)) <= ' . $max_weight, Criteria::CUSTOM);
      $c->add($c1->addAnd($c2));
    }
    if($filled && $open){
        $c->add(MissionLegPeer::PILOT_ID, null, Criteria::ISNOTNULL);
        $c->addOr(MissionLegPeer::PILOT_ID, null, Criteria::ISNULL);
    }else {
        if ($filled) $c->add(MissionLegPeer::PILOT_ID, null, Criteria::ISNOTNULL);
        if ($open) $c->add(MissionLegPeer::PILOT_ID, null, Criteria::ISNULL);
    }

    // mission types
    if ($mission_types) $c->add(MissionPeer::MISSION_TYPE_ID, $mission_types, Criteria::IN);

    // needing pilots
    if ($pilot) $c->add(MissionLegPeer::PILOT_ID, null, Criteria::ISNULL);

    // needing mission assistants
    if ($co_pilot) $c->add(PilotRequestPeer::MISSION_ASSISTANT_WANTED, 1);

    // needing mission assistants
    if ($ifr) $c->add(PilotRequestPeer::IFR_BACKUP_WANTED, 1);
    

    // date range
    if (!empty($from_date)) {
      if (empty($to_date)) {
        $c->add(self::MISSION_DATE, $from_date, Criteria::GREATER_THAN);
      }else{
        $c1 = $c->getNewCriterion(self::MISSION_DATE, $from_date, Criteria::GREATER_THAN);
        $c2 = $c->getNewCriterion(self::MISSION_DATE, $to_date, Criteria::LESS_EQUAL);
        $c->add($c1->addAnd($c2));
      }
    }elseif (!empty($to_date)) {
        $c->add(self::MISSION_DATE, $to_date, Criteria::LESS_EQUAL);
    }else{
        //$c->add(MissionPeer::MISSION_DATE, 'NOW()', Criteria::LESS_EQUAL);
        $c->add(self::MISSION_DATE, date("Y/m/d",strtotime("now")), Criteria::GREATER_THAN);
        $c->addAnd(self::MISSION_DATE, date("Y/m/d",strtotime("+1 year")), Criteria::LESS_EQUAL);
    }

    // wing id
    if ($wing_id) {
      if ($origin && $dest) {
        $c1 = $c->getNewCriterion(AirportPeer::alias('from_air', AirportPeer::WING_ID), $wing_id);
        $c2 = $c->getNewCriterion(AirportPeer::alias('to_air', AirportPeer::WING_ID), $wing_id);
        $c->add($c1->addOr($c2));
      }else{
        if ($origin) $c->add(AirportPeer::alias('from_air', AirportPeer::WING_ID), $wing_id);
        if ($dest) $c->add(AirportPeer::alias('to_air', AirportPeer::WING_ID), $wing_id);
      }
    }

    // ident
    if ($ident){        
      if ($origin && $dest){
        $c1 = $c->getNewCriterion(AirportPeer::alias('from_air', AirportPeer::IDENT), $ident, Criteria::LIKE);
        $c2 = $c->getNewCriterion(AirportPeer::alias('to_air', AirportPeer::IDENT), $ident, Criteria::LIKE);
        $c->add($c1->addOr($c2));
      }else{
        if ($origin) $c->add(AirportPeer::alias('from_air', AirportPeer::IDENT), $ident, Criteria::LIKE);
        if ($dest) $c->add(AirportPeer::alias('to_air', AirportPeer::IDENT), $ident, Criteria::LIKE);
      }
    }

    // city
    if ($city) {
      if ($origin && $dest) {
        $c1 = $c->getNewCriterion(AirportPeer::alias('from_air', AirportPeer::CITY), $city, Criteria::LIKE);
        $c2 = $c->getNewCriterion(AirportPeer::alias('to_air', AirportPeer::CITY), $city, Criteria::LIKE);
        $c->add($c1->addOr($c2));
      }else{
        if ($origin) $c->add(AirportPeer::alias('from_air', AirportPeer::CITY), $city);
        if ($dest) $c->add(AirportPeer::alias('to_air', AirportPeer::CITY), $city);
      }
    }
    
    // state
    if ($state) {
      if ($origin && $dest) {
        $c1 = $c->getNewCriterion(AirportPeer::alias('from_air', AirportPeer::STATE), $state, Criteria::LIKE);
        $c2 = $c->getNewCriterion(AirportPeer::alias('to_air', AirportPeer::STATE), $state, Criteria::LIKE);
        $c->add($c1->addOr($c2));
      }else{
        if ($origin) $c->add(AirportPeer::alias('from_air', AirportPeer::STATE), $state);
        if ($dest) $c->add(AirportPeer::alias('to_air', AirportPeer::STATE), $state);
      }
    }
    
    // zipcode
    if ($zip) {
      if ($origin && $dest) {
        $c1 = $c->getNewCriterion(AirportPeer::alias('from_air', AirportPeer::ZIPCODE), $zip, Criteria::LIKE);
        $c2 = $c->getNewCriterion(AirportPeer::alias('to_air', AirportPeer::ZIPCODE), $zip, Criteria::LIKE);
        $c->add($c1->addOr($c2));
      }else{
        if ($origin) $c->add(AirportPeer::alias('from_air', AirportPeer::ZIPCODE), $zip);
        if ($dest) $c->add(AirportPeer::alias('to_air', AirportPeer::ZIPCODE), $zip);
      }
    }

    //if available camp mission is selected
    if ($is_camp) $c->add(self::CAMP_ID, null, Criteria::ISNOTNULL);
    if ($sort == 0) $c->addAscendingOrderByColumn(self::MISSION_DATE);
    elseif ($sort == 1) $c->addDescendingOrderByColumn(self::MISSION_DATE);
    //$c->addGroupByColumn(MissionPeer::ID);
    //$c->addHaving($c->getNewCriterion(MissionPeer::ID, 'COUNT('.MissionPeer::ID.') = MAX('.MissionLegPeer::LEG_NUMBER.') AND mile <= 200', criteria::CUSTOM));
    //$c->addAnd($c->getNewCriterion('', 200, Criteria::LESS_EQUAL));    
    //$c->addAsColumn('mile', "(Round((ACos( Sin(Radians(from_air.latitude)) * Sin(Radians(to_air.latitude)) + Cos(Radians(from_air.latitude)) * Cos(Radians(to_air.latitude)) * Cos(Radians(from_air.longitude)-Radians(to_air.longitude))) * 180/pi())*60*1.1515))");
    //$c->add('mile', 200, Criteria::LESS_EQUAL);
   // echo $c->toString();exit;
    //$c->add(MissionPeer::CANCEL_MISSION, 1 /* ACTIVE MISSIONS */, Criteria::EQUAL); // 1 means mission is active and 0 means mission is cancelled
    $c->add(MissionLegPeer::CANCELLED, null, Criteria::ISNULL);
    $c->setDistinct(self::ID);
    $pager = new sfPropelPager('Mission', $max);
    //$pager = new afids_custom_propel_pager('Mission', $max);
    $pager->setCriteria($c);
//    $pager->setPeerMethod('doSelectJoinCustom');
    $pager->setPage($page);
    $pager->init();
    return $pager;    
  }

  public static function doSelectJoinCustom(Criteria $c, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
    foreach (sfMixer::getCallables('MissionPeer:doSelectJoinCustom:doSelectJoinCustom') as $callable)
    {
      call_user_func($callable, 'MissionPeer', $c, $con);
    }

		$c = clone $c;

		// Set the correct dbName if it has not been overridden
		if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		MissionPeer::addSelectColumns($c);
		$startcol2 = (MissionPeer::NUM_COLUMNS - MissionPeer::NUM_LAZY_LOAD_COLUMNS);

		ItineraryPeer::addSelectColumns($c);
		$startcol3 = $startcol2 + (ItineraryPeer::NUM_COLUMNS - ItineraryPeer::NUM_LAZY_LOAD_COLUMNS);

		MissionTypePeer::addSelectColumns($c);
		$startcol4 = $startcol3 + (MissionTypePeer::NUM_COLUMNS - MissionTypePeer::NUM_LAZY_LOAD_COLUMNS);

		PassengerPeer::addSelectColumns($c);
		$startcol5 = $startcol4 + (PassengerPeer::NUM_COLUMNS - PassengerPeer::NUM_LAZY_LOAD_COLUMNS);

		MissionLegPeer::addSelectColumns($c);
		$startcol6 = $startcol5 + (MissionLegPeer::NUM_COLUMNS - MissionLegPeer::NUM_LAZY_LOAD_COLUMNS);

		$c->addJoin(array(MissionPeer::ITINERARY_ID,), array(ItineraryPeer::ID,), $join_behavior);
		$c->addJoin(array(MissionPeer::MISSION_TYPE_ID,), array(MissionTypePeer::ID,), $join_behavior);
		$c->addJoin(array(MissionPeer::PASSENGER_ID,), array(PassengerPeer::ID,), $join_behavior);
		$c->addJoin(array(MissionPeer::ID,), array(MissionLegPeer::MISSION_ID,), $join_behavior);
		$stmt = BasePeer::doSelect($c, $con);
		$results = array();

		while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$key1 = MissionPeer::getPrimaryKeyHashFromRow($row, 0);
			if (null !== ($obj1 = MissionPeer::getInstanceFromPool($key1))) {
				// We no longer rehydrate the object, since this can cause data loss.
				// See http://propel.phpdb.org/trac/ticket/509
				// $obj1->hydrate($row, 0, true); // rehydrate
			} else {
				$omClass = MissionPeer::getOMClass();

				$cls = substr('.'.$omClass, strrpos('.'.$omClass, '.') + 1);
				$obj1 = new $cls();
				$obj1->hydrate($row);
				MissionPeer::addInstanceToPool($obj1, $key1);
			} // if obj1 already loaded

			// Add objects for joined Itinerary rows
			$key2 = ItineraryPeer::getPrimaryKeyHashFromRow($row, $startcol2);
			if ($key2 !== null) {
				$obj2 = ItineraryPeer::getInstanceFromPool($key2);
				if (!$obj2) {
					$omClass = ItineraryPeer::getOMClass();

					$cls = substr('.'.$omClass, strrpos('.'.$omClass, '.') + 1);
					$obj2 = new $cls();
					$obj2->hydrate($row, $startcol2);
					ItineraryPeer::addInstanceToPool($obj2, $key2);
				} // if obj2 loaded

				// Add the $obj1 (Mission) to the collection in $obj3 (Itinerary)
				$obj2->addMission($obj1);
			} // if joined row not null

			// Add objects for joined MissionType rows
			$key3 = MissionTypePeer::getPrimaryKeyHashFromRow($row, $startcol3);
			if ($key3 !== null) {
				$obj3 = MissionTypePeer::getInstanceFromPool($key3);
				if (!$obj3) {

					$omClass = MissionTypePeer::getOMClass();


					$cls = substr('.'.$omClass, strrpos('.'.$omClass, '.') + 1);
					$obj3 = new $cls();
					$obj3->hydrate($row, $startcol3);
					MissionTypePeer::addInstanceToPool($obj3, $key3);
				} // if obj3 loaded

				// Add the $obj1 (Mission) to the collection in $obj3 (MissionType)
				$obj3->addMission($obj1);
			} // if joined row not null

			// Add objects for joined Passenger rows
			$key4 = PassengerPeer::getPrimaryKeyHashFromRow($row, $startcol4);
			if ($key4 !== null) {
				$obj4 = PassengerPeer::getInstanceFromPool($key4);
				if (!$obj4) {

					$omClass = PassengerPeer::getOMClass();


					$cls = substr('.'.$omClass, strrpos('.'.$omClass, '.') + 1);
					$obj4 = new $cls();
					$obj4->hydrate($row, $startcol4);
					PassengerPeer::addInstanceToPool($obj4, $key4);
				} // if obj4 loaded

				// Add the $obj1 (Mission) to the collection in $obj4 (Passenger)
				$obj4->addMission($obj1);
			} // if joined row not null
      
			// Add objects for joined MissionLeg rows
			$key5 = MissionLegPeer::getPrimaryKeyHashFromRow($row, $startcol5);
			if ($key5 !== null) {
				$obj5 = MissionLegPeer::getInstanceFromPool($key5);
				if (!$obj5) {

					$omClass = MissionLegPeer::getOMClass();


					$cls = substr('.'.$omClass, strrpos('.'.$omClass, '.') + 1);
					$obj5 = new $cls();
					$obj5->hydrate($row, $startcol5);
					MissionLegPeer::addInstanceToPool($obj5, $key5);
				} // if obj5 loaded

				// Add the $obj1 (Mission) to the collection in $obj5 (MissionLeg)
				$obj5->setMission($obj1);
			} // if joined row not null

			$results[] = $obj1;
		}
		$stmt->closeCursor();
		return $results;
	}
  
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
  $mreq_lname = null
  )
  {
    $c = new Criteria();

    $c->addJoin(self::MISSION_TYPE_ID,MissionTypePeer::ID,Criteria::LEFT_JOIN);

    $c->addJoin(self::REQUESTER_ID,RequesterPeer::ID,Criteria::LEFT_JOIN);
    $c->addJoin(self::PASSENGER_ID,PassengerPeer::ID,Criteria::LEFT_JOIN);
    
    //person
    $c->addJoin(PassengerPeer::PERSON_ID, PersonPeer::alias('p1', PersonPeer::ID), Criteria::LEFT_JOIN);
    $c->addJoin(RequesterPeer::PERSON_ID, PersonPeer::alias('p2', PersonPeer::ID), Criteria::LEFT_JOIN);
    $c->addAlias('p1', PersonPeer::TABLE_NAME);
    $c->addAlias('p2', PersonPeer::TABLE_NAME);

    if ($miss_ext_id) $c->add(self::EXTERNAL_ID, $miss_ext_id);

    if ($miss_type) $c->add(MissionTypePeer::NAME, $miss_type.'%', Criteria::LIKE);

    if($miss_date1 !=null && $miss_date2 !=null){
      $criterion = $c->getNewCriterion(self::MISSION_DATE, date('Y-m-d', strtotime($miss_date1)).' 00:00:00', Criteria::GREATER_EQUAL);
      $criterion->addAnd($c->getNewCriterion(self::MISSION_DATE, date('Y-m-d', strtotime($miss_date2)).' 00:00:00', Criteria::LESS_EQUAL));
      $c->add($criterion);
    }elseif($miss_date1){
      $c->add(self::MISSION_DATE, date('Y-m-d', strtotime($miss_date1)).' 00:00:00', Criteria::GREATER_EQUAL);
    }elseif($miss_date2){
      $c->add(self::MISSION_DATE, date('Y-m-d', strtotime($miss_date2)).' 00:00:00', Criteria::LESS_EQUAL);
    }
                      
    if ($pass_fname) $c->add(PersonPeer::alias("p1", PersonPeer::FIRST_NAME), $pass_fname.'%', Criteria::LIKE);
    if ($pass_lname) $c->add(PersonPeer::alias("p1", PersonPeer::LAST_NAME), $pass_lname.'%', Criteria::LIKE);
    
    if ($mreq_fname) $c->add(PersonPeer::alias("p2", PersonPeer::FIRST_NAME), $mreq_fname.'%', Criteria::LIKE);
    if ($mreq_lname) $c->add(PersonPeer::alias("p2", PersonPeer::LAST_NAME), $mreq_lname.'%' , Criteria::LIKE);

//    $sort_date = time();
//    $mis = self::MISSION_DATE;
//    echo $mis;die;
    //$c->add
    self::addSelectColumns($c);
    $c->addAsColumn("sort_order", "ABS(DATEDIFF(COALESCE(".self::MISSION_DATE.", \"1970-01-01\"), NOW()))");
    $c->addAscendingOrderByColumn('sort_order');

    $pager = new sfPropelPager('Mission', $max);
    $pager->setCriteria($c);
    $pager->setPage($page);
    $pager->init();
    return $pager;
  }

  public static function getMedicalPager(
  $max = 10,
  $page = 1,
  $miss_date1 = null,
  $miss_date2 = null,
  $passenger = null,
  $out_off_date = null,
  $current = null,
  $campers = null
  )
  {
    $c = new Criteria();

    $c->addJoin(self::MISSION_TYPE_ID,MissionTypePeer::ID,Criteria::LEFT_JOIN);
    $c->addJoin(self::PASSENGER_ID,PassengerPeer::ID,Criteria::LEFT_JOIN);
    $c->addJoin(self::CAMP_ID,CampPeer::ID,Criteria::LEFT_JOIN);

    $c->addJoin(PassengerPeer::PERSON_ID,PersonPeer::ID,Criteria::LEFT_JOIN );
    //    $c->addJoin(MemberPeer::PERSON_ID,PersonPeer::ID,Criteria::LEFT_JOIN);
    //    $c->add(WingPeer::ID,MemberPeer::WING_ID,Criteria::LEFT_JOIN);
          
    if($miss_date1) $miss_date1 = date('Y-m-d', strtotime($miss_date1));
    if($miss_date2) $miss_date2 = date('Y-m-d', strtotime($miss_date2));
    //echo 'asdf'.$miss_date1;die();
    if($miss_date1 && $miss_date2){
      $criterion = $c->getNewCriterion(self::MISSION_DATE, $miss_date1, Criteria::GREATER_EQUAL);
      $criterion->addAnd($c->getNewCriterion(self::MISSION_DATE, $miss_date2, Criteria::LESS_EQUAL));
      $c->add($criterion);
    }elseif($miss_date1){
       $c->add(self::MISSION_DATE , $miss_date1, Criteria::GREATER_EQUAL);
    }elseif($miss_date2){
       $c->add(self::MISSION_DATE , $miss_date1, Criteria::LESS_EQUAL);
    }

//    if ($wing){
//      $w           = WingPeer::retrieveByPK($wing);
//      $wing_state  = $w->getState();
//      $airport_ids = AirportPeer::getIdsByState($wing_state);
//      $c->addJoin(self::ID, MissionLegPeer::MISSION_ID);
//      $c1 = $c->getNewCriterion(MissionLegPeer::FROM_AIRPORT_ID, $airport_ids, Criteria::IN);
//      $c2 = $c->getNewCriterion(MissionLegPeer::TO_AIRPORT_ID, $airport_ids, Criteria::IN);
//      $c->add($c1->addOr($c2));
//      //$criterion = $c->getNewCriterion(self::ID, MissionLegPeer::MISSION_ID, Criteria::LEFT_JOIN);
//    } //$c->add(WingPeer::ID , $wing_name, Criteria::LIKE);
    if ($passenger) $c->add(PersonPeer::LAST_NAME  , $passenger.'%', Criteria::LIKE);
    if ($out_off_date) $c->add(self::MISSION_DATE, date('y/m/d'), Criteria::GREATER_THAN);
    if ($current)$c->add(self::MISSION_DATE , date('y/m/d'), Criteria::LESS_THAN);
    if ($campers){
      $c->add(self::CAMP_ID,NULL,Criteria::ISNOTNULL);
    }else{
      $c->add(self::CAMP_ID,NULL,Criteria::ISNULL);
    }
    //$c->add(PassengerPeer::MEDICAL_RELEASE_RECEIVED, PassengerPeer::MEDICAL_RELEASE_RECEIVED.' > DATE_FORMAT( DATE_SUB( NOW( \'Y/m/d\' ),INTERVAL 1 YEAR ) , \'%Y %m %d\' )', Criteria::CUSTOM);
    //$c->addAnd(PassengerPeer::MEDICAL_RELEASE_RECEIVED, PassengerPeer::MEDICAL_RELEASE_RECEIVED.' <= NOW()', Criteria::CUSTOM);
    //$c->add(PassengerPeer::MEDICAL_RELEASE_RECEIVED, 'DATEDIFF( NOW( \'Y/m/d\' ),'.PassengerPeer::MEDICAL_RELEASE_RECEIVED.') > 365', Criteria::CUSTOM);
    $c->add(PassengerPeer::MEDICAL_RELEASE_RECEIVED, 'TIMESTAMPDIFF(YEAR, '.PassengerPeer::MEDICAL_RELEASE_RECEIVED.', NOW( \'Y/m/d\' )) >= 1', Criteria::CUSTOM);
    
    $c->add(self::MISSION_DATE, null, Criteria::ISNOTNULL);
    $c->addDescendingOrderByColumn(self::MISSION_DATE);

    $pager = new sfPropelPager('Mission', $max);
    $pager->setCriteria($c);
    $pager->setPage($page);
    $pager->init();
    return $pager;
  }


  public static function getByRequestId($id){
    $c = new Criteria();

    $c->addAscendingOrderByColumn(self::REQUEST_ID);
    $c->add(self::REQUEST_ID,$id);

    return self::doSelectOne($c);
  }

  public static function getByItineraryId($id){
    $c = new Criteria();

    $c->addAscendingOrderByColumn(self::ITINERARY_ID);
    $c->add(self::ITINERARY_ID,$id);

    return self::doSelectOne($c);
  }
  public static function getByMayInterested($airport = null, $min_efficiency = 85){
    $c = new Criteria();
    $c->add(self::APPT_DATE, null, Criteria::ISNOTNULL);
    $c->add(self::MISSION_DATE, null, Criteria::ISNOTNULL);
    $c->add(self::CANCEL_MISSION, 1);
    $c->add(self::MISSION_DATE, date("Y/m/d",strtotime("now")), Criteria::GREATER_EQUAL);
    $c->addAnd(self::MISSION_DATE, date("Y/m/d",strtotime("+1 year")), Criteria::LESS_EQUAL);
    if($min_efficiency && $airport){
      $c->addJoin(self::ID, MissionLegPeer::MISSION_ID, Criteria::INNER_JOIN);
      $c->addJoin(MissionLegPeer::ID, PilotRequestPeer::LEG_ID, Criteria::LEFT_JOIN);
      $c->addJoin(MissionPeer::ITINERARY_ID, ItineraryPeer::ID, Criteria::INNER_JOIN);
      $c->add(MissionLegPeer::MISSION_REPORT_ID, null, Criteria::ISNULL);
      $c->addAlias('from_air', AirportPeer::TABLE_NAME);
      $c->addAlias('to_air', AirportPeer::TABLE_NAME);
      $c->addJoin(MissionLegPeer::FROM_AIRPORT_ID, AirportPeer::alias('from_air', AirportPeer::ID), Criteria::INNER_JOIN);
      $c->addJoin(MissionLegPeer::TO_AIRPORT_ID, AirportPeer::alias('to_air', AirportPeer::ID), Criteria::INNER_JOIN);
      $c->addAnd(MissionPeer::ID, "
      CEILING(ROUND(ACOS(SIN(RADIANS(from_air.latitude))
      *SIN(RADIANS(to_air.latitude))+COS(RADIANS(from_air.latitude))
      *COS(RADIANS(to_air.latitude))*COS(RADIANS(from_air.longitude)-RADIANS(to_air.longitude)))
      *((180*60)/PI()))/(ROUND(ACOS(SIN(RADIANS(from_air.latitude))
      *SIN(RADIANS(to_air.latitude))+COS(RADIANS(from_air.latitude))
      *COS(RADIANS(to_air.latitude))
      *
      COS(RADIANS(from_air.longitude)-RADIANS(to_air.longitude))
        ) * ((180*60)/PI())
      )
      +
      ROUND(
        ACOS(
          SIN(RADIANS({$airport->getLatitude()}))
          *
          SIN(RADIANS(to_air.latitude))
          +
          COS(RADIANS({$airport->getLatitude()}))
          *
          COS(RADIANS(to_air.latitude))
          *
          COS(RADIANS({$airport->getLongitude()})-RADIANS(to_air.longitude))
        ) * ((180*60)/PI())
      )
      +
      ROUND(
        ACOS(
          SIN(RADIANS({$airport->getLatitude()}))
          *
          SIN(RADIANS(from_air.latitude))
          +
          COS(RADIANS({$airport->getLatitude()}))
          *
          COS(RADIANS(from_air.latitude))
          *
          COS(RADIANS({$airport->getLongitude()})-RADIANS(from_air.longitude))
        ) * ((180*60)/PI()))) * 200) >= ".$min_efficiency, Criteria::CUSTOM);
        $c->add(MissionLegPeer::CANCELLED, null, Criteria::ISNULL);
    }
    $c->setDistinct(self::ID);
    $c->addAscendingOrderByColumn(self::MISSION_DATE);    
    $c->setLimit(3);
    return self::doSelect($c);
  }
  public static function getByCampId($camp_id){
    $c = new Criteria();
    $c->add(self::CAMP_ID,$camp_id);

    return self::doSelect($c);
  }

  public static function getLatestExternalId(){
    // External Id Block
    $c = new Criteria();
    $c->add(MissionPeer::EXTERNAL_ID, NULL, Criteria::ISNOTNULL);
    $c->addDescendingOrderByColumn(MissionPeer::ID);
    $external_mission = MissionPeer::doSelectOne($c);
    unset($c);
    return ($external_mission->getExternalId() + 1);
  }

  public static function getByMayInterestedWithCamp(){
    $c = new Criteria();

    $c->addJoin(self::CAMP_ID,CampPeer::ID,Criteria::LEFT_JOIN);
    $c->add(self::CAMP_ID,NULL,Criteria::ISNOTNULL);

    $c->setLimit(3);
    return self::doSelect($c);
  }

  public static function getByItiId($id){
    $c = new Criteria();
    
    $c->add(self::ITINERARY_ID, $id);
    $c->addAscendingOrderByColumn(self::ITINERARY_ID);

    return self::doSelect($c);
  }
  public static function getByFilters
  (
  $miss_date1 = null,
  $miss_date2 = null,
  $wing_name = null,
  $passenger = null,
  $out_off_date = null,
  $current = null,
  $campers = null
  )
  {
    $c = new Criteria();

    $c->addJoin(self::MISSION_TYPE_ID,MissionTypePeer::ID,Criteria::LEFT_JOIN);
    $c->addJoin(self::PASSENGER_ID,PassengerPeer::ID,Criteria::LEFT_JOIN);

    $c->addJoin(self::CAMP_ID,CampPeer::ID,Criteria::LEFT_JOIN);

    $c->addJoin(PassengerPeer::PERSON_ID,PersonPeer::ID,Criteria::LEFT_JOIN );

    //    $c->addJoin(MemberPeer::PERSON_ID,PersonPeer::ID,Criteria::LEFT_JOIN);
    //    $c->add(WingPeer::ID,MemberPeer::WING_ID,Criteria::LEFT_JOIN);

    if($miss_date1 !=null && $miss_date2 !=null){
      $criterion = $c->getNewCriterion(self::MISSION_DATE, date('Y-m-d', strtotime($miss_date1)), Criteria::GREATER_EQUAL);
      $criterion->addAnd($c->getNewCriterion(self::MISSION_DATE, date('Y-m-d', strtotime($miss_date2)), Criteria::LESS_EQUAL));
      $c->add($criterion);
    }

    //    if ($wing) $c->add(WingPeer::NAME , '%'.$wing.'%', Criteria::LIKE);
    if ($passenger)$c->add(PersonPeer::LAST_NAME  , $passenger.'%', Criteria::LIKE);

    if ($out_off_date) $c->add(self::MISSION_DATE, date('y/m/d'), Criteria::GREATER_THAN);
    if ($current)$c->add(self::MISSION_DATE , date('y/m/d'), Criteria::LESS_THAN);
    if ($campers)$c->add(self::CAMP_ID,NULL,Criteria::ISNOTNULL);

    $c->addAscendingOrderByColumn(self::MISSION_DATE);

    return self::doSelect($c);
  }

  public static function getSummaryPager($pilot_id, $max = 10, $page = 1, $past = false)
  {
    $c = new Criteria();
    $c->addJoin(self::ID, MissionLegPeer::MISSION_ID, Criteria::LEFT_JOIN);
    $c->add(MissionLegPeer::PILOT_ID, $pilot_id);
    $c->add(MissionLegPeer::CANCELLED, null, Criteria::ISNULL);
    $c->add(MissionLegPeer::TRANSPORTATION, 'air_mission');
    if ($past == true) {
      $c->add(self::MISSION_DATE, date('Y-m-d H:i:s'), Criteria::LESS_THAN);
    }else{
      $c->add(self::MISSION_DATE, date('Y-m-d H:i:s'), Criteria::GREATER_EQUAL);
    }
    $c->addDescendingOrderByColumn(self::MISSION_DATE);

    $pager = new sfPropelPager('MissionLeg', $max);
    $pager->setCriteria($c);
    $pager->setPage($page);
    $pager->init();
    return $pager;
  }


  /**
   * Number of missions which have not coordinated and will be flown in 2 days
   * @return int
   */
  public static function countNoPilotIn2Days()
  {
    $query = "SELECT COUNT(DISTINCT(mission.id)) FROM mission";
    $query .= " LEFT JOIN mission_leg ON mission.id=mission_leg.mission_id";
    $query .= " LEFT JOIN pilot_request ON mission_leg.id=pilot_request.leg_id";
    $query .= " WHERE pilot_request.id IS NULL AND mission_leg.pilot_id IS NULL AND mission.mission_date>=NOW() AND mission.mission_date<='".date('Y-m-d H:i:s', time()+2*86400)."'";
    $con = Propel::getConnection(self::DATABASE_NAME);
    $stmt = $con->prepare($query);
    $stmt->execute();

    if($rs = $stmt->fetch(PDO::FETCH_NUM)) {
      $count = (int)$rs[0];
    }else{
      $count = 0;
    }

    return $count;
  }

  public static function getCampPilotDates($camp_id, $pilot_id)
  {
    $query = "SELECT DISTINCT date(mission.mission_date) as date FROM mission";
    $query .= " LEFT JOIN mission_leg ON mission.id=mission_leg.mission_id";
    $query .= " WHERE mission.camp_id=? AND mission_leg.pilot_id=? ";
    $con = Propel::getConnection(self::DATABASE_NAME);
    $stmt = $con->prepare($query);
    $stmt->bindValue(1, $camp_id);
    $stmt->bindValue(2, $pilot_id);
    $stmt->execute();

    $dates = array();
    while($stmt->next()){
        $dates[$stmt->getDate('date')] = $stmt->getDate('date');
    }
    return $dates;
  }

  public static function getByCampPass($camp_id, $pass_id){
    $c = new Criteria();
    $c->add(self::CAMP_ID,$camp_id);
    $c->add(self::PASSENGER_ID,$pass_id);

    return self::doSelectOne($c);
  }

  public static function getMissionByItineraryId($itinerary_id, $type){
    $c = new Criteria();
    $c->add(self::ITINERARY_ID, $itinerary_id);
    // Need to analyze again why it was assigned mission count
    $c->add(self::MISSION_COUNT, $type);
    //$c->add(self::MISSION_TYPE_ID, $type);
    
    return self::doSelectOne($c);
  }

  public static function getAllMissionByItineraryId($itinerary_id){
    $c = new Criteria();
    $c->add(self::ITINERARY_ID, $itinerary_id);

    return self::doSelect($c);
  }

  public static function getMissionByItineraryIdCount($itinerary_id){
    $c = new Criteria();
    $c->add(self::ITINERARY_ID, $itinerary_id);

    return self::doCount($c);
  }
}
