<?php

/**
 * search actions.
 *
 * @package    angelflight
 * @subpackage search
 * @author     Ariunbayar
 * @version    SVN: $Id: actions.class.php 12479 2008-10-31 10:54:40Z fabien $
 */
class searchActions extends sfActions {
    public function executeIndex(sfWebRequest $request) {
        $text = $request->getParameter('search_by');

        $this->results = array();
        $this->messages = array();
        $this->uris = array();

        //person search

        if($this->getUser()->hasRights('person_index')) {
            $c = new Criteria();
            $c1=$c->getNewCriterion(PersonPeer::FIRST_NAME, $text.'%', Criteria::LIKE);
            $c2=$c->getNewCriterion(PersonPeer::LAST_NAME, $text.'%', Criteria::LIKE);
            //$c->setDistinct(PersonPeer::FIRST_NAME);
            //$c->setDistinct(PersonPeer::LAST_NAME);
            $c->add($c1->addOr($c2));
            $this->results['person'] = PersonPeer::doCount($c);
            $this->messages['person'] = ' person results';
            $this->uris['person'] = 'person/index?filter=1&findperson=1&firstname='.$text;
        }

        //passenger search
        if($this->getUser()->hasRights('passenger_index')) {
            $c = new Criteria();
            $c->addJoin(PassengerPeer::PERSON_ID,PersonPeer::ID,Criteria::LEFT_JOIN );
            $c->add(PersonPeer::FIRST_NAME, $text.'%', Criteria::LIKE);
            $this->results['passenger'] = PassengerPeer::doCount($c);
            $this->messages['passenger'] = ' passenger results';
            $this->uris['passenger'] = 'passenger/index?filter=1&firstname='.$text;
        }
        //companion search
        if($this->getUser()->hasRights('companion_index')) {
            $c = new Criteria();
            $c->add(CompanionPeer::NAME, $text.'%', Criteria::LIKE);
            $this->results['companion'] = CompanionPeer::doCount($c);
            $this->messages['companion'] = ' companion results';
            $this->uris['companion'] = 'companion/index?filter=1&name='.$text;
        }
        //mission search
        if($this->getUser()->hasRights('mission_index')) {
            $c = new Criteria();
            if (is_numeric($text)) {
                $c->add(MissionPeer::ID, $text.'%', Criteria::LIKE);
                $this->results['mission'] = MissionPeer::doCount($c);
                $this->uris['mission'] = 'mission/index?filter=1&miss_id='.$text;
            }else {
                $c->addJoin(MissionPeer::PASSENGER_ID,PassengerPeer::ID,Criteria::LEFT_JOIN);
                $c->addJoin(PassengerPeer::PERSON_ID, PersonPeer::ID,Criteria::LEFT_JOIN );
                $c->add(PersonPeer::FIRST_NAME, $text.'%', Criteria::LIKE);
                $this->results['mission'] = MissionPeer::doCount($c);
                $this->uris['mission'] = 'mission/index?filter=1&pass_fname='.$text;
            }
            $this->messages['mission'] = ' mission results';
        }
        //leg search
        if($this->getUser()->hasRights('leg_index')) {
            $c = new Criteria();
            $c->addJoin(MissionLegPeer::MISSION_ID,MissionPeer::ID,Criteria::LEFT_JOIN);
            $c->addJoin(MissionPeer::PASSENGER_ID,PassengerPeer::ID,Criteria::LEFT_JOIN);
            $c->addJoin(PassengerPeer::PERSON_ID,PersonPeer::ID,Criteria::LEFT_JOIN );
            $c->add(PersonPeer::FIRST_NAME, $text.'%', Criteria::LIKE);
            $this->results['leg'] = MissionLegPeer::doCount($c);
            $this->messages['leg'] = ' mission leg results';
            $this->uris['leg'] = 'missionLeg/index?filter=1&pass_fname='.$text;
        }
        //requester search
        if($this->getUser()->hasRights('requester_index')) {
            $c = new Criteria();
            $c->addJoin(RequesterPeer::PERSON_ID,PersonPeer::ID,Criteria::LEFT_JOIN );
            $c->add(PersonPeer::FIRST_NAME, $text.'%', Criteria::LIKE);
            $this->results['requester'] = RequesterPeer::doCount($c);
            $this->messages['requester'] = ' requester results';
            $this->uris['requester'] = 'requester/index?filter=1&firstname='.$text;
        }
        //agency search
        if($this->getUser()->hasRights('agency_index')) {
            $c = new Criteria();
            $c->add(AgencyPeer::NAME, $text.'%', Criteria::LIKE);
            $this->results['agency'] = AgencyPeer::doCount($c);
            $this->messages['agency'] = ' agency results';
            $this->uris['agency'] = 'agency/index?filter=1&name='.$text;
        }
        //coordinator search
        if($this->getUser()->hasRights('coordinator_index')) {
            $c = new Criteria();
            $c->addJoin(CoordinatorPeer::MEMBER_ID, MemberPeer::ID);
            $c->addJoin(PersonPeer::ID, MemberPeer::PERSON_ID);
            $c->add(PersonPeer::FIRST_NAME, $text.'%', Criteria::LIKE);
            $this->results['coordinator'] = CoordinatorPeer::doCount($c);
            $this->messages['coordinator'] = ' coordinator results';
            $this->uris['coordinator'] = 'coordinator/index?filter=1&firstname='.$text;
        }
        //camp search
        if($this->getUser()->hasRights('camp_index')) {
            $c = new Criteria();
            $c->add(CampPeer::CAMP_NAME, $text.'%', Criteria::LIKE);
            $this->results['camp'] = CampPeer::doCount($c);
            $this->messages['camp'] = ' camp results';
            $this->uris['camp'] = 'camp/index?filter=1&camp_name='.$text;
        }
        //airport search
        if($this->getUser()->hasRights('airport_index')) {
            $c = new Criteria();
            $c->add(AirportPeer::NAME, $text.'%', Criteria::LIKE);
            $this->results['airport'] = AirportPeer::doCount($c);
            $this->messages['airport'] = ' airport results';
            $this->uris['airport'] = 'airport/index?filter=1&name='.$text;
        }
        //member search
        if($this->getUser()->hasRights('member_index')) {
            $c = new Criteria();
            if (is_numeric($text)) {
                $c->add(MemberPeer::ID, $text.'%', Criteria::LIKE);
                $this->results['member'] = MemberPeer::doCount($c);
            $this->uris['member'] = 'member/index?filter=1&member_id='.$text;
            }else {
                $c->addJoin(MemberPeer::PERSON_ID,PersonPeer::ID,Criteria::LEFT_JOIN );
                $c->add(PersonPeer::FIRST_NAME, $text.'%', Criteria::LIKE);
                $this->results['member'] = MemberPeer::doCount($c);
            $this->uris['member'] = 'member/index?filter=1&firstname='.$text;
            }
            $this->messages['member'] = ' member results';
        }
        //pilot search
        if($this->getUser()->hasRights('pilot_index')) {
            $c = new Criteria();
            $c->addJoin(PilotPeer::MEMBER_ID,MemberPeer::ID,Criteria::LEFT_JOIN );
            $c->addJoin(MemberPeer::PERSON_ID,PersonPeer::ID,Criteria::LEFT_JOIN );
            $c->add(PersonPeer::FIRST_NAME, $text.'%', Criteria::LIKE);
            $this->results['pilot'] = PilotPeer::doCount($c);
            $this->messages['pilot'] = ' pilot results';
            $this->uris['pilot'] = 'pilot/index?filter=1&firstname='.$text;
        }
        //pilot request search
        if($this->getUser()->hasRights('mission_available_list')) {
            $c = new Criteria();
            if ($text) {
                $c->add(PilotRequestPeer::DATE , date('Y-m-d', strtotime($text)), Criteria::GREATER_EQUAL);
            }
            $this->results['pilotRequest'] = PilotRequestPeer::doCount($c);
            $this->messages['pilotRequest'] = ' pilot request results';
            $this->uris['pilotRequest'] = 'pilotRequest/index?filter=1&req_date2='.$text;
        }

        //mission request search
        if($this->getUser()->hasRights('mission_request_index')) {
            $c = new Criteria();
            if ($text) {
                $c->add(MissionRequestPeer::REQUESTER_DATE , date('Y-m-d', strtotime($text)), Criteria::GREATER_EQUAL);
            }
            $this->results['missionRequest'] = MissionRequestPeer::doCount($c);
            $this->messages['missionRequest'] = ' missionRequest results';
            $this->uris['missionRequest'] = 'missionRequest/index?filter=1&request_date2='.$text;
        }
        //mission report search
        if($this->getUser()->hasRights('mission_report_review')) {
            $c = new Criteria();
            $c->add(MissionReportPeer::COPILOT_NAME, $text.'%', Criteria::LIKE);
            $this->results['missionReport'] = MissionReportPeer::doCount($c);
            $this->messages['missionReport'] = ' missionReport results';
            $this->uris['missionReport'] = 'mission_report/review?filter=1&pilot_name='.$text;
        }
        //role search
        if(1==1) {
            $c = new Criteria();
            if(isset($text)) {
                $c->add(RolePeer::TITLE, $text.'%', Criteria::LIKE);
            }
            $this->results['role'] = RolePeer::doCount($c);
            $this->messages['role'] = ' role results';
            $this->uris['role'] = 'role_permission/index?search_by='.$text;
        }

        $this->text = $text;
    }

    /**
     * Handles the request from sidebar search and forwards for the required module
     */
    public function executeSpecific(sfWebRequest $request) {
        $search = $request->getParameter('search');
        $text = $request->getParameter('text');

        $uri = '';
        switch ($search) {
            case 'person':
                $uri = 'person/index?filter=1&firstname='.$text;
                break;
            case 'passenger':
                $uri = 'passenger/index?filter=1&firstname='.$text;
                break;
            case 'companion':
                $uri = 'companion/index?filter=1&name='.$text;
                break;
            case 'mission':
                if (is_numeric($text)) {
                    $uri = 'mission/index?filter=1&miss_id='.$text;
                }else {
                    $uri = 'mission/index?filter=1&pass_fname='.$text;
                }
                break;
            case 'leg':
                $uri = 'missionLeg/index?filter=1&pass_fname='.$text;
                break;
            case 'requester':
                $uri = 'requester/index?filter=1&firstname='.$text;
                break;
            case 'agency':
                $uri = 'agency/index?filter=1&name='.$text;
                break;
            case 'coordinator':
                $uri = 'coordinator/index?filter=1&firstname='.$text;
                break;
            case 'camp':
                $uri = 'camp/index?filter=1&camp_name='.$text;
                break;
            case 'airport':
                $uri = 'airport/index?filter=1&name='.$text;
                break;
            case 'member':
                if (is_numeric($text)) {
                    $uri = 'member/index?filter=1&member_id='.$text;
                }else {
                    $uri = 'member/index?filter=1&firstname='.$text;
                }
                break;
            case 'pilot':
                $uri = 'pilot/index?filter=1&firstname='.$text;
                break;
            case 'pilot_request':
                $uri = 'pilot_request_list/index?filter=1&req_date2='.$text;
                break;
            case 'mission_request':
                $uri = 'miss_req/index?filter=1&request_date2='.$text;
                break;
            case 'mission_report':
                $uri = 'mission_report/review?filter=1&pilot_name='.$text;
                break;
            case 'role':
                $uri = 'role_permission/index?search_by='.$text;
                break;
            case 'all':
                $uri = 'search/index?search_by='.$text;
                break;

        }
        if ($uri) $this->redirect($uri);

        $this->getUser()->setFlash('warning', 'Please enter in the search field');
        $this->forward404();
    }
}
