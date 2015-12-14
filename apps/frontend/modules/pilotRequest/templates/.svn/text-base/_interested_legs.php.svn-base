<?php use_helper('Pilot')?>

<?php
      $miss_array = $sf_data->getRaw('missions');

?>
<div id="body_part">
<div class="location-matches">
<h3>Below are other missions you may be interested in</h3>
<?php foreach ($miss_array as $mission){?> <?php


$mission_legs = $mission->getMissionLegs();
//if(count($mission_legs) == 1) continue;
if($mission_legs){
	$iti = $mission->getItinerary();
	$pass = $mission->getPassenger();
	if ($pass) $pass_type = $pass->getPassengerType();
	?>
<div class="holder">
<dl class="mission-criteria">
	<dt>Itinerary:</dt>
	<dd><?php if ($iti) echo $iti->getId()?></dd>

	<dt>Mission:</dt>
	<dd><?php echo $mission->getId();?></dd>

	<dt>Passenger Type:</dt>
	<dd><?php if(isset($pass_type)) echo $pass_type->getName()?></dd>

	<dt>Illness:</dt>
	<dd><?php if ($pass) echo $pass->getIllness()?></dd>

	<dt>Mission Type:</dt>
	<dd><?php echo $mission->getMissionType()->getName()?></dd>
</dl>

	<?php $one = 0;?>
<div class="location-matches-info">
<div class="frame">
<div class="bg">
<div class="route"><strong>TO TREATMENT:</strong>
    <ul>
	<li><img alt="ico" src="/images/ico-home.gif" /></li>
	<li>
            <?php foreach ($mission_legs as $mission_leg) { // Ground mission
		$v = $mission->getId().$mission_leg->getLegNumber();
		if($mission_leg->getTransportation() == 'ground_mission' && $mission_leg->getGroundOrigin() == 'patient' && $mission_leg->getGroundDestination() == 'lodging') {
                   if($mission_leg->getCancelled() == null){?>
                        <a href="javascript:getInfo(<?php echo $v?>)" id="leg_.<?php echo $v?>">
                            <img alt="ico" src="/images/ico-car-active.gif" />
                        </a>
                   <?php } else { ?>
                        <a href="javascript:getInfo(<?php echo $v?>)" id="leg_.<?php echo $v?>">
                            <img alt="ico" src="/images/ico-car.gif" /></a>
                   <?php }
		}
            } ?>
        </li> <!-- END GROUND MISSION-->
        <?php $mission_legs_distances = array(); $mission_legs_efficiencies = array();?>
	<?php foreach ($mission_legs as $mission_leg) { // AIR MISSION
		if ($mission_leg->getTransportation() != 'air_mission') continue;
		//if ($mission_leg->getId() != $mission_leg->getReverseFrom()) continue;
                if ($mission_leg->getTransportation() == 'air_mission') {
                    $fa = $mission_leg->getAirportRelatedByFromAirportId();
                    $ta = $mission_leg->getAirportRelatedByToAirportId();
                    if($fa && $ta) {
                         $distance = $mission_legs_distances[$mission_leg->getId()] = distance($fa->getLatitude(), $fa->getLongitude(), $ta->getLatitude(), $ta->getLongitude());
                         //if($max_distance && ($distance > $max_distance)) continue;
                         $efficiency = $mission_legs_efficiencies[$mission_leg->getId()] = efficiency($airport->getLatitude(), $airport->getLongitude(), $fa->getLatitude(), $fa->getLongitude(), $ta->getLatitude(), $ta->getLongitude());
                         //if($min_efficiency && ($efficiency < $min_efficiency))continue;
                    }
                }
		$v = $mission->getId().$mission_leg->getLegNumber();
		$cancelled = ($mission_leg->getCancelled() != null); ?>
                <?php if($cancelled) continue; // If there is a cancelled leg in a mission then do not show it?>
                <?php if($max_distance && ($distance > $max_distance)) continue;?>
                <?php if($min_efficiency && ($efficiency < $min_efficiency))continue;?>
                <li id="<?php echo ($cancelled ? 'off' : 'on').'_leg'.$v?>" <?php if ($cancelled) echo 'class="disabled"'?>>
                    <a class="leg-link" href="javascript:getInfo(<?php echo $v?>)" id="<?php echo 'leg_'.$v?>"><?php echo 'Leg '.$mission_leg->getLegNumber()?></a>
                </li>
	<?php }?>
	<li>
            <!-- a href="#" -->
                <?php foreach ($mission_legs as $mission_leg) { // GROUND MISSION
                    $cancelled = ($mission_leg->getCancelled() != null); ?>
                    <?php if($mission_leg->getTransportation() == 'ground_mission' && $mission_leg->getGroundOrigin() == 'lodging' && $mission_leg->getGroundDestination() == 'facility') {?>
                    <a href="javascript:getInfo(<?php echo $mission->getID().$mission_leg->getLegNumber()?>)"
		id="leg_.<?php echo $mission->getId().$mission_leg->getLegNumber()?>">
                        <img alt="ico" src="/images/ico-car<?php if (!$cancelled) echo '-active'?>.gif" />
                    </a>
                    <?php }?>
                <?php }?>
            <!-- /a -->
        </li>
	<li><img alt="ico" src="/images/ico-hospital.gif" /></li>
    </ul>
</div>
<!-- END ROUTE-->
<?php foreach ($mission_legs as $leg) { ?>
   <?php $cancelled = ($leg->getCancelled() != null);if($cancelled) continue; // If there is a cancelled leg in a mission then do not show it?>
   <?php $last_leg = $mission_legs[count($mission_legs)-1]->getLegNumber();?>
   <?php $first_leg = $mission_legs[0]->getLegNumber();?>
<?php if ($mission_leg->getTransportation() == 'air_mission') {?>
    <?php
        if(array_key_exists($leg->getId(), $mission_legs_distances)) {
            if($max_distance && ($mission_legs_distances[$leg->getId()] > $max_distance)) continue;
        }
        if(array_key_exists($leg->getId(), $mission_legs_efficiencies)) {
            if($min_efficiency && ($mission_legs_efficiencies[$leg->getId()] < $min_efficiency)) continue;
        }?>
<?php }?>
<input type="hidden" id="<?php echo 'leg_max'.$mission->getId().$leg->getLegNumber()?>" value="<?php echo $last_leg?>">
<input type="hidden" id="<?php echo 'leg_min'.$mission->getId().$leg->getLegNumber()?>" value="<?php echo $first_leg?>">
<?php $display = $leg->getCancelled() ? 'leg-info disabled' : 'leg-info' ;?>

<div id="<?php echo 'leg_info'.$mission->getId().$leg->getLegNumber()?>" style="display: block;">
    <table class="<?php echo $display?>">
	<tbody>
		<tr>
                    <td class="cell-1"><strong class="leg"><?php echo 'Leg '.$leg->getLegNumber()?></strong>
			<dl class="mission-time">
				<dt>Date:</dt>
				<dd><strong> <?php
				if($mission->getMissionDate()){
                                     if($mission->getMissionDate('m/d/y') == $mission->getApptDate('m/d/y'))
                                        echo $mission->getMissionDate('m/d/y').'('.date('l',strtotime($mission->getMissionDate())).')';
                                     else echo $mission->getMissionDate('m/d/y').'('.date('l',strtotime($mission->getMissionDate())).')' .' to '.$mission->getApptDate('m/d/y').'('.date('l', strtotime($mission->getApptDate())).')';
				}else{
					echo '--';
				}
				?> </strong></dd>
				<dt>Time:</dt>
				<dd><?php echo $mission->getFlightTime() ? $mission->getFlightTime() : 'Can leave anytime'?>
				</dd>
			</dl>
			</td>
			<td class="cell-2">
			<dl class="destination-list">
				<dt>From:</dt>
				<dd><?php
				if($leg->getTransportation() == 'air_mission') {
					?><strong>
                   <?php
                     $airport_from = $leg->getAirportRelatedByFromAirportId();
                     if(($airport_from)){
                        echo $airport_from->getIdent();
                        echo '( '.$airport_from->getCity().', '.$airport_from->getState() .' )';
                     }
					?></strong><?php
				}elseif($leg->getTransportation() == 'ground_mission') {
					echo $leg->getGroundOrigin();
				}?> <em>PST</em></dd>
				<dt>To:</dt>
				<dd><?php if($leg->getTransportation() == 'air_mission'){
					?><strong>
                   <?php
                        $airport_to = $leg->getAirportRelatedByToAirportId();
                        if(($airport_to)){
                           echo $airport_to->getIdent();
                           echo '( '.$airport_to->getCity() . ', ' . $airport_to->getState() .' )';
                        }
					?></strong><?php
				}elseif ($leg->getTransportation() == 'ground_mission') {
					echo $leg->getGroundDestination();
				}?> <em>PST</em></dd>
			</dl>
			</td>
			<td class="cell-3">
			<dl class="mission-ad-info">
                            <dt>Passengers:</dt>
                            <dd><?php
                            $comps = CompanionPeer::getByPassId($pass->getId());
                            $county = 0;
                            $weg = 0;
                            foreach ($comps as $comp){
                                    $county ++;
                                    $weg = $weg + $comp->getWeight();
                            }
                            // wtf?
                            if($county != 0 && isset($pass)){
                                    echo $county+1;
                            }else{
                                    echo "1";
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
                                    //$fa = $leg->getAirportRelatedByFromAirportId();
                                    //$ta = $leg->getAirportRelatedByToAirportId();
                                    if ($mission_legs_distances[$leg->getId()]) {
                                        //echo distance($fa->getLatitude(), $fa->getLongitude(), $ta->getLatitude(), $ta->getLongitude()) . ' mi';
                                        echo $mission_legs_distances[$leg->getId()].' mi';
                                     }else {
                                        echo '&nbsp;' ;
                                     }
                                }else {
                                    echo "-";
                                }?>
                            </dd>
                            <dt>Efficiency:</dt>
                            <dd>
                                <?php if ($airport && $leg->getTransportation() == 'air_mission') {
                                        //$fa = $leg->getAirportRelatedByFromAirportId();
                                        //$ta = $leg->getAirportRelatedByToAirportId();
                                        if($mission_legs_efficiencies[$leg->getId()]) {
                                            //echo efficiency($airport->getLatitude(), $airport->getLongitude(), $fa->getLatitude(), $fa->getLongitude(), $ta->getLatitude(), $ta->getLongitude()).'%';
                                            echo $mission_legs_efficiencies[$leg->getId()].' %';
                                        }else{
                                            echo '&nbsp;';
                                        }
                                      }else {
                                            echo "-";
                                      }?>
                            </dd>
			</dl>
			</td>
		</tr>
	</tbody>
</table>
</div>
<div id="<?php echo 'leg_com'.$mission->getId().$leg->getLegNumber()?>"	style="display: block;">
    <table class="leg-comment">
	<tbody>
		<tr>
			<td class="cell-1">Comment:</td>
			<td>
                            <?php if($display == 'leg-info'):?>
                                
                                <!-- edited by ziyed start -->
                                <?php  if( $leg->getLegNumber() == 1 ){ ?>
                                    <div id="_edit_new_comment<?php echo $mission->getId() ?>" sytle="background-color: rgb(255, 255, 153); display: none;">--<?php echo $mission->getMissionSpecificComments();?>--</div>
                                    <?php echo input_in_place_editor_tag('_edit_new_comment'.$mission->getId(), 'pilotRequest/saveCommentMission?id='.$mission->getId(),array('save_text'=>'Save')) ?>
                                <?php } else { ?>
                                     <div  sytle="background-color: rgb(255, 255, 153); display: none;">--<?php echo $mission->getMissionSpecificComments();?>--</div>
                                <?php } ?>
                                <!-- edited by ziyed end -->

                                <?php if($mission->getMissionDate() && $mission->getApptDate()):?>
                                    <?php if($leg->getTransportation() == 'air_mission'):?>
                                            <?php if ($member) $is_has_requested = PilotRequestPeer::getByMemnerIdLegId($member->getId(),$leg->getId()); ?>
                                            <?php if(!isset($is_has_requested)):?>
                                                <a href="<?php echo url_for('@pilot_request?id='.$leg->getId())?>" class="btn-request">
                                                    <span>Request This Mission</span>
                                                </a>
                                            <?php else:?>
                                                <a href="javascript:void(0)" class="btn-request"> <span>Already Requested!</span> </a>
                                            <?php endif;?>
                                    <?php endif;?>
                                <?php else:?>
                                <div align="right">
                                    <a href="<?php echo url_for('@mission_view?id='.$mission->getId())?>">
                                        <?php if(!$mission->getMissionDate()):?>
                                            <span> Mission Date Required </span>
                                        <?php elseif(!$mission->getApptDate()):?>
                                            <span> Appointment Date Required </span>
                                        <?php elseif(!$mission->getMissionDate() && !$mission->getApptDate()):?>
                                            <span> Appointment Date and Mission Date Required </span>
                                        <?php endif;?>
                                    </a>
                                </div>
                                <?php endif?>
                            <?php endif?>
                        </td>
                    </tr>
            </tbody>
        </table>
    </div>
<?php $dis = 'none';?> <?php }?>
<div class="route"><strong>RETURN HOME:</strong>
<ul>
	<li><img alt="ico" src="/images/ico-hospital.gif" /></li>
	<li><?php foreach ($mission_legs as $mission_leg) {?> <?php if($mission_leg->getTransportation() == 'ground_mission' && $mission_leg->getGroundOrigin() == 'facility' && $mission_leg->getGroundDestination() == 'lodging'):?>
	<?php if($mission_leg->getCancelled() == null) {?> <a
		href="javascript:getInfoReturn(<?php echo $mission->getID().$mission_leg->getLegNumber()?>)"
		id="leg_.<?php echo $mission->getID().$mission_leg->getLegNumber()?>">
	<img alt="ico" src="/images/ico-car-active.gif" /> </a> <?php }else{?>
	<a
		href="javascript:getInfoReturn(<?php echo $mission->getID().$mission_leg->getLegNumber()?>)"
		id="leg_.<?php echo $mission->getID().$mission_leg->getLegNumber()?>">
	<img alt="ico" src="/images/ico-car.gif" /> </a> <?php }?> <?php endif;?>
	<?php }?></li>
	<?php $down_legs = array_reverse($mission_legs);?>
	<?php foreach ($down_legs as $mission_leg) {?>
        <?php if ($mission_leg->getTransportation() == 'air_mission') {?>
            <?php if($mission_leg->getCancelled() != null) continue; // If there is a cancelled leg in a mission then do not show it?>
            <?php
            if(array_key_exists($mission_leg->getId(), $mission_legs_distances)) {
                if($max_distance && ($mission_legs_distances[$mission_leg->getId()] > $max_distance)) continue;
            }
            if(array_key_exists($mission_leg->getId(), $mission_legs_efficiencies)) {
                if($min_efficiency && ($mission_legs_efficiencies[$mission_leg->getId()] < $min_efficiency)) continue;
            }?>
        <?php }?>
	<?php if($mission_leg->getCancelled() == null && $mission_leg->getTransportation() == 'air_mission' && $mission_leg->getId() != $mission_leg->getReverseFrom()):?>
	<li class="" id="<?php echo 'on_leg'.$mission->getId().$mission_leg->getLegNumber()?>">
            <a class="leg-link"
		href="javascript:getInfoReturn(<?php echo $mission->getId().$mission_leg->getLegNumber()?>)"
		id="<?php echo 'leg_'.$mission->getId().$mission_leg->getLegNumber()?>"><?php echo 'Leg '.$mission_leg->getLegNumber()?></a>
	</li>
	<?php elseif($mission_leg->getTransportation() == 'air_mission' && $mission_leg->getId() != $mission_leg->getReverseFrom()):?>
	<li class="disabled"
		id="<?php echo 'off_leg'.$mission->getId().$mission_leg->getLegNumber()?>">
	<a class="leg-link"
		href="javascript:getInfoReturn(<?php echo $mission->getId().$mission_leg->getLegNumber()?>)"
		id="<?php echo 'leg_'.$mission->getId().$mission_leg->getLegNumber()?>"><?php echo 'Leg '.$mission_leg->getLegNumber()?></a>
	</li>
	<?php endif;?>
	<?php }?>
	<li><?php foreach ($mission_legs as $mission_leg):?> <?php if($mission_leg->getTransportation() == 'ground_mission' && $mission_leg->getGroundOrigin() == 'lodging' && $mission_leg->getGroundDestination() == 'patient'):?>
	<?php if(isset($mission_leg) && $mission_leg->getCancelled() == null):?>
	<a
		href="javascript:getInfoReturn(<?php echo $mission->getID().$mission_leg->getLegNumber()?>)"
		id="leg_.<?php echo $mission->getID().$mission_leg->getLegNumber()?>">
	<img alt="ico" src="/images/ico-car-active.gif" /> </a> <?php else:?> <a
		href="javascript:getInfoReturn(<?php echo $mission->getID().$mission_leg->getLegNumber()?>)"
		id="leg_.<?php echo $mission->getID().$mission_leg->getLegNumber()?>">
	<img alt="ico" src="/images/ico-car.gif" /> </a> <?php endif;?> <?php endif;?>
	<?php endforeach;?></li>
	<li><img alt="ico" src="/images/ico-home.gif" /></li>
</ul>
</div>
<!-- END ROUTE--> <!--RETURN HOME LEG PART-->
<?php foreach ($mission_legs as $leg) {?>
<?php $cancelled = ($leg->getCancelled() != null);if($cancelled) continue; // If there is a cancelled leg in a mission then do not show it?>
    <?php
        if(array_key_exists($leg->getId(), $mission_legs_distances)) {
            if($max_distance && ($mission_legs_distances[$leg->getId()] > $max_distance)) continue;
        }
        if(array_key_exists($leg->getId(), $mission_legs_efficiencies)) {
            if($min_efficiency && ($mission_legs_efficiencies[$leg->getId()] < $min_efficiency)) continue;
        }
    ?>
    <?php foreach ($mission_legs as $own_leg):?>
        <?php $last_leg = $own_leg->getLegNumber();?>
    <?php endforeach;?>
    <?php foreach ($mission_legs as $own_leg):?>
        <?php $first_leg = $own_leg->getLegNumber();?>
        <?php break;?>
    <?php endforeach;?>
    <input type="hidden" id="<?php echo 'leg_max'.$mission->getId().$leg->getLegNumber()?>" value="<?php echo $last_leg?>">
    <input type="hidden" id="<?php echo 'leg_min'.$mission->getId().$leg->getLegNumber()?>" value="<?php echo $first_leg?>">
    <?php if($leg->getCancelled()){
            $display = 'leg-info disabled';
    }else{
            $display = 'leg-info';
    }
    ?>
<div id="<?php echo 'leg_infoReturn'.$mission->getId().$leg->getLegNumber()?>" style="display:<?php echo $dis?>">
<table class="<?php echo $display?>">
	<tbody>
		<tr>
			<td class="cell-1"><strong class="leg"> <?php
			if($leg->getLegNumber()){
				echo 'Leg '.$leg->getLegNumber();
			}
			?> </strong>
			<dl class="mission-time">
				<dt>Date:</dt>
				<dd><strong> <?php
				$miss = MissionPeer::retrieveByPK($leg->getMissionId());
				if(isset($miss)){
					if($miss->getMissionDate()){
						//echo $miss->getMissionDate('m/d/y').'('.date('l',strtotime($miss->getMissionDate())).')'.' to '.$miss->getApptDate('m/d/y').'('.date('l',strtotime($miss->getApptDate())).')';
                                            if($miss->getMissionDate('m/d/y') == $miss->getApptDate('m/d/y'))
                                                echo $miss->getMissionDate('m/d/y').'('.date('l',strtotime($miss->getMissionDate())).')';
                                            else echo $miss->getMissionDate('m/d/y').'('.date('l',strtotime($miss->getMissionDate())).')' .' to '.$miss->getApptDate('m/d/y').'('.date('l', strtotime($miss->getApptDate())).')';
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
				<dd><strong> <?php if($leg->getTransportation() == 'air_mission'):?>
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
				?> <?php elseif($leg->getTransportation() == 'ground_mission'):?> <?php echo $leg->getGroundOrigin()?>
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
				?> <?php elseif($leg->getTransportation() == 'ground_mission'):?> <?php echo $leg->getGroundDestination()?>
				<?php endif?> <em>PST</em></dd>
			</dl>
			</td>
			<td class="cell-3">
			<dl class="mission-ad-info">
				<dt>Passengers:</dt>
				<dd><?php
				$comps = CompanionPeer::getByPassId($pass->getId());
				$county = 0;
				$weg = 0;
				foreach ($comps as $comp){
					$county ++;
					$weg = $weg + $comp->getWeight();
				}
				// wtf?
				if($county != 0 && isset($pass)){
					echo $county+1;
				}else{
					echo "1";
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
				<dd><?php if($mission_legs_distances[$leg->getId()]): echo $mission_legs_distances[$leg->getId()].' mi'; else: echo '&nbsp;';endif;?></dd>
				<dt>Efficiency:</dt>
				<dd><?php if($mission_legs_efficiencies[$leg->getId()]): echo $mission_legs_efficiencies[$leg->getId()]. ' %';else: echo '&nbsp;';endif;?></dd>
			</dl>
			</td>
		</tr>
	</tbody>
</table>
</div>
<div id="<?php echo 'leg_comReturn'.$mission->getId().$leg->getLegNumber()?>" style="display:<?php echo $dis?>">
<table class="leg-comment">
	<tbody>
		<tr>
			<td class="cell-1"><!--COMMY--> Comment:</td>
			<td>
                        <?php if($display == 'leg-info'):?> 
                           
                        <!-- edited by ziyed start -->                        
                             <div  sytle="background-color: rgb(255, 255, 153); display: none;">--<?php echo $mission->getMissionSpecificComments();?>--</div>
                        <!-- edited by ziyed end -->


                        <?php if($mission->getMissionDate() && $mission->getApptDate()):?>
			<?php if($leg->getTransportation() == 'air_mission'):?>
                           <?php if ($member) $is_has_requested = PilotRequestPeer::getByMemnerIdLegId($member->getId(),$leg->getId());?>
                           <?php if(!isset($is_has_requested)):?>
                                  <a href="<?php echo url_for('@pilot_request?id='.$leg->getId())?>" class="btn-request">
                                      <span>Request This Mission</span>
                                  </a>
                            <?php else:?>
                                <a href="#" class="btn-request"> <span>Already requested!</span> </a>
                            <?php endif;?>
                        <?php endif;?>
                        <?php else:?>
			<div align="right">
                            <a href="<?php echo url_for('@mission_view?id='.$mission->getId())?>">
                                <?php if(!$mission->getMissionDate()):?>
                                    <span> Mission Date Required </span>
                                <?php elseif(!$mission->getApptDate()):?>
                                    <span> Appointment Date Required </span>
                                <?php elseif(!$mission->getMissionDate() && !$mission->getApptDate()):?>
                                    <span> Appointment Date and Mission Date Required </span>
                                <?php endif;?>
                            </a>
			</div>
			<?php endif?>
                     <?php endif?>
                  </td>
		</tr>
	</tbody>
</table>
</div>
<?php $dis = 'none';?> <?php }?> <!--END RETURN HOME LEG--></div>
<!-- END BG--></div>
<!-- END FRAME--></div>
<!-- Location matches info-->
<ul class="discussion">
	<li><a href="javascript:showDiscussions(<?php echo $leg->getId()?>)">Discussion
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
        <?php if ($sf_user->hasCredential(array('Administrator','Staff','Coordinator'), false)) {?>
	<li><input type="checkbox"
		id="<?php echo 'email_checks_'.$mission->getId()?>"
		name="email_checks[]" class="selsts"
		value="<?php echo $mission->getId()?>" /> <label
		for="<?php echo 'email_checks_'.$mission->getId()?>">Mark for Email</label>
	</li>
        <?php } ?>

</ul>
<div class="comment-box" style="display: none"
	id="<?php echo "comments_1".$leg->getId()?>"><a class="btn-close"
	href="javascript:close1(<?php echo $leg->getId()?>)">Close</a>
<div class="wrap"><?php if(isset($leg_discussions)):?>
<?php foreach ($leg_discussions as $dis):?>
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
	method="post" id="<?php echo 'dis_form1'.$leg->getId()?>">
	<br />
	<input type="checkbox" name="is_split" id="split_mission" value="1" />
	<label style="display:inline" for="split_mission">Check to indicate split mission</label>
	<label	for="form-item-15">Add Comment:</label>
	<?php if(isset($leg)):?>
		<input type="hidden" name="dis_leg_id" value="<?php echo $leg->getId()?>" />
	<?php endif?>
	<?php if($sf_user->getId()):?>
		<input type="hidden" name="user_id"	value="<?php echo $sf_user->getId()?>" />
	<?php endif?>
	<textarea rows="10" cols="10" name="comment_dis" maxlength="300" onkeyup="return isMaxLengthExceed(this)" id="comment_dis"></textarea>
	 <input	id="comm1" name="comm1" type="hidden" />
	  <a href="#" onclick="jQuery('#<?php echo 'dis_form1'.$leg->getId()?>').submit();return false;"
	class="btn-action"> <span>SUBMIT</span><strong>&nbsp;</strong> </a>
    <ul class="help_list" style="margin-top:10px;"><li><b><i>300 characters max</i></b></li></ul>
</form>
<!--              END BOX--></div>
</div>
</div>
<!--END HOLDER--> <br />



<?php }
}  ?></div>
<!--      END LOCATION MARCHES--></div>