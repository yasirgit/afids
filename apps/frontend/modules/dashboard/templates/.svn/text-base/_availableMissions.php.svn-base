

<?php use_helper('Pilot') ?>

<div style="margin: 26px 0 0; width: 100%;">
  
  <script type="text/javascript">
    jQuery(document).ready(function () {

      var r = window.location.href;
      <?php if($window_loc){?>             
        window.location.href  = window.location.href + "#dashboard_availables";
      <?php } elseif($window_loc_visual){?>
        window.location.href  = window.location.href + "#dashboard_visual";
      <?php } else {} ?>       

      jQuery('ul.mission-tabs li a').click( function() {
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
    <li class="active"><a href="#dashboard_availables"><span>Missions Available (<?php echo $total_mission_available ?>)</span></a></li>
    <li><a href="#dashboard_pendings"><span>Missions Pending (<?php echo count($pending_legs)?>)</span></a></li>    
    <li><a href="#dashboard_visual"><span>Missions Visual</span></a></li>
  </ul>
  <div class="frame requests" id="dashboard_pendings" style="border: 1px solid #B2CCE5; height: 1%; overflow: hidden; padding: 2px 2px 0;display:none;" >
    <table class="table-head">
      <tbody>
        <tr>
          <td class="cell-1" style="width: 60px;border: 1px solid #FFFFFF;height: 24px;margin: 0;padding: 0 0 0 10px;">Itinerary</td>
          <td class="cell-2" style="width: 120px;border: 1px solid #FFFFFF;height: 24px;margin: 0;padding: 0 0 0 10px;">passenger</td>
          <td class="cell-3" style="width: 130px;border: 1px solid #FFFFFF;height: 24px;margin: 0;padding: 0 0 0 10px;">requester</td>
          <td class="cell-4" style="width: 100px;border: 1px solid #FFFFFF;height: 24px;margin: 0;padding: 0 0 0 10px;">origin</td>
          <td class="cell-5" style="width: 90px;border: 1px solid #FFFFFF;height: 24px;margin: 0;padding: 0 0 0 10px;">destination</td>
          <td style="width: 110px;border: 1px solid #FFFFFF;height: 24px;margin: 0;padding: 0 0 0 10px;" class="cell-6">Mission date</td>
          <td style="border: 1px solid #FFFFFF;height: 24px;margin: 0;padding: 0 0 0 10px;">efficiency</td>
        </tr>
      </tbody>
    </table>
    <div class="holder">
      <table>
        <tbody>
          <?php
          foreach ($pending_legs as $mission_leg) {
            /* @var $mission_leg MissionLeg */
            /* @var $mission Mission */
            $mission = $mission_leg->getMission();
            $passenger = $mission->getPassenger();
            if ($passenger->getRequesterId()) $requester = $passenger->getRequester(); else $requester = null;
            $from_airport = $mission_leg->getAirportRelatedByFromAirportId();
            $to_airport = $mission_leg->getAirportRelatedByToAirportId();
          ?>
          <tr onclick="var l='<?php echo url_for('missionLeg/view?id='.$mission_leg->getId())?>'; if (event.ctrlKey) window.open(l, ''); else document.location=l;" style="cursor:pointer;">
            <td class="cell-1" style="border: 1px solid #FFFFFF;height: 24px;margin: 0;padding: 0 0 0 10px;"><?php echo sprintf('%07s', $mission->getItineraryId())?></td>
            <td class="cell-2" style="border: 1px solid #FFFFFF;height: 24px;margin: 0;padding: 0 0 0 10px;"><?php echo $passenger->getPerson()->getName()?></td>
            <td class="cell-3" style="border: 1px solid #FFFFFF;height: 24px;margin: 0;padding: 0 0 0 10px;"><?php if ($requester instanceof Requester) echo $requester->getPerson()->getName()?></td>
            <td class="cell-4" style="border: 1px solid #FFFFFF;height: 24px;margin: 0;padding: 0 0 0 10px;"><?php echo $from_airport->getCity().', '.$from_airport->getState()?></td>
            <td class="cell-5" style="border: 1px solid #FFFFFF;height: 24px;margin: 0;padding: 0 0 0 10px;"><?php echo $to_airport->getCity().', '.$to_airport->getState()?></td>
            <td style="width: 125px;border: 1px solid #FFFFFF;height: 24px;margin: 0;padding: 0 0 0 10px;" class="cell-6"><?php echo $mission->getMissionDate('m/d/Y')?></td>
            <td><?php if($home_airport) echo efficiency($home_airport->getLatitude(), $home_airport->getLongitude(), $from_airport->getLatitude(), $from_airport->getLongitude(), $to_airport->getLatitude(), $to_airport->getLongitude());?>%</td>
          </tr>
          <?php }?>
        </tbody>
      </table>
    </div>
  </div>
  <div class="frame requests" style="border: 1px solid #B2CCE5; height: 1%; overflow: hidden; padding: 2px 2px 0;" id="dashboard_availables">   
    
    <?php use_helper('Javascript', 'Form', 'jQuery', 'Pilot') ?>
    <h2>Missions Available</h2>
    <div class="missions-available">
      <?php include_partial('filter', array(
        'pager' => $pager,
        'date_widget' => $date_widget,
        'date_range1' => $date_range1,
        'date_range2' => $date_range2,
        'sort_by' => $sort_by,
        'weekdays' => $weekdays,
        'wing_id' => $wing_id,
        'wings' => $wings,
        'idents' => $idents,
        'city' => $city,
        'state' => $state,
        'zip' => $zip,
        'states' => $states,
        'origin' => $origin,
        'dest' => $dest,
        'pilot' => $pilot,
        'needs_pilot' => $needs_pilot,
        'co_pilot' => $co_pilot,
        'ifr' => $ifr,
        'mission_types' => $mission_types,
        'selected_types' => $selected_types,
        'filled' => $filled,
        'open' => $open,
        'max_pass' => $max_pass,
        'max_weight' => $max_weight,
        'max_distance' => $max_distance,
        'min_efficiency' => $min_efficiency,
        'personal_flights' => $personal_flights,
        'ignore_availability' => $ignore_availability,
        'action_url' => '@request_legs',
        'error_min_eff' => $error_min_eff,
        'airport_ident' => $airport_ident
      ))?>

      <?php include_partial('matching_legs', array('miss_array' => $miss_array, 'member' => $member, 'airport' => $airport, 'max_distance' => $max_distance, 'min_efficiency' => $min_efficiency))?>

      <?php include_partial('interested_legs', array('missions' => $missions, 'member' => $member, 'airport' => $airport, 'max_distance' => $max_distance, 'min_efficiency' => $min_efficiency))?>
    </div>
    <div id="time"></div>

        <script type="text/javascript">
          //<![CDATA[
          var loc = jQuery("#location").val();

          <?php
          $wing = array();
          $state = array();

          if(isset($has_filters)){
            if($has_filters->getWing()){
              $wing[] = "{$has_filters->getId()} : '{$has_filters->getWing()}'";
            }
            if($has_filters->getState()){
              $state[] = "{$has_filters->getId()} : '{$has_filters->getState()}'";
            }
          }
          ?>
          var wing = {<?php echo join(',', $wing)?>};
          var state = {<?php echo join(',', $state)?>};
          var id = jQuery('#f_person').val();

          if(wing[id]){
            jQuery('#wing_list').val(wing[1]);
          }
          if(state[id]){
            jQuery('#state_list').val(state[1]);
          }

          function filterForm()
          {
            jQuery('#body_part').css('opacity', 0.6);
            jQuery.ajax({
              url : '/pilotRequest/form',
              type: 'POST',
              data: jQuery("#form_filter").serialize(),
              success: function(data){
                jQuery('#body_part').css('opacity', 1).html(data);
              }
            });
          }

          function applyPersonalFlight(date1, date2, city, zipcode)
          {
            jQuery('#date_range1').val(date1);
            jQuery('#date_range2').val(date2);
            jQuery('#city').show().val(city);
            jQuery('#zipcode').show().val(zipcode);
            jQuery('#activecsz, #state_list, #inactivewing, #inactiveairport').show();
            jQuery('#personalflights, #wing_list, #airport_ident, #activewing, #activeairport, #inactivecsz').hide();
          }

          jQuery('#ignore_availability').click(function()
          {
            if(jQuery(this).is(':checked')) {
            }else{
              <?php
              $av = null;
              if($member)$av = AvailabilityPeer::getByMemberId($member->getId());
              if ($av && $av->getAsMissionMssistant() == 1) {?>
              jQuery('#is_ma').attr('checked', 'checked');
              <?php }?>
              <?php if ($av && $av->getNoWeekday() != 1) {?>
              jQuery('#monday').parent().addClass('active'); jQuery('#monday').val(1);
              jQuery('#tuesday').parent().addClass('active'); jQuery('#tuesday').val(1);
              jQuery('#wednesday').parent().addClass('active'); jQuery('#wednesday').val(1);
              jQuery('#thursday').parent().addClass('active'); jQuery('#thursday').val(1);
              jQuery('#friday').parent().addClass('active'); jQuery('#friday').val(1);
              <?php }else{?>
              jQuery('#monday').parent().removeClass('active'); jQuery('#monday').val();
              jQuery('#tuesday').parent().removeClass('active'); jQuery('#tuesday').val();
              jQuery('#wednesday').parent().removeClass('active'); jQuery('#wednesday').val();
              jQuery('#thursday').parent().removeClass('active'); jQuery('#thursday').val();
              jQuery('#friday').parent().removeClass('active'); jQuery('#friday').val();
              <?php }?>
              <?php if ($av && $av->getNoWeekend() != 1) {?>
              jQuery('#saturday').parent().addClass('active');
              jQuery('#sunday').parent().addClass('active');
              <?php }else{?>
              jQuery('#saturday').parent().removeClass('active');
              jQuery('#sunday').parent().removeClass('active');
              <?php }?>
            }
          });

           //using
          function userFilterAction()
          {
            jQuery('#body_part').css('opacity', 0.6);
            jQuery.ajax({
              url : '/pilotRequest/form',
              type: 'POST',
              data: jQuery("#form_filter").serialize(),
              success: function(data){
                jQuery('#body_part').css('opacity', 1).html(data);
              }
            });
          }
          function showDiscussions(id){
           jQuery('#comments_1'+id).toggle();
           jQuery('#comments_2'+id).toggle(); return;

          }
          function isMaxLengthExceed(obj){
              var mlength = obj.getAttribute ? parseInt(obj.getAttribute("maxlength")) : 300
              if (obj.getAttribute && obj.value.length > mlength)
              obj.value = obj.value.substring(0,mlength)
          }
          function showDiscussions2(id){
            jQuery('#comments_2'+id).toggle();return;

          }

          function close1(id){
            if(jQuery('#comments_1'+id).css('display') == 'block'){
              jQuery('#comments_1'+id).css('display','none');
            }
          }
          function close2(id){
            if(jQuery('#comments_2'+id).css('display') == 'block'){
              jQuery('#comments_2'+id).css('display','none');
            }
          }

          function getInfo(id){

            if(jQuery('#leg_info'+id).css('display') == 'none'){
              jQuery('#leg_info'+id).show();
              jQuery('#leg_com'+id).show();
              jQuery('#on_leg'+id).attr('class','active');
            }else if(jQuery('#leg_info'+id).css('display') == 'block'){
              jQuery('#leg_info'+id).hide();
              jQuery('#leg_com'+id).hide();
              jQuery('#on_leg'+id).attr('class','');
            }
          }

          function getInfoReturn(id){
            if(jQuery('#leg_infoReturn'+id).css('display') == 'none'){
              jQuery('#leg_infoReturn'+id).show();
              jQuery('#leg_comReturn'+id).show();
              jQuery('#on_leg'+id).attr('class','active');
            }else if(jQuery('#leg_infoReturn'+id).css('display') == 'block'){
              jQuery('#leg_infoReturn'+id).hide();
              jQuery('#leg_comReturn'+id).hide();
              jQuery('#on_leg'+id).attr('class','');
            }
          }


          function getLegs(id){
              jQuery('#other_leg'+id).toggle();
              jQuery('#bg_'+id).hide();return;
            if(jQuery('#other_leg'+id).hide()){
              jQuery('#other_leg'+id).show();
              jQuery('#bg_'+id).hide();
            }
          }

          function closeAll(id){
              jQuery('#other_leg'+id).toggle();
              jQuery('#bg_'+id).show();return;
            if(jQuery('#other_leg'+id).show()){
              jQuery('#other_leg'+id).hide();
              jQuery('#bg_'+id).show();
            }
          }

          jQuery(function () {
            jQuery('.weekdays').click(function () {
              jQuery(this).parent().toggleClass('active');
              jQuery(jQuery(this).attr('href')).val(jQuery(this).parent().hasClass('active') ? 1 : 0);
              return false;
            });
            jQuery('.weekdays').each(function () {
              if (jQuery(jQuery(this).attr('href')).val() == 1) {
                jQuery(this).parent().addClass('active');
              }else{
                jQuery(this).parent().removeClass('active');
              }
            });
            jQuery("#airport_ident").hide();
          });

          function getWings(){
            if(jQuery('#state_list').css('display','block') && jQuery('#city').css('display','block')){
              jQuery('#state_list').css('display','none');
              jQuery('#city').css('display','none');
              jQuery('#zipcode').css('display','none');
            }
            if(jQuery('#airport_ident').css('display','block')){
              jQuery('#airport_ident').css('display','none');
            }
            if(jQuery('#wing_list').css('display','none')){
              jQuery('#wing_list').css('display','block');
            }

            //jQuery('#wing').toggleClass("active");
            jQuery('#activewing').css('display','block');
            jQuery('#inactivewing').css('display','none');

            //jQuery('#csz').toggleClass("inactive");
            jQuery('#activecsz').css('display','none');
            jQuery('#inactivecsz').css('display','block');

            //jQuery('#airport').toggleClass("inactive");
            jQuery('#activeairport').css('display','none');
            jQuery('#inactiveairport').css('display','block');
          }

          function getAirports(){
              jQuery('#wing_list').css('display','none');
              jQuery('#state_list').css('display','none');
              jQuery('#city').css('display','none');
              jQuery('#zipcode').css('display','none');

            if(jQuery('#airport_ident').css('display') == 'none'){
              jQuery('#airport_ident').css('display','block');
            }

            //jQuery('#wing').toggleClass("inactive");
            jQuery('#activewing').css('display','none');
            jQuery('#inactivewing').css('display','block');

            //jQuery('#csz').toggleClass("inactive");
            jQuery('#activecsz').css('display','none');
            jQuery('#inactivecsz').css('display','block');

            //jQuery('#airport').toggleClass("active");
            jQuery('#activeairport').css('display','block');
            jQuery('#inactiveairport').css('display','none');
          }
          function getCSZ(){
            if(jQuery('#wing_list').css('display','block')){
              jQuery('#wing_list').css('display','none');
            }
            if(jQuery('#airport_ident').css('display','block')){
              jQuery('#airport_ident').css('display','none');
            }

            if(jQuery('#state_list').css('display') == 'none' && jQuery('#city').css('display') == 'none')
            {
              jQuery('#state_list').css('display','block');
              jQuery('#city').css('display','block');
              jQuery('#zipcode').css('display','block');
            }

            jQuery('#activewing').css('display','none');
            jQuery('#inactivewing').css('display','block');

            jQuery('#activecsz').css('display','block');
            jQuery('#inactivecsz').css('display','none');

            jQuery('#activeairport').css('display','none');
            jQuery('#inactiveairport').css('display','block');
          }

          jQuery('#wing_list').change(function()
          {
            jQuery('#location_type').val(1);
          });

          jQuery('#airport_ident').change(function()
          {
            jQuery('#location_type').val(2);
          });

          jQuery('#city').change(function()
          {
            jQuery('#location_type').val(3);
          });
          jQuery('#zipcode').change(function()
          {
            jQuery('#location_type').val(3);
          });

          jQuery('#state_list').change(function()
          {
            jQuery('#location_type').val(3);
          });

          jQuery('#all_types').click(function()
          {
            jQuery('#all_t').val(1);
          });

          jQuery('#open').click(function()
          {
            jQuery('#all_t').val('');
          });

          jQuery('#filled').click(function()
          {
            jQuery('#all_t').val('');
          });

          //using
          jQuery('#save_filter').click(function()
          {
            jQuery.ajax({
              url : '/pilotRequest/saveFilterForm',
              type: 'POST',
              data: jQuery("#form_filter").serialize()
            });
          });

          jQuery('#save_user_filter').val(1);

          if(jQuery('#location_type').val() == 1){
            if(jQuery('#wing_list').val() != '-- select --'){
              jQuery('#f_wing').val(jQuery('#wing_list').val());
            }
          }else if(jQuery('#location_type').val() == 2){
            if(jQuery('#airport_ident').val()){
              jQuery('#f_ident').val(jQuery('#airport_ident').val());
            }
          }else if(jQuery('#location_type').val() == 3){
            if(jQuery('#city').val()){
              jQuery('#f_city').val(jQuery('#city').val());
            }
            if(jQuery('#zipcode').val()){
              jQuery('#f_zipcode').val(jQuery('#zipcode').val());
            }
            if(jQuery('#state_list').val()){
              jQuery('#f_state').val(jQuery('#state_list').val());
            }
          }
          if(jQuery('#is_orgin').is(':checked')){
            if(jQuery('#is_orgin').val()){
              jQuery('#f_orgin').val(jQuery('#is_orgin').val());
            }
          }
          if(jQuery('#is_dest').is(':checked')){
            if(jQuery('#is_dest').val()){
              jQuery('#f_dest').val(jQuery('#is_dest').val());
            }
          }
          if(jQuery('#is_pilot').is(':checked')){
            if(jQuery('#is_pilot').val()){
              jQuery('#f_pilot').val(jQuery('#is_pilot').val());
            }
          }
          if(jQuery('#is_ma').is(':checked')){
            if(jQuery('#is_ma').val()){
              jQuery('#f_ma').val(jQuery('#is_ma').val());
            }
          }
          if(jQuery('#is_ifr').is(':checked')){
            if(jQuery('#is_ifr').val()){
              jQuery('#f_ifr').val(jQuery('#is_ifr').val());
            }
          }

          if(jQuery('#all_t').val()){
            jQuery('#f_alltype').val(jQuery('#all_t').val());
          }
          if(jQuery('#filled').is(':checked')){
            if(jQuery('#filled').val()){
              jQuery('#f_filled').val(jQuery('#filled').val());
            }
          }

          if(jQuery('#open').is(':checked')){
            if(jQuery('#open').val()){
              jQuery('#f_open').val(jQuery('#open').val());
            }
          }

          if(jQuery('#max_pass').val()){
            jQuery('#f_maxpass').val(jQuery('#max_pass').val());
          }


          jQuery('#hide_filter').click(function()
          {
            if(jQuery('#user_filter_area').css('display') == 'block'){
              jQuery('#user_filter_area').css('display','none');
              jQuery('#hide_area').css('display','none');
              jQuery('#show_area').css('display','block');
            }
          });

          jQuery('#show_filter').click(function()
          {
            if(jQuery('#user_filter_area').css('display') == 'none'){
              jQuery('#user_filter_area').css('display','block');
              jQuery('#hide_area').css('display','block');
              jQuery('#show_area').css('display','none');
            }
          });

              //using
        jQuery ('#c_all_types').click(function(){
            var  field = jQuery('input[name="selected_types[]"]');
            if (jQuery('input[name="checkflag"]').val()!=1) {
              for (i = 0; i < field.length; i++) {
              field[i].checked = true;
                }
              jQuery('input[name="checkflag"]').val(1);
              }
            else {
              for (i = 0; i < field.length; i++) {
              field[i].checked = false; }
              jQuery('input[name="checkflag"]').val(0);
              }
        });

              //using
        jQuery ('#done_types').click(function(){
            jQuery('#mtypes').css('display','none');
            var  field = jQuery('input[name="selected_types[]"]');
            var custom = false;
            for (i = 0; i < field.length; i++) {
                //alert(field[i].checked);
                if(field[i].checked != true){
                    jQuery('input[name="all_t"]').val(0);
                    jQuery('#types_text').html('Custom');
                    custom = true;
                    break;
                    return;
                }
              }
              if(!custom){
                jQuery('input[name="all_t"]').val(1);
                jQuery('#types_text').html('All Mission Types');
              }
        });

        function setPersonalFlightValues(v1,v2,v3){
            //first set value of flight
            jQuery('input[name="match_p_f"]').val(v3);
            jQuery('#personalflights').css('display','none');

        //alert(jQuery('input[name="match_p_f"]').val()+v3);
            //call function
            userFilterAction();
            //now reset value of flight
            jQuery('input[name="match_p_f"]').val('');
        };

        function IsNumeric(sText)
        {
            is
           var ValidChars = "0123456789.";
           var IsNumber=true;
           var Char;


           for (i = 0; i < sText.length && IsNumber == true; i++)
              {
              Char = sText.charAt(i);
              if (ValidChars.indexOf(Char) == -1)
                 {
                 IsNumber = false;
                 }
              }
           return IsNumber;
           };
              // ]]>

          function checkAll()
          {
            jQuery(".selsts").attr('checked', true);
          }
          function noneAll()
          {
            jQuery(".selsts").attr('checked', false);
          }

          function getClicks()
          {
            var all_ids = [];
            jQuery('.selsts').each(function(i){
              if(jQuery(this).attr('checked') == true){
                all_ids.push(jQuery(this).val());
              }
            });
            jQuery('#total_checks').val(all_ids);
            jQuery('#email_submit').click();
          }
        </script>


  </div>
  <div class="frame requests"  style="border: 1px solid #B2CCE5; height: 1%; overflow: hidden; padding: 2px 2px 0;display:none;" id="dashboard_visual" >

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
            <form id="filter_form" method="post" action="<?php echo url_for('dashboard/index')?>">
              <input type="hidden" name="filter" value="1"/>
              <input type="hidden" name="window_loc_visual" value="window_loc_visual" />
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
                        <input type="hidden" name="type" value="find" />
                        <input type="submit" value="Find"/>
                        <?php echo link_to('reset', 'dashboard/index?filter=1&type=find')?>
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
    jQuery(document).ready(function() {
      gInitialize(); // google map
      window.onbeforeunload = GUnload; // google map
    });
    //]]>
  </script>
 </div>
</div>

