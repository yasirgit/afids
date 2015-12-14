<?php
$miss_array = $sf_data->getRaw('miss_array');
$date_widget = $sf_data->getRaw('date_widget');
$selected_types = $sf_data->getRaw('selected_types');
use_javascripts_for_form($date_widget);
use_stylesheets_for_form($date_widget);
?>
<?php use_helper('Javascript', 'Form', 'jQuery', 'Pilot') ?>
<?php
   /* $count = 0;
    $mission_removed = 0;
    $revised_missions = $miss_array;
    foreach($miss_array as $mission){
        $mission_legs = $mission->getMissionLegs();
        foreach ($mission_legs as $leg) {            
            if ($leg->getTransportation() == 'air_mission') {              
                $fa = $leg->getAirportRelatedByFromAirportId();
                $ta = $leg->getAirportRelatedByToAirportId();
                if($fa && $ta){
                     $dist = distance($fa->getLatitude(), $fa->getLongitude(), $ta->getLatitude(), $ta->getLongitude());
                     if($dist > $max_distance){
                        $mission_removed++;
                        array_splice($revised_missions, $count, 1);                  
                        break;
                     }
                     $eff =  efficiency($airport->getLatitude(), $airport->getLongitude(), $fa->getLatitude(), $fa->getLongitude(), $ta->getLatitude(), $ta->getLongitude());
                     if($eff < $min_efficiency){
                        $mission_removed++;
                        array_splice($revised_missions, $count, 1);
                        break;
                     }
                }
            }
        }
        $count++;
        if($count == 5) break;
    }
    array_splice($revised_missions, $count);
    $total = $pager->getNbResults();
    $pager->setNbResults($total - $mission_removed);
    $pager->setMaxPerPage($max);
    $pager->setLastPage(round($total/$max));
*/
?>
<h2><?php //echo $total.'  '; echo count($miss_array)?> Missions Available</h2>
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
   /*if(jQuery('#comments_1'+id).css('display') == 'none'){
      jQuery('#comments_1'+id).css('display','block');
    }
    if(jQuery('#comments_2'+id).css('display') == 'none'){
      jQuery('#comments_2'+id).css('display','block');
    }*/
  }
  function isMaxLengthExceed(obj){
      var mlength = obj.getAttribute ? parseInt(obj.getAttribute("maxlength")) : 300
      if (obj.getAttribute && obj.value.length > mlength)
      obj.value = obj.value.substring(0,mlength)
  }
  function showDiscussions2(id){
    jQuery('#comments_2'+id).toggle();return;
    /*if(jQuery('#comments_2'+id).css('display') == 'none'){
      jQuery('#comments_2'+id).css('display','block');
    }*/
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
    //
    //        if($('#leg_max'+id).val()){
    //          var max = $('#leg_max'+id).val();
    //        }
    //
    //        var the_number = id +'';
    //        var temp_end_index = the_number.length;
    //        var temp_beginning_index = temp_end_index-1;
    //        var test_string = the_number.substring( temp_beginning_index , temp_end_index );
    //        var begin_string = the_number.substring( the_number, temp_beginning_index);
    //
    //        var maxy =parseInt(max);
    //
    //        if(test_string == max){
    //          for(i=the_number-test_string;i<the_number;i++){
    //            if($('#leg_info'+i).show()){
    //              $('#leg_info'+i).hide();
    //              $('#leg_com'+i).hide();
    //              if($('#on_leg'+i).attr('class')){
    //                $('#on_leg'+i).attr('class','');
    //              }
    //            }
    //          }
    //        }else{
    //          for(i=the_number-test_string;i<id+maxy;i++){
    //            if($('#leg_info'+i).show()){
    //              $('#leg_info'+i).hide();
    //              $('#leg_com'+i).hide();
    //              if($('#on_leg'+i).attr('class')){
    //                $('#on_leg'+i).attr('class','');
    //              }
    //            }
    //          }
    //        }

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
  /*if(jQuery('#max_wei').val()){
    jQuery('#f_maxwei').val(jQuery('#max_wei').val());
  }
  if(jQuery('#max_dist').val()){
    jQuery('#f_maxdist').val(jQuery('#max_dist').val());
  }
  if(jQuery('#max_eff').val()){
    jQuery('#f_maxeff').val(jQuery('#max_eff').val());
  }*/

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