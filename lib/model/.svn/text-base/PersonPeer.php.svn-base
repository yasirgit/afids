<?php

class PersonPeer extends BasePersonPeer
{
  /**
   *
   * @param $username
   * @return Person
   */
  public static function getByUsername($username)
  {
    $c = new Criteria();
    $c->add(self::USERNAME, $username);
    return self::doSelectOne($c);
  }

  public static function getByNotPassAuto($name)
  {
    $c = new Criteria();
    $c->addJoin(self::ID, PassengerPeer::PERSON_ID, Criteria::INNER_JOIN);
    //$c->add(PassengerPeer::PERSON_ID, null, Criteria::ISNULL);
    $c->add(self::LAST_NAME, $name.'%', Criteria::LIKE);
    $c->setLimit(10);

    return self::doSelect($c);
  }

  public static function getByNotReqAuto($name)
  {
    $con = Propel::getConnection(self::DATABASE_NAME);

    $c = new Criteria();

    $c->addJoin(self::ID, RequesterPeer::PERSON_ID, Criteria::LEFT_JOIN);
    $c->add(RequesterPeer::PERSON_ID, null, Criteria::ISNULL);
    $c->add(self::FIRST_NAME, "CONCAT(first_name, ' ', last_name) LIKE ".$con->quote($name."%"), Criteria::CUSTOM);

    $c->setLimit(10);

    return self::doSelect($c);
  }

  public static function getByFLStateCity($firstname,$lastname,$state,$city)
  {
    $c = new Criteria();
    $c->add(self::FIRST_NAME, $firstname);
    $c->add(self::LAST_NAME, $lastname);
    $c->add(self::STATE, $state);
    $c->add(self::CITY, $city);
    return self::doSelectOne($c);
  }

  public static function getByLastName($lastname)
  {
    $c = new Criteria();
    $c->add(self::LAST_NAME, $lastname);
    return self::doSelectOne($c);
  }

  public static function getForSelectParent()
  {
    $c = new Criteria();

    $c->addAscendingOrderByColumn(self::ID);
    $c->addAscendingOrderByColumn(self::FIRST_NAME);
    $c->addAscendingOrderByColumn(self::LAST_NAME);

    $persons = self::doSelect($c);
    $arr = array();
    $arr[0] = '-- select --';

    foreach ($persons as $person)
    {
      $arr[$person->getId()] = $person->getLastName();
    }
    return $arr;
  }

  public static function getForSelectLastNames()
  {
    $c = new Criteria();

    $c->addAscendingOrderByColumn(self::ID);
    $c->addAscendingOrderByColumn(self::FIRST_NAME);
    $c->addAscendingOrderByColumn(self::LAST_NAME);

    $persons = self::doSelect($c);
    $arr = array();

    foreach ($persons as $person)
    {
      $arr[$person->getId()] = $person->getLastName();
    }
    return $arr;
  }

  public static function getNotInMember()
  {
    $c = new Criteria();

    $c->addJoin(self::ID, MemberPeer::PERSON_ID, Criteria::LEFT_JOIN);
    $c->add(MemberPeer::PERSON_ID, null, Criteria::ISNULL);

    $persons = self::doSelect($c);
    $arr = array();

    foreach ($persons as $person)
    {
      $arr[$person->getId()] = $person->getLastName();
    }
    return $arr;
  }

  public static function getNotInPassenger()
  {
    $c = new Criteria();
    $c->addJoin(self::ID, PassengerPeer::PERSON_ID, Criteria::LEFT_JOIN);
    $c->add(PassengerPeer::PERSON_ID, null, Criteria::ISNULL);

    $persons = self::doSelect($c);
    $arr = array();
    $arr[0] = '-- select --';

    foreach ($persons as $person)
    {
      $arr[$person->getId()] = $person->getLastName();
    }
    return $arr;
  }
  public static function getNotInRequester()
  {
    //$c = new Criteria();
    //$c->addJoin(self::ID, RequesterPeer::PERSON_ID);
    //$persons = self::doSelectJoinWithRequester($c);
    $conn = Propel::getConnection();
    $query = 'select p.*, r.id as reqid from person as p inner join requester as r on p.id = r.person_id';

    $statement = $conn->prepare($query);
    $statement->execute();
    $persons = $statement->fetchAll(PDO::FETCH_OBJ);

    $arr = array();
    $arr[0] = '-- select --';

    foreach ($persons as $person)
    {
      $arr[$person->reqid] = $person->first_name." ".$person->last_name;
    }
    return $arr;

  }

  public static function getFnames()
  {
    $c = new Criteria();

    $persons = self::doSelect($c);

    $arr = array();

    foreach ($persons as $person)
    {
      $arr[$person->getId()] = $person->getFirstName();
    }
    return $arr;
  }

  public static function retrieveFNames($key)
  {
    $c = new Criteria();
    $c->add(self::FIRST_NAME, $key.'%', Criteria::LIKE);
    $c->addAscendingOrderByColumn(self::ID);

    $fnames = self::doSelect($c);

    $fname_arr = array();

    foreach ($fnames as $fname)
    {
      $fname_arr[$fname->getId()] = $fname->getFirstName();
    }

    return $fname_arr;
  }

  public static function retrieveLNames($key)
  {
    $c = new Criteria();
    $c->add(self::LAST_NAME, $key.'%', Criteria::LIKE);
    $c->addAscendingOrderByColumn(self::ID);

    $lnames = self::doSelect($c);

    $lname_arr = array();

    foreach ($lnames as $lname)
    {
      $lname_arr[$lname->getId()] = $lname->getLastName();
    }

    return $lname_arr;
  }

  /**
   * Searches people by some criteria
   * @param int $max Maximum people per page
   * @param int $page
   * @return sfPropelPager
   */
  public static function getPager(
          $max = 10,
          $page = 1,
          //$is_last = null,
          $firstname = null,
          $lastname = null,
          $gender = null,
          $city = null,
          $state = null,
          $country = null,
          $county = null,
          $deceased = null,
          $deceased_until = null,
          $deceased_after = null,
          $exclude_mailing_list_ids = array()

  )
  {

    //echo $is_last;die();
    $c = new Criteria();
    /*if($is_last == 1){
      //die();
            $c1=$c->getNewCriterion(self::FIRST_NAME, $firstname.'%', Criteria::LIKE);
            $c2=$c->getNewCriterion(self::LAST_NAME, $firstname.'%', Criteria::LIKE);
            //$c->setDistinct(PersonPeer::FIRST_NAME);
            //$c->setDistinct(PersonPeer::LAST_NAME);
            $c->add($c1->addOr($c2));

      $c->addAscendingOrderByColumn(self::FIRST_NAME);

      $pager = new sfPropelPager('Person', $max);
      $pager->setCriteria($c);
      $pager->setPage($page);
      $pager->init();
      return $pager;
    }else{*/
    if ($firstname) $c->add(self::FIRST_NAME, $firstname.'%', Criteria::LIKE);
    if ($lastname) $c->add(self::LAST_NAME, $lastname.'%', Criteria::LIKE);
    if ($gender) $c->add(self::GENDER, $gender);
    if ($city) $c->add(self::CITY, $city.'%', Criteria::LIKE);
    if ($state) $c->add(self::STATE, $state.'%', Criteria::LIKE);
    if ($country) $c->add(self::COUNTRY, $country.'%', Criteria::LIKE);
    if ($county) $c->add(self::COUNTY, $county.'%', Criteria::LIKE);
    if ($deceased)
    {
      $c->add(self::DECEASED, 1);
      if ($deceased_until)
      {
        $c->add(self::DECEASED_DATE, date('Y-m-d', strtotime($deceased_until)), Criteria::LESS_EQUAL);
      } elseif ($deceased_after)
      {
        $c->add(self::DECEASED_DATE, date('Y-m-d', strtotime($deceased_after)), Criteria::GREATER_EQUAL);
      } elseif ($deceased_until && $deceased_after)
      {
        $c1 = $c->getNewCriterion(self::DECEASED_DATE, date('Y-m-d', strtotime($deceased_until)), Criteria::LESS_EQUAL);
        $c2 = $c->getNewCriterion(self::DECEASED_DATE, date('Y-m-d', strtotime($deceased_after)), Criteria::GREATER_EQUAL);
        $c->add($c1->addAnd($c2));
      }
    }

    if (!is_array($exclude_mailing_list_ids)) $exclude_mailing_list_ids = array($exclude_mailing_list_ids);
    if (!empty($exclude_mailing_list_ids))
    {
      $c->addJoin(self::ID, EmailListPersonPeer::PERSON_ID, Criteria::LEFT_JOIN);
      $c1 = $c->getNewCriterion(EmailListPersonPeer::LIST_ID, $exclude_mailing_list_ids, Criteria::NOT_IN);
      $c2 = $c->getNewCriterion(EmailListPersonPeer::ID, null, Criteria::ISNULL);
      $c->add($c1->addOr($c2));
    }

    $c->addAscendingOrderByColumn(self::FIRST_NAME);

    $pager = new sfPropelPager('Person', $max);
    $pager->setCriteria($c);
    $pager->setPage($page);
    $pager->init();
    return $pager;
    //}
  }

  public static function getCriteriaPager(Criteria $c, $max = 10, $page = 1)
  {
    $pager = new sfPropelPager('Person', $max);
    $pager->setCriteria($c);
    $pager->setPage($page);
    $pager->init();
    return $pager;
  }

  public static function getCounties()
  {
    $con = Propel::getConnection(self::DATABASE_NAME);
    $stmt = $con->prepare("SELECT DISTINCT country FROM person");
    $stmt->execute();
    $arr = array();
    while ($v = $stmt->fetch())
    {
      $arr[$v[0]] = $v[0];
    }
    return $arr;

//    $c =  new Criteria();
//
//    $c->addAscendingOrderByColumn(self::ID);
//
//    $persons = self::doSelect($c);
//
//    $arr = array();
//
//    foreach ($persons as $person){
//      if($person->getCountry() != null){
//        $arr[$person->getCountry()] = $person->getCountry();
//      }
//    }
//    return $arr;

  }

  public static function getNotInMemberPager(
          $max = 10,
          $page = 1,
          $firstname = null,
          $lastname = null,
          $gender = null,
          $city = null,
          $state = null,
          $country = null,
          $county = null,
          $deceased = null,
          $deceased_until = null,
          $deceased_after = null,
          $zipcode = null
  )
  {

    $c =  new Criteria();

    $c->addJoin(self::ID, MemberPeer::PERSON_ID, Criteria::LEFT_JOIN);
    $c->add(MemberPeer::PERSON_ID, null, Criteria::ISNULL);

    if ($firstname) $c->add(self::FIRST_NAME, $firstname.'%', Criteria::LIKE);
    if ($lastname) $c->add(self::LAST_NAME, $lastname.'%', Criteria::LIKE);
    if ($gender) $c->add(self::GENDER, $gender);
    if ($city) $c->add(self::CITY, $city.'%', Criteria::LIKE);
    if ($state) $c->add(self::STATE, $state.'%', Criteria::LIKE);
    if ($country) $c->add(self::COUNTRY, $country.'%', Criteria::LIKE);
    if ($zipcode) $c->add(self::ZIPCODE, $zipcode.'%', Criteria::LIKE);
    if ($deceased)
    {
      $c->add(self::DECEASED, 1);
      if ($deceased_until) $c->add(self::DECEASED_DATE, date('Y-m-d', strtotime($deceased_until)), Criteria::LESS_EQUAL);
      if ($deceased_after) $c->add(self::DECEASED_DATE, date('Y-m-d', strtotime($deceased_after)), Criteria::GREATER_EQUAL);
    }

    $c->addAscendingOrderByColumn(self::FIRST_NAME);

    $pager = new sfPropelPager('Person', $max);
    $pager->setCriteria($c);
    $pager->setPage($page);
    $pager->init();
    return $pager;

  }

  public static function getRenewalProcessPager(
          $max = 10,
          $page = 1,
          $firstname = null,
          $lastname = null,
          $gender = null,
          $city = null,
          $state = null,
          $country = null,
          $county = null,
          $deceased = null,
          $deceased_until = null,
          $deceased_after = null,
          $zipcode = null
  )
  {

    $c =  new Criteria();

    if ($firstname) $c->add(self::FIRST_NAME, $firstname.'%', Criteria::LIKE);
    if ($lastname) $c->add(self::LAST_NAME, $lastname.'%', Criteria::LIKE);
    if ($gender) $c->add(self::GENDER, $gender);
    if ($city) $c->add(self::CITY, $city.'%', Criteria::LIKE);
    if ($state) $c->add(self::STATE, $state.'%', Criteria::LIKE);
    if ($country) $c->add(self::COUNTRY, $country.'%', Criteria::LIKE);
    if ($zipcode) $c->add(self::ZIPCODE, $zipcode.'%', Criteria::LIKE);
    if ($deceased)
    {
      $c->add(self::DECEASED, 1);
      if ($deceased_until) $c->add(self::DECEASED_DATE, date('Y-m-d', strtotime($deceased_until)), Criteria::LESS_EQUAL);
      if ($deceased_after) $c->add(self::DECEASED_DATE, date('Y-m-d', strtotime($deceased_after)), Criteria::GREATER_EQUAL);
    }

    $c->addAscendingOrderByColumn(self::FIRST_NAME);

    $pager = new sfPropelPager('Person', $max);
    $pager->setCriteria($c);
    $pager->setPage($page);
    $pager->init();
    return $pager;
  }

  public static function getNotInPassengerPager(
          $max = 10,
          $page = 1,
          $firstname = null,
          $lastname = null,
          $gender = null,
          $city = null,
          $state = null,
          $country = null,
          $county = null,
          $deceased = null,
          $deceased_until = null,
          $deceased_after = null
  )
  {

    $c =  new Criteria();

    $c->addJoin(self::ID,PassengerPeer::PERSON_ID,Criteria::LEFT_JOIN);
    $c->add(PassengerPeer::PERSON_ID, null, Criteria::ISNULL);

    if ($firstname) $c->add(self::FIRST_NAME, $firstname.'%', Criteria::LIKE);
    if ($lastname) $c->add(self::LAST_NAME, $lastname.'%', Criteria::LIKE);
    if ($gender) $c->add(self::GENDER, $gender);
    if ($city) $c->add(self::CITY, $city.'%', Criteria::LIKE);
    if ($state) $c->add(self::STATE, $state.'%', Criteria::LIKE);
    if ($country) $c->add(self::COUNTRY, $country.'%', Criteria::LIKE);
    if ($deceased)
    {
      $c->add(self::DECEASED, 1);
      if ($deceased_until) $c->add(self::DECEASED_DATE, date('Y-m-d', strtotime($deceased_until)), Criteria::LESS_EQUAL);
      if ($deceased_after) $c->add(self::DECEASED_DATE, date('Y-m-d', strtotime($deceased_after)), Criteria::GREATER_EQUAL);
    }

    $c->addAscendingOrderByColumn(self::FIRST_NAME);

    $pager = new sfPropelPager('Person', $max);
    $pager->setCriteria($c);
    $pager->setPage($page);
    $pager->init();
    return $pager;

  }

  public static function getNotInRequesterPager(
          $max = 10,
          $page = 1,
          $firstname = null,
          $lastname = null,
          $gender = null,
          $city = null,
          $state = null,
          $country = null,
          $county = null,
          $deceased = null,
          $deceased_until = null,
          $deceased_after = null
  )
  {

    $c =  new Criteria();

    $c->addJoin(self::ID,RequesterPeer::PERSON_ID,Criteria::LEFT_JOIN);
    $c->add(RequesterPeer::PERSON_ID, null, Criteria::ISNULL);

    if ($firstname) $c->add(self::FIRST_NAME, $firstname.'%', Criteria::LIKE);
    if ($lastname) $c->add(self::LAST_NAME, $lastname.'%', Criteria::LIKE);
    if ($gender) $c->add(self::GENDER, $gender);
    if ($city) $c->add(self::CITY, $city.'%', Criteria::LIKE);
    if ($state) $c->add(self::STATE, $state.'%', Criteria::LIKE);
    if ($country) $c->add(self::COUNTRY, $country.'%', Criteria::LIKE);
    if ($deceased)
    {
      $c->add(self::DECEASED, 1);
      if ($deceased_until) $c->add(self::DECEASED_DATE, date('Y-m-d', strtotime($deceased_until)), Criteria::LESS_EQUAL);
      if ($deceased_after) $c->add(self::DECEASED_DATE, date('Y-m-d', strtotime($deceased_after)), Criteria::GREATER_EQUAL);
    }

    $c->addAscendingOrderByColumn(self::FIRST_NAME);

    $pager = new sfPropelPager('Person', $max);
    $pager->setCriteria($c);
    $pager->setPage($page);
    $pager->init();
    return $pager;

  }

  public static function getFirstNames($name,$type=null)
  {
    $c = new Criteria();

    switch($type)
    {
      case "passenger" :
        $c->addJoin(self::ID, PassengerPeer::PERSON_ID, Criteria::INNER_JOIN);
        break;
      case "companion" :
        $c->addJoin(self::ID, PassengerPeer::PERSON_ID, Criteria::INNER_JOIN);
        $c->addJoin(PassengerPeer::ID, CompanionPeer::PASSENGER_ID, Criteria::INNER_JOIN);
        break;
      case "mission" :
        $c->addJoin(self::ID, PassengerPeer::PERSON_ID, Criteria::INNER_JOIN);
        $c->addJoin(PassengerPeer::ID, MissionPeer::PASSENGER_ID, Criteria::INNER_JOIN);
        break;
      case "missionr" :
        $c->addJoin(self::ID, RequesterPeer::PERSON_ID, Criteria::INNER_JOIN);
        $c->addJoin(RequesterPeer::ID, MissionPeer::REQUESTER_ID, Criteria::INNER_JOIN);
        break;
      case "missionLegP" :
        $c->addJoin(self::ID, PassengerPeer::PERSON_ID, Criteria::INNER_JOIN);
        $c->addJoin(PassengerPeer::ID, MissionPeer::PASSENGER_ID, Criteria::INNER_JOIN);
        $c->addJoin(MissionPeer::ID, MissionLegPeer::MISSION_ID, Criteria::INNER_JOIN);
        break;
      case "missionLegR" :
        $c->addJoin(self::ID, RequesterPeer::PERSON_ID, Criteria::INNER_JOIN);
        $c->addJoin(RequesterPeer::ID, MissionPeer::REQUESTER_ID, Criteria::INNER_JOIN);
        $c->addJoin(MissionPeer::ID, MissionLegPeer::MISSION_ID, Criteria::INNER_JOIN);
        break;
      case "missionLegPi" :
        $c->addJoin(self::ID, MemberPeer::PERSON_ID, Criteria::INNER_JOIN);
        $c->addJoin(MemberPeer::ID, PilotPeer::MEMBER_ID, Criteria::INNER_JOIN);
        $c->addJoin(PilotPeer::ID, MissionLegPeer::PILOT_ID, Criteria::INNER_JOIN);
        break;
      case "requester" :
        $c->addJoin(self::ID, RequesterPeer::PERSON_ID, Criteria::INNER_JOIN);
        break;
      case "pilot" :
        $c->addJoin(self::ID, MemberPeer::PERSON_ID, Criteria::INNER_JOIN);
        $c->addJoin(MemberPeer::ID, PilotPeer::MEMBER_ID, Criteria::INNER_JOIN);
        break;
      case "member" :
        $c->addJoin(self::ID, MemberPeer::PERSON_ID, Criteria::INNER_JOIN);
        break;
      case "contact" :
         $c->addJoin(self::ID, ContactPeer::PERSON_ID, Criteria::INNER_JOIN);
        break;
      case "notmember" :
        $c->addJoin(self::ID, MemberPeer::PERSON_ID, Criteria::LEFT_JOIN);
        $c->add(MemberPeer::PERSON_ID, null, Criteria::ISNULL);
        break;
      case "itiPass" :
        $c->addJoin(self::ID, PassengerPeer::PERSON_ID);
        $c->addJoin(PassengerPeer::ID, ItineraryPeer::PASSENGER_ID);
        break;
      case "itiReq" :
        $c->addJoin(self::ID, RequesterPeer::PERSON_ID);
        $c->addJoin(RequesterPeer::ID, ItineraryPeer::REQUESTER_ID);
        break;
      case "NoPassenger" :
        $c->addJoin(self::ID, PassengerPeer::PERSON_ID, Criteria::LEFT_JOIN);
        $c->add(PassengerPeer::PERSON_ID, null, Criteria::ISNULL);
        break;
      case "NoRequester" :
        $c->addJoin(self::ID, RequesterPeer::PERSON_ID, Criteria::LEFT_JOIN);
        $c->add(RequesterPeer::ID, null, Criteria::ISNULL);
        break;
    }

    /*
    if($type)
    {//
      if($type=="passenger")
      {
        $c->addJoin(self::ID, PassengerPeer::PERSON_ID, Criteria::INNER_JOIN);
      }elseif($type == "companion")
      {
        $c->addJoin(self::ID, PassengerPeer::PERSON_ID, Criteria::INNER_JOIN);
        $c->addJoin(PassengerPeer::ID, CompanionPeer::PASSENGER_ID, Criteria::INNER_JOIN);
      }elseif($type == 'mission')
      {
        $c->addJoin(self::ID, PassengerPeer::PERSON_ID, Criteria::INNER_JOIN);
        $c->addJoin(PassengerPeer::ID, MissionPeer::PASSENGER_ID, Criteria::INNER_JOIN);
      }elseif($type == 'missionr')
      {
        $c->addJoin(self::ID, RequesterPeer::PERSON_ID, Criteria::INNER_JOIN);
        $c->addJoin(RequesterPeer::ID, MissionPeer::REQUESTER_ID, Criteria::INNER_JOIN);
      }elseif($type == 'missionLegP')
      {
        $c->addJoin(self::ID, PassengerPeer::PERSON_ID, Criteria::INNER_JOIN);
        $c->addJoin(PassengerPeer::ID, MissionPeer::PASSENGER_ID, Criteria::INNER_JOIN);
        $c->addJoin(MissionPeer::ID, MissionLegPeer::MISSION_ID, Criteria::INNER_JOIN);
      }elseif($type == 'missionLegR')
      {
        $c->addJoin(self::ID, RequesterPeer::PERSON_ID, Criteria::INNER_JOIN);
        $c->addJoin(RequesterPeer::ID, MissionPeer::REQUESTER_ID, Criteria::INNER_JOIN);
        $c->addJoin(MissionPeer::ID, MissionLegPeer::MISSION_ID, Criteria::INNER_JOIN);
      }elseif($type == 'missionLegPi')
      {
        $c->addJoin(self::ID, MemberPeer::PERSON_ID, Criteria::INNER_JOIN);
        $c->addJoin(MemberPeer::ID, PilotPeer::MEMBER_ID, Criteria::INNER_JOIN);
        $c->addJoin(PilotPeer::ID, MissionLegPeer::PILOT_ID, Criteria::INNER_JOIN);
      }elseif($type == 'requester')
      {
        $c->addJoin(self::ID, RequesterPeer::PERSON_ID, Criteria::INNER_JOIN);
      }elseif($type == 'pilot')
      {
        $c->addJoin(self::ID, MemberPeer::PERSON_ID, Criteria::INNER_JOIN);
        $c->addJoin(MemberPeer::ID, PilotPeer::MEMBER_ID, Criteria::INNER_JOIN);
      }elseif($type == 'member')
      {
        $c->addJoin(self::ID, MemberPeer::PERSON_ID, Criteria::INNER_JOIN);
      }elseif($type == 'contact')
      {
        $c->addJoin(self::ID, ContactPeer::PERSON_ID, Criteria::INNER_JOIN);
      }elseif($type == 'notmember')
      {
        $c->addJoin(self::ID, MemberPeer::PERSON_ID, Criteria::LEFT_JOIN);
        $c->add(MemberPeer::PERSON_ID, null, Criteria::ISNULL);
      }elseif($type == 'itiPass')
      {
        $c->addJoin(self::ID, PassengerPeer::PERSON_ID);
        $c->addJoin(PassengerPeer::ID, ItineraryPeer::PASSENGER_ID);
      }elseif($type == 'itiReq')
      {
        $c->addJoin(self::ID, RequesterPeer::PERSON_ID);
        $c->addJoin(RequesterPeer::ID, ItineraryPeer::REQUESTER_ID);
      }elseif($type == 'NoPassenger')
      {
        $c->addJoin(self::ID, PassengerPeer::PERSON_ID, Criteria::LEFT_JOIN);
        $c->add(PassengerPeer::PERSON_ID, null, Criteria::ISNULL);
      }elseif($type == 'NoRequester')
      {
        $c->addJoin(self::ID, RequesterPeer::PERSON_ID, Criteria::LEFT_JOIN);
        $c->addJoin(RequesterPeer::PERSON_ID, null, Criteria::ISNULL);
      }
    }
     */
    $name = mysql_escape_string($name);
    $c->clearSelectColumns();
    $c->add(self::FIRST_NAME, $name.'%', Criteria::LIKE);
    $c->addSelectColumn(self::FIRST_NAME);
    $c->setDistinct();
    
    $c->setLimit(10);

    //return $c;
    //die();
    
    return self::doSelectStmt($c);
  }

  public static function getLastNames($name,$type=null)
  {
    $c = new Criteria();
    if($type)
    {
      if($type=="passenger")
      {
        $c->addJoin(self::ID, PassengerPeer::PERSON_ID, Criteria::INNER_JOIN);
      }elseif ($type=="companion")
      {
        $c->addJoin(self::ID, PassengerPeer::PERSON_ID, Criteria::INNER_JOIN);
        $c->addJoin(PassengerPeer::ID, CompanionPeer::PASSENGER_ID);
      }elseif($type == 'mission')
      {
        $c->addJoin(self::ID, PassengerPeer::PERSON_ID, Criteria::INNER_JOIN);
        $c->addJoin(PassengerPeer::ID, MissionPeer::PASSENGER_ID, Criteria::INNER_JOIN);
      }elseif($type == 'missionr')
      {
        $c->addJoin(self::ID, RequesterPeer::PERSON_ID, Criteria::INNER_JOIN);
        $c->addJoin(RequesterPeer::ID, MissionPeer::REQUESTER_ID, Criteria::INNER_JOIN);
      }elseif($type == 'missionLegP')
      {
        $c->addJoin(self::ID, PassengerPeer::PERSON_ID, Criteria::INNER_JOIN);
        $c->addJoin(PassengerPeer::ID, MissionPeer::PASSENGER_ID, Criteria::INNER_JOIN);
        $c->addJoin(MissionPeer::ID, MissionLegPeer::MISSION_ID, Criteria::INNER_JOIN);
      }elseif($type == 'missionLegR')
      {
        $c->addJoin(self::ID, RequesterPeer::PERSON_ID, Criteria::INNER_JOIN);
        $c->addJoin(RequesterPeer::ID, MissionPeer::REQUESTER_ID, Criteria::INNER_JOIN);
        $c->addJoin(MissionPeer::ID, MissionLegPeer::MISSION_ID, Criteria::INNER_JOIN);
      }elseif($type == 'missionLegPi')
      {
        $c->addJoin(self::ID, MemberPeer::PERSON_ID, Criteria::INNER_JOIN);
        $c->addJoin(MemberPeer::ID, PilotPeer::MEMBER_ID, Criteria::INNER_JOIN);
        $c->addJoin(PilotPeer::ID, MissionLegPeer::PILOT_ID, Criteria::INNER_JOIN);
      }elseif($type == 'requester')
      {
        $c->addJoin(self::ID, RequesterPeer::PERSON_ID, Criteria::INNER_JOIN);
      }elseif($type == 'pilot')
      {
        $c->addJoin(self::ID, MemberPeer::PERSON_ID, Criteria::INNER_JOIN);
        $c->addJoin(MemberPeer::ID, PilotPeer::MEMBER_ID, Criteria::INNER_JOIN);
      }elseif($type == 'member')
      {
        $c->addJoin(self::ID, MemberPeer::PERSON_ID, Criteria::INNER_JOIN);
      }elseif($type == 'contact')
      {
        $c->addJoin(self::ID, ContactPeer::PERSON_ID, Criteria::INNER_JOIN);
      }elseif($type == 'notmember')
      {
        $c->addJoin(self::ID, MemberPeer::PERSON_ID, Criteria::LEFT_JOIN);
        $c->add(MemberPeer::PERSON_ID, null, Criteria::ISNULL);
      }elseif($type == 'itiPass')
      {
        $c->addJoin(self::ID, PassengerPeer::PERSON_ID);
        $c->addJoin(PassengerPeer::ID, ItineraryPeer::PASSENGER_ID);
      }elseif($type == 'itiReq')
      {
        $c->addJoin(self::ID, RequesterPeer::PERSON_ID);
        $c->addJoin(RequesterPeer::ID, ItineraryPeer::REQUESTER_ID);
      }elseif($type == 'NoPassenger')
      {
        $c->addJoin(self::ID, PassengerPeer::PERSON_ID, Criteria::LEFT_JOIN);
        $c->add(PassengerPeer::PERSON_ID, null, Criteria::ISNULL);
      }elseif($type == 'NoRequester')
      {
        $c->addJoin(self::ID, RequesterPeer::PERSON_ID, Criteria::LEFT_JOIN);
        $c->add(RequesterPeer::PERSON_ID, null, Criteria::ISNULL);
      }
    }

    $name = mysql_escape_string($name);
    $c->clearSelectColumns();
    $c->addSelectColumn(self::LAST_NAME);
    $c->add(self::LAST_NAME, $name.'%', Criteria::LIKE);
    $c->setDistinct();
    $c->setLimit(10);

    return self::doSelectStmt($c);
  }
}
