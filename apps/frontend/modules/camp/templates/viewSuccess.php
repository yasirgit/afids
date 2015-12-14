<?php
use_helper('Form', 'Javascript');
/* @var $camp Camp */
$airport = $camp->getAirport();
?>
<script type="text/javascript">
  function removePassengerOnCamp(elem){
    jQuery('#passenger_remove').dialog({
      modal: true,
      width: 200,
      buttons: {
          "Ok": function() {              
              window.location.href = jQuery(elem).attr('redirect');
          },
          "Cancel": function() {
              jQuery(this).dialog("close");
          }
      }
    });
    jQuery('#passenger_remove').dialog('open');
  }
  
  function setPassengerFirstAndLastName(elem, li){
    var firstname = jQuery(li).attr('firstname');
    var lastname = jQuery(li).attr('lastname');
    var passengerid = jQuery(li).attr('passengerid');
    jQuery('#lastname').val(lastname);
    jQuery('#firstname').val(firstname);
    jQuery('#location').html("<?php if($airport) echo $airport->getCity().', '.$airport->getState(); else echo '--';?>");
    jQuery("#add_passenger").show();
    jQuery('#passenger_error').hide();
    jQuery('#passenger_id').val(passengerid);
  }
  function setAirportName(elem, li){    
    jQuery('#location').html("<?php if($airport) echo $airport->getCity().', '.$airport->getState(); else echo '--';?>");
    jQuery("#add_passenger").show();
    jQuery('#passenger_error').hide();
  }
  
  function saveSourceLocation(elem){
    var airport_name = elem.value;
    var div_id = jQuery(elem).prev('.passenger_return').attr('id');
    var passenger_id = div_id.split('_');
    var miss_id = jQuery(elem).prev('.passenger_return').attr('mission_id');
    ///console.log(passenger_id[1]  + ' miss: ' + miss_id);
    //alert(passenger_id[1]  + ' miss: ' + miss_id);
    jQuery.ajax({
      url: '<?php echo url_for('camp/saveSourceLocation')?>',
      data: { camp_id: <?php echo $camp->getId()?> , old_airportname: jQuery.trim(jQuery(elem).prev('.passenger').html()), mission_id: miss_id, airportname: airport_name, passengerid: passenger_id[1] },
      dataType: 'html',
      success: function (html) {
        jQuery(elem).val(html).hide();
        jQuery(elem).prev('.passenger_return').html(html).show();
      }
    });
  }
  function saveCampDestinationLocation(elem){
    //alert(elem.id); return;
    var airport_name = elem.value;
    var div_id = jQuery(elem).prev('.passenger_return').attr('id');
    var passenger_id = div_id.split('_');
    var miss_id = jQuery(elem).prev('.passenger_return').attr('mission_id');
    jQuery.ajax({
      url: '<?php echo url_for('camp/saveSourceLocation')?>',
      data: { camp_id: <?php echo $camp->getId()?> , mission_id: miss_id, _for: 'camp_destination', old_airportname: jQuery.trim(jQuery(elem).prev('.passenger').html()), airportname: airport_name, passengerid: passenger_id[1] },
      dataType: 'html',
      success: function (html) {
        jQuery(elem).val(html).hide();
        jQuery(elem).prev('.passenger_return').html(html).show();
      }
    });
  }
  function saveReturnSourceLocation(elem){    
    var airport_name = elem.value;
    var div_id = jQuery(elem).prev('.passenger_return').attr('id');
    var passenger_id = div_id.split('_');
    var miss_id = jQuery(elem).prev('.passenger_return').attr('mission_id');
    jQuery.ajax({
      url: '<?php echo url_for('camp/saveReturnSourceLocation')?>',
      data: { camp_id: <?php echo $camp->getId()?> , mission_id: miss_id, old_airportname: jQuery.trim(jQuery(elem).prev('.passenger').html()), airportname: airport_name, passengerid: passenger_id[1] },
      dataType: 'html',
      success: function (html) {
        jQuery(elem).val(html).hide();
        jQuery(elem).prev('.passenger_return').html(html).show();
      }
    });
  }
</script>
<style type="text/css">
  .auto-passengers tr.passenger div.auto_complete {
      width: 150px;!important
   }
</style>
<h2>Camp Detail</h2>

<div class="person-view">
  <div class="person-info">
    <h3>Details</h3>
    <dl class="person-data">
      <dt>Camp Name</dt>
      <dd><?php echo $camp->getCampName()?></dd>
      <dt>Location</dt>
      <!--<dd><?php //if ($airport) echo $airport->getCity().', '.$airport->getState(); else echo '--';?></dd>-->
      <dd><?php if($airport) echo $airport->getCity().', '.$airport->getState(); else echo '--';?></dd>
      <dt>Arrival Date</dt>
      <dd><?php echo $camp->getArrivalDate('m/d/Y').' '.$camp->getArrivalComment()?></dd>
      <dt>Departure Date</dt>
      <dd><?php echo $camp->getDepartureDate('m/d/Y').' '.$camp->getDepartureComment()?></dd>
    </dl>
  </div>
  
  <div class="person-table-data passenger-form" style="clear:left;">
    <h3>Passengers</h3>
    <table id="passengers" class="auto-passengers" style="width: 100%;">
      <tbody>
        <tr>
          <td>#</td>
          <td class="cell-1">First Name</td>
          <td class="cell-1">Last Name</td>
          <td class="cell-1">Source</td>
          <td><strong>Destination</strong></td>          
          <td class="cell-1">Note</td>
          <!--td><strong id="link_title">Link</strong><a href="#" id="link_save" class="action-edit" style="display:none;">save changes</a></td -->
          <td>&nbsp;</td>
        </tr>
        <?php $index = 1;foreach ($camp_passengers as $camp_passenger) {?>
        <?php $passenger = $camp_passenger->getPassenger();?>
        <?php if($camp_passenger->getAirportId()) $air_port = AirportPeer::retrieveByPK($camp_passenger->getAirportId());?>
        <tr class="passenger<?php if($index % 2 != 0) echo ' alt'?>" id="passenger_<?php echo $passenger->getId()?>">
          <td><?php echo $index;?></td>
          <td><?php echo $passenger->getPerson()->getFirstName()?></td>
          <td><?php echo $passenger->getPerson()->getLastName()?></td>          
          <td>
            <div mission_id="<?php echo $camp_passenger->getMissionId()?>" class="passenger_return" id="passenger_<?php if($passenger) echo $passenger->getId() ?>" title="Click to edit" style="background-color: rgb(255, 255, 153);" onclick="jQuery(this).hide();jQuery(this).next('input').toggle()">
                <?php if($air_port) echo $air_port->getName()?>
            </div>
            
            <?php 
                  //echo input_in_place_editor_tag('source_location_'.$index, 'camp/saveSourceLocation?camp_id='.$camp->getId().'&passenger_id='.$passenger->getId(), array('save_text'=>'Save', 'rows' => '1'))
                  echo input_auto_complete_tag('airport_name_'.$index, ($air_port ? $air_port->getName() : ''),
                                    'airport/autoCompleteAirSourceName',
                                    array('autocomplete' => 'off', 'class' => 'text narrow', 'style' => 'display:none;width:150px'),
                                    array(
                                        'use_style' => true,                                        
                                        'after_update_element' => 'saveSourceLocation'
                                    )
                            );
            ?>            
          </td>
          <td>
              <div class="passenger_return"  id="passenger_<?php if($passenger) echo $passenger->getId() ?>">
                  <?php //if($airport) $dest_value = $airport->getCity().', '.$airport->getState(); else $dest_value = '--';?>
                  <?php //echo $dest_value?>
                  <?php $camp_passenger instanceof CampPassenger; if($camp->getAirportId()):?>
                      <?php $camp_airport = $camp->getAirport()?>
                      <?php echo $camp_airport->getCity().', '. $camp_airport->getState()?>
                <?php else:?>
                      <?php echo '---'?>
                <?php endif;?>
              </div>
              <?php
              //echo input_in_place_editor_tag('source_location_'.$index, 'camp/saveSourceLocation?camp_id='.$camp->getId().'&passenger_id='.$passenger->getId(), array('save_text'=>'Save', 'rows' => '1'))
              /*echo input_auto_complete_tag('airport_name_'.($index+1), ($dest_value),
                                'airport/autoCompleteAirSourceName',
                                array('autocomplete' => 'off', 'class' => 'text narrow', 'style' => 'display:none;width:150px'),
                                array(
                                    'use_style' => true,
                                    'after_update_element' => 'saveCampDestinationLocation'
                                )
                        );*/
            ?>
          </td>
          <td><?php echo $camp_passenger->getNote()?></td>
          <!--td>
            <?php //foreach ($links as $i => $pid) {
              //if ($camp_passenger->getPassengerId() == $pid) { echo $i+1; break; }
            //}?>
          </td -->
          <td>
            <?php $mission = $camp_passenger->getMission() ?>
            <?php if ($mission == false) {?>
              <!--a href="<?php //echo url_for('camp/addLeg?id='.$camp->getId().'&passenger_id='.$passenger->getId())?>" class="link-add" target="_blank">leg</a -->
            <?php }else{?>
              <!--a href="<?php //echo url_for('mission/view?id='.$mission->getId())?>" class="link-view" target="_blank">leg</a -->
            <?php }?>
            <?php if($passenger && $air_port && $camp):?>
            <a id="action_removed_<?php echo $index?>" href="javascript:void(0)" redirect="/frontend_dev.php/camp/autoRemoveMissionsOnCamp/passenger/<?php echo $passenger->getId()?>/airport_id/<?php echo $air_port->getId()?>/camp/<?php echo $camp->getId()?>/mission_id/<?php echo $camp_passenger->getMissionId()?>/from/source" onclick="removePassengerOnCamp(this)" class="action-remove">remove</a>
             <?php endif;?>
          </td>
        </tr>
        <?php $index++;$air_port = null;}?>
        <tr class="passenger" id="add_passenger_form">
          <td></td>
          <td>
              <!--input type="text" class="text narrow" autocomplete="off" id="firstname"/ -->
              <?php                   
                  echo input_auto_complete_tag('firstname', '',
                                    'camp/ajaxFilterPassenger',
                                    array('autocomplete' => 'off', 'class' => 'text narrow'),
                                    array(
                                        'use_style' => true,                                        
                                        'after_update_element' => 'setPassengerFirstAndLastName'
                                    )
                            );
            ?>
          </td>
          <td>
              <!--input type="text" class="text narrow" autocomplete="off" id="lastname"/ -->
              <?php                   
                  echo input_auto_complete_tag('lastname', '',
                                    'camp/ajaxFilterPassenger',
                                    array('autocomplete' => 'off', 'class' => 'text narrow'),
                                    array(
                                        'use_style' => true,                                        
                                        'after_update_element' => 'setPassengerFirstAndLastName'
                                    )
                            );
            ?>
          </td>
          <td>
            <!--input type="text" class="text narrow" autocomplete="off" id="airportname"/ -->
            <?php
                  echo input_auto_complete_tag('airportname', '',
                                    'camp/ajaxFilterAirportByName',
                                    array('autocomplete' => 'off', 'class' => 'text narrow'),
                                    array(
                                        'use_style' => true,
                                        'after_update_element' => 'setAirportName'
                                    )
                            );
            ?>
          </td>
          <td id="location"></td>
          <td><input type="text" class="text narrow" id="notes"/></td>
          <!--td><input type="hidden" id="passenger_id"/></td -->
          <td>
            <input type="hidden" id="passenger_id"/>
            <a href="javascript:void(0)" class="link-add" onclick="addPassenger()" id="add_passenger" style="display:none;">add</a>
          </td>
        </tr>
        <tr id="passenger_error" style="display:none; color:red;">
          <td colspan="7">
              
          </td>
        </tr>
        <tr>
          <td style="text-align:left; padding-left: 10px;" colspan="7" id="matching_passengers">
            type in the box to search for passengers and add
          </td>
        </tr>
      </tbody>
    </table>
    <a href="<?php echo url_for('passenger/find?camp_id='.$camp->getId())?>" class="link-add" target="_blank">add new passenger</a>
  </div>
  <div class="person-table-data passenger-form" style="clear:left;">
    <h3>Return Missions for Passengers</h3>    
    <table id="passengers_1" style="width: 100%;">
      <tbody>
        <tr>
          <td>#</td>
          <td class="cell-1">First Name</td>
          <td class="cell-1">Last Name</td>          
          <td class="cell-1">Source</td>
          <td><strong>Destination</strong></td>
          <td class="cell-1">Note</td>
          <!--td><strong id="link_title">Link</strong><a href="#" id="link_save" class="action-edit" style="display:none;">save changes</a></td -->
          <td>&nbsp;</td>
        </tr>
        <?php $count = 1; foreach ($camp_passengers_return as $camp_passenger) { ?>
        <?php $passenger = $camp_passenger->getPassenger();?>
        <?php if($camp_passenger->getReturnAirportId()): $air_port = AirportPeer::retrieveByPK($camp_passenger->getReturnAirportId());?>
        <?php elseif($camp_passenger->getAirportId()): $air_port = AirportPeer::retrieveByPK($camp_passenger->getAirportId()); endif;?>
        <tr class="passenger <?php if($count % 2 != 0) echo ' alt'?>" id="passenger_<?php echo $passenger->getId()?>">
          <td><?php echo $count++?></td>
          <td><?php echo $passenger->getPerson()->getFirstName()?></td>
          <td><?php echo $passenger->getPerson()->getLastName() ?></td>          
          
          <td><?php if($camp) {$camp_airport = $camp->getAirport (); if($camp_airport) {echo $camp_airport->getCity().', '.$camp_airport->getState();} else echo '---';} else echo '--';?></td>
          <td>
            <div mission_id="<?php echo $camp_passenger->getMissionId()?>" class="passenger_return" id="passenger_<?php if($passenger) echo $passenger->getId() ?>" title="Click to edit" style="background-color: rgb(255, 255, 153);" onclick="jQuery(this).hide();jQuery(this).next('input').toggle()">
                <?php if($air_port) echo $air_port->getName();?>
              </div>
              <?php //echo input_in_place_editor_tag('return-destination_'.$index, 'camp/saveSourceLocation?camp_id='.$camp->getId().'&passenger_id='.$passenger->getId(), array('save_text'=>'Save', 'rows' => '1')) 
                  echo input_auto_complete_tag('airport_name_'.++$index, ($air_port ? $air_port->getName() : ''),
                                    'airport/autoCompleteAirSourceName',
                                    array('autocomplete' => 'off', 'class' => 'text narrow', 'style' => 'display:none;width:150px'),
                                    array(
                                        'use_style' => true,
                                        'after_update_element' => 'saveReturnSourceLocation'
                                    )
                            );
            ?>
          </td>          
          <td><?php echo $camp_passenger->getNote()?></td>
          <td>            
            <?php if($passenger && $air_port && $camp):?>
            <a id="action_removed_<?php echo $index?>" href="javascript:void(0)" redirect="/frontend_dev.php/camp/autoRemoveMissionsOnCamp/passenger/<?php echo $passenger->getId()?>/airport_id/<?php echo $air_port->getId()?>/camp/<?php echo $camp->getId()?>/mission_id/<?php echo $camp_passenger->getMissionId()?>/from/return" onclick="removePassengerOnCamp(this)" class="action-remove">remove</a>
             <?php endif;?>
          </td>
        </tr>
        <?php } //} ?>
      </tbody>
    </table>    
  </div>
</div>
<div id="passenger_remove" style="display: none">Are you sure want remove this passenger?</div>
<script type="text/javascript">
//<![CDATA[
var timer = 0;
var fname, lname;
var links = {};

function filterPassengers()
{
  var firstname = $('#firstname').val();
  var lastname = $('#lastname').val();  
  if ((firstname == fname) && (lastname == lname)) return;
  fname = firstname;
  lname = lastname;
  $.ajax({
    url: '<?php echo url_for('camp/ajaxFilterPassenger')?>',
    data: { firstname: fname, lastname: lname },
    dataType: 'html',
    success: function (html) {
      $('#matching_passengers').html(html);
    }
  });
}
function filterAirportByName()
{
  var airport_name = $('#airportname').val();
  jQuery.ajax({
    url: '<?php echo url_for('camp/ajaxFilterAirportByName')?>',
    data: { airportname: airport_name },
    dataType: 'html',
    success: function (html) {
      $('#matching_passengers').html(html);
    }
  });
}
function filterTimer(event)
{
 // console.log(event.currentTarget.id);
  $('#add_passenger').hide();
  if (timer) clearTimeout(timer);
  
  if(event.currentTarget.id == 'airportname'){
      timer = setTimeout('filterAirportByName()', 500);
  }else {
    timer = setTimeout('filterPassengers()', 500);
  }
}

function selectPassenger(id, f, l, loc)
{
  $('#passenger_error').hide();
  $('#passenger_id').val(id);
  $('#firstname').val(f);
  $('#lastname').val(l);
  $('#location').html(loc);
  $('#add_passenger').show();
}

function refinePassengerOrder()
{
  var n = 0;
  $('table#passengers tr:visible').removeClass('alt').each(function (){
    var $this = $(this);
    if (n%2 == 0) $this.addClass('alt');
    if ($this.is('.passenger')) $this.children(':first').html(n);
    n++;
  });
}

function addPassenger()
{
    if(jQuery.trim(jQuery("#airportname").val()) == ""){
        jQuery('#passenger_error').children('td').html('Please choose passenger\'s airport name');
        jQuery('#airportname').focus();
        jQuery('#passenger_error').show();
        return;
    }

    if(jQuery.trim(jQuery("#firstname").val()) == "" || jQuery.trim(jQuery("#lastname").val()) == ""){
        jQuery('#passenger_error td').html('Please choose passenger\'s first name and last name');
        jQuery('#passenger_error').show();
        return;
    }
    
  jQuery('#passenger_error').hide();
  jQuery("#add_passenger").
    attr('href', '/frontend_dev.php/camp/autoAddMissionsOnCamp/camp_id/<?php echo $camp->getId()?>/passenger/'
    +jQuery('#passenger_id').val()+'/airportname/' + jQuery.trim(jQuery("#airportname").val())
    + '/note/' + jQuery('#notes').val());
  
  return true;
  $.ajax({
    url: '<?php echo url_for('camp/ajaxAddPassenger?camp='.$camp->getId())?>',
    data: { passenger: $('#passenger_id').val(), note: $('#notes').val(), airportname: jQuery.trim(jQuery("#airportname").val()) },
    dataType: 'html',
    success: function (airport_id) {
      if (airport_id == 'wrong') {
        $('#passenger_error').show();
        $('#passenger_error td').html('Something is wrong');
      }else{
        var id = $('#passenger_id').val();
        html =  '<tr class="passenger" id="passenger_'+id+'">';
        html += '<td></td>';
        html += '<td>'+$('#firstname').val()+'</td>';
        html += '<td>'+$('#lastname').val()+'</td>';        
        html += '<td>'+$('#airportname').val()+'</td>';
        html += '<td>'+$('#location').html()+'</td>';
        html += '<td>'+$('#notes').val()+'</td>';
        html += '<td></td>';
        html += '<td>';
        // html += ' <a href="<?php echo url_for('camp/addLeg?id='.$camp->getId())?>?passenger_id='+id+'" class="link-add" target="_blank">leg</a>';
        html += '  <a href="javascript:void(0)" onclick="removePassenger(' + id + ', ' + airport_id +'); return false;" class="action-remove">remove</a>';
        html += '</td>';
        html += '</tr>';
        $('#add_passenger_form').before(html);

        $('#passenger_id, #notes, #firstname, #lastname, #airportname').val('');
        $('#location, #matching_passengers').html('');
        $('#add_passenger').hide();

        $('#passengers .passenger select').each(function (){
          if (this.value) {
             $(this).before(links.idToNumber(this.value));
          }
          $(this).remove();
        });
        refineLinks();
      }
      refinePassengerOrder();
    }
  });

  return false;
}

function removePassenger(id, a_id)
{
  if (!confirm('Are you sure want to remove this passenger?')) return;
  jQuery.ajax({
    url: '<?php echo url_for('camp/ajaxRemovePassenger?camp='.$camp->getId())?>',
    data: { passenger: id , airport_id: a_id},
    dataType: 'html',
    success: function (html) {
      $('#passenger_' + parseInt(html)).remove();
      $('#passengers .passenger select').each(function (){
        if (this.value) $(this).before(links.idToNumber(this.value));
        $(this).remove();
      });
      refineLinks();
      refinePassengerOrder();
    }
  });
}

function saveLinks()
{
  var params = '';
  for (var i in links) {
    if (typeof(links[i]) == 'object') {
      if (links[i].link) {
        params += 'links['+links[i].id+']='+links[links[i].link].id+'&';
      }
    }
  }
  $.ajax({
    url: '<?php echo url_for('camp/ajaxLinkPassengers?camp='.$camp->getId())?>',
    data: params,
    dataType: 'html',
    success: function (html) {
      if (html == '0') {
        $('#link_save').hide();
        $('#link_title').show();
      }
    }
  });

  return false;
}

function refineLinks()
{
  for (var i in links) {
    if (typeof(links[i]) == 'object'){      
      delete links[i];
    }
  }
  var html = '<select>';
  html += '<option value="">none</option>'
  $('#passengers .passenger').each(function (n){
    var l = this.id.substr(10);
    if (!isNaN(l)) {
      var link = parseInt($(this).children(':nth-child(7)').html(), 10);
      links[n+1] = { id: l, link: (isNaN(link) ? '' : link) };
      html += '<option value="'+l+'">'+(n+1)+'</option>';
    }
  });
  html += '</select>';
  
  $('#passengers .passenger').each(function (n){
    var l = this.id.substr(10);
    if (!isNaN(l)) {
      var content = html.replace('<option value="'+l+'">'+(n+1)+'</option>', '');
      content = content.replace('<select>', '<select id="link_'+l+'">');
      $(this).children(':nth-child(7)').html(content);
      if (links[n+1].link != '') {
        if (links[links[n+1].link].link == n+1) {
          $('#link_'+l).attr('value', links[links[n+1].link].id);
        }else{
          links[links[n+1].link].link = '';
          links[n+1].link = '';
        }
      }
    }
  });

  $('#passengers select').change(linkPassengers);
}

function linkPassengers()
{
  $('#link_save').show();
  $('#link_title').hide();

  var n = links.idToNumber($(this).val());
  var m = links.elementToNumber(this);

  if (links[m].link != '') {
    links.numberToElement(links[m].link).attr('value', '');
    links[links[m].link].link = '';
    links[m].link = '';
  }
  if (n) {
    if ((links[n].link != '') && (links[n].link != m)) {
      links.numberToElement(links[n].link).attr('value', '');
      links[links[n].link].link = '';
    }

    links.numberToElement(n).attr('value', links[m].id);
    links[m].link = n;
    links[n].link = m;
  }
}

links.idToNumber = function (id)
{
  for (var i in links) {
    if (typeof(links[i]) == 'object') {
      if (links[i].id == id) return i;
    }
  }
  return '';
}

links.elementToNumber = function (el)
{
  if ($(el).is('select')) {
    return $(el).parent().parent().children(':first').html();
  }else return '';
}

links.numberToElement = function (n)
{
  n = parseInt(n) + 1;
  return $('#passengers tr:nth-child('+n+') select');
}

$(function() {
  $('#firstname, #lastname, #airportname').change(filterTimer).keydown(filterTimer);
  refinePassengerOrder();
  $('#add_passenger').click(addPassenger);
  refineLinks();
  $('#link_save').click(saveLinks);
  jQuery('#passenger_remove').dialog({
      autoOpen: false,
      modal: true,
      width: 200,
      buttons: {
          "Ok": function() {
              jQuery(this).dialog("close");              
          },
          "Cancel": function() {
              jQuery(this).dialog("close");
          }
      }
    });
});
//]]>
</script>