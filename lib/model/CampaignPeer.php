<?php

class CampaignPeer extends BaseCampaignPeer
{
  public static function getForSelectParent()
  {
    $c = new Criteria();

    $c->addAscendingOrderByColumn(self::ID);

    $campaigns = self::doSelect($c);
    $arr = array();
    $arr[0] = '-- select --';

    foreach ($campaigns as $campaign)
    {
      $arr[$campaign->getId()] = $campaign->getCampaignDecs();
    }
    return $arr;
  }
}
