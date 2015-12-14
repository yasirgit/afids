<?php

class PilotPeer extends BasePilotPeer
{
  public static function getPager(
  $max = 10,
  $page = 1,
  $firstname = null,
  $lastname = null,
  $city = null,
  $state = null,
  $wing_name = null,
  $flight_status = null,
  $available= null,
  $identifier = null,
  $ifr_rated = null,
  $n_number = null,
  $make= null,
  $model= null,
  $hseat_status= null,
  $transplant= null
  )
  {
    $c = new Criteria();

    $c->addJoin(self::MEMBER_ID,MemberPeer::ID,Criteria::LEFT_JOIN);
    $c->addJoin(MemberPeer::PERSON_ID,PersonPeer::ID, Criteria::LEFT_JOIN);

    $c->addJoin(self::PRIMARY_AIRPORT_ID,AirportPeer::ID,Criteria::LEFT_JOIN);
    $c->addJoin(AirportPeer::WING_ID,WingPeer::ID,Criteria::LEFT_JOIN);

    $c->addJoin(MemberPeer::ID,PilotAircraftPeer::MEMBER_ID,Criteria::LEFT_JOIN);
    $c->addJoin(PilotAircraftPeer::AIRCRAFT_ID,AircraftPeer::ID,Criteria::LEFT_JOIN);

    if ($firstname) $c->add(PersonPeer::FIRST_NAME, $firstname.'%', Criteria::LIKE);
    if ($lastname) $c->add(PersonPeer::LAST_NAME, $lastname.'%', Criteria::LIKE);
    if ($city) $c->add(PersonPeer::CITY, $city.'%', Criteria::LIKE);
    if ($state) $c->add(PersonPeer::STATE, $state.'%', Criteria::LIKE);

    if ($wing_name) $c->add(WingPeer::NAME, $wing_name.'%', Criteria::LIKE);
    if ($flight_status) $c->add(MemberPeer::FLIGHT_STATUS, $flight_status.'%', Criteria::LIKE);
    if ($available) $c->add(MemberPeer::ACTIVE, $available.'%', Criteria::LIKE);
    if ($identifier) $c->add(AirportPeer::IDENT, $identifier.'%', Criteria::LIKE);
    if ($ifr_rated) $c->add(self::IFR, $ifr_rated.'%', Criteria::LIKE);
    if ($n_number) $c->add(PilotAircraftPeer::IFR, $n_number.'%', Criteria::LIKE);

    if ($make) $c->add(AircraftPeer::MAKE, $make.'%', Criteria::LIKE);
    if ($model) $c->add(AircraftPeer::MODEL, $model.'%', Criteria::LIKE);
    if ($hseat_status) $c->add(self::HSEAT, $hseat_status.'%', Criteria::LIKE);
    if ($transplant) $c->add(self::TRANSPLANT, $transplant.'%', Criteria::LIKE);

    $c->addAscendingOrderByColumn(PersonPeer::FIRST_NAME);

    $pager = new sfPropelPager('Pilot', $max);
    $pager->setCriteria($c);
    $pager->setPage($page);
    $pager->init();
    return $pager;
  }

  public static function getByAirportId($airport_id)
  {
    $c = new Criteria();

    $c->add(self::PRIMARY_AIRPORT_ID ,$airport_id);
    $c->addAscendingOrderByColumn(self::LICENSE_TYPE);

    return self::doSelectOne($c);
  }

  public static function getByMemberId($member_id)
  {
    $c = new Criteria();

    $c->add(self::MEMBER_ID ,$member_id);
    $c->addAscendingOrderByColumn(self::LICENSE_TYPE);

    return self::doSelectOne($c);
  }

  public static function getByCoordinatorName($coordinator_name)
  {
     $sqlPilot = "SELECT person.first_name,person.last_name,member.id FROM person,member ";
     $sqlPilot .="WHERE person.id=member.person_id AND person.first_name LIKE '$coordinator_name%'";
     $con = Propel::getConnection();
     $coordinators = $con->prepare($sqlPilot);
     $coordinators->execute();
     $row = array();
     while($row[] = $coordinators->fetch(PDO::FETCH_ASSOC)) ;
     return $row;
  }

  public static function getByPilotName($pilot_name)
  {
    
     $sqlPilot = "SELECT person.first_name,person.last_name,pilot.id FROM person,pilot,member ";
     $sqlPilot .="WHERE person.id=member.person_id AND pilot.member_id=member.id AND person.first_name LIKE '$pilot_name%'";
     $con = Propel::getConnection();
     $pilots = $con->prepare($sqlPilot);
     $pilots->execute();
     $row = array();
     while($row[] = $pilots->fetch(PDO::FETCH_ASSOC)) ;
     return $row;
  } 

  public static function getByBackupPilotName($backup_pilot_name)
  {

     $sqlPilot = "SELECT person.first_name,person.last_name,pilot.id FROM person,pilot,member ";
     $sqlPilot .="WHERE person.id=member.person_id AND pilot.member_id=member.id AND person.first_name LIKE '$backup_pilot_name%'";
     $con = Propel::getConnection();
     $pilots = $con->prepare($sqlPilot);
     $pilots->execute();
     $row = array();
     while($row[] = $pilots->fetch(PDO::FETCH_ASSOC)) ;
     return $row;
  }

  public static function getByBackupCopilotName($backup_pilot_name)
  {

     $sqlPilot = "SELECT person.first_name,person.last_name,member.id FROM person,pilot,member ";
     $sqlPilot .="WHERE person.id=member.person_id AND pilot.member_id=member.id AND person.first_name LIKE '$backup_pilot_name%'";
     $con = Propel::getConnection();
     $pilots = $con->prepare($sqlPilot);
     $pilots->execute();
     $row = array();
     while($row[] = $pilots->fetch(PDO::FETCH_ASSOC)) ;
     return $row;
  }

  public static function getByCopilotName($copilot_name)
  {

     $sqlPilot = "SELECT person.first_name,person.last_name,member.id FROM person,pilot,member ";
     $sqlPilot .="WHERE person.id=member.person_id AND pilot.member_id=member.id AND person.first_name LIKE '$copilot_name%'";
     $con = Propel::getConnection();
     $pilots = $con->prepare($sqlPilot);
     $pilots->execute();
     $row = array();
     while($row[] = $pilots->fetch(PDO::FETCH_ASSOC)) ;
     return $row;
  }
  public static function getByMissionAssistantsName($mission_assistants_name)
  {
     $sqlPilot = "SELECT person.first_name,person.last_name,member.id FROM person,pilot,member ";
     $sqlPilot .="WHERE person.id=member.person_id AND pilot.member_id=member.id AND person.first_name LIKE '$mission_assistants_name%'";
     $con = Propel::getConnection();
     $pilots = $con->prepare($sqlPilot);
     $pilots->execute();
     $row = array();
     while($row[] = $pilots->fetch(PDO::FETCH_ASSOC)) ;
     return $row;
  }
  

  public static function getByBackupMissionAssistantsName($backup_mission_assistants_name)
  {

     $sqlPilot = "SELECT person.first_name,person.last_name,member.id FROM person,pilot,member ";
     $sqlPilot .="WHERE person.id=member.person_id AND pilot.member_id=member.id AND person.first_name LIKE '$backup_mission_assistants_name%'";
     $con = Propel::getConnection();
     $pilots = $con->prepare($sqlPilot);
     $pilots->execute();
     $row = array();
     while($row[] = $pilots->fetch(PDO::FETCH_ASSOC)) ;
     return $row;
  }
  
  
  public static function getMopPager($wing_id, $max = 10, $page = 1 , $flag , $ispilot )
  {
    if($ispilot == 1){
        $c = new Criteria();
        $c->addJoin(PilotPeer::MEMBER_ID, MemberPeer::ID, Criteria::LEFT_JOIN);
        $c->addJoin(MemberPeer::PERSON_ID, PersonPeer::ID, Criteria::LEFT_JOIN);
        $c->add(MemberPeer::ACTIVE,1);        
        $c->add(MemberPeer::WING_ID, $wing_id);
        $c->add(PilotPeer::MOP_ORIENTED_DATE,NULL,Criteria::ISNOTNULL );
        $c->add(PilotPeer::MOP_ACTIVE_STATUS, 1, Criteria::EQUAL);
        $c->addAscendingOrderByColumn(PersonPeer::FIRST_NAME);
        $pager = new sfPropelPager('Pilot', $max);
        $pager->setCriteria($c);
        $pager->setPeerMethod('doSelectJoinMember');
        $pager->setPage($page);
        $pager->init();
    }
    else{
        $c = new Criteria();
        $c->addJoin(PilotPeer::MEMBER_ID, MemberPeer::ID, Criteria::LEFT_JOIN);
        $c->addJoin(MemberPeer::PERSON_ID, PersonPeer::ID, Criteria::LEFT_JOIN);
        $c->add(MemberPeer::ACTIVE,1);
        if($flag == 1){            
            $c->add(PilotPeer::MOP_ORIENTED_DATE,NULL,Criteria::ISNULL);
        }
        else{            
            $c->add(MemberPeer::WING_ID, $wing_id);
            $c->add(PilotPeer::MOP_ORIENTED_DATE,NULL,Criteria::ISNOTNULL );
        }
        $c->addAscendingOrderByColumn(PersonPeer::FIRST_NAME);
        $pager = new sfPropelPager('Pilot', $max);
        $pager->setCriteria($c);
        $pager->setPeerMethod('doSelectJoinMember');
        $pager->setPage($page);
        $pager->init();
    }

    return $pager;
  }
}
