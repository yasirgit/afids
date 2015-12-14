<?php

class MissionRequestPeer extends BaseMissionRequestPeer
{
  public static function getPager(
  $max = 10,
  $page = 1,
  $request_date1 = null,
  $request_date2 = null,
  $mission_date1 = null,
  $mission_date2 = null,
  $standart = null,
  $referrals = null
  )
  {
    #TODO
    #set filter Standart and Refferal

    $c = new Criteria();
    if($request_date1 !=null && $request_date2 !=null){
      $criterion = $c->getNewCriterion(self::REQUESTER_DATE, date('Y-m-d', strtotime($request_date1)) , Criteria::GREATER_EQUAL);
      $criterion->addAnd($c->getNewCriterion(self::REQUESTER_DATE, date('Y-m-d', strtotime($request_date2)), Criteria::LESS_EQUAL));
      $c->add($criterion);
    } elseif ($request_date1) {

      $c->add(self::REQUESTER_DATE , date('Y-m-d', strtotime($request_date1)), Criteria::GREATER_EQUAL);

    } elseif ($request_date2) {
    	$c->add(self::REQUESTER_DATE ,date('Y-m-d', strtotime($request_date2)), Criteria::LESS_EQUAL);
    }

    //mission date
    if($mission_date1 !=null && $mission_date2 !=null){
      $criterion = $c->getNewCriterion(self::MISSION_DATE ,date('Y-m-d', strtotime($mission_date1))  , Criteria::GREATER_EQUAL);
      $criterion->addAnd($c->getNewCriterion(self::MISSION_DATE, date('Y-m-d', strtotime($mission_date2)), Criteria::LESS_EQUAL));
      $c->add($criterion);
    } elseif ($mission_date1) {

      $c->add(self::MISSION_DATE , date('Y-m-d', strtotime($mission_date1)), Criteria::GREATER_EQUAL);

    } elseif ($mission_date2) {
    	$c->add(self::MISSION_DATE ,date('Y-m-d', strtotime($mission_date2)), Criteria::LESS_EQUAL);
    }

    //standart request saved with type NULL when user create request.
    if ($standart) {
        $criterion = $c->getNewCriterion(self::REFERRAL_SOURCE_ID, null, Criteria::ISNULL);
        $criterion->addOr($c->getNewCriterion(self::REFERRAL_SOURCE_ID, 0, Criteria::EQUAL));
        $c->add($criterion);
    }
    if ($referrals) {
        $criterion = $c->getNewCriterion(self::REFERRAL_SOURCE_ID, null, Criteria::ISNOTNULL);
        $criterion->addAnd($c->getNewCriterion(self::REFERRAL_SOURCE_ID, 0, Criteria::NOT_EQUAL));
        $c->add($criterion);
    }
    $c->add(self::PROCESSED_DATE, null, Criteria::ISNULL);

    $c->addAscendingOrderByColumn(self::REQUESTER_DATE);

    $pager = new sfPropelPager('MissionRequest', $max);
    $pager->setCriteria($c);
    $pager->setPage($page);
    $pager->init();
    return $pager;
  }
  
  public static function getByFilters
  (
  $req_date1,
  $req_date2,
  $miss_date1,
  $miss_date2,
  $standart,
  $referrals
  )
  {
    $c = new Criteria();

    $c->addJoin(self::MISSION_REQUEST_TYPE_ID,MissionTypePeer::ID,Criteria::LEFT_JOIN);
    
    if($req_date1 !=null && $req_date2 !=null){
      $criterion = $c->getNewCriterion(self::REQUESTER_DATE, date('Y-m-d', strtotime($req_date1)), Criteria::GREATER_EQUAL);
      $criterion->addAnd($c->getNewCriterion(self::REQUESTER_DATE, date('Y-m-d', strtotime($req_date2)), Criteria::LESS_EQUAL));
      $c->add($criterion);
    }

    if($miss_date1 !=null && $miss_date2 !=null){
      $criterion = $c->getNewCriterion(self::MISSION_DATE, date('Y-m-d', strtotime($miss_date1)), Criteria::GREATER_EQUAL);
      $criterion->addAnd($c->getNewCriterion(self::MISSION_DATE, date('Y-m-d', strtotime($miss_date2)), Criteria::LESS_EQUAL));
      $c->add($criterion);
    }
    //standart request saved with type NULL when user create request.
    if ($standart) $c->add(MissionTypePeer::NAME, null, Criteria::ISNULL);
    if ($referrals) $c->add(MissionTypePeer::NAME , 'referrals', Criteria::LIKE);
    
    return self::doSelect($c);
  }

  /**
   * No processed date and no itinerary created
   * @return PDOStatement
   */
  public static function getRsNonProcessed(&$count, $limit = 100)
  {
    $limit = (int)$limit;
    $limit = $limit ? $limit : 100;

    $stmt = self::queryNonProcessed("COUNT(DISTINCT(mr.id))");
    $row = $stmt->fetch(PDO::FETCH_NUM);
    $count = $row[0];

    $q = "i.id as itinerary_id";
    $q .= ", mr.id as id";
    $q .= ", CONCAT(mr.pass_first_name, ' ', mr.pass_last_name) as passenger_name";
    $q .= ", CONCAT(mr.req_first_name, ' ', mr.req_last_name) as requester_name";
    $q .= ", CONCAT(mr.orgin_city, ', ', mr.orgin_state) as origin";
    $q .= ", CONCAT(mr.dest_city, ', ', mr.dest_state) as destination";
    $q .= ", agency_name as agency";
    $q .= ", requester_date";
    return self::queryNonProcessed($q, $limit);
  }

  private static function queryNonProcessed($select, $limit = null)
  {
    $q = "SELECT $select";
    $q .= " FROM mission_request mr";
    $q .= " LEFT JOIN itinerary i ON mr.id=i.mission_request_id";
    $q .= " WHERE mr.processed_date IS NULL AND i.id IS NULL";
    $q .= " ORDER BY mr.requester_date DESC";
    if ($limit) $q .= " LIMIT $limit";
    $con = Propel::getConnection(self::DATABASE_NAME);
    $stmt = $con->prepare($q);
    $stmt->execute();

    return $stmt;
  }
  public static function getNumberOfNonProcessedMissionRequest(){
      $stmt = self::queryNonProcessed("COUNT(DISTINCT(mr.id))");
      $row = $stmt->fetch(PDO::FETCH_NUM);
      return $row[0];
  }
}
