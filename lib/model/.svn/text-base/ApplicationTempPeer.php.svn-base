<?php

class ApplicationTempPeer extends BaseApplicationTempPeer
{
  /**
   *
   * @param int $max
   * @param int $page
   * @return sfPropelPager
   */
  public static function getNonProcessedPager($max = 25, $page = 1, $renewal = false)
  {
    $c = new Criteria();
    $c->add(self::PROCESSED_DATE, null, Criteria::ISNULL);
    $c->add(self::RENEWAL, 0, Criteria::EQUAL);
    $c->addDescendingOrderByColumn(self::APPLICATION_DATE);
        
    $pager = new sfPropelPager('ApplicationTemp', $max);
    $pager->setCriteria($c);
    $pager->setPage($page);
    $pager->init();
    return $pager;
  }

  public static function getNonRenewalProcessedPager($max = 25, $page = 1, $renewal = false)
  {
    $c = new Criteria();
    $c->add(self::PROCESSED_DATE, null, Criteria::ISNULL);
    $c->add(self::RENEWAL, 1, Criteria::EQUAL);
    $c->addDescendingOrderByColumn(self::APPLICATION_DATE);

    $pager = new sfPropelPager('ApplicationTemp', $max);
    $pager->setCriteria($c);
    $pager->setPage($page);
    $pager->init();
    return $pager;
  }

  public static function getNonProcessedSearchPager($max = 25, $page = 1, $date = null , $name = null , $email = null)
  {
    $c = new Criteria();
    $c->add(self::PROCESSED_DATE, null, Criteria::ISNULL);
    $c->addDescendingOrderByColumn(self::APPLICATION_DATE);
    
    
    if($date){str_replace('/', '-', $date);
              $c->add(self::APPLICATION_DATE, '%'.date("Y-m-d", strtotime($date)).'%', Criteria::LIKE);}
    if($name){$c->add(self::FIRST_NAME, $name.'%' , Criteria::LIKE);}
    if($email){$c->add(self::EMAIL, $email.'%' , Criteria::LIKE);}
    $pager = new sfPropelPager('ApplicationTemp', $max);
    $pager->setCriteria($c);
    $pager->setPage($page);
    $pager->init();
    return $pager;
  }
  public static function getRenewalStatus($id){
      $c = new Criteria();
      $c->add(self::ID, $id);
      $applicationTemp =  self::doSelectOne($c);
      return $applicationTemp->getRenewal();
  }
  public static function getNonProcessedMemberApplications()
  {
      $c = new Criteria();
      $c->add(self::PROCESSED_DATE, null, Criteria::ISNULL);
      $c->add(self::RENEWAL, 0, Criteria::EQUAL);
      //$c->add(self::IS_COMPLETE, 1, Criteria::EQUAL);
      $c->addDescendingOrderByColumn(self::APPLICATION_DATE);
      return self::doCount($c);
  }
}
