<?php $sf_response->addJavascript('http://maps.google.com/maps?file=api&amp;v=2&amp;sensor=false&amp;key='.sfConfig::get('app_gmap_key')); ?>
<?php $sf_response->addJavascript('/js/BDCCArrow.js'); ?>

<?php if ($sf_user->hasCredential('Pilot')) { // pilot has different view?>
<div class="recent-items">
  <h3><span>CURRENT MISSIONS</span></h3>
  <div class="map">
    <div id="map_canvas" style="width:247px;height:199px;"></div>
  </div>
</div>
<?php }else{?>
<div class="holder">
  <h3 class="heading-3">CURRENT MISSIONS</h3>
  <div class="map">
    <div id="map_canvas" style="width:247px;height:199px;"></div>
  </div>
</div>
<?php }?>

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
    var map = new GMap2(document.getElementById("map_canvas"), { size: new GSize(247, 199) });
    map.setCenter(new GLatLng(36.080055,-115.15225), 5);
    map.setMapType(G_HYBRID_MAP);
    map.addControl(new GSmallMapControl());
    map.addControl(new GMapTypeControl());

    // Create our "tiny" marker icon
    var airportIcon = new GIcon(G_DEFAULT_ICON);
    airportIcon.image = "/images/icons/airport.png";
    airportIcon.shadow = null;
    airportIcon.iconSize = new GSize(7, 7);
    airportIcon.iconAnchor = new GPoint(3, 4);

		// Set up our GMarkerOptions object
    <?php foreach ($airport_list as $i => $airport) {?>
      <?php $airports[$airport->getId()] = $airport; ?>
      //map.addOverlay(gMarker(<?php echo $airport->getLatitude()?>, <?php echo $airport->getLongitude()?>, "<?php echo $airport->getName()?>", "<?php echo $airport->getIdent()?>", airportIcon));
    <?php }?>

    <?php foreach ($legs as $leg) {?>
      <?php
      $a = array('y' => $airports[$leg->getFromAirportId()]->getLatitude(), 'x' => $airports[$leg->getFromAirportId()]->getLongitude());
      $b = array('y' => $airports[$leg->getToAirportId()]->getLatitude(), 'x' => $airports[$leg->getToAirportId()]->getLongitude());
      $angle = rad2deg(atan2($b['x'] - $a['x'], $b['y'] - $a['y'])) + 360;
      ?>
      //var arrow = new BDCCArrow(new GLatLng(<?php echo $b['y']?>, <?php echo $b['x']?>),<?php echo $angle?>,"#00FF00",0.5);
      //map.addOverlay(arrow);
      //var polyline = new GPolyline([new GLatLng(<?php echo $a['y'].', '.$a['x']?>), new GLatLng(<?php echo $b['y'].', '.$b['x']?>)], "#00ff00", 2);
      //map.addOverlay(polyline);
    <?php }?>

  }
}

$(document).ready(function() {
  gInitialize(); // google map
  window.onbeforeunload = GUnload; // google map
});
//]]>
</script>