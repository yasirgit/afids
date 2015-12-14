<?php

class MissionCompanionPeer extends BaseMissionCompanionPeer
{
  public static function selectMissionById($mission_id){
    $c = new Criteria();
    $c->add(self::MISSION_ID, $mission_id);
    return self::doSelect($c);
  }
}
