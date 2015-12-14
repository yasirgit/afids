<?php

class MissionReportPeer extends BaseMissionReportPeer
{
  public static function getPager(
    $max = 10,
    $page = 1,
    $from_date = null,
    $to_date = null,
    $pilot_name = null,
    $passenger_name = null,
    $not_approved = null,
    $approved = null,
    $missing = null
  )
  {
    if($from_date) $from_date = date('Y-m-d', strtotime($from_date));
    if($to_date) $to_date   = date('Y-m-d', strtotime($to_date));

    $c = new Criteria();
    $c->addDescendingOrderByColumn(MissionReportPeer::MISSION_DATE);
    if ($pilot_name)       $c->add(self::COPILOT_NAME ,$pilot_name.'%', Criteria::LIKE);
    if ($passenger_name)   $c->add(self::PASSENGER_NAMES ,$passenger_name.'%', Criteria::LIKE);
    
    if($from_date && $to_date) {
      $c1 = $c->getNewCriterion(self::MISSION_DATE , $from_date, Criteria::GREATER_EQUAL);
      $c2 = $c->getNewCriterion(self::MISSION_DATE , $to_date, Criteria::LESS_EQUAL);
      $c->add($c1->addAnd($c2));
    } elseif ($from_date) {
    	
      $c->add(self::MISSION_DATE , $from_date, Criteria::GREATER_EQUAL);
      
    } elseif ($to_date) {
    	$c->add(self::MISSION_DATE , $to_date, Criteria::LESS_EQUAL);
    }
    
    if($approved && $not_approved) {
    } elseif ($not_approved) {
      $c1 = $c->getNewCriterion(self::APPROVED, 1, Criteria::NOT_EQUAL);
      $c2 = $c->getNewCriterion(self::APPROVED, null);
      $c->add($c1->addOr($c2));
    } elseif ($approved) {
      $c->add(self::APPROVED, 1);	
    }

//    if($missing){
//      $c->addJoin(self::ID, MissionLegPeer::MISSION_REPORT_ID, Criteria::INNER_JOIN);
//      $c->addJoin(MissionLegPeer::MISSION_ID, MissionPeer::ID, Criteria::INNER_JOIN);
//      $c->add(MissionPeer::MISSION_DATE, date('Y-m-d H:i:s'), Criteria::LESS_THAN);
//    }

    $c->addAscendingOrderByColumn(self::MISSION_DATE);

    $pager = new sfPropelPager('MissionReport', $max);
    $pager->setCriteria($c);
    $pager->setPage($page);
    $pager->init();

    return $pager;
  }
}
