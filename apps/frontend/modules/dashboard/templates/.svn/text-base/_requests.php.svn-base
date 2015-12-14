<?php
/* @var $application_temp ApplicationTemp */
$mission_requests = $sf_data->getRaw ( 'mission_requests' );
$available_mission_legs = $sf_data->getRaw ( 'available_mission_legs' );
?>

<div class="mission-requests">
  <script type="text/javascript">
    jQuery(document).ready( function(){
      var r = window.location.href;
      if(/return/.test(r)){
        window.location.href  = window.location.href + "#afids_pilot_requests";
      }
                
      jQuery("ul.mission-tabs li a").click(function() {
        var id = jQuery(this).attr('href');
        jQuery('.requests').hide();
        jQuery(id).show();
        jQuery('ul.mission-tabs li').removeClass('active');
        jQuery(this).parent().addClass('active');
        return false;
      });
    });
  </script>
  <ul class="mission-tabs">
    <li class="active" ><a href="#mission_request_table" id="mission_req"><span>mission requests (<?php echo $mission_requests->rowCount () ?>)</span></a></li>
    <li><a href="#available_missions_table" id="mission_avai"><span>avail. missions (<?php echo $available_mission_legs->rowCount () ?>)</span></a></li>
    <li><a href="#coordinated_missions_table" id="coor_misson"><span>coord. mission (<?php echo $coordinated_mission_legs->rowCount () ?>)</span></a></li>
    <li><a href="#member_requests_table" id="mem_request"><span>mem. Requests (<?php echo count ( $member_requests ) ?>)</span></a></li>
    <li ><a href="#pilot_requests_table_one" id="afids_pilot_requests" max="10" page="1" ><span>pilot requests (<?php echo $pager->getNbResults () ?>)</span></a></li>
  </ul>
  <div class="frame requests" id="mission_request_table" style="display:block;">
    <table class="table-head">
      <tbody>
        <tr>
          <td class="cell-1">Itinerary</td>
          <td class="cell-2">passenger</td>
          <td class="cell-3">requester</td>
          <td class="cell-4">origin</td>
          <td class="cell-5">destination</td>
          <td class="cell-6">date req.</td>
          <td class="cell-7">flag</td>
          <td class="cell-8">status</td>
          <td class="cell-8">Agency</td>
          <td class="cell-7">last action</td>
        </tr>
      </tbody>
    </table>
    <div class="holder">
      <table>
        <tbody>
          <?php while ( $mission_request = $mission_requests->fetch ( PDO::FETCH_OBJ ) ) {
          ?>
          <?php //echo $mission_request->getId();die(); ?>
            <tr onclick="var l='<?php echo url_for ( '@miss_req_edit?id=' . $mission_request->id ) ?>'; if (event.ctrlKey) window.open(l, ''); else document.location=l;" style="cursor:pointer;">
              <td class="cell-1">
              <?php if ( $mission_request->itinerary_id )
                  echo sprintf ( '%07s', $mission_request->itinerary_id ); ?>
            </td>
            <td class="cell-2">
              <?php echo $mission_request->passenger_name ?>
            </td>
            <td class="cell-3">
              <?php echo $mission_request->requester_name ?>
            </td>
            <td class="cell-4">
              <?php echo $mission_request->origin ?>
            </td>
            <td class="cell-5">
              <?php echo $mission_request->destination ?>
            </td>
            <td class="cell-6">
              <?php $ts = strtotime ( $mission_request->requester_date ) ?>
              <?php if ( $ts )
                  echo date ( 'm/d/Y', $ts ); ?>
            </td>
            <td class="cell-7">
              <?php if ( $ts ) {
              ?>
              <?php if ( $ts > time() ) {
              ?>
              <?php //if ($ts > time() - $day) {?>
                  <img alt="flag" src="/images/ico-flag-2.gif"/>
              <?php } elseif ( $ts < time() - 7 * 86400 ) {
              ?>
                  <img alt="flag" src="/images/ico-flag-1.gif"/>
              <?php } elseif ( $ts < time() - 3 * 86400 ) {
              ?>
                  <img alt="flag" src="/images/ico-flag-3.gif"/>
              <?php } ?>
              <?php } ?>
            </td>
            <td class="cell-8">New</td>
            <td class="cell-8">
              <?php echo $mission_request->agency ?>
            </td>
            <td class="cell-7">None</td>
          </tr>
          <?php } ?>
          </tbody>
        </table>
      </div>
    </div>

    <div class="frame requests" id="available_missions_table" style="display:none;">
      <table class="table-head">
        <tbody>
          <tr>
            <td class="cell-1">type</td>
            <td class="cell-2">pass. type</td>
            <td class="cell-3">date</td>
            <td class="cell-4">transportation</td>
            <td class="cell-5">origin</td>
            <td class="cell-6">destination</td>
            <td class="cell-7">flag</td>
          </tr>
        </tbody>
      </table>
      <div class="holder">
        <table>
          <tbody>
          <?php $counter = 0 ?>
          <?php while ( $mission_leg = $available_mission_legs->fetch ( PDO::FETCH_OBJ ) ) {
          ?>
          <?php if ( ++ $counter > 100 ) break; ?>
              <tr onclick="var l='<?php echo url_for ( 'mission/view?id=' . $mission_leg->mission_id ) ?>'; if (event.ctrlKey) window.open(l, ''); else document.location=l;" style="cursor:pointer;">
                <td class="cell-1"><?php echo $mission_leg->mission_type ?></td>
                <td class="cell-2">
<?php if ( $mission_leg->passenger_type )
                  echo $mission_leg->passenger_type ?>
              </td>
              <td class="cell-3">
<?php echo ($mission_leg->mission_date
                          ? date ( 'm/d/Y', strtotime ( $mission_leg->mission_date ) )
                          : '') ?>
              </td>
              <td class="cell-4">
<?php echo $transportations[ $mission_leg->transportation ] ?>
              </td>
              <td class="cell-5">
              <?php
                if ( $mission_leg->transportation == 'air_mission' ) {
                  echo $mission_leg->from_airport;
                } elseif ( $mission_leg->transportation == 'ground_mission' ) {
                  if ( $mission_leg->ground_origin == 'patient' ) {
                    echo $mission_leg->person_location;
                  } else {
                    echo $mission_leg->origin;
                  }
                } elseif ( $mission_leg->transportation == 'commercial_mission' ) {
                  echo $mission_leg->comm_origin;
                }
              ?>
              </td>
              <td class="cell-6">
              <?php
                if ( $mission_leg->transportation == 'air_mission' ) {
                  echo $mission_leg->to_airport;
                } elseif ( $mission_leg->transportation == 'ground_mission' ) {
                  if ( $mission_leg->ground_destination == 'patient' ) {
                    echo $mission_leg->person_location;
                  } else {
                    echo $mission_leg->destination;
                  }
                } elseif ( $mission_leg->transportation == 'commercial_mission' ) {
                  echo $mission_leg->comm_destination;
                }
              ?>
              </td>
              <td class="cell-7">
              <?php $ts = strtotime ( $mission_leg->date_requested ); ?>
              <?php if ( $ts > time() - 86400 ) { ?>
                  <img alt="flag" src="/images/ico-flag-2.gif"/>
              <?php } else {
              ?>
              <?php $ts = strtotime ( $mission_leg->mission_date ); ?>
              <?php if ( $ts > time() - 2 * 86400 ) {
              ?>
                    <img alt="flag" src="/images/ico-flag-3.gif"/>
              <?php } elseif ( $ts > time() - 7 * 86400 ) {
              ?>
                    <img alt="flag" src="/images/ico-flag-1.gif"/>
              <?php } ?>
              <?php } ?>
              </td>
            </tr>
          <?php } ?>
            </tbody>
          </table>
        </div>
      </div>

      <div class="frame requests" id="coordinated_missions_table" style="display:none;">
        <table class="table-head">
          <tbody>
            <tr>
              <td class="cell-1">type</td>
              <td class="cell-2">pass. type</td>
              <td class="cell-3">date</td>
              <td class="cell-4">transportation</td>
              <td class="cell-5">origin</td>
              <td class="cell-6">destination</td>
              <td class="cell-7">flag</td>
            </tr>
          </tbody>
        </table>
        <div class="holder">
          <table>
            <tbody>
          <?php while ( $mission_leg = $coordinated_mission_legs->fetch ( PDO::FETCH_OBJ ) ) {
          ?>
                <tr onclick="var l='<?php echo url_for ( 'mission/view?id=' . $mission_leg->mission_id ) ?>'; if (event.ctrlKey) window.open(l, ''); else document.location=l;" style="cursor:pointer;">
                  <td class="cell-1"><?php echo $mission_leg->mission_type ?></td>
                  <td class="cell-2">
              <?php echo $mission_leg->passenger_type ?>
              </td>
              <td class="cell-3">
              <?php echo ($mission_leg->mission_date
                          ? date ( 'm/d/Y', strtotime ( $mission_leg->mission_date ) )
                          : '') ?>
              </td>
              <td class="cell-4">
<?php echo $transportations[ $mission_leg->transportation ] ?>
              </td>
              <td class="cell-5">
              <?php
                if ( $mission_leg->transportation == 'air_mission' ) {
                  echo $mission_leg->from_airport;
                } elseif ( $mission_leg->transportation == 'ground_mission' ) {
                  if ( $mission_leg->ground_origin == 'patient' ) {
                    echo $mission_leg->person_location;
                  } else {
                    echo $mission_leg->origin;
                  }
                } elseif ( $mission_leg->transportation == 'commercial_mission' ) {
                  echo $mission_leg->comm_origin;
                }
              ?>
              </td>
              <td class="cell-6">
              <?php
                if ( $mission_leg->transportation == 'air_mission' ) {
                  echo $mission_leg->to_airport;
                } elseif ( $mission_leg->transportation == 'ground_mission' ) {
                  if ( $mission_leg->ground_destination == 'patient' ) {
                    echo $mission_leg->person_location;
                  } else {
                    echo $mission_leg->destination;
                  }
                } elseif ( $mission_leg->transportation == 'commercial_mission' ) {
                  echo $mission_leg->comm_destination;
                }
              ?>
              </td>
              <td class="cell-7">
              <?php
                $day = 86400;
                $ts = strtotime ( $mission_leg->mission_date );
                if ( $mission_leg->mission_date ) {
                  if ( $ts > time() - 2 * $day ) {
              ?><img alt="flag" src="/images/ico-flag-3.gif"/><?php
                  } elseif ( $ts > time() - 7 * $day ) {
              ?><img alt="flag" src="/images/ico-flag-1.gif"/><?php
                  }
                }
              ?>
              </td>
            </tr>
<?php } ?>
            </tbody>
          </table>
        </div>
      </div>

      <div class="frame requests" id="pilot_requests_table_one" style="display:none;">
        <div class="holder">

      <?php
              use_helper ( 'Form' );
              $date_widget = $sf_data->getRaw ( 'date_widget' );
              use_javascripts_for_form ( $date_widget );
              use_stylesheets_for_form ( $date_widget );
      ?>

<?php use_helper ( 'Javascript', 'Form' ) ?>
<?php use_helper ( 'jQuery', 'Form' ) ?>
              <div class="pilot-requests" style="overflow:hidden">
                <h2>Pilots Requests</h2>
                <div class="filtering">
                  <form action="<?php echo url_for ( '@default_index?module=dashboard' ) ?>" id="form_filter" method="post" >
                    <input type="hidden" name="filter" value="1"/>
                    <fieldset>
                      <div class="holder">
                        <label for="form-item-1">Request Date Range</label>
                <?php echo $date_widget->render ( 'req_date1', $req_date1 ); ?>
                <strong class="to">to</strong>
<?php echo $date_widget->render ( 'req_date2', $req_date2 ); ?>
              </div>
              <div class="holder">
                <label for="form-item-2">Mission Date Range</label>
                <?php echo $date_widget->render ( 'miss_date1', $miss_date1 ); ?>
                <strong class="to">to</strong>
<?php echo $date_widget->render ( 'miss_date2', $miss_date2 ); ?>
              </div>
              <div class="holder alt">
                <label>Show:</label>
                <ul class="display-choice">
                  <li>
                    <input type="checkbox" id="form-item-3" value="1" <?php if ( $not_process )
                    echo 'checked="checked"' ?> name="not_process"/>
                    <label for="form-item-3">Not Processed</label><b></b>
                  </li>
                  <li>
                    <input type="checkbox" id="form-item-4" value="1" <?php if ( $hold )
                      echo 'checked="checked"' ?> name="hold"/>
                    <label for="form-item-4">On Hold</label>
                  </li>
                  <li>
                    <input type="checkbox" id="form-item-5" value="1" <?php if ( $process )
                        echo 'checked="checked"' ?> name="process"/>
                    <label for="form-item-5">Processed</label>
                  </li>
                </ul>
              </div>
              <input type="submit" name="find" value="Find" />
              <input type="hidden" name="page" value="1" />
              <input type="hidden" name="max" value="10" />
              <input type="hidden" name="return" value="dashboard" />
              <input type="hidden" name="reset" value="0" id="reset_form_filter"/>
              <a href="" onclick="jQuery('#form_filter').find('#reset_form_filter').val('1');jQuery('#form_filter').submit();return false;" id="reset_anchor" >reset</a>
            </fieldset>
          </form>
        </div>
      </div>
      <div class="pager">
        Pilot Request per page:
        <?php
                      foreach ( $max_array as $i => $v ) {
                        if ( $i ) echo ' | ';
                        if ( $max != $v ):
        ?>
                          <a href='<?php echo url_for ( '/dashboard/index/max/' . $v . '/page/' . $pager->getPage () . '/return/dashboard' ) ?>' max ="<?php echo $v ?>" page='<?php echo $pager->getPage () ?>' ><?php echo $v ?></a>
        <?php else: ?>
        <?php echo $v ?>
        <?php endif; ?>
<?php } ?>
                          <div>
                            <form action="<?php echo url_for ( '@default_index?module=dashboard' ) ?>">
                              <a href="<?php echo url_for ( '/dashboard/index/max/' . $v . '/page/' . $pager->getPreviousPage () . '/return/dashboard' ) ?>" max="<?php echo $max ?>" page="<?php echo $pager->getPreviousPage () ?>"  class="btn-pager-prev"><?php echo $pager->getPreviousPage () ?></a>
                              <input type="text" max="<?php echo $max ?>" name="page" class="active-page" value="<?php echo $pager->getPage () ?>"/>
                              <input type="hidden" name="max" value="<?php echo $max ?>" />
                              <input type="hidden" name="return" value="dashboard" />
                              <strong>of <a href="<?php echo url_for ( '/dashboard/index/max/' . $v . '/page/' . $pager->getLastPage () . '/return/dashboard' ) ?>" max="<?php echo $max ?>" page="<?php echo $pager->getLastPage () ?>" ><?php echo $pager->getLastPage () ?></a></strong>
                              <a href="<?php echo url_for ( '/dashboard/index/max/' . $v . '/page/' . $pager->getNextPage () . '/return/dashboard' ) ?>" max="<?php echo $max ?>" page="<?php echo $pager->getNextPage () ?>" class="btn-pager-next"><?php echo $pager->getNextPage () ?></a>
                              <input type="submit" class="hide"/>
                            </form>
                          </div>
                        </div>
                        <!--  END PAGER-->
                        <div id="body_part">
                          <div class="pilot-request-table">
<?php if ( isset ( $pilot_reqs ) ): ?>
                            <table>
                              <thead>
                                <tr>
                                  <td class="cell-1">
                                    <a href="#">Request</a>
                                  </td>
                                  <td class="cell-2">
                                    <a href="#">ID</a>
                                  </td>
                                  <td class="cell-3">
                                    <a href="#">Date</a>
                                  </td>
                                  <td class="cell-4">
                                    <a href="#">Member</a>
                                  </td>
                                  <td class="cell-5">
                                    <a href="#">Type</a>
                                  </td>
                                  <td class="cell-6">
                                    <a href="#">Coordinator</a>
                                  </td>
                                  <td>
                                    <a href="#">Status</a>
                                  </td>
                                </tr>
                              </thead>
                              <tbody>
<?php foreach ( $pilot_reqs as $req ):
  if ($req instanceof PilotRequest) $req;?>
                              <tr>
                                <td class="cell-1">
                                  <strong class="date">
                    <?php
                              if ( $req->getDate () ) {
                                echo $req->getDate ( 'm/d/Y' );
                              }
                    ?>
                            </strong>
                            <!-- <em class="time">12:55:44 PM</em>-->
                          </td>
                          <td class="cell-2 mission-dtls">

                            <dl style="overflow: visible; ">
                              <dt style="float: none;">I:&nbsp;&nbsp;
                              <?php
                              $miss_date = $external_id = $mission_leg = $mission = $mission_trans = $o_airport = $d_airport = $person = $mission_type = null;
                              if ( $req->getLegId () ) {
                                $mission_leg = MissionLegPeer::retrieveByPK ( $req->getLegId () );
                                if ( isset ( $mission_leg ) ) {
                                  if ( $mission_leg->getMissionId () ) {
                                    $mission = MissionPeer::retrieveByPK ( $mission_leg->getMissionId () );
//                                    echo $mission->getId () . ' - ' . $mission_leg->getLegNumber ();
                                    echo $mission->getItineraryId();
                                    $external_id =  $mission->getExternalId () . ' - ' . $mission_leg->getLegNumber ();
                                    $miss_date = $mission->getMissionDate ( 'm/d/Y' );                                    
                                    switch ($mission_leg->getTransportation()) {
                                          case 'air_mission':  $mission_trans = 'Air Mission'; break;
                                          case 'ground_mission': $mission_trans =  'Ground Mission'; break;
                                          case 'commercial_mission': $mission_trans = 'Commercial Mission'; break;
                                    }
                                    if(isset($mission_leg) && $mission_trans == "Air Mission"){
                                      if($mission_leg->getFromAirportId()){
                                        $o_airport = AirportPeer::retrieveByPK($mission_leg->getFromAirportId());
                                      }
                                      if($mission_leg->getToAirportId()){
                                        $d_airport = AirportPeer::retrieveByPK($mission_leg->getToAirportId());
                                      }
                                    }
                                    if ($mission->getMissionType()) $mission_type = $mission->getMissionType()->getName();
                                    if($mission->getPassengerId()) {
                                        $person = PassengerPeer::retrieveByPK($mission->getPassengerId());
                                        $person = $person->getPerson();
                                    }
                                  }
                                }
                              }else echo ' ---';
                      ?>
                              <?php //echo $req->getId () ?>
                            </dt>
                            <dt>M: </dt>
                            <dd style="padding-left: 15px;overflow: visible; position: absolute;width: auto;">
                                <?php if($external_id) : ?>
                                  <a href="javascript:void(0)"><?php echo "&nbsp;".$external_id; ?></a>
                                  <div class="dtl-pop-up" style="left:65px;top:0px;">
                                    <div style="overflow: visible;" class="t"></div>
                                    <div class="c" style="padding-top:10px;padding-bottom:10px;color:#000;text-align:left;overflow: visible;">
                                        <div>Itinerary Id: <?php echo $mission->getItineraryId();?></div>
                                        <div>Mission Id: <?php echo $mission->getExternalId() . ' '. $mission_leg->getLegNumber()?></div>
                                        <?php if($mission_type):?>
                                            <div>Mission Type: <?php echo $mission_type?></div>
                                         <?php endif;?>
                                        <?php if($mission_trans):?>
                                            <div>Transportation: <?php echo $mission_trans?></div>
                                         <?php endif;?>
                                        <?php if($person):?>
                                            <div>Passenger : <?php if($person->getTitle()){ echo $person->getTitle().'. ';} echo $person->getName()?></div>
                                        <?php endif;?>
                                        <?php if($o_airport):?>
                                            <div>Origin Airport: </div>
                                            <div> Ident: <?php echo $o_airport->getIdent()?></div>
                                            <div> Name: <?php echo $o_airport->getName()?></div>
                                            <div> State: <?php echo $o_airport->getState()?></div>
                                         <?php endif;?>
                                         <?php if($d_airport):?>
                                            <div> Destination Airport: </div>
                                            <div> Ident: <?php echo $d_airport->getIdent()?></div>
                                            <div> Name: <?php echo $d_airport->getName()?></div>
                                            <div> State: <?php echo $d_airport->getState()?></div>
                                        <?php endif;?>
                                    </div>
                                    <div class="b" style="overflow: visible;"></div>
                                  </div> 
                                <?php else: echo '---'; endif;?>
                            </dd>
                          </dl>
                        </td>
                        <td class="cell-3">
                          <?php if(isset($miss_date))echo $miss_date; else echo '---';?>
                            </td>
                            <td class="cell-4 mission-dtls">
                              <dl style="overflow: visible; ">
                                  <dt style="float: none;"></dt>
                                  <dd style="overflow: visible; position: absolute;width: auto;">
                            <?php
                              if ( $req->getMemberId () ) {
                                $member = MemberPeer::retrieveByPK ( $req->getMemberId () );
                                if ( isset ( $member ) ) {
                                  $person = $member->getPerson ();
                                  $p_name = $person->getTitle () . ', ' . $person->getLastName () . ' ' . $person->getFirstName ();
                                  if ( isset ( $person ) ) { ?>
                                    <a href="javascript:void(0)"><?php echo $p_name?></a>
                                    <div class="dtl-pop-up" style="left:<?php echo (75 + strlen(trim($p_name)));?>px;top:5px;">
                                        <div style="overflow: visible;" class="t"></div>
                                        <div class="c" style="padding-top:10px;padding-bottom:10px;color:#000;text-align:left;overflow: visible;">
                                            <div class="person-info">
                                                <ul style="list-style-type: none">
                                                    
                                                        <li>Name: <?php echo ($person->getTitle()?$person->getTitle().'. ':'').$person->getName()?></li>
                                                        <li>Location:
                                                            <?php if ($person->getCity().$person->getState()){?>
                                                              <?php echo ($person->getCity()?$person->getCity().', ':'').$person->getState()?>
                                                            <?php }else echo "--";?>
                                                        </li>
                                                        <li>
                                                             Country: <?php echo $person->getCountry()?$person->getCountry():'--'?>
                                                        </li>
                                                    <?php $airport = $pilot = null;?>
                                                    <?php $pilot = $member->getPilot();?>
                                                    <?php if($pilot && $pilot->getPrimaryAirportId()):?>
                                                            <?php $airport = AirportPeer::retrieveByPK($pilot->getPrimaryAirportId())?>
                                                    <?php endif;?>
                                                    <?php if($airport):?>
                                                     <li>Airport</li>
                                                       <li>Identifier: <?php echo $airport->getIdent()?></li>
                                                       <li>Name: <?php echo $airport->getName()?></li>
                                                    <?php endif;?>
                                                    <?php if($pilot):?>
                                                        <li>Pilot Information</li>
                                                        <li>License Type: <?php echo $pilot->getLicenseType() ? $pilot->getLicenseType() : '--' ;?></li>
                                                        <li>IFR Rated: <?php echo ($pilot->getIfr()?'Yes':'No')?></li>
                                                        <li>Total Flight Hours: <?php echo $pilot->getTotalHours()?$pilot->getTotalHours():'--'?></li>
                                                        <li>Date Oriented: <?php echo $pilot->getOrientedDate()?$pilot->getOrientedDate():'--'?></li>
                                                        <li>Single-engine Instructor: <?php echo $pilot->getSeInstructor()? $pilot->getSeInstructor():'No'?></li>
                                                        <li>Multi-engine Instructor: <?php echo $pilot->getMeInstructor()? $pilot->getMeInstructor() :'No'?></li>
                                                        <li>Insurance Expiration: <?php echo $pilot->getInsuranceReceived()?$pilot->getInsuranceReceived():'--'?></li>
                                                        <li>HSEATS Status: <?php echo $pilot->getHseats()?$pilot->getHseats():'--'?></li>
                                                        <li>Transplant Pilot: <?php echo $pilot->getTransplant()?'Yes':'No'?></li>
                                                        <li>Date Oriented as MOP: <?php echo $pilot->getMopOrientedDate()?$pilot->getMopOrientedDate():'--'?></li>
                                                        <li>MOP served by: <?php echo $pilot->getMopServedBy() ? $pilot->getMopServedBy() :'--'?></li>
                                                        <li>Regions Served: <?php echo $pilot->getMopRegionsServed()?$pilot->getMopRegionsServed():'--'?></li>
                                                    <?php endif;?>
                                                </ul>
                                        </div>
                                        </div>
                                    <div class="b" style="overflow: visible;"></div>
                                  </div> 
                                    <?php 
                                    if ( $member->getFlightStatus () ) {
                                      echo '<br />' .$member->getFlightStatus ();
                                    }
                                  }
                                }
                              }
                              ?>
                                  </dd>
                              </dl>
                            </td>
                            <td class="cell-5">
                  <?php
                              if ( isset ( $member ) ) {
                                if ( $member->getFlightStatus () ) {
                                  echo $member->getFlightStatus ();
                                }
                              }
                  ?>
                              <em class="type-note">
                    <?php
                              if ( $req->getMissionAssistantWanted () == 1 ) {
                                echo 'Mission Assistant wanted!.';
                              }
                    ?>
                            </em>
                          </td>
                          <td class="cell-6">
                  <?php
                              if ( isset ( $member ) ) {
                                $coordinator = CoordinatorPeer::getByMemberId ( $member->getId () );
                                if ( isset ( $coordinator ) ) {
                                  echo $coordinator->getInitialContact ();
                                }else echo "&nbsp;";
                              }
                  ?>
                            </td>
                            <td>
                              <div class="status">
                    <?php
                              $newtimestamp = strtotime ( "-1 days", strtotime ( $req->getDate () ) );
                    ?>
                              <strong>
                      <?php
                              if ( date ( 'm/d/y', $newtimestamp ) <= $req->getDate () ) {
                                echo 'New';
                              }
                      ?>
                            </strong>
                            <em class="time">
                            </em>
                            <ul class="status-list">
                              <li>
                        <?php if ( $req->getAccepted () == 0 ): ?>
                                <a href="" onclick="onAccept(<?php echo $req->getId () . ',' . $req->getMemberId () ?>); return false;">ACCEPT</a>
                        <?php else: ?>
                                  <a href="" onclick="onDecline(<?php echo $req->getId () . ',' . $req->getMemberId () ?>); return false;">DECLINE</a>
                        <?php endif ?>
                                </li>
                                <li>
                        <?php if ( $req->getOnHold () == 0 ): ?>
                                    <a href="<?php echo url_for ( '@pilot_req_hold?id=' . $req->getId () . '&returnto=afids_pilot_requests' ) ?>" class="status-hold">PLACE ON HOLD</a>
                        <?php else: ?>
                                      <a href="<?php echo url_for ( '@pilot_req_hold?id=' . $req->getId () . '&returnto=afids_pilot_requests' ) ?>" class="status-hold">SET NOT HOLD</a>
                        <?php endif ?>
                                    </li>
                                  </ul>
                                </div>
                              </td>
                            </tr>
                            
                            <tr class="comment">
                              <td class="col-1">Comment:</td>
                              <td colspan="6">
                                  <?php if ( $req->getComment () ): ?>
                                        <div id="<?php echo 'edit_comment' . $req->getId () ?>">--<?php echo $req->getComment (); ?>--</div>
                                  <?php else: ?>
                                        <div id="<?php echo 'edit_comment' . $req->getId () ?>">--Click here leave comment--</div>
                                  <?php endif ?>
                                  <?php echo input_in_place_editor_tag ( 'edit_comment' . $req->getId (), 'pilotRequest/saveComment?id=' . $req->getId () . '&returnto=afids_pilot_requests', array ( 'save_text' => 'Save' ) ) ?>
                            </td>
                          </tr>

              <?php endforeach; ?>
                                        </tbody>
                                      </table>
          <?php endif; ?>
                                        </div>
                                      </div>


                                      <!--  END pilot-request-table-->

                                      <br/>

      <?php
                                          echo jq_form_remote_tag ( array (
                                              'update' => 'result',
                                              'url' => 'missionRequest/ajax',
                                              'method' => 'post',
                                                  ), array (
                                              'id' => 'form',
                                              'style' => 'display:block;'
                                          ) );
      ?>
                                          <input type="hidden" value="" id="start_date" name="start_date"/>
                                          <input type="hidden" value="" id="end_date" name="end_date"/>
                                          <input type="submit" class="hide" id="form_submit"/>
                                          <div id="result"></div>

                                          <div id="on_accept_container1" class="on-accept-dialog">
                                            Do you wish to add this pilot to the mission leg?
                                            <br />
                                          </div>

                                          <div id="on_accept_container2" class="on-accept-dialog">
                                            Do you wish to process all outstanding pilot requests?
                                            <br />
                                          </div>
                                          <div id="on_decline_container1" class="on-decline-dialog">
                                            Are you sure to decline this pilot from  the mission leg?
                                            <br />
                                          </div>

                                          <div id="on_decline_container2" class="on-decline-dialog">
                                            Do you wish to decline all outstanding pilot requests?
                                            <br />
                                          </div>

                                          <input type="hidden" value="0" id="leg_id" name="leg_id"/>
                                          <input type="hidden" value="0" id="mem_id" name="mem_id"/>
                                          <!--END PILOT REQ-->
                                          <script type="text/javascript">
                                            //<![CDATA[

<?php
                                          $dates = array ( );

                                          if ( isset ( $pilot_reqs ) ) {
                                            foreach ( $pilot_reqs as $req ) {
                                              $dates[ $req->getDate () ] = "{$req->getId ()} : '{$req->getDate ()}'";
                                            }
                                          }
?>
                                    var len = <?php echo sizeof ( $dates ) ?>;
                                    var dates = {<?php echo join ( ',', $dates ) ?>};

                                    var date1 = jQuery('#req_date1').val();
                                    var date2 = jQuery('#req_date2').val();

                                    function onAccept(leg_id,mem_id)
                                    {
                                    jQuery('#leg_id').val(leg_id);
                                    jQuery('#mem_id').val(mem_id);
                                    jQuery('#on_accept_container1').dialog('open');
                                    return false;
                                    }
                                    function onDecline(leg_id,mem_id)
                                    {
                                    jQuery('#leg_id').val(leg_id);
                                    jQuery('#mem_id').val(mem_id);
                                    jQuery('#on_decline_container1').dialog('open');
                                    return false;
                                    }

                                    jQuery('#on_accept_container1').dialog({
                                    autoOpen: false,
                                    modal: true,
                                    width: 200,
                                    buttons: {
                                    "Ok": function() {
                                    jQuery(this).dialog("close");
                                    jQuery('#on_accept_container2').dialog('open');
                                    },
                                    "Cancel": function() {
                                    jQuery(this).dialog("close");
                                    }
                                    }
                                    });

                                    jQuery('#on_accept_container2').dialog({
                                    autoOpen: false,
                                    width: 300,
                                    modal: true,
                                    buttons: {
                                    "Ok": function() {
                                    acceptAll( jQuery('#leg_id').val() , jQuery('#mem_id').val() );
                                    jQuery(this).dialog("close");
                                    },
                                    "Cancel": function() {
                                    acceptAllCancel(jQuery('#leg_id').val());
                                    jQuery(this).dialog("close");
                                    }
                                    }
                                    });

                                    function acceptAll(_id,memberid){
                                    jQuery.ajax({
                                    url: "/pilotRequest/acceptAll",
                                    data : { id: _id, member: memberid}
                                    });
                                    jQuery.ajax({
                                    url: "/pilotRequest/accept",
                                    data : { id: _id},
                                    success: function(leg_id){
                                    window.location = "/leg_view/"+leg_id;
                                    }});
                                    };

                                    function acceptAllCancel(_id){
                                    jQuery.ajax({
                                    url: "/pilotRequest/accept",
                                    data : { id: _id},
                                    success: function(leg_id){
                                    window.location = "/leg_view/" + leg_id;
                                    }});
                                    };

                                    jQuery('#on_decline_container1').dialog({
                                    autoOpen: false,
                                    width: 200,
                                    buttons: {
                                    "Ok": function() {
                                    jQuery.ajax({
                                    url: "/pilotRequest/accept",
                                    data : { id: jQuery('#leg_id').val()}
                                    });
                                    jQuery(this).dialog("close");
                                    jQuery('#on_decline_container2').dialog('open');
                                    },
                                    "Cancel": function() {
                                    jQuery(this).dialog("close");
                                    }
                                    }
                                    });

                                    jQuery('#on_decline_container2').dialog({
                                    autoOpen: false,
                                    width: 300,
                                    buttons: {
                                    "Ok": function() {
                                    jQuery.ajax({
                                    url: "/pilotRequest/declineAll",
                                    data : { id: jQuery('#leg_id').val(), member: jQuery('#mem_id').val()},
                                    success: function(){
                                    window.location = "/dashboard/index?return=1";
                                    }});
                                    jQuery(this).dialog("close");
                                    },
                                    "Cancel": function() {
                                    jQuery.ajax({
                                    success: function(){
                                    window.location = "/dashboard/index?return=1";
                                    }});
                                    jQuery(this).dialog("close");
                                    }
                                    }
                                    });

                                    jQuery('#req_date1').datepicker();
                                    jQuery('#req_date2').datepicker();
                                    jQuery('#miss_date1').datepicker();
                                    jQuery('#miss_date2').datepicker();


                                    //]]>
                                          </script>


                                        </div>
                                      </div>

                                      <div class="frame requests" id="member_requests_table" style="display:none;">
                                        <table class="table-head">
                                          <tbody>
                                            <tr>
                                              <td class="cell-1">date</td>
                                              <td class="cell-2">name</td>
                                              <td class="cell-3">pilot status</td>
                                              <td class="cell-4">email</td>
                                              <td class="cell-5">type</td>
                                              <td class="cell-6">flag</td>
                                            </tr>
                                          </tbody>
                                        </table>
                                        <div class="holder">
                                          <table>
                                            <tbody>
          <?php foreach ( $member_requests as $application_temp ) {
          ?>
                                            <tr onclick="var l='<?php echo url_for ( 'pending_member/show?id=' . $application_temp->getId () ) ?>'; if (event.ctrlKey) window.open(l, ''); else document.location=l;" style="cursor:pointer;">
                                              <td class="cell-1">
              <?php echo $application_temp->getApplicationDate ( 'm/d/Y' ) ?>
              <?php echo $application_temp->getApplicationDate ( 'g:I A' ) ?>
                                          </td>
                                          <td class="cell-2">
              <?php echo $application_temp->getFirstName () . ' ' . $application_temp->getLastName () ?>
                                          </td>
                                          <td class="cell-3">
              <?php echo $application_temp->getApplicantPilot ()
                                                      ? 'Pilot' : 'Non-pilot' ?>
              <?php if ( $application_temp->getSpousePilot () )
                                                echo '<br/>Spouse: Pilot' ?>
                                            </td>
                                            <td class="cell-4">
<?php echo $application_temp->getEmail () ?>
                                            </td>
                                            <td class="cell-5">
<?php echo $application_temp->getDayPhone () ?>
                                            </td>
                                            <td class="cell-6">
              <?php
                                              $ts = ( int ) $application_temp->getApplicationDate ( 'U' );
                                              $day = 86400;
              ?>
              <?php if ( $ts > time() - $day ) { ?>
                                                <img alt="flag" src="/images/ico-flag-2.gif"/>
              <?php } elseif ( $ts < time() - 7 * $day ) {
              ?>
                                                <img alt="flag" src="/images/ico-flag-1.gif"/>
              <?php } elseif ( $ts < time() - 3 * $day ) {
 ?>
                                                <img alt="flag" src="/images/ico-flag-3.gif"/>
<?php } ?>
                                            </td>
                                          </tr>
<?php } ?>
        </tbody>
      </table>
    </div>
  </div>
</div>