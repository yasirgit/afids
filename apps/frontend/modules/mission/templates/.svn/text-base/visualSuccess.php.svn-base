<?php $sf_response->addJavascript('http://maps.google.com/maps?file=api&amp;v=2&amp;sensor=false&amp;key='.sfConfig::get('app_gmap_key') ); ?>
<?php $sf_response->addJavascript('/js/BDCCArrow.js'); ?>
<?php use_helper('Form');
$date_widget = $sf_data->getRaw('date_widget');
use_javascripts_for_form($date_widget);
use_stylesheets_for_form($date_widget);
?>
<?php use_helper('Javascript', 'Form') ?>

<h2>Current Missions</h2>

<div class="missions-available">
    <form id="filter_form" method="post" action="<?php echo url_for('mission/visual')?>">
      <input type="hidden" name="filter" value="1"/>
      <div class="missions-available-filter">
        <div class="bg">
          <div class="characteristic_clean">
            <div class="holder">
               <div>
                <label for="ff_miss_date1">Start Date</label>
                <?php echo $date_widget->render('miss_date1', $miss_date1);?>
                <br clear="left"/>
                <label for="ff_miss_date2">End Date</label>
                <?php echo $date_widget->render('miss_date2', $miss_date2);?>
               </div>
               <div>
                <label for="ff_orgin_airport">Origin Airport</label>
                <input type="text" class="text" value="<?php echo $orgin_airport?>" id="ff_orgin_airport" name="orgin_airport"/>
                <br clear="left"/>
                <label for="ff_dest_airport">Dest Airport</label>
                <input type="text" class="text" value="<?php echo $dest_airport?>" id="ff_dest_airport" name="dest_airport"/>
               </div>
               <div>
                <label for="ff_mission_type">Mission Type</label>
                <?php echo select_tag('miss_type', options_for_select($types, $miss_type, array('include_custom' => '- any -')), array('id' => 'ff_mission_type','class'=>'text'))?>
                <br clear="left">
                <div style="margin-top: 20px">
                <input type="submit" value="Find"/>
                <?php echo link_to('reset', 'mission/visual?filter=1')?>
                </div>
               </div>
            </div>
            
          </div>
          <input type="submit" class="hide" value="submit"/>
        </div>
      </div>
    </form>
  </div>

<div id="map_canvas" style="width:790px;height:500px;"></div>
<script type="text/javascript">
//<![CDATA[
var _mSvgForced = true;
var _mSvgEnabled = true;

function gMarker(lat, lng, title, ident, icon)
{
  var marker;
  marker = new GMarker(new GLatLng(lat, lng), { title: title, icon: icon });
  marker.ident = ident;
  //GEvent.addListener(marker, 'click', function () { gAirportClick(marker); });
  return marker;
}

function gInitialize()
{
  if (GBrowserIsCompatible()) {
    var map = new GMap2(document.getElementById("map_canvas"), { size: new GSize(790, 500) });
    map.setCenter(new GLatLng(36.080055,-115.15225), 5);
    map.setMapType(G_HYBRID_MAP);
    map.addControl(new GSmallMapControl());
    map.addControl(new GMapTypeControl());

    // Create our "tiny" marker icon
    var airportIcon = new GIcon(G_DEFAULT_ICON);
    airportIcon.image = "/images/icons/airport.png";
    airportIcon.shadow = null;
    airportIcon.iconSize = new GSize(12, 12);
    airportIcon.iconAnchor = new GPoint(6, 6);

		// Set up our GMarkerOptions object
    <?php /*foreach ($airport_list as $i => $airport) {?>
      <?php $airports[$airport->getId()] = $airport; ?>
      map.addOverlay(gMarker(<?php echo $airport->getLatitude()?>, <?php echo $airport->getLongitude()?>, "<?php echo $airport->getName()?>", "<?php echo $airport->getIdent()?>", airportIcon));
    <?php }*/?>
    <?php foreach ($legs as $leg) {
      $mission = MissionPeer::retrieveByPK($leg->getMissionId());
      $miss_ts = $mission->getMissionType();
      $from_airport = AirportPeer::retrieveByPK($leg->getFromAirportId());
      $to_airport = AirportPeer::retrieveByPK($leg->getToAirportId());
      $pass = $mission->getPassenger();
        $comps = CompanionPeer::getByPassId($pass->getId());
        $county = 0;
        $weg = 0;
        foreach ($comps as $comp){
          $county ++;
          if($comp->getWeight()) $weg = $weg + $comp->getWeight();
        }
        // wtf?
        if($county != 0 && isset($pass)){
          $county++;
        }else{
          $county++;
        }
        if(isset($pass) && isset($weg)){
          $weg = $pass->getWeight()? $pass->getWeight()+$weg:$weg;
        }else{
          $weg = $pass->getWeight()?$pass->getWeight():"-";
        }
      if(!isset($airports[$from_airport->getId()])):
      	$airports[$from_airport->getId()] = true;

      ?>
	  map.addOverlay(gMarker(<?php echo $from_airport->getLatitude()?>, <?php echo $from_airport->getLongitude()?>, "<?php echo $from_airport->getName()?>", "<?php echo $from_airport->getIdent()?>", airportIcon));
	  <?php 
	  endif;
	  
	  if(!isset($airports[$to_airport->getId()])):
      	$airports[$to_airport->getId()] = true;
	  ?>
	  map.addOverlay(gMarker(<?php echo $to_airport->getLatitude()?>, <?php echo $to_airport->getLongitude()?>, "<?php echo $to_airport->getName()?>", "<?php echo $to_airport->getIdent()?>", airportIcon));
	  <?php
	  endif;
	 
      $a = array('y' => $from_airport->getLatitude(), 'x' => $from_airport->getLongitude());
      $b = array('y' => $to_airport->getLatitude(), 'x' => $to_airport->getLongitude());
      $angle = rad2deg(atan2($b['x'] - $a['x'], $b['y'] - $a['y'])) + 360;
      ?>

      <?php $date = explode(" ", $mission->getMissionDate())?>
      var arrow = new BDCCArrow(new GLatLng(<?php echo $b['y']?>, <?php echo $b['x']?>),<?php echo $angle?>,"#00FF00",0.5);
      map.addOverlay(arrow);
      var polyline = new GPolyline([new GLatLng(<?php echo $a['y'].', '.$a['x']?>), new GLatLng(<?php echo $b['y'].', '.$b['x']?>)], "#00ff00", 2);
      map.addOverlay(polyline);
      GEvent.addListener(polyline,"click",function(point) {
      map.openInfoWindowHtml(point, ""+
          '<b>Mission: </b><a href="<?php echo url_for('@pilot_request?id='.$leg->getId())?>">' + "<?php echo $mission->getExternalId().'-'.$leg->getLegNumber()?>"+"</a>"
       + "<br/><b>Date: </b>" + "<?php echo $date[0]?>"
       + "<b> Type: </b> " + "<?php echo $miss_ts->getName()?>"
        + "<br/><b>Pax/Wgt: </b>" + "<?php echo $county.'/'.$weg?>"
        //+ " <b>Seats: </b> " + ""
        + "<br/><b>Origin: </b> " + "<?php echo $from_airport->getIdent().'('.$from_airport->getName().', '.$from_airport->getState().')'?>"
        + "<br/><b>Dest: </b> " + "<?php echo $to_airport->getIdent().'('.$to_airport->getName().', '.$to_airport->getState().')'?>"
      );
	});
    <?php  
    } ?>
  }
}





$(document).ready(function() {
  gInitialize(); // google map
  window.onbeforeunload = GUnload; // google map
});
//]]>
</script>