<?php use_helper('Pilot')?>
<?php
      $miss_legs = $sf_data->getRaw('miss_legs');
?>
<div id="body_part">
<div class="location-matches">
   <?php if($url == "pilotRequestDeclinedView"){?>
      <?php $declined = true;?>
      <h3 style="background:none #C10212">Your not accepted missions detail </h3>
   <?php } else if($url == "pilotMissionLegCancellationView"){?>
      <h3 style="background:none #C10212">Your canceled missions detail </h3>
   <?php } else { ?>
       <h3>Your accepted missions detail </h3>
   <?php } ?>

<?php foreach ($miss_legs as $leg){
    $mission = MissionPeer::retrieveByPK($leg->getMissionId());
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
       <div class="location-matches-info">
        <div class="frame">
           <div class="bg">
               <div class="route"> &nbsp;</div>
            <table class="leg-info">
                <tbody>
                    <tr>
			<td class="cell-1"><strong class="leg"><?php //echo 'Leg '.$leg->getLegNumber()?></strong>
			<dl class="mission-time">
				<dt>Date:</dt>
				<dd><strong> <?php
				if($mission->getMissionDate()){
					echo $mission->getMissionDate('m/d/y').'('.date('l',strtotime($mission->getMissionDate())).')' .' to '.$mission->getApptDate('m/d/y').'('.date('l', strtotime($mission->getApptDate())).')';
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
				
				if($county != 0){
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
				<?php
				if ($leg->getTransportation() == 'air_mission') {
					$fa = $leg->getAirportRelatedByFromAirportId();
					$ta = $leg->getAirportRelatedByToAirportId();
                    if($fa && $ta){                       
                     echo distance($fa->getLatitude(), $fa->getLongitude(), $ta->getLatitude(), $ta->getLongitude()).' mi';                     
                    }
				}else{
					echo "-";
				}
				?>
				<dt>Efficiency:</dt>
				<dd><?php if ($airport && $leg->getTransportation() == 'air_mission') {
					$fa = $leg->getAirportRelatedByFromAirportId();
					$ta = $leg->getAirportRelatedByToAirportId();
                    if($fa && $ta)
                        echo efficiency($airport->getLatitude(), $airport->getLongitude(), $fa->getLatitude(), $fa->getLongitude(), $ta->getLatitude(), $ta->getLongitude()).'%';
				}else{
					echo "-";
				}?></dd>
			</dl>
                    </td>
		</tr>
	</tbody>
    </table>
           <div class="route"> &nbsp;</div>
            </div>
        </div>
    </div>
</div>
<br />
<?php } ?>
    </div>
</div>
