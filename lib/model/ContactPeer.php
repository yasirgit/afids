<?php

class ContactPeer extends BaseContactPeer
{
  public static function getByPersonId($person_id){
   $c = new Criteria() ;
   
   $c->add(self::PERSON_ID,$person_id);
   $c->addAscendingOrderByColumn(self::REF_SOURCE_ID);
   
   return self::doSelectOne($c);
  }

  /**
   * Searches contact by some criteria
   * @param int $max Maximum contact per page
   * @param int $page
   * @return sfPropelPager
   */
  public static function getPager(
    $max = 10,
    $page = 1,
    $firstname = null,
    $lastname = null,
    $city = null,
    $state = null,
    $ref_source = null,
    $contact_type = null,
    $added_date1 = null,
    $added_date2 = null
  )
  {
    $c = new Criteria();

    $c->addJoin(self::PERSON_ID, PersonPeer::ID);
    
    if ($firstname) $c->add(PersonPeer::FIRST_NAME, $firstname.'%', Criteria::LIKE);
    if ($lastname) $c->add(PersonPeer::LAST_NAME, $lastname.'%', Criteria::LIKE);
    if ($city) $c->add(PersonPeer::CITY, $city.'%', Criteria::LIKE);
    if ($state) $c->add(PersonPeer::STATE, $state.'%', Criteria::LIKE);
    if ($ref_source) $c->add(self::REF_SOURCE_ID, $ref_source);
    if ($contact_type) $c->add(self::CONTACT_TYPE_ID, $contact_type);

    if ($added_date1 && $added_date2) {
                  $c1 = $c->getNewCriterion(self::DATE_ADDED, date('Y-m-d', strtotime($added_date2)), Criteria::LESS_EQUAL);
                  $c2 = $c->getNewCriterion(self::DATE_ADDED, date('Y-m-d', strtotime($added_date1)), Criteria::GREATER_EQUAL);
                  $c->add($c1->addAnd($c2));
    } elseif ($added_date1) {
      $c->add(self::DATE_ADDED, date('Y-m-d', strtotime($added_date1)), Criteria::GREATER_EQUAL);
    } elseif($added_date2){
      $c->add(self::DATE_ADDED, date('Y-m-d', strtotime($added_date2)), Criteria::LESS_EQUAL);
    }
    
    $c->addAscendingOrderByColumn(PersonPeer::FIRST_NAME);
    $pager = new sfPropelPager('Contact', $max);
    $pager->setCriteria($c);
    $pager->setPage($page);
    $pager->init();
    return $pager;
  }
}
