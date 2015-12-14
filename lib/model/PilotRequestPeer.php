<?php
class PilotRequestPeer extends BasePilotRequestPeer
{
  public static function getOnHoldReqs(){

    $c =  new Criteria();

    $c->addAscendingOrderByColumn(self::LEG_ID);
    $c->add(self::ON_HOLD,1,Criteria::LIKE);

    return self::doSelect($c);
  }

  public static function getDateRanges($start=null,$end=null){

    $c =  new Criteria();

    $c->addAscendingOrderByColumn(self::LEG_ID);

    if($start !=null && $end !=null){
      $criterion = $c->getNewCriterion(self::CREATED_AT, date('Y-m-d', strtotime($start)), Criteria::GREATER_EQUAL);
      $criterion->addAnd($c->getNewCriterion(self::CREATED_AT, date('Y-m-d', strtotime($end)), Criteria::LESS_EQUAL));
      $c->add($criterion);
    }

    return self::doSelect($c);
  }

  public static function getPager(

  $max = 10,
  $page = 1,
  $req_date1 = null,
  $req_date2 = null,
  $miss_date1 = null,
  $miss_date2 = null,
  $not_process = null,
  $hold = null,
  $process = null
  )
  {
    $c = new Criteria();

    $c->addJoin(self::LEG_ID,MissionLegPeer::ID,Criteria::LEFT_JOIN );
    $c->addJoin(MissionLegPeer::ID,MissionPeer::ID,Criteria::LEFT_JOIN );

    if($req_date1 != null && $req_date2 != null){
      $criterion = $c->getNewCriterion(self::DATE, date('Y-m-d', strtotime($req_date1)), Criteria::GREATER_EQUAL);
      $criterion->addAnd($c->getNewCriterion(self::DATE, date('Y-m-d', strtotime($req_date2)), Criteria::LESS_EQUAL));
      $c->add($criterion);
    } elseif ($req_date1) {
    	
      $c->add(self::DATE , date('Y-m-d', strtotime($req_date1)), Criteria::GREATER_EQUAL);
      
    } elseif ($req_date2) {
    	$c->add(self::DATE ,date('Y-m-d', strtotime($req_date2)), Criteria::LESS_EQUAL);
    }

    if($miss_date1 !=null && $miss_date2 !=null){
      $criterion = $c->getNewCriterion(MissionPeer::MISSION_DATE, date('Y-m-d', strtotime($miss_date1)), Criteria::GREATER_EQUAL);
      $criterion->addAnd($c->getNewCriterion(MissionPeer::MISSION_DATE, date('Y-m-d', strtotime($miss_date2)), Criteria::LESS_EQUAL));
      $c->add($criterion);
    } elseif ($miss_date1) {
    	
      $c->add(MissionPeer::MISSION_DATE , date('Y-m-d', strtotime($miss_date1)), Criteria::GREATER_EQUAL);
      
    } elseif ($miss_date2) {
    	$c->add(MissionPeer::MISSION_DATE , date('Y-m-d', strtotime($miss_date2)), Criteria::LESS_EQUAL);
    }

    
    if(isset($not_process) || isset ($hold) || isset ($process)){                
        if ($process) {
          $c->add(self::ACCEPTED , 1 , Criteria::EQUAL);
          $c->add( PilotRequestPeer::PROCESSED , 1 , Criteria::EQUAL );
        }
        if ($not_process) {
          $c->add(self::ACCEPTED, 0 , Criteria::EQUAL);
          $c->add( PilotRequestPeer::PROCESSED , 1 , Criteria::EQUAL );
        }
        if ($hold) $c->add(self::ON_HOLD , $hold , Criteria::EQUAL);
    }
    else{
        $c->add( PilotRequestPeer::ACCEPTED , 0 , Criteria::EQUAL );
        $c->add( PilotRequestPeer::PROCESSED , 1 , Criteria::EQUAL );
    }
    
    $c->addDescendingOrderByColumn( self::DATE );
    
    $pager = new sfPropelPager('PilotRequest', $max);
    $pager->setCriteria($c);
    $pager->setPage($page);
    $pager->init();
    return $pager;
  }
  public static function getByLegId($leg_id){
    $c = new Criteria();

    $c->add(self::LEG_ID ,$leg_id);
    $c->addAscendingOrderByColumn(self::DATE );

    return self::doSelectOne($c);
  }
  public static function getByCampId($camp_id){
    $c = new Criteria();
    $c->add(self::GROUP_CAMP_ID ,$camp_id);
    $c->addAscendingOrderByColumn(self::DATE );
    return self::doSelectOne($c);
  }
  public static function getByMemberId($member_id){
    $c = new Criteria();

    $c->add(self::MEMBER_ID ,$member_id);

    $criterion = $c->getNewCriterion(self::GROUP_CAMP_ID, null, Criteria::ISNOTNULL);
    $criterion->addOr($c->getNewCriterion(self::LEG_ID, null, Criteria::ISNOTNULL));
    $c->add($criterion);

    $c->addAscendingOrderByColumn(self::DATE );

    return self::doSelect($c);
  }
  public function getPilotRequestByMemberId($mem_id, $leg_id){
    $c = new Criteria();
    $c->add(self::MEMBER_ID, $mem_id, Criteria::EQUAL);
    $c->add(self::LEG_ID, $leg_id);
    return self::doSelectOne($c);
  }
  public static function getByMemnerIdLegId($mem_id,$leg_id){
    $c = new Criteria();

    $c->add(self::MEMBER_ID ,$mem_id);
    $c->add(self::LEG_ID ,$leg_id);

    $c->addAscendingOrderByColumn(self::DATE );

    return self::doSelectOne($c);
  }

  //Farazi Get all pilot requesters by leg id and without selected member
  public static function getByRequestersLegIdMemberId($leg_id,$mem_id) {
    $c = new Criteria();  
    $c->add(self::LEG_ID ,$leg_id);
    $c->add(self::PROCESSED ,1);
    $c->add(self::MEMBER_ID, $mem_id, Criteria::NOT_EQUAL);
    return self::doSelect($c);
  }

  public static function getNotAcceptedPilots($leg_id,$mem_id) {
    $c = new Criteria();
    $c->add(self::LEG_ID ,$leg_id);    
    $c->add(self::MEMBER_ID, $mem_id, Criteria::NOT_EQUAL);
    return self::doSelect($c);
  }

  public static function getPilotByRequestersLegIdMemberId($leg_id,$mem_id) {
    $c = new Criteria();
    $c->add(self::LEG_ID ,$leg_id);
    $c->add(self::MEMBER_ID, $mem_id);
    
    return self::doSelectOne($c);
  }

  ///Removed Pilots
  public static function getRemovedPilot($mem_id)
  {
      $c = new Criteria();
      $c->add(self::MEMBER_ID, $mem_id);
      $c->add(self::PILOT_STATUS , 2); // 2 Means Removed
      $c->addDescendingOrderByColumn(self::DATE);      
      return self::doSelect($c);
  }

  ///Revival Pilots
  public static function getRevivalPilot($mem_id)
  {
      $c = new Criteria();
      $c->add(self::MEMBER_ID, $mem_id);
      $c->add(self::PILOT_STATUS , 1); // 1 Means Open Request
      $c->addDescendingOrderByColumn(self::DATE);
      return self::doSelect($c);
  }
  //New Pilot added to the mission
  public static function getPilotsAdded()
  {                   
        $c = new Criteria();
        $preDate=date('Y-m-d H:i:s', time()-10*86400);
        $c->addJoin(self::LEG_ID,MissionLegPeer::ID,Criteria::LEFT_JOIN);
        $c->addJoin(MissionLegPeer::MISSION_ID,MissionPeer::ID,Criteria::LEFT_JOIN);
        $c->add(self::ACCEPTED , 1);
        $c->addAnd(self::CREATED_AT, ' pilot_request.created_at <= "'.date('Y-m-d H:i:s').'" AND pilot_request.created_at >= "'.$preDate.'"', Criteria::CUSTOM);
        $c->addDescendingOrderByColumn(self::DATE);
        //echo $c->toString();
        //die();
        return self::doSelect($c);        
  }

  public static function getPilotsByRequestersLegIdMemberId($leg_id,$mem_id) {
    $c = new Criteria();
    $c->add(self::LEG_ID ,$leg_id);
    $c->add(self::MEMBER_ID, $mem_id, Criteria::NOT_EQUAL);
    return self::doSelect($c);
  }

  public static function getByMemnerIdLegIdCamp($mem_id,$leg_id){
    $c = new Criteria();

    $c->addJoin(self::LEG_ID,MissionLegPeer::ID,Criteria::LEFT_JOIN);
    $c->addJoin(MissionLegPeer::MISSION_ID,MissionPeer::ID,Criteria::LEFT_JOIN);

    $c->add(self::MEMBER_ID ,$mem_id);
    $c->add(self::LEG_ID ,$leg_id);
    $c->add(MissionPeer::CAMP_ID,null,Criteria::ISNOTNULL);

    $c->addAscendingOrderByColumn(self::DATE );

    return self::doSelect($c);
  }
  public static function getByMemberIdCampId($mem_id = null,$camp_id = null){
    $c = new Criteria();

    $c->addJoin(self::LEG_ID,MissionLegPeer::ID,Criteria::LEFT_JOIN);
    $c->addJoin(MissionLegPeer::MISSION_ID,MissionPeer::ID,Criteria::LEFT_JOIN);

    if($mem_id)$c->add(self::MEMBER_ID ,$mem_id);
    if($camp_id)$c->add(self::GROUP_CAMP_ID ,$camp_id);
    $c->add(MissionPeer::CAMP_ID,null,Criteria::ISNOTNULL);

    $c->addAscendingOrderByColumn(self::DATE );

    return self::doSelect($c);
  }

  public static function getByFilters
  (
  $req_date1,
  $req_date2,
  $miss_date1,
  $miss_date2,
  $not_process,
  $hold,
  $process
  )
  {
    $c = new Criteria();

    $c->addJoin(self::LEG_ID,MissionLegPeer::ID,Criteria::LEFT_JOIN );
    $c->addJoin(MissionLegPeer::ID,MissionPeer::ID,Criteria::LEFT_JOIN );

    if($req_date1 !=null && $req_date2 !=null){
      $criterion = $c->getNewCriterion(MissionPeer::DATE_REQUESTED, date('Y-m-d', strtotime($req_date1)), Criteria::GREATER_EQUAL);
      $criterion->addAnd($c->getNewCriterion(MissionPeer::DATE_REQUESTED, date('Y-m-d', strtotime($req_date2)), Criteria::LESS_EQUAL));
      $c->add($criterion);
    }

    if($miss_date1 !=null && $miss_date2 !=null){
      $criterion = $c->getNewCriterion(MissionPeer::MISSION_DATE, date('Y-m-d', strtotime($miss_date1)), Criteria::GREATER_EQUAL);
      $criterion->addAnd($c->getNewCriterion(MissionPeer::MISSION_DATE, date('Y-m-d', strtotime($miss_date2)), Criteria::LESS_EQUAL));
      $c->add($criterion);
    }

    if ($not_process) $c->add(self::PROCESSED, '%'.$not_process.'%', Criteria::NOT_LIKE);
    if ($hold) $c->add(self::ON_HOLD , '%'.$hold.'%', Criteria::LIKE);
    if ($process) $c->add(self::PROCESSED , '%'.$process.'%', Criteria::LIKE);

    return self::doSelect($c);
  }

  /**
   * Pilot request count which mission will be flown in 2 days
   * @return int
   */
  public static function countIn2Days()
  {
    $query = "SELECT COUNT(pilot_request.id) FROM pilot_request";
    $query .= " LEFT JOIN mission_leg ON pilot_request.leg_id=mission_leg.id";
    $query .= " LEFT JOIN mission ON mission_leg.mission_id=mission.id";
    $query .= " WHERE pilot_request.accepted<>1 AND mission.mission_date>=NOW() AND mission.mission_date<='".date('Y-m-d H:i:s', time()+2*86400)."'";
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

  public static function getMemberIdForSelect($id,$member_id){
    $c = new Criteria();
    $c->add(self::ID, $id , Criteria::NOT_LIKE);
    $c->add(self::MEMBER_ID,$member_id);
    return self::doSelect($c);
  }
}
