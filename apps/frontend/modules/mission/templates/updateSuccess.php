<?php 
use_helper('Form', 'Object');
$date_widget = $sf_data->getRaw('date_widget');
$time_widget = $sf_data->getRaw('time_widget');
if (isset($selected_companions)) $selected_companions = $sf_data->getRaw('selected_companions');
use_javascripts_for_form($date_widget);
use_stylesheets_for_form($date_widget);
$sf_response->addJavascript('http://maps.google.com/maps?file=api&amp;v=2&amp;sensor=false&amp;key='.sfConfig::get('app_gmap_key'));
$sf_response->addJavascript('/js/jquery.meio.mask.min.js');
?>

<?php if(isset($itinerary)):?>
<div class="add-mission">
  <div class="add-mission-entry">
    <h2>Add Mission</h2>
    <!--
    <a href="" class="btn-action-grey">
      <span>CANCEL</span>
    </a>
    <a href="" class="btn-action-grey">
      <span>SAVE DRAFT</span>
    </a>
    <em class="autosave">Autosaved 3:01 PM (0 minutes ago)</em>
    -->
  </div>
  <h3>Itinerary #<?php echo $itinerary->getId(); ?> Details:</h3>
  
    <fieldset>
      <div class="mission-dtls">
        <dl>
          <dt>Mission Type:</dt>
          <dd>
            <?php if($itinerary->getMissionTypeId()):?>
              <?php $mission_type = MissionTypePeer::retrieveByPK($itinerary->getMissionTypeId());?>
              <?php if($mission_type):?>
                <?php echo $mission_type->getName();?>
              <?php endif;?>
            <?php endif;?>
          </dd>
          <dt>Origin:</dt>
          <dd>
            <a href="#">
            <?php if($itinerary->getOrginCity() || $itinerary->getOrginState()):?>
              <?php echo $itinerary->getOrginCity() .' , '. $itinerary->getOrginState()?>
            <?php endif;?>
            </a>
          </dd>
          <dt>Transportation Type*:</dt>
          <dd>
            <select class="tab-switcher" id="types">
              <option value="">Select</option>
              <option <?php if($sf_params->get('transportation') == 'air_mission') echo 'selected' ?> value="air_mission">Air Mission</option>
              <option <?php if($sf_params->get('transportation') == 'ground_mission') echo 'selected' ?> value="ground_mission">Ground Mission</option>
              <option <?php if($sf_params->get('transportation') == 'commercial_mission') echo 'selected' ?> value="commercial_mission">Commercial Mission</option>
            </select>
            <div id="message_display"></div>
          </dd>
        </dl>
        
        <dl>
          <dt>Passenger:</dt>
          <dd>
            <?php if($itinerary->getPassengerId()):?>
              <?php $passenger = PassengerPeer::retrieveByPK($itinerary->getPassengerId())?>
              <?php if($passenger) {?>
                <?php $person = PersonPeer::retrieveByPK($passenger->getPersonId())?>
                <a href="<?php echo url_for('passenger/view?id='.$passenger->getId())?>">
                  <?php if(isset($person)):?>
                    <?php echo $person->getTitle() .' . '.$person->getFirstName() .' '.$person->getLastName()?>
                  <?php endif;?>
                </a>
              <?php }?>
            <?php endif;?>
            <?php if(isset($person)):?>
              <div class="dtl-pop-up">
                <div class="t"></div>
                <div class="c">
                  <?php if(isset($person)){
                    if($person){
                      if($person->getCity() || $person->getState() || $person->getCountry()){
                        echo $person->getCity() .' , '. $person->getState() .' , '.$person->getCountry();
                      }
                      if($person->getDayPhone()){
                        echo $person->getDayPhone().'('.$person->getDayComment().')';
                      }
                      if($person->getEveningPhone()){
                        echo $person->getEveningPhone().'('.$person->getEveningComment().')';
                      }
                      if($person->getMobilePhone()){
                        echo $person->getMobilePhone().'('.$person->getMobileComment().')';
                      }
                    }
                  }?>
                </div>
                <div class="b"></div>
              </div>
            <?php endif?>
          </dd>
          
          <dt>Passenger Type:</dt>
          <dd>
            <a href="#">
              <?php if($passenger):?>
                <?php $passenger_type = PassengerTypePeer::retrieveByPK($passenger->getPassengerTypeId())?>
                <?php if(isset($passenger_type)):?>
                    <?php echo $passenger_type->getName()?>
                <?php endif;?>
              <?php endif;?>
            </a>
            <?php //if(isset($passenger)):?>
              <!--<div class="dtl-pop-up">
                <div class="t"></div>
                <div class="c">[detailed information]</div>
                <div class="b"></div>
              </div>-->
            <?php //endif?>
          </dd>
          <dt>Requester:</dt>
          <dd>
            <a href="#">
              <?php if($itinerary->getRequesterId()):?>
                <?php $requester = RequesterPeer::retrieveByPK($itinerary->getRequesterId())?>
                <?php if(isset($requester)):?><?php $rperson = PersonPeer::retrieveByPK($requester->getPersonId())?><?php endif;?>
                <?php if(isset($rperson)):?>
                    <?php echo $rperson->getTitle() .' . '.$rperson->getFirstName() .' '.$rperson->getLastName() ?>
                <?php endif;?>
              <?php endif;?>
            </a>
            <div class="dtl-pop-up">
                <div class="t"></div>
                <div class="c">
                    <?php if(isset($rperson)){
                    if($rperson){
                      if($rperson->getCity() || $rperson->getState() || $rperson->getCountry()){
                        echo $rperson->getCity() .' , '. $rperson->getState() .' , '.$rperson->getCountry();
                      }
                      if($rperson->getDayPhone()){
                        echo $rperson->getDayPhone().'('.$rperson->getDayComment().')';
                      }
                      if($rperson->getEveningPhone()){
                        echo $rperson->getEveningPhone().'('.$rperson->getEveningComment().')';
                      }
                      if($rperson->getMobilePhone()){
                        echo $rperson->getMobilePhone().'('.$rperson->getMobileComment().')';
                      }
                    }
                  }?>
                </div>
                <div class="b"></div>
              </div>
          </dd>
          <dt>Destination:</dt>
          <dd>
            <a href="#">
            <?php if($itinerary->getDestCity() || $itinerary->getDestState()):?>
              <?php echo $itinerary->getDestCity() .' , '. $itinerary->getDestState()?>
            <?php endif;?>
            </a>
          </dd>
        </dl>
      </div>
      
       <?php if(isset($group_camp_id)):?>
        <a href="<?php echo url_for('@add_passengers?id='.$itinerary->getId())?>" class="link-view">
            Return Adding Process
        </a>
       <br/>
       <br/>
       <?php endif?>

      <div id="air_mission_tab" class="air-mission" style="display:none;">
        <form action="<?php echo url_for('mission/update?id='.$itinerary->getId())?>" method="post">
          <input type="hidden" name="transportation" value="air_mission"/>
          <?php if(isset($group_camp_id)):?><input type="hidden" name="add_passengers" value="<?php echo $group_camp_id?>"/><?php endif?>
          <div class="frame">
            <h3>Air Mission Detail</h3>
            <div class="air-mission-info">
              <?php if ($sf_params->get('transportation') == 'air_mission' && isset($errors) && count($errors)) {?>
                <ul class="error_list">
                <?php foreach ($errors as $error) {?>
                  <li><?php echo $error?></li>
                <?php }?>
                </ul>
              <?php }?>
              <div class="holder">
                <div class="wrap">
                  <label for="air_date">Mission Date:</label>
                  <?php echo $date_widget->render('mission_date', $sf_params->get('mission_date'), array('id' => 'air_date'));?>
                </div>
                <div class="wrap">
                  <label for="form-item-2">Baggage Weight:</label>
                  <input id="form-item-2" class="text narrower" type="text" value="<?php echo $sf_params->get('baggage_weight')?>" name="baggage_weight"/>
                  <select>
                    <option value="LB">LB</option>
                    <option value="KG">KG</option>
                  </select>
                </div>
                <div class="wrap">
                  <label for="form-item-3">Baggage Description:</label>
                  <input id="form-item-3" class="text" type="text" name="baggage_desc" value="<?php echo $sf_params->get('baggage_desc')?>"/>
                </div>
              </div>
             <!--            End Holder 1-->
              <div class="holder">
                <label for="form-item-4">Mission-Specific Comment:</label>
                <textarea id="form-item-4" rows="20" cols="20" name="comment"></textarea>
              </div>
              <!--            End Holder 2-->
            </div> <!-- End Air Mission -->
            
            <div class="destination">
              <label for="form-item-5">Origin Airport:</label>
              <input type="text" class="text" id="ident_from"/>

              <label for="form-item-6">Destination Airport:</label>
              <input type="text" class="text" id="ident_to"/>

              <label id="ident_distance"></label>

              <a class="btn-save-leg" href="#" onclick="save_leg(); return false;">
                <span>Save This Leg</span>
              </a>
            </div>
            <div style="color:red;" id="air_notification"></div>

            <div class="wrap">
              <table id="legs">
                <tr>
                  <th>Orgin Airport</th>
                  <th>Destination Airport</th>
                  <th></th>
                </tr>
              </table>
            </div>

            <div class="mission-map">
              <div id="map_canvas" style="width:573px;height:300px;"></div>
            </div>

            <input type="hidden" id="or_airport" name="or_airport" value=""/>
            <input type="hidden" id="de_airport" name="de_airport" value=""/>

            <input class="hide" type="submit" value="submit" id="air_form_submit"/>
          </div><!-- End Frame-->
        </form>
      </div><!-- End Air Mission Tab-->

      <div id="ground_mission_tab" class="air-mission" style="display: none;">
        <form action="<?php echo url_for('mission/update?id='.$itinerary->getId())?>" method="post">
          <input type="hidden" name="transportation" value="ground_mission"/>
          <?php if(isset($group_camp_id)):?><input type="hidden" name="add_passengers" value="<?php echo $group_camp_id?>"/><?php endif?>
          <div class="frame">
            <h3>Ground Mission Detail</h3>
            <div class="air-mission-info">
              <?php if ($sf_params->get('transportation') == 'ground_mission' && isset($errors) && count($errors)) {?>
                <ul class="error_list">
                <?php foreach ($errors as $error) {?>
                  <li><?php echo $error?></li>
                <?php }?>
                </ul>
              <?php }?>
              <div class="holder">
                <div class="wrap">
                  <label for="form-item-1">Mission Date:</label>
                  <?php echo $date_widget->render('mission_date', $sf_params->get('mission_date'), array('id' => 'ground_date'));?>
                </div>
                <div class="wrap">
                  <label>Origin Address</label>
                  <?php echo select_tag('ground_origin', options_for_select($ground_addresses, $sf_params->get('ground_origin'), array('include_custom' => 'Select')))?>
                </div>
                <div class="wrap">
                  <label>Destination Address</label>
                  <?php echo select_tag('ground_destination', options_for_select($ground_addresses, $sf_params->get('ground_destination'), array('include_custom' => 'Select')))?>
                </div>
              </div>
              
              <div class="holder">
                <label for="ground_comment">Mission-Specific Comment:</label>
                <textarea id="ground_comment" rows="20" cols="20" name="comment"></textarea>
              </div>
            </div><!-- air-mission-info -->

            <div class="air-mission-info">
              <div class="holder">
                <label>Patient's Address</label>
                <?php echo $person->getAddress1()?>
                <?php echo $person->getAddress2()?>
                <br/>
                <?php echo $person->getCity().', '.$person->getState().' '.$person->getZipcode()?>
              </div>
              <div class="holder">
                <label>Lodging Address</label>
                <?php echo $passenger->getLodgingName()?><br/>
                <?php echo $itinerary->getDestCity().', '.$itinerary->getDestState()?>
                <br clear="all"/>

                <label>Facility Address</label>
                <?php echo $passenger->getFacilityName()?><br/>
                <?php echo $itinerary->getDestCity().', '.$itinerary->getDestState()?>
              </div>
            </div>
            
            <input class="hide" type="submit" value="submit" id="ground_form_submit"/>
          </div><!-- frame -->
        </form>
      </div>

      <div id="commercial_mission_tab" class="air-mission" style="display: none;">
        <form action="<?php echo url_for('mission/update?id='.$itinerary->getId())?>" method="post" id="commercial_form">
          <input type="hidden" name="transportation" value="commercial_mission"/>
          <?php if(isset($group_camp_id)):?><input type="hidden" name="add_passengers" value="<?php echo $group_camp_id?>"/><?php endif?>
          <div class="frame">
            <h3>Commercial Mission Detail</h3>
            <div class="air-mission-info">
              <?php if ($sf_params->get('transportation') == 'commercial_mission' && isset($errors) && count($errors)) {?>
                <ul class="error_list">
                <?php foreach ($errors as $error) {?>
                  <li><?php echo $error?></li>
                <?php }?>
                </ul>
              <?php }?>
              <div class="holder" style="width:262px;">
                <div class="wrap">
                  <label for="form-item-1">Mission Date*:</label>
                  <?php echo $date_widget->render('mission_date', $sf_params->get('mission_date'), array('id' => 'comm_date'));?>
                </div>
                <div class="wrap">
                  <label>Flight Time</label>
                  <?php echo $time_widget->render('flight_time', $sf_params->get('flight_time'))?>
                </div>
                <div class="wrap">
                  <label for="comm_baggage_weight">Baggage Weight:</label>
                  <input id="comm_baggage_weight" class="text narrower" type="text" value="<?php echo $sf_params->get('baggage_weight')?>" name="baggage_weight"/>
                  <select>
                    <option value="LB">LB</option>
                    <option value="KG">KG</option>
                  </select>
                </div>
                <div class="wrap">
                  <label for="comm_baggage_desc">Baggage Description:</label>
                  <input id="comm_baggage_desc" class="text" type="text" name="baggage_desc" value="<?php echo $sf_params->get('baggage_desc')?>"/>
                </div>
                <div class="wrap">
                  <label for="airline_id">Airline*:</label>
                  <?php echo select_tag('airline_id', objects_for_select($airlines, 'getId', 'getName', $sf_params->get('airline_id'), array('include_custom' => 'Please Select')).'<option value="other">Other</option>')?>
                  <label>&nbsp;</label>
                  <input id="airline_custom" class="text" type="text" name="airline_custom" value="<?php echo $sf_params->get('airline_custom')?>"/>
                </div>
                <div class="wrap">
                  <label for="fund_id">Commercial Fund:</label>
                  <?php echo select_tag('fund_id', objects_for_select($funds, 'getId', 'getFundDesc', $sf_params->get('fund_id'), array('include_custom' => 'None')), array('class' => 'select'))?>
                </div>
                <div class="wrap">
                  <label>Confirmation Code:</label>
                  <input class="text" type="text" name="confirm_code" value="<?php echo $sf_params->get('confirm_code')?>"/>
                </div>
                <div class="wrap">
                  <label>Flight Cost:</label>
                  <input class="text" type="text" name="flight_cost" value="<?php echo $sf_params->get('flight_cost')?>"/>
                </div>
              </div>
            </div><!-- air-mission-info -->

            <h3>Flight Details</h3>
            <table id="comm_flight_details">
              <tr>
                <td>Origin</td>
                <td>Destination</td>
                <td>Flight #</td>
                <td>Departure</td>
                <td>Arrival</td>
                <td></td>
              </tr>
              <tr id="comm_flight_template" class="hide">
                <td><input type="text" name="origin[]" size="10"/></td>
                <td><input type="text" name="destination[]" size="10"/></td>
                <td><input type="text" name="flight_number[]" size="10"/></td>
                <td><?php echo $time_widget->render('departure[]')?></td>
                <td><?php echo $time_widget->render('arrival[]')?></td>
                <td><a href="#" onclick="$(this).parent().parent().remove(); return false;" class="action-remove"></a></td>
              </tr>
            </table>
            
            <a class="btn-action" onclick="commAddRow(); return false;" href="#"><span>Add Another</span><strong/></a>

            <div class="air-mission-info">
              <div class="holder">
                <div class="wrap">
                  <label for="comm_comment">Special Needs:</label>
                  <textarea id="comm_comment" rows="20" cols="20" name="comment"></textarea>
                </div>
              </div>
            </div>

          </div><!-- frame -->
        </form>
      </div>

      <?php if ($passenger) {?>
        <h3>Previous Companions for <?php echo $person->getName()?></h3>
        
        <a href="#" class="btn-action" style="<?php if (isset($selected_companions)) echo 'display:none;'?>" onclick="$('#companion_holder').show(); $(this).hide(); return false;"><span>Add Companions</span><strong>&nbsp;</strong></a>

        <div id="companion_holder" style="<?php if (!isset($selected_companions)) echo 'display:none;'?>">
          <?php $companions = $passenger->getCompanions();?>
          <table class="companion-table" id="companions">
            <thead style="<?php if (count($companions) == 0) echo 'display:none;'?>">
              <tr>
                <td class="cell-1">Companion</td>
                <td>Relationship</td>
              </tr>
            </thead>
            <tbody>
            <?php foreach ($companions as $companion) {?>
            <tr>
              <td class="cell-1">
                <input type=checkbox name="companions[]" id="companion_<?php echo $companion->getId()?>" value="<?php echo $companion->getId()?>" <?php if (isset($selected_companions) && in_array($companion->getId(), $selected_companions)) echo 'checked'?>/>
                <label for="companion_<?php echo $companion->getId()?>"><?php echo $companion->getName()?></label>
              </td>
              <td class="cell-2"><?php echo $companion->getRelationship()?></td>
            </tr>
            <?php }?>
            </tbody>
          </table>
          <?php if (count($companions) == 0) echo '<span id="no_companion">Passenger doesn\'t have any companion</span>'?>
          <div id="new_companion"></div>
          <?php echo image_tag('/images/loading.gif', array('id' => 'new_companion_loading', 'style' => 'display:none;'));?>
          <br clear="all"/>
          <a href="#" class="btn-action" onclick="newCompanion(); return false;"><span>Add New Companion</span><strong>&nbsp;</strong></a>
        </div>
      <?php }?>
        <div class="form-submit">
            <table align="right">
                <tr>
                    <td style="padding-top: 10px; ">
      <a class="cancel" href="<?php echo url_for('@itinerary_detail?id='.$itinerary->getId()) ?>"> Cancel </a>
                    </td>
                    <td>
      <a href="#" class="btn-save" onclick="submitAll();return false;">
        <span>Save</span>
      </a>
                    </td>
                </tr>
            </table>
      </div>
    </fieldset>
</div>
<?php endif?>

<script type="text/javascript">
//<![CDATA[
function submitAll()
{
  // collect all companions
  $('#companions input:checked').clone().each(function(){
    $(this).attr('type', 'hidden');
  }).prependTo('#' + $('#types').val() + '_tab form');
  $('#' + $('#types').val() + '_tab form').submit();
}

function newCompanion()
{
  $('#new_companion_loading').show();
  $.ajax({
    url: '<?php echo url_for('companion/ajaxNew?passenger_id='.$passenger->getId().'&el_id=new_companion')?>',
    dataType: 'html',
    success: function (html) {
      $('#new_companion').html(html);
      $('#new_companion_loading').hide();
    }
  });
}

function appendCompanion(id, name, relation)
{
  html = '<tr>';
  html += '<td class="cell-1">';
  html += '<input type="checkbox" value="'+id+'" id="companion_'+id+'" name="companions[]"/>';
  html += '<label for="companion_'+id+'">'+name+'</label>';
  html += '</td>';
  html += '<td class="cell-2">'+relation+'</td>';
  html += '</tr>';
  $('#companions tbody').append(html);
  $('#companions thead').show();
  $('#no_companion').remove();

  $('#new_companion').html('');
}

function gMarker(lat, lng, title, ident)
{
  var marker;
  marker = new GMarker(new GLatLng(lat, lng), { title: title});
  marker.ident = ident;
  GEvent.addListener(marker, 'click', function () { gAirportClick(marker); });
  return marker;
}

function gInitialize()
{
  if (GBrowserIsCompatible()) {
    var map = new GMap2(document.getElementById("map_canvas"), { size: new GSize(573, 300) });
    map.setCenter(new GLatLng(36.080055,-115.15225), 5);
    map.setMapType(G_HYBRID_MAP);
    map.addControl(new GSmallMapControl());
    map.addControl(new GMapTypeControl());

    <?php foreach ($airport_list as $i => $airport) {?>
    map.addOverlay(gMarker(<?php echo $airport->getLatitude()?>, <?php echo $airport->getLongitude()?>, "<?php echo $airport->getName()?>", "<?php echo $airport->getIdent()?>"));
    <?php }?>
  }
}

function gAirportClick(marker)
{
  var $from = $('#ident_from');
  var $to = $('#ident_to');

  if ($from.val() == '') {
    $from.val(marker.ident);
    $from.data('coord', marker.getLatLng());
  }else if ($to.val() == '') {
    $to.val(marker.ident);
    $('#ident_distance').html(gCalculateDistance($from.data('coord'), marker.getLatLng()) + 'miles');
  }else{
    $from.val(marker.ident);
    $from.data('coord', marker.getLatLng());
    $to.val('');
  }
}

function gCalculateDistance(from, to) // in miles
{
  var distance = from.distanceFrom(to, 3959).toFixed(1);

  var max = <?php echo sfConfig::get('app_max_airport_distance')?>;
  var msg = '';
  if (distance > max) msg = 'Distance is more than ' + max + '. But you can override!';
  $('#air_notification').html(msg);

  return distance;
}

$(function() {
  gInitialize(); // google map
  window.onbeforeunload = GUnload; // google map

  $("#types").change(function(){
    $('#air_mission_tab, #ground_mission_tab, #commercial_mission_tab').hide();
    $('#' + $(this).val() + '_tab').show();
  });

  $('#types').change();

  $('#airline_id').change(function(){
    if ($(this).val() == 'other') {
      $('#airline_custom').focus();
    }
  });
  commAddRow();

  <?php
  if ($sf_params->get('transportation') == 'air_mission' && isset($origin_idents) && isset($dest_idents)) {
    if (count($sf_data->getRaw('origin_idents')) && count($sf_data->getRaw('dest_idents'))) {
      $idents = array_combine($sf_data->getRaw('origin_idents'), $sf_data->getRaw('dest_idents'));
      foreach ($idents as $src => $dst) {?>
      $('#ident_from').val('<?php echo $src?>');
      $('#ident_to').val('<?php echo $dst?>');
      save_leg();
      <?php }
    }
  }
  ?>
});

function commAddRow()
{
  var $tmp=$('#comm_flight_template');
  $('#comm_flight_details').append('<tr>'+$tmp.removeClass('hide').html()+'</tr>');
  $tmp.addClass('hide');
}

function save_leg()
{
  var from = $('#ident_from').val();
  var to = $('#ident_to').val();

  // check empty
  if (from == '' || to == '') {
    $('#air_notification').html('Please fill both origin and destination');
    return;
  }

  var duplicate = false;

  // check duplicate
  $('#legs tr').each(function () {
    var children = $(this).children('td').children('input');
    if (children.length) {
      if (children[0].value == from && children[1].value == to) {
        duplicate = true;
        return false; // stop loop
      }
    }
  });

  if (duplicate) {
    $('#air_notification').html('Origin and destination is already in the list');
    return;
  }

  html = '<td>'+from+'<input type="hidden" name="origin_idents[]" value="'+from+'"/>'+'</td>';
  html += '<td>'+to+'<input type="hidden" name="destination_idents[]" value="'+to+'"/>'+'</td>';
  html += '<td><a class="action-remove" href="#" onclick="$(this).parent().parent().remove();return false;">remove</a></td>';

  $('#legs').append('<tr>'+html+'</tr>');
}

//  ]]>
</script>