<?php

class CompanyPeer extends BaseCompanyPeer
{
  public static function getForSelectParent()
  {
    $c = new Criteria();

    $c->addAscendingOrderByColumn(self::NAME);

    $companies = self::doSelect($c);
    $arr = array();
    $arr[0] = '-- select --';

    foreach ($companies as $company)
    {
      $arr[$company->getId()] = $company->getName();
    }
    return $arr;
  }
}
