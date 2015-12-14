<?php

class EmailQueuePeer extends BaseEmailQueuePeer {

    public static function getPager(
            $max = 10,
            $page = 1,
            Criteria $c
    ) {
        /*$c = new Criteria();

        $c->addJoin(self::LETTER_ID, EmailLetterPeer::alias('letter', EmailLetterPeer::ID), Criteria::LEFT_JOIN);

        //person
        $c->addAlias('letter', EmailLetterPeer::TABLE_NAME);

        if ($subject)
            $c->add(EmailLetterPeer::SUBJECT, $subject . '%', Criteria::LIKE);

        if ($priority)
            $c->add(self::PRIORITY, $priority . '%', Criteria::LIKE);


        if ($request_date) {
            $c->add(self::REQUEST_DATE, date('Y-m-d H:i', strtotime($request_date)) . ':00', Criteria::EQUAL);
        } elseif ($send_date) {
            $c->add(self::SEND_DATE, date('Y-m-d H:i', strtotime($send_date)) . ':00', Criteria::EQUAL);
        }*/

        //self::addSelectColumns($c);
        //$c->addAscendingOrderByColumn('request_date');
        $pager = new sfPropelPager('EmailQueue', $max);
        $pager->setCriteria($c);        
        $pager->setPage($page);
        $pager->init();        
        return $pager;
    }
}
