<?php

class ActivityPeer extends BaseActivityPeer
{
  public static function log($content)
  {
    $activity = new Activity();
    $activity->setContent($content);
    $activity->save();
  }
}
