<div class="interest-missions">
<h3>Below are other missions you may be interested in</h3>
<?php foreach ($missions as $mission):?>
    <?php $mission_legs = $mission->getMissionLegs();?>
    <?php $miss_legs = MissionLegPeer::getbyMissId($mission->getId()); ?>
     <?php if(count($miss_legs) > 0):?>
            <!--      CHANGE IF CLICK DETAIL-->
            <div class="holder">
                <dl class="mission-criteria">
                    <dt>Itinerary:</dt>
                    <dd>
                        <?php $o_mission = MissionPeer::retrieveByPK($mission->getId())?>
                        <?php if(isset($o_mission)):?>
                            <?php
                                if($o_mission->getItineraryId()){
                                    $iti = ItineraryPeer::retrieveByPK($o_mission->getItineraryId());
                                    if(isset($iti)){
                                        echo $iti->getId();
                                    }
                                }
                            ?>
                        <?php endif;?>
                    </dd>
                    <dt>Mission:</dt>
                    <dd><?php
                        if(isset($mission)){
                            echo $mission->getId();
                        }
                        ?>
                    </dd>
                    <dt>Passenger Type:</dt>
                    <dd><?php
                        if(isset($mission)){
                            if($mission->getPassengerId()){
                                $pass = $mission->getPassenger();
                                $pass_type = $pass->getPassengerType();

                                if(isset($pass_type)){
                                        echo $pass_type->getName();
                                }
                            }
                        }
                        ?>
                    </dd>
                    <dt>Illness:</dt>
                    <dd><?php
                        if(isset($mission)){
                                if($mission->getPassengerId()){
                                        $pass = $mission->getPassenger();
                                        if(isset($pass)){
                                                echo $pass->getIllness();
                                        }
                                }
                        }
                        ?>
                    </dd>
                    <dt>Mission Type:</dt>
                    <dd><?php
                        if(isset($mission)){
                            if($mission->getPassengerId()){
                                    $pass = $mission->getPassenger();
                                    $pass_type = $pass->getPassengerType();

                                    if(isset($pass_type)){
                                            echo $pass_type->getName();
                                    }
                            }
                        }
                        ?>
                    </dd>
                    <dt>
                        <a href="javascript:closeAll(<?php echo $mission->getId()?>)" id="close_all">close all</a>
                    </dt>
                </dl>
                <div class="interest-missions-info">
                <div class="frame">
                <div class="bg" id="<?php echo 'bg_'.$mission->getId()?>">
                <dl class="mission-time">
                    <dt>Date:</dt>
                    <dd><strong> <?php
                    if(isset($mission)){
                            if($mission->getMissionDate()){
                                if(($mission->getMissionDate('m/d/y') == $mission->getApptDate('m/d/y')) || !($mission->getApptDate()))
                                    echo $mission->getMissionDate('m/d/y').'('.date('l',strtotime($mission->getMissionDate())).')';
                                else
                                    echo $mission->getMissionDate('m/d/y').'('.date('l',strtotime($mission->getMissionDate())).')'.' to '.$mission->getApptDate('m/d/y').'('.date('l',strtotime($mission->getApptDate())).')';
                            }else{
                                echo '--';
                            }
                    }
                    ?> </strong></dd>
                    <dt>Time:</dt>
                    <dd>Can leave anytime</dd>
                </dl>
                <dl class="flight-path">
                    <dt>Flight Path:</dt>
                    <dd><?php
                        $miss_legs = MissionLegPeer::getbyMissId($mission->getId());
                        $airport_ident_from = array();
                        $airport_ident_to = array();
                        $c= 0;
                        foreach ($miss_legs as $legg){
                                if($legg->getTransportation() == 'air_mission'){
                                        $airport_ident_from[$c] = AirportPeer::retrieveByPK($legg->getFromAirportId())->getIdent();
                                        $airport_ident_to[$c] = AirportPeer::retrieveByPK($legg->getToAirportId())->getIdent();
                                        $c++;
                                }
                        }
                        ?> <?php for($i=0;$i<$c;$i++):?> <?php echo $airport_ident_from[$i].' '.$airport_ident_to[$i]?>
                        <?php endfor?>
                    </dd>
                </dl>
                <dl class="mission-ad-info">
                <?php
                //$pass_comps = MissionCompanionPeer::selectMissionById($mission->getId());
                //$pass_count = count($pass_comps);

                if(isset($mission)){
                    if($mission->getPassengerId()){
                            $pass = PassengerPeer::retrieveByPK($mission->getPassengerId());
                    }
                    if(isset($pass)){
                        $comps = CompanionPeer::getByPassId($pass->getId());
                        $county = 0;
                        $weg = 0;
                        foreach ($comps as $comp){
                                $county ++;
                                $weg = $weg + $comp->getWeight();
                        }
                        if($county != 0 && isset($pass)){
                                //echo 1+$county;
                        }
                    }
                }
                ?>
                <dt>Passengers:</dt>
                <dd><?php
                //$pass_count++; echo $pass_count
                echo 1+$county;
                ?></dd>
                <?php
                //                        $mis_pass = PassengerPeer::retrieveByPK($mission->getPassengerId());
                //                        $pass_weight = $mis_pass->getWeight();
                //                        $comp_weight = $pass_weight;
                //                        foreach($pass_comps as $pass_comp){
                //                            $one_comp = CompanionPeer::retrieveByPK($pass_comp->getCompanionId());
                //                            $one_weight = $one_comp->getWeight();
                //                            $comp_weight+=$one_weight;
                //                        }
                ?>
                <dt>Weight:</dt>
                <dd><?php
                //echo $comp_weight;
                if(isset($pass) && isset($weg)){
                        echo $pass->getWeight()+$weg;
                }else{
                        echo $pass->getWeight();
                }
                ?></dd>
            </dl>
            <a class="btn-dtls" href="javascript:getLegs(<?php echo $mission->getId()?>)">
                <span>Details</span>
            </a>
        </div>
<!--              END BG--></div>
<!--            End FRAME--></div>
<!--          END interest-missions-info--> <!--        END HOLDER--> <?php
if(isset($mission)){
	$o_mission_legs = MissionLegPeer::getbyMissId($mission->getId());
}
?> <?php $other = 0?> <!--   START INTEREST"S LEGS -->
<div class="location-matches-info" id="<?php echo 'other_leg'.$mission->getId()?>" style="display: none">
    <div class="frame">
    <div class="bg">
    <div class="route"><strong>TO TREATMENT:</strong>
    <ul>
            <li><img alt="ico" src="/images/ico-home.gif" /></li>
            <li>
                <?php foreach ($o_mission_legs as $mission_leg):?>
                    <?php if($mission_leg->getTransportation() == 'ground_mission' && $mission_leg->getGroundOrigin() == 'patient' && $mission_leg->getGroundDestination() == 'lodging'):?>
                        <?php if(isset($mission_leg) && $mission_leg->getCancelled() == null):?>
                            <a href="#" onclick="return false">
                                <img alt="ico" src="/images/ico-car-active.gif" />
                            </a>
                        <?php else:?>
                        <a href="#" onclick="return false"> <img alt="ico" src="/images/ico-car.gif" /> </a>
                        <?php endif;?>
                    <?php endif;?>
               <?php endforeach;?>
            </li>
            <?php foreach ($o_mission_legs as $mission_leg):?>
                <?php if(isset($mission_leg) && $mission_leg->getTransportation() == 'air_mission' && $mission_leg->getCancelled() == null && $mission_leg->getId() == $mission_leg->getReverseFrom()):?>
                    <li>
                        <a class="leg-link" href="javascript:getOtherInfo(<?php echo $mission->getId().$mission_leg->getLegNumber()?>)"
                            id="<?php echo 'leg_'.$mission->getId().$mission_leg->getLegNumber()?>" onclick="return false">
                                    <?php echo 'Leg '.$mission_leg->getLegNumber()?>
                        </a>
                    </li>
                <?php elseif($mission_leg->getTransportation() == 'air_mission' && $mission_leg->getId() == $mission_leg->getReverseFrom()):?>
                    <li class="disabled" id="<?php echo 'off_leg'.$mission->getId().$mission_leg->getLegNumber()?>">
                        <a class="leg-link" href="javascript:getOtherInfo(<?php echo $mission->getId().$mission_leg->getLegNumber()?>)"
                    id="<?php echo 'leg_'.$mission->getId().$mission_leg->getLegNumber()?>" onclick="return false">
                            <?php echo 'Leg '.$mission_leg->getLegNumber()?>
                        </a>
                    </li>
                <?php endif;?>
            <?php endforeach;?>
            <li>
                <a href="#">
                 <?php foreach ($o_mission_legs as $mission_leg):?>
                    <?php if($mission_leg->getTransportation() == 'ground_mission' && $mission_leg->getGroundOrigin() == 'lodging' &&  $mission_leg->getGroundDestination() == 'facility'):?>
                        <?php if(isset($mission_leg) && $mission_leg->getCancelled() == null):?>
                            <a href="#" onclick="return false">
                                <img alt="ico" src="/images/ico-car-active.gif" />
                            </a>
                        <?php else:?>
                            <a href="#" onclick="return false">
                                <img alt="ico" src="/images/ico-car.gif" />
                            </a>
                        <?php endif;?>
                    <?php endif;?>
                 <?php endforeach;?>
                </a>
            </li>
            <li><img alt="ico" src="/images/ico-hospital.gif" /></li>
        </ul>
    </div>
    <!--END ROUTE-->
<?php if(isset($o_mission_legs)):?> 
    <?php foreach ($o_mission_legs as $leg){
            if($leg->getReverseFrom() == $leg->getId()){ ?>
             <?php if($leg->getCancelled()){
                            $display = 'leg-info disabled';
                    }else{
                            $display = 'leg-info';
                    }
             ?>
    <table class="<?php echo $display?>" id="<?php echo 'leg_o_info'.$mission->getId().$leg->getLegNumber()?>">
         <tbody>
             <tr>
                 <td class="cell-1">
                     <strong class="leg">
                        <?php if($leg->getLegNumber()){ echo 'Leg '.$leg->getLegNumber(); }?> <br />
                        <?php
                         if($leg->getTransportation() == 'ground_mission'){
                             echo 'ground';
                         }
                        ?>
                     </strong>
                     <dl class="mission-time">
                        <dt>Date:</dt>
                        <dd><strong> <?php
                        $miss = MissionPeer::retrieveByPK($leg->getMissionId());
                        if(isset($miss)){
                                if($miss->getMissionDate()){
                                        if($miss->getApptDate()) 
                                             echo $miss->getMissionDate('m/d/y').'('.date('l',strtotime($miss->getMissionDate())).')'.' to'.$miss->getApptDate('m/d/y').'('.date('l',strtotime($miss->getApptDate())).')';
                                        else echo $miss->getMissionDate('m/d/y').'('.date('l',strtotime($miss->getMissionDate())).')';
                                }else{
                                        echo '--';
                                }
                        }
                        ?> </strong> <!--                          <strong>8/2/09</strong>-->
                        <!--                          (Sat) to--> <!--                          <strong>8/3/09</strong>-->
                        <!--                          (Sun)--></dd>
                        <dt>Time:</dt>
                        <dd><?php
                        if(isset($miss)){
                                if($miss->getFlightTime()){
                                        echo $miss->getFlightTime();
                                }else{
                                        echo 'Can leave anytime';
                                }
                        }
                        ?></dd>
                </dl>
                </td>
                            <td class="cell-2">
                            <dl class="destination-list">
                                    <dt>From:</dt>
                                    <dd><strong> <?php if($leg->getTransportation() =='air_mission'):?>
                                    <?php
                                    if($leg->getFromAirportId()){
                                            $airport_from = AirportPeer::retrieveByPK($leg->getFromAirportId());
                                            if(isset($airport_from)){
                                                    echo $airport_from->getIdent                                                              ();
                                            }
                                    }
                                    ?> </strong> <?php
                                    if(isset($airport_from)){
                                            if($airport_from->getCity() || $airport_from->getState()){
                                                    echo '( '.$airport_from->getCity() . ', ' . $airport_from->getState() .' )';
                                            }
                                    }
                                    ?> <?php elseif($leg->getTransportation() =='ground_mission'):?> <?php echo $leg->getGroundOrigin()?>
                                    <?php endif?> <em>PST</em></dd>
                                    <dt>To:</dt>
                                    <dd><strong> <?php if($leg->getTransportation() == 'air_mission'):?>
                                    <?php
                                    if($leg->getToAirportId()){
                                            $airport_to = AirportPeer::retrieveByPK($leg->getToAirportId());
                                            if(isset($airport_to)){
                                                    echo $airport_to->getIdent();
                                            }
                                    }
                                    ?> </strong> <?php
                                    if(isset($airport_to)){
                                            if($airport_to->getCity() || $airport_to->getState()){
                                                    echo '( '.$airport_to->getCity() . ', ' . $airport_to->getState() .' )';
                                            }
                                    }
                                    ?> <?php elseif($leg->getTransportation() =='ground_mission'):?> <?php echo $leg->getGroundDestination()?>
                                    <?php endif?> <em>PST</em></dd>
                            </dl>
                            </td>
                            <td class="cell-3">
                            <dl class="mission-ad-info">
                                    <dt>Passengers:</dt>
                                    <dd><?php
                                    if(isset($mission)){
                                            if($mission->getPassengerId()){
                                                    $pass = PassengerPeer::retrieveByPK($mission->getPassengerId());
                                            }
                                            if(isset($pass)){
                                                    $comps = CompanionPeer::getByPassId($pass->getId());
                                                    $county = 0;
                                                    $weg = 0;
                                                    foreach ($comps as $comp){
                                                            $county ++;
                                                            $weg = $weg + $comp->getWeight();
                                                    }
                                                    if($county != 0 && isset($pass)){
                                                            echo 1+$county;
                                                    }
                                            }
                                    }
                                    ?></dd>
                                    <dt>Weight:</dt>
                                    <dd><?php
                                    if(isset($pass) && isset($weg)){
                                            echo $pass->getWeight()+$weg;
                                    }else{
                                            echo $pass->getWeight();
                                    }
                                    ?></dd>
                            </dl>
                            </td>
                            <td class="cell-4">
                            <dl class="mission-ad-info">
                                    <dt>Distance:</dt>
                                    <dd><?php
                                    if ($leg->getTransportation() == 'air_mission') {
                                            $fa = $leg->getAirportRelatedByFromAirportId();
                                            $ta = $leg->getAirportRelatedByToAirportId();
                                            $dist = distance($fa->getLatitude(), $fa->getLongitude(), $ta->getLatitude(), $ta->getLongitude()).'mi';
                                            echo $dist ? $dist : 0;
                                    }else{
                                            echo "-";
                                    }
                                    ?></dd>
                                    <dt>Efficiency:</dt>
                                    <dd><?php if ($airport && $leg->getTransportation() == 'air_mission') {
                                            $fa = $leg->getAirportRelatedByFromAirportId();
                                            $ta = $leg->getAirportRelatedByToAirportId();
                                            echo efficiency($airport->getLatitude(), $airport->getLongitude(), $fa->getLatitude(), $fa->getLongitude(), $ta->getLatitude(), $ta->getLongitude()).'%';
                                    }else{
                                            echo "-";
                                    }?></dd>
                            </dl>
                            </td>
                    </tr>
            </tbody>
    </table>
    <table class="leg-comment"
            id="<?php echo 'leg_o_com'.$mission->getId().$leg->getLegNumber()?>">
            <tbody>
                    <tr>
                            <td class="cell-1">Comment:</td>
                            <td><?php if($display == 'leg-info'):?> <?php if($mission->getMissionSpecificComments()):?>
                            <div id="<?php echo 'edit_comment2'.$mission->getId()?>">--<?php echo $mission->getMissionSpecificComments();?>--</div>
                            <?php else:?>
                            <div id="<?php echo 'edit_comment2'.$mission->getId()?>">--Click here
                            leave comment--</div>
                            <?php endif?> <?php if($other == 0):?> <?php echo input_in_place_editor_tag('edit_comment2'.$mission->getId(), 'pilotRequest/saveCommentMission?id='.$mission->getId(),array('save_text'=>'Save')) ?>
                            <?php $other++?> <?php endif?> <?php if($mission->getMissionDate() && $mission->getApptDate()):?>
                            <span>Special conditions and circumstances listed here.</span> <?php if($leg->getTransportation() == 'air_mission'):?>

                            <?php
                            if ($member) $is_has_requested = PilotRequestPeer::getByMemnerIdLegId($member->getId(),$leg->getId());
                            ?> <?php if(!isset($is_has_requested)):?> <a
                                    href="<?php echo url_for('@pilot_request?id='.$leg->getId())?>"
                                    class="btn-request"> <span>Request This Mission</span> </a> <?php else:?>
                            <a href="#" class="btn-request"> <span>Already Requested!</span> </a>
                            <?php endif;?> <?php endif?> <?php else:?>
                            <div align="left"><a
                                    href="<?php echo url_for('@mission_view?id='.$mission->getId())?>">
                                    <?php if(!$mission->getMissionDate()):?> <span> Mission Date
                            Required </span> <?php elseif(!$mission->getApptDate()):?> <span>
                            Appointment Date Required </span> <?php elseif(!$mission->getMissionDate() && !$mission->getApptDate()):?>
                            <span> Appointment Date and Mission Date Required </span> <?php endif;?>
                            </a></div>
                            <?php endif;?> <?php endif;?></td>
                    </tr>
            </tbody>
    </table>
    <?php $dis = 'none';?> <?php
            };
    };?> <?php endif;?>
    <div class="route"><strong>RETURN HOME:</strong>
    <ul>
            <li><img alt="ico" src="/images/ico-hospital.gif" /></li>
            <li><?php $down_legs = MissionLegPeer::getbyMissIdDown($mission->getId())?>
            <?php foreach ($mission_legs as $mission_leg):?> <?php if($mission_leg->getTransportation() == 'ground_mission' && $mission_leg->getGroundOrigin() == 'facility' && $mission_leg->getGroundDestination() == 'lodging'):?>
            <?php if(isset($mission_leg) && $mission_leg->getCancelled() == null):?>
            <a
                    href="javascript:getInfo(<?php echo $mission->getID().$mission_leg->getLegNumber()?>)"
                    id="leg_.<?php echo $mission->getID().$mission_leg->getLegNumber()?>">
            <img alt="ico" src="/images/ico-car-active.gif" /> </a> <?php else:?> <a
                    href="javascript:getInfo(<?php echo $mission->getID().$mission_leg->getLegNumber()?>)"
                    id="leg_.<?php echo $mission->getID().$mission_leg->getLegNumber()?>">
            <img alt="ico" src="/images/ico-car.gif" /> </a> <?php endif;?> <?php endif;?>
            <?php endforeach;?></li>

            <li class="disabled"><?php foreach ($down_legs as $mission_leg):?> <?php if(isset($mission_leg) && $mission_leg->getCancelled() == null && $mission_leg->getTransportation() == 'air_mission' && $mission_leg->getId() != $mission_leg->getReverseFrom()):?>

            <li class=""
                    id="<?php echo 'on_leg'.$mission->getId().$mission_leg->getLegNumber()?>">
            <a class="leg-link"
                    href="javascript:getInfo(<?php echo $mission->getId().$mission_leg->getLegNumber()?>)"
                    id="<?php echo 'leg_'.$mission->getId().$mission_leg->getLegNumber()?>"><?php echo 'Leg '.$mission_leg->getLegNumber()?></a>
                    <?php
                    $mission_legs = MissionLegPeer::getbyMissId($mission->getId());
                    $count = 0;
                    $last_leg = 0;
                    ?> <?php foreach ($mission_legs as $own_leg):?> <?php $count++;?> <?php endforeach;?>
            </li>
            <?php elseif($mission_leg->getTransportation() == 'air_mission' && $mission_leg->getId() != $mission_leg->getReverseFrom()):?>
            <li class="disabled"
                    id="<?php echo 'off_leg'.$mission->getId().$mission_leg->getLegNumber()?>">
            <a class="leg-link"
                    href="javascript:getInfo(<?php echo $mission->getId().$mission_leg->getLegNumber()?>)"
                    id="<?php echo 'leg_'.$mission->getId().$mission_leg->getLegNumber()?>"><?php echo 'Leg '.$mission_leg->getLegNumber()?></a>
            </li>
            <?php endif;?> <?php endforeach;?>
            <li><?php foreach ($mission_legs as $mission_leg):?> <?php if($mission_leg->getTransportation() == 'ground_mission' && $mission_leg->getGroundOrigin() == 'lodging' && $mission_leg->getGroundDestination() == 'patient'):?>
            <?php if(isset($mission_leg) && $mission_leg->getCancelled() == null):?>
            <a
                    href="javascript:getInfo(<?php echo $mission->getID().$mission_leg->getLegNumber()?>)"
                    id="leg_.<?php echo $mission->getID().$mission_leg->getLegNumber()?>">
            <img alt="ico" src="/images/ico-car-active.gif" /> </a> <?php else:?> <a
                    href="javascript:getInfo(<?php echo $mission->getID().$mission_leg->getLegNumber()?>)"
                    id="leg_.<?php echo $mission->getID().$mission_leg->getLegNumber()?>">
            <img alt="ico" src="/images/ico-car.gif" /> </a> <?php endif;?> <?php endif;?>
            <?php endforeach;?></li>
            <li><img alt="ico" src="/images/ico-home.gif" /></li>

    </ul>
    </div>
    <!--              END ROUTE--> <?php if(isset($o_mission_legs)):?> <?php
    foreach ($o_mission_legs as $leg){
            if($leg->getReverseFrom() != $leg->getId()){
                    ?> <?php if($leg->getCancelled()){
                            $display = 'leg-info disabled';
                    }else{
                            $display = 'leg-info';
                    }
                    ?>
    <table class="<?php echo $display?>"
            id="<?php echo 'leg_o_info'.$mission->getId().$leg->getLegNumber()?>">
            <tbody>
                    <tr>
                            <td class="cell-1"><strong class="leg"> <?php
                            if($leg->getLegNumber()){
                                    echo 'Leg '.$leg->getLegNumber();
                            }?> <br />
                            <?php
                            if($leg->getTransportation() == 'ground_mission'){
                                    echo 'ground';
                            }
                            ?> </strong>
                            <dl class="mission-time">
                                    <dt>Date:</dt>
                                    <dd><strong> <?php
                                    $miss = MissionPeer::retrieveByPK($leg->getMissionId());
                                    if(isset($miss)){
                                            if($miss->getMissionDate()){
                                                if($miss->getApptDate())
                                                    echo $miss->getMissionDate('m/d/y').' ( '.date('l',strtotime($miss->getMissionDate())).' )'.' to '.$miss->getApptDate('m/d/y').' ( '.date('l',strtotime($miss->getApptDate())).' )';
                                                else echo $miss->getMissionDate('m/d/y').' ( '.date('l',strtotime($miss->getMissionDate())).' )';
                                            }else{
                                                    echo '--';
                                            }
                                    }
                                    ?> </strong> <!--                          <strong>8/2/09</strong>-->
                                    <!--                          (Sat) to--> <!--                          <strong>8/3/09</strong>-->
                                    <!--                          (Sun)--></dd>
                                    <dt>Time:</dt>
                                    <dd><?php
                                    if(isset($miss)){
                                            if($miss->getFlightTime()){
                                                    echo $miss->getFlightTime();
                                            }else{
                                                    echo 'Can leave anytime';
                                            }
                                    }
                                    ?></dd>
                            </dl>
                            </td>
                            <td class="cell-2">
                            <dl class="destination-list">
                                    <dt>From:</dt>
                                    <dd><strong> <?php if($leg->getTransportation() =='air_mission'):?>
                                    <?php
                                    if($leg->getFromAirportId()){
                                            $airport_from = AirportPeer::retrieveByPK($leg->getFromAirportId());
                                            if(isset($airport_from)){
                                                    echo $airport_from->getIdent();
                                            }
                                    }
                                    ?> </strong> <?php
                                    if(isset($airport_from)){
                                            if($airport_from->getCity() || $airport_from->getState()){
                                                    echo '( '.$airport_from->getCity() . ', ' . $airport_from->getState() .' )';
                                            }
                                    }
                                    ?> <?php elseif($leg->getTransportation() =='ground_mission'):?> <?php echo $leg->getGroundOrigin()?>
                                    <?php endif?> <em>PST</em></dd>
                                    <dt>To:</dt>
                                    <dd><strong> <?php if($leg->getTransportation() == 'air_mission'):?>
                                    <?php
                                    if($leg->getToAirportId()){
                                            $airport_to = AirportPeer::retrieveByPK($leg->getToAirportId());
                                            if(isset($airport_to)){
                                                    echo $airport_to->getIdent();
                                            }
                                    }
                                    ?> </strong> <?php
                                    if(isset($airport_to)){
                                            if($airport_to->getCity() || $airport_to->getState()){
                                                    echo '( '.$airport_to->getCity() . ', ' . $airport_to->getState() .' )';
                                            }
                                    }
                                    ?> <?php elseif($leg->getTransportation() =='ground_mission'):?> <?php echo $leg->getGroundDestination()?>
                                    <?php endif?> <em>PST</em></dd>
                            </dl>
                            </td>
                            <td class="cell-3">
                            <dl class="mission-ad-info">
                                    <dt>Passengers:</dt>
                                    <dd><?php
                                    if(isset($mission)){
                                            if($mission->getPassengerId()){
                                                    $pass = PassengerPeer::retrieveByPK($mission->getPassengerId());
                                            }
                                            if(isset($pass)){
                                                    $comps = CompanionPeer::getByPassId($pass->getId());
                                                    $county = 0;
                                                    $weg = 0;
                                                    foreach ($comps as $comp){
                                                            $county ++;
                                                            $weg = $weg + $comp->getWeight();
                                                    }
                                                    if($county != 0 && isset($pass)){
                                                            echo 1+$county;
                                                    }
                                            }
                                    }
                                    ?></dd>
                                    <dt>Weight:</dt>
                                    <dd><?php
                                    if(isset($pass) && isset($weg)){
                                            echo $pass->getWeight()+$weg;
                                    }else{
                                            echo $pass->getWeight()?$pass->getWeight():"-";
                                    }
                                    ?></dd>
                            </dl>
                            </td>
                            <td class="cell-4">
                            <dl class="mission-ad-info">
                                    <dt>Distance:</dt>
                                    <dd><?php
                                    if ($leg->getTransportation() == 'air_mission') {
                                            $fa = $leg->getAirportRelatedByFromAirportId();
                                            $ta = $leg->getAirportRelatedByToAirportId();
                                            $dist = distance($fa->getLatitude(), $fa->getLongitude(), $ta->getLatitude(), $ta->getLongitude()).'mi';
                                            echo $dist ? $dist : 0;
                                    }else{
                                            echo "-";
                                    }
                                    ?></dd>
                                    <dt>Efficiency:</dt>
                                    <dd><?php if ($airport && $leg->getTransportation() == 'air_mission') {
                                            $fa = $leg->getAirportRelatedByFromAirportId();
                                            $ta = $leg->getAirportRelatedByToAirportId();
                                            echo efficiency($airport->getLatitude(), $airport->getLongitude(), $fa->getLatitude(), $fa->getLongitude(), $ta->getLatitude(), $ta->getLongitude()).'%';
                                    }else{
                                            echo "-";
                                    }?></dd>
                            </dl>
                            </td>
                    </tr>
            </tbody>
    </table>
    <table class="leg-comment"
            id="<?php echo 'leg_o_com'.$mission->getId().$leg->getLegNumber()?>">
            <tbody>
                    <tr>
                            <td class="cell-1">Comment:</td>
                            <td><?php if($display == 'leg-info'):?> <?php if($mission->getMissionSpecificComments()):?>
                            <div id="<?php echo 'edit_comment2'.$mission->getId()?>">--<?php echo $mission->getMissionSpecificComments();?>--</div>
                            <?php else:?>
                            <div id="<?php echo 'edit_comment2'.$mission->getId()?>">--Click here
                            leave comment--</div>
                            <?php endif?> <?php if($other == 0):?> <?php echo input_in_place_editor_tag('edit_comment2'.$mission->getId(), 'pilotRequest/saveCommentMission?id='.$mission->getId(),array('save_text'=>'Save')) ?>
                            <?php $other++?> <?php endif?> <?php if($mission->getMissionDate() && $mission->getApptDate()):?>
                            <span>Special conditions and circumstances listed here.</span> <?php if($leg->getTransportation() == 'air_mission'):?>
                            <?php
                            if ($member) $is_has_requested = PilotRequestPeer::getByMemnerIdLegId($member->getId(),$leg->getId());
                            ?> <?php if(!isset($is_has_requested)):?> <a
                                    href="<?php echo url_for('@pilot_request?id='.$leg->getId())?>"
                                    class="btn-request"> <span>Request This Mission</span> </a> <?php else:?>
                            <a href="#" class="btn-request"> <span>Already Requested!</span> </a>
                            <?php endif;?> <?php endif?> <?php else:?>
                            <div align="left"><a
                                    href="<?php echo url_for('@mission_view?id='.$mission->getId())?>">
                                    <?php if(!$mission->getMissionDate()):?> <span> Mission Date
                            Required </span> <?php elseif(!$mission->getApptDate()):?> <span>
                            Appointment Date Required </span> <?php elseif(!$mission->getMissionDate() && !$mission->getApptDate()):?>
                            <span> Appointment Date and Mission Date Required </span> <?php endif;?>
                            </a></div>
                            <?php endif;?> <?php endif;?></td>
                    </tr>
            </tbody>
    </table>
    <?php $dis = 'none';?> <?php
            };
    };?> <?php endif;?></div>
    <!--            END BG--></div>
<!--          END FRAME--></div>
<!--        Location matches info--> <!--      END INTERES'S LEG-->
<ul class="discussion">
	<li><a href="javascript:showDiscussions2(<?php echo $leg->getId()?>)">Discussion
	<?php
	$leg_discussions = DiscussionPeer::getByLegID($leg->getId());
    $isSplitMission = false;
	if(isset($leg_discussions)){
		$count = 0;        
		foreach ($leg_discussions as $discussion){
			$count++;
            if($discussion->getIsSplit()){
               $isSplitMission = true;
            }
		}
		if($count > 0){
			echo '( '.$count.' )';
		}
	}
	?> <?php if($count > 0):?><input type="hidden"
		id="<?php echo "discussion".$leg->getId()?>"
		value="<?php echo $count?>" /><?php endif;?> </a></li>
	<?php if($isSplitMission):?>
        <li><img alt="ico" src="/images/ico-split.gif" /> A split mission has been suggested</li>
    <?php endif;?>
</ul>
<div class="comment-box" style="display:<?php echo $leg->getId() == $sf_params->get("display") ? "block" : "none"?>" id="<?php echo "comments_2".$leg->getId()?>">
<a class="btn-close"
	href="javascript:close2(<?php echo $leg->getId()?>)">Close</a>
<div class="wrap">
<p>Instructions for posting comments...Lorem ipsum dolor sit amet,
consectetur adipiscing elit. Nullam vitae ligula sem. Vivamus ege stas,
mi vel tincidunt aliquam, felis metus faucibus justo, fringilla interdum
mi quam et erat.</p>
<?php if(isset($leg_discussions)):?> <?php foreach ($leg_discussions as $dis):?>
<div class="box">
<ul>
	<li>
	<h4><?php
	if($dis->getUserId()){
		$person = PersonPeer::retrieveByPK($dis->getUserId());
		if(isset($person)){
			echo $person->getTitle().', '.$person->getLastName().' '.$person->getFirstName();
		}
	}
	?></h4>
	<?php if($dis->getIsSplit()):?>
		<input type="checkbox" checked="checked" disabled="disabled" />
		<label style="display:inline" for="split_mission">It is a split mission</label>
	<?php endif;?>
	<p><?php
	if($dis->getComment()){
		echo $dis->getComment();
	}
	?></p>
	<em class="time"> <?php if ($dis->getCreatedAt()) {
		//                    $offset = strtotime(date('Y-m-d')) - strtotime($dis->getCreatedAt());
		//                    echo date('Y-m-d', strtotime(now - $dis->getCreatedAt()));
		echo $dis->getCreatedAt();
	}?> </em></li>
</ul>
</div>
<?php endforeach;?> <?php endif?>
<form action="<?php echo url_for('pilotRequest/addDiscussion')?>"
	method="post" id="<?php echo 'dis_form'.$leg->getId()?>">
	<br />
	<input type="checkbox" name="is_split" value="1" />
	<label style="display:inline" for="split_mission">Check to indicate mission is split</label>
	<label for="form-item-15">Add Comment:</label> <?php if(isset($leg)):?><input
	type="hidden" name="dis_leg_id" value="<?php echo $leg->getId()?>" /><?php endif?>
<?php if($sf_user->getId()):?><input type="hidden" name="user_id"
	value="<?php echo $sf_user->getId()?>" /><?php endif?> <textarea
	rows="10" cols="10" name="comment_dis" maxlength="300" onkeyup="return isMaxLengthExceed(this)" id="comment_dis"></textarea> <input
	id="comm2" name="comm2" type="hidden" /> <a href="#"
	onclick="jQuery('#<?php echo 'dis_form'.$leg->getId()?>').submit();return false;"
	class="btn-action"> <span>SUBMIT</span><strong>&nbsp;</strong> </a>
    <ul class="help_list" style="margin-top:10px;"><li><b><i>300 characters max</i></b></li></ul>
</form>
<!--              END BOX--></div>
</div>
</div>
<?php endif?> <?php endforeach;?></div>
